<?php

$db = [
    "host"=> "localhost",
    "user"=> "root",
    "passwd"=> "",
    "database"=>"banking"
];

function getDatabaseConnection() {
    $db = $GLOBALS['db'];
    $conn = mysqli_connect($db['host'], $db['user'], $db['passwd'], $db['database']);
    if (!$conn) {
        die("Failed to connec to to the database!");
    }
    return $conn;
}  

    // Retrieve all admin data
    function getallmarchent($conn) {
        $sqlstr = "SELECT * FROM marchentinfo";
        return $conn->query($sqlstr);
    }

?>