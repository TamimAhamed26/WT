<?php

require_once '../model/db.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function validatePassword($password, $confirmpassword) {

        
        if (empty($password)) {
            $_SESSION['passworderror'] = "Password is a required field";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/", $password)) {
            $_SESSION['passworderror'] = "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character";
        } elseif ($password !== $confirmpassword) {
            $_SESSION['passworderror'] = "Confirm password does not match";
        }
        return $password;
    }

    function validateEmail($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } else {
            $email = test_input($_POST[$fieldName]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION[$fieldName . 'error'] = "Invalid email format";
            } else {
                return $email;
            }
        }
    }

    function validatePhone($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } else {
            $phone = test_input($_POST[$fieldName]);
            if (!preg_match("/^(\+880)(\d){10}$/", $phone)) {
                $_SESSION[$fieldName . 'error'] = "Invalid phone number format";
            } else {
                return $phone;
            }
        }
    }


    function validateField($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } else {
            $field = test_input($_POST[$fieldName]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $field)) {
                $_SESSION[$fieldName . 'error'] = "Only letters and white space allowed for " . $fieldName;
            } else {
                return $field;
            }
        }
    }
    
    function validatedropbox($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } else {
            $field = test_input($_POST[$fieldName]);
            if ($field == "none") {
                $_SESSION[$fieldName . 'error'] = $errorMessage;
            } else {
                return $field;
            }
        }
    }

    function validateAddressField($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } else {
            $field = test_input($_POST[$fieldName]);
            if (!preg_match("/^[a-zA-Z0-9\s,\-\/\.'#]*$/", $field)) {
                $_SESSION[$fieldName . 'error'] = "invalid format " . $fieldName;
            } else {
                return $field;
            }
        }
    }

    function validateNIDNumber($fieldname, $errorMessage) {
        if (empty($_POST[$fieldname])) {
            $_SESSION[$fieldname . 'error'] = $errorMessage;
        } else {
            $field = test_input($_POST[$fieldname]);
            if (!preg_match("/^[0-9]+$/", $field)) {
                $_SESSION[$fieldname . 'error'] = "Only numbers are allowed ";
            } else {
                return $field;
            }
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
    
    function validateusername($fieldName, $errorMessage) {
        if (empty($_POST[$fieldName])) {
            $_SESSION[$fieldName . 'error'] = $errorMessage;
        } 
        else {
            $field = test_input($_POST[$fieldName]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $field)) {
                $_SESSION[$fieldName . 'error'] = "Only letters and white space allowed for " . $fieldName;
            } 
            else if(checkusername($field)==true){
                    $_SESSION[$fieldName . 'error'] = "Username is already taken "; 
                }
                else{
                    return $field;
                }
            
         }
    }
    

?>