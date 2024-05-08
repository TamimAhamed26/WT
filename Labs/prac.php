<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
    // Initialize variables
    $username = "";
    $password = "";
    $error = "";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate username and password (for demonstration purposes, no actual validation is done here)
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if username and password match (for demonstration purposes, assume username is "user" and password is "password")
        if ($username === "user" && $password === "password") {
            // Redirect to profile page
            header("Location: profile.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <input type="submit" value="Login">
    </form>

    <?php
    // Display error message if any
    if (!empty($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <p>Don't have an account? <a href="registration.php">Sign up here</a></p>
    <p>Forgot your password? <a href="forgot_password.php">Reset it here</a></p>
</body>
</html>
