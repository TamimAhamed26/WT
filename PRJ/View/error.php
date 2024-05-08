<?php
    session_start();
    
    if (!isset($_GET['err'])) {
        header('location: home.php');
        exit();
    }

    header('refresh:3;url=home.php');
?>

