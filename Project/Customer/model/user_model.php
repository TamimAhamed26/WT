<?php

require_once 'database_model.php';

function login($username, $password) {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);
 
    if ($user['username']==$username ) {           //to check case sensivity;can do the same from database
                                         //structure by changing collation to utf8_general_ci for username  column     
        return true;  
    }
    return false;
}

function getUserBalance($username) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "SELECT balance FROM accounts WHERE id = (SELECT id FROM users WHERE username = ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch the balance
    $balanceData = mysqli_fetch_assoc($result);
    
    return $balanceData['balance'];
}

function registerUser($user) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "INSERT INTO users (first_name, last_name, father_name, mother_name, message, postcode, username, password, email, website, phone, gender, blood_group, religion, city, country) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", 
        $user['first_name'], 
        $user['last_name'], 
        $user['father_name'], 
        $user['mother_name'], 
        $user['message'], 
        $user['postcode'], 
        $user['username'], 
        $user['password'], 
        $user['email'], 
        $user['website'], 
        $user['phone'], 
        $user['gender'], 
        $user['blood_group'], 
        $user['religion'], 
        $user['city'], 
        $user['country']);
    
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo "Error: " . $sql_stmt . "<br>" . mysqli_error($conn);
        return false;
    }
}

function updatePassword($username, $newPassword) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "UPDATE users SET password = ? WHERE username = ?";
    
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $username);
    
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return "Error updating password: " . mysqli_error($conn);
    }
}
function getUserEmail($email) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    

    mysqli_stmt_bind_param($stmt, "s", $email);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $emailData = mysqli_fetch_assoc($result);
    
    return $emailData;
}

function getUserEmailExcept($email, $username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM users WHERE email=? AND username!=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($stmt, "ss", $email, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        return true;
    }
    
    return false;
}

function getUser($username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $user = mysqli_fetch_assoc($result);
    
    return $user;
}


function updateUserProfile($username, $user) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "UPDATE users SET 
                first_name = ?,
                last_name = ?,
                email = ?,
                message = ?,
                phone = ?,
                father_name = ?,
                website = ?,
                city = ?,
                gender = ?
                WHERE username = ?";
    
    $stmt = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($stmt, "ssssssssss", 
        $user['first_name'],
        $user['last_name'],
        $user['email'],
        $user['message'],
        $user['phone'],
        $user['father_name'],
        $user['website'],
        $user['city'],
        $user['gender'],
        $username);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
        return false;
    }
}
//////////////////////////



  


?>