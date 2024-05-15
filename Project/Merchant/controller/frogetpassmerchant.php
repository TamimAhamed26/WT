<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'validation.php';
require_once '../model/querry.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=test_input($_POST['username']);
    $_SESSION['usernameFP']=$username;
if(empty(getuser($username))){
    $_SESSSION['user_error']="Username is not correct";
    
    header("Location:../view/forgetpass.php");
    exit();
}
else{
    generateAndSavePassword();
    header("Location:../view/otp.php");
    exit();
}
}

else{
    header("Location:../view/login.php");
    exit();
}


?>