
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$username = $password = $confirmPassword = $firstName = $lastName = $gender = $phoneNumber = $dateOfBirth =$email = $streetAddress = $city = $state = $postalCode = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validatePassword($password, $confirm_password) {

    if (empty($password)) {
        $_SESSION['password_error'] = "Password is a required field!";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/", $password)) {
        $_SESSION['password_error'] = "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character";
    } elseif ($password !== $confirm_password) {
        $_SESSION['password_error'] = "Confirm password does not match with password!";
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

function validateDOB($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $dob = test_input($_POST[$fieldName]);
        $currentDate = date("Y-m-d");
        $minAge = date("Y-m-d", strtotime("-18 years"));
        
        if (!preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $dob)) {
            $_SESSION[$fieldName . '_error'] = "Invalid DOB format";
        } elseif ($dob > $currentDate) {
            $_SESSION[$fieldName . '_error'] = "DOB cannot be in the future";
        } elseif ($dob > $minAge) {
            $_SESSION[$fieldName . '_error'] = "Minimum age requirement is 18 years";
        } else {
            return $dob;
        }
    }
}

function validateDate($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $date = test_input($_POST[$fieldName]);
        $currentDate = date("Y-m-d");
        
        if (!preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date)) {
            $_SESSION[$fieldName . '_error'] = "Invalid Date format";
        } elseif ($date <= $currentDate) {
            $_SESSION[$fieldName . '_error'] = "Date cannot be today or in the past";
        } else {
            return $date;
        }
    }
}

function validateTime($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $time = test_input($_POST[$fieldName]);
        $date = test_input($_POST['date']); 
        
        // Check if the provided time is within the valid range (10 AM to 10 PM)
        if (!isValidTimeRange($time)) {
            $_SESSION[$fieldName . '_error'] = "Time must be between 10 AM and 10 PM";
        } else {
            // Check if the provided time is already associated with the given date
            $existingTime = getExistingTimeForDate($date); 
            
            if ($existingTime && ($existingTime === $time || isWithin30Minutes($existingTime, $time))) {
                $_SESSION[$fieldName . '_error'] = "Time cannot be the same or within 30 minutes of an existing time on the same day";
            } else {
                return $time;
            }
        }
    }
}

function isValidTimeRange($time) {
    $hour = date('H', strtotime($time));
    return ($hour >= 10 && $hour <= 22); // Valid between 10 AM and 10 PM (inclusive)
}

function isWithin30Minutes($existingTime, $newTime) {
    $existingTimestamp = strtotime($existingTime);
    $newTimestamp = strtotime($newTime);
    
    $difference = abs($existingTimestamp - $newTimestamp);
    $differenceInMinutes = $difference / 60;
    
    return $differenceInMinutes <= 30;
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

function validateWebsite($fieldName, $errorMessage) {
    if (empty($_POST[$fieldName])) {
        $_SESSION[$fieldName . '_error'] = $errorMessage;
    } else {
        $website = test_input($_POST[$fieldName]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.com|\.net|\.gov|\.edu)/i", $website)) {
            $_SESSION[$fieldName . '_error'] = "Invalid URL";
        } else {
            return $website;
        }
    }
}

?>
