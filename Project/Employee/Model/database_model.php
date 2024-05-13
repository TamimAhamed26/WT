<?php

$db = [
    "host"=> "localhost",
    "user"=> "root",
    "passwd"=> "",
    "database"=>"project"
];


    function getDatabaseConnection() {
    $db = $GLOBALS['db'];
    $conn = mysqli_connect($db['host'], $db['user'], $db['passwd'], $db['database']);
    if (!$conn) {
        die("Failed to connec to to the database!");
    }
    return $conn;
}

function loginEmployee($username, $password) {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM employee WHERE username=? AND password=?";
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

function registerEmployee($user) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "INSERT INTO employee(first_name, last_name, gender, phone_number, date_of_birth, email, street_address, city, State, postal_code, username, password) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssss", 
        $user['first_name'], 
        $user['last_name'], 
        $user['gender'], 
        $user['phone_number'], 
        $user['date_of_birth'], 
        $user['email'], 
        $user['street_address'], 
        $user['city'], 
        $user['State'], 
        $user['postal_code'], 
        $user['username'], 
        $user['password']);
    
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo "Error: " . $sql_stmt . "<br>" . mysqli_error($conn);
        return false;
    }
}

function updatePasswordEmployee($username, $newPassword) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "UPDATE employee SET password = ? WHERE username = ?";
    
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $username);
    
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return "Error updating password: " . mysqli_error($conn);
    }
}

function getEmployeeEmail($email) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM employee WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    

    mysqli_stmt_bind_param($stmt, "s", $email);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $emailData = mysqli_fetch_assoc($result);
    
    return $emailData;
}

function getEmployeeEmailExcept($email, $username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM employee WHERE email=? AND username!=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($stmt, "ss", $email, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        return true;
    }
    
    return false;
}

function getEmployee($username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM employee WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $user = mysqli_fetch_assoc($result);
    
    return $user;
}

function updateEmployeeProfile($username, $user) {
    $conn = getDatabaseConnection();

// Prepare the SQL statement for updating employee information
$sql_stmt = "UPDATE employee 
             SET first_name=?, 
                 last_name=?, 
                 gender=?, 
                 phone_number=?, 
                 date_of_birth=?, 
                 email=?, 
                 street_address=?, 
                 city=?, 
                 State=?, 
                 postal_code=?
             WHERE username=?"; 

$stmt = mysqli_prepare($conn, $sql_stmt);

// Bind parameters for the update statement
mysqli_stmt_bind_param($stmt, "sssssssssss", 
    $user['first_name'], 
    $user['last_name'], 
    $user['gender'], 
    $user['phone_number'], 
    $user['date_of_birth'], 
    $user['email'], 
    $user['street_address'], 
    $user['city'], 
    $user['State'], 
    $user['postal_code'],
    $username);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
        return false;
    }

}

function deleteCustomer($id) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "DELETE FROM customer WHERE customer_id = '{$id}'";

    if (mysqli_query($conn, $sql_stmt)) { 
        return true;
    } else {
        echo "Error deleting profile: " . mysqli_error($conn);
        return false;
    }
}

function editCustomer($user) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement with parameter placeholders
    $sql_stmt = "UPDATE customer SET holder_name=?, 
    father_name=?,
     mother_name=?,
      message=?, 
      postcode=?, 
      email=?,
       website=?, 
       phone=?,
        gender=?,
         blood_group=?, 
         religion=?,
          city=?,
           country=? 
           WHERE username = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $user['holder_name'], 
    $user['father_name'], 
    $user['mother_name'], 
    $user['message'], 
    $user['postCode'], 
    $user['email'], 
    $user['website'], 
    $user['phone'],
    $user['gender'],
    $user['blood_group'],
    $user['religion'],
    $user['city'], 
    $user['country'],
    $username);

    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // If execution is successful, return true
        return true;
    } else {
        // If execution fails, return false
        return false;
    }
    
    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function getCustomerEmail($email) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM customer WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    

    mysqli_stmt_bind_param($stmt, "s", $email);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $emailData = mysqli_fetch_assoc($result);
    
    return $emailData;
}

function getCustomerEmailExcept($email, $username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM customer WHERE email=? AND username!=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($stmt, "ss", $email, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        return true;
    }
    
    return false;
}

function getCustomer($username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM customer WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $user = mysqli_fetch_assoc($result);
    
    return $user;
}

function getCustomerById($id) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql = "SELECT * FROM customer WHERE username = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "s", $id);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch user information
    $user = mysqli_fetch_assoc($result);
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $user;
}


function getAllCustomer() {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql = "SELECT * FROM customer";
    
    // Execute the statement
    $result = mysqli_query($conn, $sql);
    
    $users = array();
    
    // Fetch results
    if ($result !== false) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    
    // Close connection
    mysqli_close($conn);
    
    return $users;
}

function addCustomer($customer) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "INSERT INTO customer (holder_name, father_name, mother_name, message, postcode, username, password, email, website, phone, gender, blood_group, religion, city, country, created_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", 
        $customer['holder_name'], 
        $customer['father_name'], 
        $customer['mother_name'], 
        $customer['message'], 
        $customer['postCode'], 
        $customer['username'], 
        $customer['password'], 
        $customer['email'], 
        $customer['website'], 
        $customer['phone'],
        $customer['gender'],
        $customer['blood_group'],
        $customer['religion'],
        $customer['city'], 
        $customer['country'],
        $customer['created_at']
    );
    mysqli_stmt_execute($stmt);


    if(mysqli_stmt_errno($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    } else {
        echo "Customer added successfully!";
    }
    mysqli_stmt_close($stmt);
    
 
    mysqli_close($conn);
}

function getExistingTimeForDate($date) {
    // Get database connection
    $conn = getDatabaseConnection();
    
    // Prepare SQL statement
    $sql_stmt = "SELECT time FROM appointment WHERE date=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $date);
    
    // Execute statement
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch time if exists
    if ($row = mysqli_fetch_assoc($result)) {
        $existingTime = $row['time'];
    } else {
        $existingTime = false; // If no time exists
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // Return existing time or false
    return $existingTime;
}


function addAppointment($customer) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "INSERT INTO appointment (date, time, purpose, name, email, phone) 
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssss", 
        $customer['date'], 
        $customer['time'], 
        $customer['purpose'], 
        $customer['name'], 
        $customer['email'], 
        $customer['phone']
    );
    mysqli_stmt_execute($stmt);


    if(mysqli_stmt_errno($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    } else {
        echo "Appointment added successfully!";
    }
    mysqli_stmt_close($stmt);
    
 
    mysqli_close($conn);
}

?>

