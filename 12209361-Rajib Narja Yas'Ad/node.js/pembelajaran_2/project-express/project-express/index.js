const express = require('express');
const app = express();

const PORT = 7000;

app.get('/', (req, res) => res.send("Welcome"))
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`));