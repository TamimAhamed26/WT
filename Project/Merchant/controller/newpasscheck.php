<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once 'validation.php';
    require_once '../model/querry.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp=test_input($_POST['Pass']);
        $newpass=validatepassword($temp,$temp);
    $username=$_SESSION['usernameFP'];
    if(updatePassword($username,$newpass)==true){
        header("Location:../view/login.php");
        exit();
    }
    else{
        header("Location:../view/newpass.php");
        exit();
    }
}
else{
    header("Location:../view/login.php");
    exit();
}


?>