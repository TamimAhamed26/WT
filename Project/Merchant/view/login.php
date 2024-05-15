<?php
session_start();
$usernamecookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';

?>


<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Log In Page</h2>
        <form action="../controller/loginmarchent.php" aoutocomplete="off" novalidate method="post" >
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="username" >Username</th>
                <td>:</td>
                 <td>
                <input type="text" id="username" name="username" value=<?php $usernamecoockie ?>>
                <?php if(isset($_SESSION['usernameerror'])) {
                          echo $_SESSION['usernameerror'];
                          unset($_SESSION['usernameerror']);}?>
                          <span id="error1" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="password" >Password</th>
                <td>:</td>
                 <td>
                <input type="text" id="password" name="password" >
                <?php if(isset($_SESSION['passworderror'])) {
                          echo $_SESSION['passworderror'];
                          unset($_SESSION['passworderror']);}?>
                          <span id="error2" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Log In"  onclick="return validate()"> <input type="submit" value="Forget Password" formaction="../view/forgetpass.php"></td>
    </table>
    </form>
    <br>
    <footer>powered by @abc bank</footer>
    <script src="loginscript.js"></script>
</body>
</center>
    </html>