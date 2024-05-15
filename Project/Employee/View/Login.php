<?php
session_start();

$username_cookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/logIn.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'Menu.html'; ?>

    <center>
    <table>
    <tr><td><br></td><tr>
        <tr>
            <td>Do not have an account? <a href="Registration.php" class="registration-link">Register here!</a></td>
        </tr>
        <tr>
            <td><br></td>
       </tr>
    </table>

    <p>Welcome!</p>
    <table><tr><td><img src="login.png" alt="profile" style="width: 550; height: auto;"> </td><td> 
    <table><tr><td>
        <form method="POST" action="../Controller/user.php" autocomplete="off" style= "background-color: #d2f5f6;" novalidate onsubmit="return validate()">
        
          
        <fieldset>
                <table>
                <legend style="color: #1e2156; font-size: 20px;">Login as Employee</legend><hr>
<tr><td><br></td><tr>
                    <tr>
                        <th><label for="username">👤 Username</label></th>
                        <td><input type="text" id="username" name="username" value="<?= $username_cookie ?>"></td>
                        <span id="error1" style="color: red;"></span>
                    </tr>
                    <tr>
                        <th><label for="password">🔑 Password</label></th>
                        <td><input type="password" id="password" name="password"></td>
                        <span id="error2" style="color: red;"></span>
                    </tr>
                </table>
                <br>
                <input type="submit" name="Login" value="Login" class="login-btn">
                <table>
                
                    
                
                    <tr>
                    <div class="rememberPassword">
                        <td><input type="checkbox" id="rememberPassword" name="rememberPassword">
                            <label for="rememberPassword">Remember me</label></td>
                    </div>

                        <td><a href="forget_password.php" class="forget-password-link">Forgot password?</a></td>
                    </tr>
                </table>
            </fieldset>
</td></tr></table>
<?php if (isset($_SESSION['login_error'])) {
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                } ?>   
        </form>
    </td></tr></table>
</center>

    <?php include 'footer.html'; ?>
    
</body>
</html>