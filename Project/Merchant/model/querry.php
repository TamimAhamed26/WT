<?php
require_once 'db.php';

function login($username, $password) {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM marchentinfo WHERE username=? AND password=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);
 
    if ($user['Username']==$username ) {
        return true;
    }
    return false;
}
    


function checkusername($username) {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM marchentinfo WHERE username=?";
    $statement = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $count = mysqli_num_rows($result);
    mysqli_stmt_close($statement);

    if ($count >= 1) {
        return true;
    } else {
        return false;
    }
}



function addmarchent($firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email, $username, $password) {
    $conn = getDatabaseConnection();

    $query = "INSERT INTO marchentinfo (firstname, lastname, nid, presentaddress, permanentaddress, phonenumber, email, username, password) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($conn, $query);
 
    mysqli_stmt_bind_param($statement, "sssssssss", $firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email, $username, $password);
  
    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement); 
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}

function addnewpayment($id, $name, $product, $price, $customernmbr, $method, $billingaddress) {
    $conn = getDatabaseConnection();

    $query = "INSERT INTO payment (Merchant_id, Merchant_name, Product_Name, Price, Customernmbr, PayMethod, BillingAddress) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($conn, $query);
 
    mysqli_stmt_bind_param($statement, "sssssss", $id, $name, $product, $price, $customernmbr, $method, $billingaddress);
  
    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement); 
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}


function addloan($mID, $mName, $loantype, $reasson, $amounnt) {
    $conn = getDatabaseConnection();

    $query = "INSERT INTO loaninfo (Merchant_id, Merchant_name, LoanType, Reason, Amount) 
              VALUES (?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($conn, $query);
 
    mysqli_stmt_bind_param($statement, "sssss", $mID, $mName, $loantype, $reasson, $amounnt);
  
    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement); 
        return true;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        return false;
    }
}


function getUser($username) {
    $conn = getDatabaseConnection();
 
    $sql_stmt = "SELECT * FROM marchentinfo WHERE username=?";

    $statement = mysqli_prepare($conn, $sql_stmt);

    mysqli_stmt_bind_param($statement, "s", $username);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($statement);
    
    return $user;
}


function updatePassword($username, $newPassword) {
    $conn = getDatabaseConnection();
    $sql_stmt = "UPDATE marchentinfo SET password = ? WHERE username = ?";
    $statement = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($statement, "ss", $newPassword, $username);
    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement); 
        return true;
    } else {
        return "Error updating password: " . mysqli_error($conn);
    }
}


function updateUser($username, $firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email) {
    $conn = getDatabaseConnection();
    $sql_stmt = "UPDATE marchentinfo SET FirstName = ?, LastName = ?, NID = ?, PresentAddress = ?, PermanentAddress = ?, PhoneNumber = ?, Email = ? WHERE username = ?";
    $statement = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($statement, "ssssssss", $firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email, $username);

    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement);
        return true;
    } else {
        return "Error updating information: " . mysqli_error($conn);
    }
}


function getfeedbacks($id) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM feedback WHERE Merchant_id=?";
    
    $statement = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($statement, "s", $id);
    
    $feedbacks = array();
    
    if ($statement !== false) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        while ($row = mysqli_fetch_assoc($result)) {
            $feedbacks[] = $row;
        }
    }

    return $feedbacks;
}

function getinventory($id) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM inventory WHERE Merchant_id=?";
    
    $statement = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($statement, "s", $id);
    
    $feedbacks = array();
    
    if ($statement !== false) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        while ($row = mysqli_fetch_assoc($result)) {
            $feedbacks[] = $row;
        }
    }

    return $feedbacks;
}

function getsingleinventory($id) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM inventory WHERE Serial=?";
    
    $statement = mysqli_prepare($conn, $sql_stmt);

    mysqli_stmt_bind_param($statement, "s", $id);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($statement);
    
    return $user;
}

function getsingleinventoryforpay($productname) {
    $conn = getDatabaseConnection();
    
    $sql_stmt = "SELECT * FROM inventory WHERE Product_Name=?";
    
    $statement = mysqli_prepare($conn, $sql_stmt);

    mysqli_stmt_bind_param($statement, "s", $productname);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($statement);
    
    return $user;
}

function updateinventory($productInventory, $sold, $serial) {
    $conn = getDatabaseConnection();
    $sql_stmt = "UPDATE inventory SET Product_inventory = ?, Sold_product = ? WHERE Serial  = ?";
    $statement = mysqli_prepare($conn, $sql_stmt);
    mysqli_stmt_bind_param($statement, "sss", $productInventory, $sold, $serial);

    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_close($statement);
        return true;
    } else {
        return "Error updating information: " . mysqli_error($conn);
    }
}



?>