const express = require('express');
const router = express.Router();
const multer = require('multer');
const ExcelJS = require('exceljs');
const pool = require('../db');

const upload = multer({ storage: multer.memoryStorage() });

// GET - Download Excel template
router.get('/template', async (req, res) => {
  const workbook = new ExcelJS.Workbook();
  const sheet = workbook.addWorksheet('Roster');

  // Styling
  const headerStyle = {
    font: { bold: true, color: { argb: 'FFFFFFFF' }, size: 12 },
    fill: { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FF1F3464' } },
    alignment: { horizontal: 'center' },
    border: {
      top: { style: 'thin' }, bottom: { style: 'thin' },
      left: { style: 'thin' }, right: { style: 'thin' }
    }
  };

  // ---- TEAM INFO SECTION ----
  sheet.mergeCells('A1:F1');
  sheet.getCell('A1').value = 'ΣΤΟΙΧΕΙΑ ΟΜΑΔΑΣ';
  sheet.getCell('A1').style = headerStyle;

  sheet.getCell('A2').value = 'Προπονητής (Όνομα Επώνυμο)';
  sheet.getCell('A2').style = { font: { bold: true } };
  sheet.getCell('B2').value = '';

  sheet.getCell('A3').value = 'Βοηθός Προπονητή';
  sheet.getCell('A3').style = { font: { bold: true } };
  sheet.getCell('B3').value = '';

  sheet.getCell('A4').value = 'Φυσιοθεραπευτής';
  sheet.getCell('A4').style = { font: { bold: true } };
  sheet.getCell('B4').value = '';

  sheet.getCell('A5').value = 'Team Manager';
  sheet.getCell('A5').style = { font: { bold: true } };
  sheet.getCell('B5').value = '';

  sheet.addRow([]); // empty row

  // ---- PLAYERS SECTION ----
  const playerHeader = sheet.addRow([
    'Αρ. Φανέλας', 'Όνομα', 'Επώνυμο', 'Φύλο (Α/Γ)', '', ''
  ]);
  playerHeader.eachCell((cell) => { cell.style = headerStyle; });

  // 15 empty player rows
  for (let i = 0; i < 15; i++) {
    const row = sheet.addRow(['', '', '', '', '', '']);
    row.eachCell((cell) => {
      cell.border = {
        top: { style: 'thin' }, bottom: { style: 'thin' },
        left: { style: 'thin' }, right: { style: 'thin' }
      };
    });
  }

  // Column widths
  sheet.getColumn(1).width = 18;
  sheet.getColumn(2).width = 20;
  sheet.getColumn(3).width = 20;
  sheet.getColumn(4).width = 15;

  // Instructions sheet
  const infoSheet = workbook.addWorksheet('Οδηγίες');
  infoSheet.addRow(['ΟΔΗΓΙΕΣ ΣΥΜΠΛΗΡΩΣΗΣ']);
  infoSheet.addRow(['']);
  infoSheet.addRow(['1. Συμπληρώστε τα στοιχεία του τεχνικού τιμωρού στις γραμμές 2-5']);
  infoSheet.addRow(['2. Συμπληρώστε τους παίκτες από τη γραμμή 8 και κάτω']);
  infoSheet.addRow(['3. Φύλο: Α = Άνδρας, Γ = Γυναίκα']);
  infoSheet.addRow(['4. Αποθηκεύστε και ανεβάστε το αρχείο στη φόρμα εγγραφής']);
  infoSheet.addRow(['5. Ανεβάστε επίσης το logo και ομαδική φωτογραφία της ομάδας']);
  infoSheet.getColumn(1).width = 70;

  res.setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  res.setHeader('Content-Disposition', 'attachment; filename=roster_template.xlsx');
  await workbook.xlsx.write(res);
  res.end();
});

// POST - Import Excel + save team
router.post('/import', upload.fields([
  { name: 'excel', maxCount: 1 },
  { name: 'logo', maxCount: 1 },
  { name: 'photo', maxCount: 1 }
]), async (req, res) => {
  try {
    const { team_name, team_city } = req.body;

    if (!req.files?.excel) {
      return res.status(400).json({ error: 'Δεν βρέθηκε αρχείο Excel' });
    }

    // Save logo & photo to disk
    const fs = require('fs');
    const path = require('path');
    const uploadDir = process.env.UPLOAD_DIR || '/uploads';

    let logo_path = null;
    let photo_path = null;

    if (req.files?.logo) {
      const logoFile = req.files.logo[0];
      const logoName = Date.now() + '-logo' + path.extname(logoFile.originalname);
      fs.writeFileSync(path.join(uploadDir, logoName), logoFile.buffer);
      logo_path = '/uploads/' + logoName;
    }

    if (req.files?.photo) {
      const photoFile = req.files.photo[0];
      const photoName = Date.now() + '-photo' + path.extname(photoFile.originalname);
      fs.writeFileSync(path.join(uploadDir, photoName), photoFile.buffer);
      photo_path = '/uploads/' + photoName;
    }

    // Parse Excel
    const workbook = new ExcelJS.Workbook();
    await workbook.xlsx.load(req.files.excel[0].buffer);
    const sheet = workbook.getWorksheet('Roster');

    if (!sheet) {
      return res.status(400).json({ error: 'Δεν βρέθηκε το sheet "Roster"' });
    }

    const coach = sheet.getCell('B2').value || '';
    const assistant_coach = sheet.getCell('B3').value || '';
    const physiotherapist = sheet.getCell('B4').value || '';
    const team_manager = sheet.getCell('B5').value || '';

    // Insert team
    const teamResult = await pool.query(
      `INSERT INTO teams (name, city, logo_path, photo_path, coach, assistant_coach, physiotherapist, team_manager)
       VALUES ($1,$2,$3,$4,$5,$6,$7,$8) RETURNING id`,
      [team_name, team_city, logo_path, photo_path,
       coach, assistant_coach, physiotherapist, team_manager]
    );
    const teamId = teamResult.rows[0].id;

    // Players start at row 8
    const players = [];
    sheet.eachRow((row, rowNum) => {
      if (rowNum < 8) return;
      const jersey = row.getCell(1).value;
      const firstName = row.getCell(2).value;
      const lastName = row.getCell(3).value;
      const gender = row.getCell(4).value;
      if (jersey && firstName && lastName) {
        players.push({ jersey, firstName, lastName, gender });
      }
    });

    for (const p of players) {
      await pool.query(
        'INSERT INTO players (team_id, jersey_number, first_name, last_name, gender) VALUES ($1,$2,$3,$4,$5)',
        [teamId, p.jersey, p.firstName, p.lastName, p.gender]
      );
    }

    res.json({ success: true, team_id: teamId, players_count: players.length });
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: err.message });
  }
});

module.exports = router;
