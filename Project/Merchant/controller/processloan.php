<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loantype = validatedropbox("loantype", "Loan type can not be None");
    $reason = validateField("reason", "Reason is empty");
    $amount=validateNIDNumber("amount", "Total amount is empty"); 
    
    if (empty($_SESSION['loantypeerror']) && empty($_SESSION['reasonerror']) && empty($_SESSION['amounterror']) ) {
        $_SESSION['loantype'] = $loantype;
        $_SESSION['reason'] = $reason;
        $_SESSION['amount'] = $amount;
        header("Location: ../view/term&condition.php");
        exit();
    } 
    else {
      
        header("Location: ../view/loanprocess.php");
        exit();
    }
}
else{
    header("Location: ../view/login.php");
        exit();
}
?>