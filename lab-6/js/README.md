# ISF
Infonet Security Fundamentals
# Lab 6: Create the simplest HTTP server with JavaScript

### Preparation: Check if Node.js is Installed

Open your terminal and run the following commands to check if Node.js is installed:

```bash
node -v
npm -v
```

If you see version numbers for both Node.js and npm, you can proceed with the project setup. If not, you need to install Node.js. Visit [Node.js official website](https://nodejs.org/) to download and install the latest version.

### Step 1: Create a Project Directory

Open your terminal and create a new directory for your project:

```bash
mkdir lab-6
cd lab-6
```

### Step 2: Initialize a Node.js Project

Run the following command to initialize a new Node.js project:

```bash
npm init -y
npm install express
```

This command creates a `package.json` file with default values.

### Step 3: Create the Server File (app.js)

Create a new file named `app.js`:

```bash
touch app.js
```

Edit `app.js` using a text editor (like VSCode, Sublime Text, or Atom) with the following content:

```javascript
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
```

This script creates a simple HTTP server using Node.js. It reads files from the "public" directory based on the requested URL and serves them with the appropriate content type.

### Step 4: Create a "public" Directory with HTML and CSS Files

Create a "public" directory and add `index.html` and `styles.css` files:

```bash
mkdir public
touch public/index.html
touch public/styles.css
```

Edit `public/index.html` and `public/styles.css` with your desired HTML and CSS content:

**index.html:**
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link the external CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="button" onclick="submitForm()">Login</button>
        </form>

        <div id="loginResult" class="success"></div>
    </div>

    <script>
        function submitForm() {
            // Get the form data
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            // Send the form data to the server
            fetch("login", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ username, password }),
            })
                .then(response => response.text())
                .then(result => {
                    // Display the result with appropriate class
                    const loginResultElement = document.getElementById("loginResult");
                    loginResultElement.innerHTML = result.includes("successful") ? "Login Successful" : "Login Failed";
                    loginResultElement.className = result.includes("successful") ? "success" : "error";
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        }
    </script>
</body>

</html>
```

**styles.css:**
```css
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    width: 400px !important;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%; /* Remove max-width */
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

#loginResult {
    margin-top: 16px;
    font-weight: bold;
    text-align: center;
}

.success {
    color: #4caf50;
}

.error {
    color: #f44336;
}
```

### Step 5: Start the Server

Back in the terminal, run the following command to start the server:

```bash
node app.js
```

This will start the server, and you should see the message "Server is running at http://localhost:3000". Open your web browser and navigate to `http://localhost:3000` to view your simple web application.

That's it! You've created a basic HTTP server with Node.js. Feel free to customize the HTML and CSS in the "public" directory and modify the server script as needed for your project.