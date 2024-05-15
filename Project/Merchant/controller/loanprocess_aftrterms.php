<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['userInfo'])) {
    header("Location: ../view/login.php");
    exit();
}

$userinfo = $_SESSION['userInfo'];

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["check"])) {
        $loantype = "";
        $reason = "";
        $amount = ""; 
        $mID = $userinfo['Serial'];
        $mName = $userinfo['FirstName'];

        if (isset($_SESSION['loantype'])) {
            $loantype = $_SESSION['loantype'];
            unset($_SESSION['loantype']);
        }

        if (isset($_SESSION['reason'])) {
            $reason = $_SESSION['reason'];
            unset($_SESSION['reason']);
        }

        if (isset($_SESSION['amount'])) {
            $amount = $_SESSION['amount'];
            unset($_SESSION['amount']);
        }

        if (addloan($mID, $mName, $loantype, $reason, $amount)) {
            header("Location: ../view/profile.php");
            exit();
        }

    } 
    else {
        $_SESSION['checkboxerror'] = "Please read all the conditions and mark that you have checked it.";
        header("Location: ../view/term&condition.php");
        exit();
    }
}
else {
    header("Location: ../view/login.php");
    exit();
}
?>
