<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}
?>


<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Change Password Page</h2>
        <form action="../controller/chngpass.php" aoutocomplete="off" novalidate method="post">
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="username" >Username</th>
                <td>:</td>
                 <td>
                <input type="text" id="username" name="username" >
                <?php if(isset($_SESSION['userError'])) {
                          echo $_SESSION['userError'];
                          unset($_SESSION['userError']);}?>
                          <span id="error1" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="password" >Password</th>
                <td>:</td>
                 <td>
                <input type="text" id="password" name="password" >
                <span id="error2" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="confirmpassword" >Confirm Password</th>
                <td>:</td>
                 <td>
                <input type="text" id="confirmpassword" name="confirmpassword" >
                <?php if(isset($_SESSION['passworderror'])) {
                          echo $_SESSION['passworderror'];
                          unset($_SESSION['passworderror']);}?>
                          <span id="error3" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Change" onclick="return validate()">
    </table>
    </form>
    <br>
    <footer>powered by @abc bank</footer>
    <script src="passchangescript.js"></script>
</body>
</center>
    </html>