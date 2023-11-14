<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            // Get the email and password values
            var email = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Simple email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false; // Prevent form submission
            }

            // Continue with form submission if email is valid
            return true;
        }
    </script>
</head>

<body>
    <div class="container">
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
