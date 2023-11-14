<!-- index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        // JavaScript function for client-side validation
        function validateForm() {
            var email = document.getElementById("email").value;
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
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the user's email from the form
            $email = $_POST["email"];
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