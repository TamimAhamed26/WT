<?php
session_start();
$username_cookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }

        header table {
            margin: 0 auto;
        }

        header a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        
        main {
            padding-top: 130px; 
            padding-bottom: 40px; 
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            font-weight: bold;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 15px;
        }

        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
         
            padding: 10px 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        .login-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 5px;
        }

    
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tr>
                <td><a href="Home.php">Home</a></td>
                <td><a href="AboutUs.php">About</a></td>
                <td><a href="ContactUs.php">Contact us</a></td>
            </tr>
        </table>
    </header>

    <main>
        <div class="login-container">
            <h2>Login</h2>
   <form method="POST" action="../controller/auth.php" novalidate autocomplete="off" onsubmit="return validate()">
            <div>
                 <label for="username">Username</label>
                 <input type="text" id="username" name="username" value="<?= $username_cookie ?>">
                 <span id="error1" style="color: red;"></span>
            </div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="error2" style="color: red;"></span>
     <div class="remember-me">
                 <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
    </div>
                <input type="submit" name="submit" value="Login">
                <a href="forgetpass.php">Forgot Password?</a>
                <a href="signup.php">New user? Sign Up</a>

                <?php if (isset($_SESSION['login_error'])) {
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                } ?>        
</form>
    </div>
    </main>
     

    <footer>
        <?php include 'footer.html'; ?>
    </footer>

   <script src="../JS/logIN.js"></script>

  
</body>
</html>