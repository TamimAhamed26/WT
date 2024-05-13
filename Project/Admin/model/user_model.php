<?php

require_once 'database_model.php';

function login($username, $password, $userType)
{
    $conn = getDatabaseConnection();
    $tableName = ($userType === 'user') ? 'users' : 'employee';

    if ($userType === 'employee') {
        $query = "SELECT Status FROM $tableName WHERE username=?";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $employee = mysqli_fetch_assoc($result);

        if ($employee && $employee['Status'] !== 'Active') {
            return false;
        }
    }

    $query = "SELECT * FROM $tableName WHERE username=? AND password=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        return true;
    }

    return false;
}
function getEmployeeStatus($username)
{
    $conn = getDatabaseConnection();
    
    $query = "SELECT Status FROM employee WHERE username=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $employee = mysqli_fetch_assoc($result);

    if ($employee) {
        return $employee['Status'];
    } else {
        return null; 
    }
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
function UserCount() {
    $conn = getDatabaseConnection();
    $sql = "SELECT COUNT(*) as userCount FROM users"; 
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt); 
    mysqli_stmt_bind_result($stmt, $userCount); 
    mysqli_stmt_fetch($stmt); 
    return $userCount;
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


function deleteUser($username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "DELETE FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    if (mysqli_stmt_execute($stmt)) { 
        return true;
    } else {
        echo "Error deleting profile: " . mysqli_error($conn);
        return false;
    }
}

function addEmployee($emp) {
    $conn = getDatabaseConnection();
    
    // Prepare the SQL statement
    $sql_stmt = "INSERT INTO employee (username, password, first_name, last_name, gender, phone_number, date_of_birth, email, street_address, city, State, postal_code) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssss", 
    $emp['username'], 
    $emp['password'], 
    $emp['first_name'], 
    $emp['last_name'], 
    $emp['gender'], 
    $emp['phone_number'], 
    $emp['date_of_birth'], 
    $emp['email'], 
    $emp['street_address'], 
    $emp['city'], 
    $emp['State'],
    $emp['postal_code']
);

    if (mysqli_stmt_execute($stmt)) {
        echo "Employee added successfully";
    } else {
        echo "Error: " . $sql_stmt . "<br>" . mysqli_error($conn);
    }
}
function empCount() {
    $conn = getDatabaseConnection();
    $sql = "SELECT COUNT(*) as employeeCount FROM employee"; 
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt); 
    mysqli_stmt_bind_result($stmt, $employeeCount); 
    mysqli_stmt_fetch($stmt); 
    return $employeeCount;
}


function getEmpEmailExcept($email, $username) {
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



function getEmp($username) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM employee WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $user = mysqli_fetch_assoc($result);
    
    return $user;
}

function getEmpEmail($email) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM employee WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql_stmt);
    

    mysqli_stmt_bind_param($stmt, "s", $email);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $emailData = mysqli_fetch_assoc($result);
    
    return $emailData;
}


function getEmpById($id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM employee WHERE emp_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $user = null;
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
           
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
    return $user;
}


function deleteEmployee($id) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM employee WHERE emp_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    if (mysqli_stmt_execute($stmt)) {
        return "Employee deleted successfully";
    } else {
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function updateEmp($user, $id) {
    $conn = getDatabaseConnection();
    $sql_stmt = "UPDATE employee SET 
                    username = ?,
                    email = ?,
                    password = ?,
                    first_name = ?,
                    last_name = ?,
                    gender = ?,
                    phone_number = ?,
                    date_of_birth = ?,
                    street_address = ?,
                    city = ?,
                    State = ?,
                    postal_code = ?
                WHERE emp_id = ?";
                
    $stmt = mysqli_prepare($conn, $sql_stmt);

    mysqli_stmt_bind_param($stmt, "sssssssssssss",
        $user['username'],
        $user['email'],
        $user['password'],
        $user['first_name'],
        $user['last_name'],
        $user['gender'],
        $user['phone_number'],
        $user['date_of_birth'],
        $user['street_address'],
        $user['city'],
        $user['State'],
        $user['postal_code'],
        $id
    );
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return true;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
    
    mysqli_close($conn); 
}

function getAllEmployees() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM employee";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $employees = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
    }
    return $employees;
}

