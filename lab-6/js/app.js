const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Set up body parser to handle JSON data
app.use(bodyParser.json());

// Serve static files from the "public" directory
app.use(express.static('public'));

// Set up a route for the initial HTML page
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/public/index.html');
});

// Handle login requests
app.post('/login', (req, res) => {
    const { username, password } = req.body;
    console.log(`Login attempt: ${username} / ${password}`);
    // Basic validation (you may want to implement more secure validation)
    if (username === "admin" && password === "admin") {
        res.json({ message: 'Login successful!' });
    } else {
        res.status(401).json({ message: 'Login failed. Please check your credentials.' });
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server listening at http://localhost:${port}`);
});
