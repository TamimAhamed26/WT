<?php



$db = [
    "host"=> "localhost",
    "user"=> "root",
    "passwd"=> "",
    "database"=>"AiubVault"
];


    function getDatabaseConnection() {
    $db = $GLOBALS['db'];
    $conn = mysqli_connect($db['host'], $db['user'], $db['passwd'], $db['database']);
    if (!$conn) {
        die("Failed to connec to to the database!");
    }
    return $conn;
}

