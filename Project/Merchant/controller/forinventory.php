<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

$userinfo=$_SESSION['userInfo'];

$id = $userinfo['Serial'];

if (!empty($id)) {
    unset($_SESSION['inventories']);
    $_SESSION['inventories']=getinventory($id);
    
    header("Location: ../view/inventory.php");
    exit();
    
}
 




?>