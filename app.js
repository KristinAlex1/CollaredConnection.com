const express = require('express');
const path = require('path');
const app = express();
const PORT = 3000;

// Serve static files from public directory
app.use(express.static('public'));

// Serve your HTML file
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'index.html'));
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
