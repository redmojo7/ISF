# ISF
Infonet Security Fundamentals
# Lab 6: Create the simplest HTTP server with PHP

### Step 1: Simplest HTML Form

```html
<!-- index.html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div>
        <!-- Simple login form with email and password fields -->
        <form method="post">
            <label for="username">Email:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
```

### Step 2: Add PHP

```html
<!-- index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div>
        <!-- Login form with PHP validation -->
        <form method="post">
            <label for="username">Email:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the user's email from the form
            $email = $_POST["username"];
            $password = $_POST["password"];

            // Basic validation
            if ($email === "admin@isf.com" && $password === "admin") {
                $result = "Login successful!";
                $class = "success";
            } else {
                $result = "Login failed. Please check your credentials.";
                $class = "error";
            }

            // Display the result
            echo "<div id='loginResult' class='$class'>$result</div>";
        }
        ?>
    </div>
</body>

</html>
```

### Step 3: Add JavaScript

```html
<!-- index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script>
        // JavaScript function for client-side validation
        function validateForm() {
            var email = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div>
        <!-- Login form with PHP validation and JavaScript client-side validation -->
        <form method="post" onsubmit="return validateForm()">
            <label for="username">Email:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the user's email from the form
            $email = $_POST["username"];
            $password = $_POST["password"];

            // Basic validation
            if ($email === "admin@example.com" && $password === "admin") {
                $result = "Login successful!";
                $class = "success";
            } else {
                $result = "Login failed. Please check your credentials.";
                $class = "error";
            }

            // Display the result
            echo "<div id='loginResult' class='$class'>$result</div>";
        }
        ?>
    </div>
</body>

</html>
```

### Step 4: Add CSS

```css
/* styles.css */

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

div {
    text-align: center;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 200px;
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
}

button:hover {
    background-color: #45a049;
}

#loginResult {
    margin-top: 16px;
    font-weight: bold;
    color: #333;
}
```

This completes the step-by-step development with comments and explanations for each part of the code.