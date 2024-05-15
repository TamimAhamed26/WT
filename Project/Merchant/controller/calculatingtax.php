<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = validateNIDNumber("income", "Total Income can not be empty");
    $month = validateNIDNumber("month", "Total Month is empty");
         
    if (empty($_SESSION['incomeerror']) && empty($_SESSION['montherror']) ) {
        $_SESSION['tax'] = (0.05 * $income);
        $_SESSION['income'] = $income;
        $_SESSION['month'] = $month;
        header("Location: ../view/taxcalculate.php");
        exit();
    } 
    else {
      
        header("Location: ../view/taxcalculate.php");
        exit();
    }
}
else{
    header("Location: ../view/profile.php");
        exit();
}






?>