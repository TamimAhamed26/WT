<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

$userinfo=$_SESSION['userInfo'];

$serial = $_POST['update'];

$_SESSION['SIngle_inventory'] = getsingleinventory($serial);

header("Location: ../view/upinventory.php");
    exit();


?>