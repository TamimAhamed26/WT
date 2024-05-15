<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once 'validation.php';
    require_once '../model/querry.php';

    $userinfo=$_SESSION['userInfo'];
    $UserName=$userinfo['Username'];
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=test_input($_POST['username']);
        $password = validatePassword($_POST['password'], $_POST['confirmpassword']); 

     if($username==$UserName){
        if(empty($_SESSION['passworderror'])){
            if(updatePassword($UserName,$password)==true){
                header("Location:../view/login.php");
                exit();
                }
        
            else{
                header("Location:../view/passchange.php");
                exit();
            }
        }
        else{
            header("Location:../view/passchange.php");
                exit();
        }
    }
    else{
            $_SESSION['userError']="Username is not correct";
            header("Location:../view/passchange.php");
                exit();
        }
}
else{
    header("Location:../view/login.php");
    exit();
}


?>