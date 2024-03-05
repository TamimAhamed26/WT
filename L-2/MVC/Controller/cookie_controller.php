<?php
if (isset($_POST['save_draft'])) {
    foreach ($_POST as $key => $value) {
        setcookie($key, test_input($value), time() + (86400 * 30), "/");
    }
 //to local time
    date_default_timezone_set('Asia/Dhaka');
    setcookie('last_modified', date("Y-m-d H:i:s"), time() + (86400 * 30), "/");
   
    header("Location: ../Views/l-2.php");
    exit();
}
?>