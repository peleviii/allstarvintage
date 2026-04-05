const express = require('express');
const cors = require('cors');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());
app.use('/uploads', express.static(process.env.UPLOAD_DIR || '/uploads'));

// Routes
const teamsRouter = require('./routes/teams');
const registrationRouter = require('./routes/registration');

app.use('/teams', teamsRouter);
app.use('/registration', registrationRouter);

// Health check
app.get('/health', (req, res) => res.json({ status: 'ok' }));

app.listen(PORT, () => {
  console.log(`API running on port ${PORT}`);
});