function TransactionCount() {
    $conn = getDatabaseConnection();
    $sql = "SELECT COUNT(*) as transactionCount FROM transactions"; 
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt); 
    mysqli_stmt_bind_result($stmt, $transactionCount); 
    mysqli_stmt_fetch($stmt); 
    return $transactionCount;
}


function getAllTransactions() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM transactions";
    $result = mysqli_query($conn, $sql);
    $transactions = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $transactions[] = $row;
        }
    }
    mysqli_close($conn);
    return $transactions;
}

function getTransactionById($transaction_id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM transactions WHERE transc_id = $transaction_id";
    $result = mysqli_query($conn, $sql);
    $transaction = null;
    if ($result && mysqli_num_rows($result) > 0) {
        $transaction = mysqli_fetch_assoc($result);
    }
    mysqli_close($conn);
    return $transaction;
}


function updateTransactionStatus($transaction_id, $status) {
    $conn = getDatabaseConnection();
    
    $query = "UPDATE transactions SET status=? WHERE transc_id=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $status, $transaction_id);
    
    if(mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement);
        mysqli_close($conn);
        return true; // Update successful
    } else {
        mysqli_stmt_close($statement);
        mysqli_close($conn);
        return false; // Update failed
    }
}



function updateEmployeeStatus($employeeId, $newStatus) {
    $conn = getDatabaseConnection();
    
    $query = "UPDATE employee SET Status=? WHERE emp_id=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $newStatus, $employeeId);
    
    if(mysqli_stmt_execute($statement)) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}
function generateReport($report_type) {
    $conn = getDatabaseConnection();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "";
    $table_html = '';

    // Prepare SQL statement based on the selected report type
    switch ($report_type) {
        case "User Activities":
            $sql = "SELECT * FROM customer_log";
            break;
        case "Account Balances":
            $sql = "SELECT * FROM account_balances";
            break;
        case "Transaction Summaries":
            $sql = "SELECT * FROM transactions";
            break;
        default:
            $sql = ""; 
    }
    if (!empty($sql)) {
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $table_html .= "<table>";
            $table_html .= "<tr>";
            foreach ($result->fetch_fields() as $field) {
                $table_html .= "<th>" . $field->name . "</th>";
            }
            $table_html .= "</tr>";

            while ($row = $result->fetch_assoc()) {
                $table_html .= "<tr>";
                foreach ($row as $value) {
                    $table_html .= "<td>" . $value . "</td>";
                }
                $table_html .= "</tr>";
            }
            $table_html .= "</table>";
        } else {
            $table_html = "No data found.";
        }
    }

  
    $conn->close();

    return $table_html;
}


/*
function getAllUsers() {
    $conn = getDatabaseConnection();
    $sql_stmt = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql_stmt);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}

function registerUser($user) {
    $conn = getDatabaseConnection();
    $sql_stmt = "INSERT INTO users (name, email, headline, username, password, org, role, gender, dob) 
                 VALUES ('{$user['name']}', '{$user['email']}', '{$user['headline']}', '{$user['username']}', 
                         '{$user['password']}', '{$user['org']}', '{$user['role']}', '{$user['gender']}', '{$user['dob']}')";
    if (mysqli_query($conn, $sql_stmt)) {
        return true;
    } else {
        echo "Error: " . $sql_stmt . "<br>" . mysqli_error($conn);
        return false;
    }
}


function deleteUser($username) {
    $conn = getDatabaseConnection();
    $sql_stmt = "DELETE FROM users WHERE username = '{$username}'";
    if (mysqli_query($conn, $sql_stmt)) {
        return true;
    }
    return false;
}


*/
?>