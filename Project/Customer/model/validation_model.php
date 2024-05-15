
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$user_name = $password = $confirm_password  = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validatePassword($password, $confirm_password) {

    if (empty($password)) {
        $_SESSION['password_error'] = "Password is a required field";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/", $password)) {
        $_SESSION['password_error'] = "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character";
    } elseif ($password !== $confirm_password) {
        $_SESSION['password_error'] = "Confirm password does not match";
    }
    return $password;
}

function validateField($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $field = test_input($_POST[$fieldName]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $field)) {
            $_SESSION[$fieldName . '_error'] = "Only letters and white space allowed for " . $fieldName;
        } else {
            return $field;
        }
    }
}
function validateAddressField($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $field = test_input($_POST[$fieldName]);
        if (!preg_match("/^[a-zA-Z0-9\s,\-\/\.'#]*$/", $field)) {
            $_SESSION[$fieldName . '_error'] = "invalid format " . $fieldName;
        } else {
            return $field;
        }
    }
}

function validatePostField($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $field = test_input($_POST[$fieldName]);
        if (!preg_match("/^[0-9]*$/", $field)) {
            $_SESSION[$fieldName . '_error'] = "Only Numbers are allowed for " . $fieldName;
        } else {
            return $field;
        }
    }
}

function validateEmail($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $email = test_input($_POST[$fieldName]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION[$fieldName . '_error'] = "Invalid email format";
        } else {
            return $email;
        }
    }
}

function validateWebsite($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $website = test_input($_POST[$fieldName]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $_SESSION[$fieldName . '_error'] = "Invalid URL";
        } else {
            return $website;
        }
    }
}

function validateRadioButton($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $field = test_input($_POST[$fieldName]);
        return $field; 
    }
}

function validatePhone($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $phone = test_input($_POST[$fieldName]);
        if (!preg_match("/^(\+880)(\d){10}$/", $phone)) {
            $_SESSION[$fieldName . '_error'] = "Invalid phone number format";
        } else {
            return $phone;
        }
    }
}

function validateSelect($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $field = test_input($_POST[$fieldName]);
        return $field; 
    }
}
function generateAndSavePassword() {
    $digits = 4;
    $numbers = "1234567890";
    $numbers = str_shuffle($numbers);
    $random_password = substr($numbers, 0, $digits);
    
    $file = 'password.txt';
    file_put_contents($file, $random_password);
    
    echo "Password saved to $file";
}
function validateNID($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $nid = test_input($_POST[$fieldName]);
        if (!preg_match("/^[0-9]{8}$/", $nid)) {
            $_SESSION[$fieldName . '_error'] = "Invalid NID format";
        } else {
            return $nid;
        }
    }
}
?>
