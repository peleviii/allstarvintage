const { Pool } = require('pg');

const pool = new Pool({
  host: process.env.DB_HOST || 'db',
  port: process.env.DB_PORT || 5432,
  database: process.env.DB_NAME || 'allstarvintage',
  user: process.env.DB_USER || 'avuser',
  password: process.env.DB_PASS || 'avpass2026',
});

module.exports = pool;
