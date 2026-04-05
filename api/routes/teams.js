const express = require('express');
const router = express.Router();
const multer = require('multer');
const path = require('path');
const pool = require('../db');

// Multer setup for file uploads
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, process.env.UPLOAD_DIR || '/uploads');
  },
  filename: (req, file, cb) => {
    const unique = Date.now() + '-' + Math.round(Math.random() * 1e9);
    cb(null, unique + path.extname(file.originalname));
  }
});

const upload = multer({
  storage,
  limits: { fileSize: 10 * 1024 * 1024 }, // 10MB
  fileFilter: (req, file, cb) => {
    const allowed = /jpeg|jpg|png|gif|webp|svg/;
    const ok = allowed.test(path.extname(file.originalname).toLowerCase());
    cb(null, ok);
  }
});

// GET all teams
router.get('/', async (req, res) => {
  try {
    const result = await pool.query(
      'SELECT id, name, city, logo_path, photo_path FROM teams ORDER BY name'
    );
    res.json(result.rows);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// GET one team with full roster
router.get('/:id', async (req, res) => {
  try {
    const teamResult = await pool.query(
      'SELECT * FROM teams WHERE id = $1', [req.params.id]
    );
    if (teamResult.rows.length === 0) {
      return res.status(404).json({ error: 'Team not found' });
    }

    const playersResult = await pool.query(
      'SELECT jersey_number, first_name, last_name, gender FROM players WHERE team_id = $1 ORDER BY jersey_number',
      [req.params.id]
    );

    res.json({
      team: teamResult.rows[0],
      players: playersResult.rows
    });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// POST create team with logo + photo upload
router.post('/', upload.fields([
  { name: 'logo', maxCount: 1 },
  { name: 'photo', maxCount: 1 }
]), async (req, res) => {
  try {
    const { name, city, coach, assistant_coach, physiotherapist, team_manager } = req.body;
    const logo_path = req.files?.logo?.[0]?.filename
      ? '/uploads/' + req.files.logo[0].filename : null;
    const photo_path = req.files?.photo?.[0]?.filename
      ? '/uploads/' + req.files.photo[0].filename : null;

    const result = await pool.query(
      `INSERT INTO teams (name, city, logo_path, photo_path, coach, assistant_coach, physiotherapist, team_manager)
       VALUES ($1,$2,$3,$4,$5,$6,$7,$8) RETURNING id`,
      [name, city, logo_path, photo_path, coach, assistant_coach, physiotherapist, team_manager]
    );

    res.json({ id: result.rows[0].id });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

module.exports = router;
