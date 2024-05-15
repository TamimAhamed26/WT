<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'validation.php';
    require_once '../model/querry.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $otp=test_input($_POST['otp']);
    
    $v1=file_get_contents('password.txt');

    if($otp==$v1){
        header("Location:../view/newpass.php");
        exit();
    }
    else{
        header("Location:../view/otp.php");
        exit();
    }
}
else{
    header("Location:../view/login.php");
        exit();
}

?>