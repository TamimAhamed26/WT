<?php
session_start(); 

$user_name = $password = $confirm_password  = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validatePassword($password, $confirm_password) {
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm-password"]);
    
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





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = validatePassword($password, $confirm_password);
    $email = validateEmail("email", "Email is a required field");
    $website = validateWebsite("website", "Website is a required field");
    $first_name = validateField("first-name", "First name is empty");
    $last_name = validateField("last-name", "Last name is empty");
    $father_name = validateField("father-name", "Father name is empty");
    $mother_name = validateField("mother-name", "Mother name is empty");
    $user_name = validateField("user-name", "User name is empty");
    $postcode = validatePostField("postcode", "Postcode is empty");
    $phone = validatePhone("phone", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty"); 
    $address = validateAddressField("message","Address is empty");
    $blood_group = validateSelect("blood-group", "Please select a blood group");
    $religion = validateSelect("religion", "Please select a religion");
    $country = validateSelect("country", "Please select a country");
    $city= validateSelect("city", "Please select a city");
setcookie("first-name", $first_name, time() + (86400 * 30), "/");
setcookie("last-name", $last_name, time() + (86400 * 30), "/");
setcookie("email", $email, time() + (86400 * 30), "/");
setcookie("phone", $phone, time() + (86400 * 30), "/");
setcookie("website", $website, time() + (86400 * 30), "/");
setcookie("message", $address, time() + (86400 * 30), "/");
setcookie("postcode", $postcode, time() + (86400 * 30), "/");
setcookie("user-name", $user_name, time() + (86400 * 30), "/");
setcookie("gender", $gender, time() + (86400 * 30), "/");
setcookie("father-name", $father_name, time() + (86400 * 30), "/");
setcookie("mother-name", $mother_name, time() + (86400 * 30), "/");
setcookie("blood-group", $blood_group, time() + (86400 * 30), "/");
setcookie("religion", $religion, time() + (86400 * 30), "/");
setcookie("country", $country, time() + (86400 * 30), "/");
setcookie("city", $city, time() + (86400 * 30), "/");


}
if (!empty($_SESSION)) {
  
    header("Location: l-2.php");
    exit(); 
}
echo '<table>
<tr>
    <td>
      
        <fieldset>

            <table>
                <legend>General Information:</legend>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <th><label for="first-name">First Name</label></th>
                    <td>:</td>
                    <td>
                        <input type="text" id="first-name" readonly value="' . $first_name . '" >
                    </td>
                </tr>
                 <tr>
                     <td><br></td>
                </tr>
                <tr>
                    <th><label for="last-name"> Last Name</label></th>
                            <td>:</td>
                            <td><input type="text" id="last-name"  readonly value="' . $last_name . '" ></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>:</td>
                    <td>
                        <input type="radio"  value="Male" id="male" ' . ($gender == "Male" ? "checked" : "disabled") . '>
                        <label for="male">Male</label>
                        <input type="radio" value="Female" id="female" ' . ($gender == "Female" ? "checked" : "disabled") . '>
                        <label for="female">Female</label>
                        <br>
                   

                    </td>
                   
                </tr>
                
                
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <th><label for="father-name"> Father\'s Name</label></th>
                    <td>:</td>
                    <td><input type="text" id="father-name" name="father-name" readonly value="' . $father_name . '"  ></td>
                    </tr>
                    <tr>
                         <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="mother-name"> Mother\'s Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="mother-name" readonly value="' . $mother_name . '"></td>
                    </tr>
                    <tr>
                         <td><br></td>
                    </tr>
                    <tr>
                    <tr>
                        <th><label for="blood-group">Blood Group</label></th>
                        <td>:</td>
                        <td>
                            <input type="text" id="blood-group" name="blood-group" value=" ' .$blood_group. '" readonly>
                        </td>
                    </tr>
                
                    <tr><td><br></td></tr>
                                                
                    <tr>
                        <th> <label for="religion"> Religion <label</th>
                        <td>:</td>
                        <td>
                        <input type="text" id="religion" name="religion" value=" ' .$religion. '" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                </table>
            </fieldset>
        </td>
        
        <td>
            <fieldset>
                <table>
                    <legend>Contact Information:</legend>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="email"> Email</label></th>
                        <td>:</td>
                        <td><input type="email" id="email" readonly value="' . $email . '"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="phone">Phone/Email</label></th>
                        <td>:</td>
                        <td><input type="tel" readonly value="' . $phone . '"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="website"> Website</label></th>
                       <td>:</td>
                    <td><input type="url" id="website" readonly value="' . $website . '">
                    </td>

                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="address">Address</label></th>
                        <td>:</td>
                        <td>
                            <fieldset>
                                <legend>Present Address</legend>
                                <input type="text"  name="country" value=" ' .$country. '" readonly>
                                <input type="text"  name="city" value=" ' .$city. '" readonly>
                          <br>
                                <textarea name="message" rows="6" cols="30" readonly>' . $address . '</textarea>
                                <input type="text" readonly value="' . $postcode . '">
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>
        
        <td>
            <fieldset>
                <table>
                    <legend>Account Information:</legend>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="user-name">Username</label></th>
                        <td>:</td>
                        <td>
                            <input type="text" id="user-name"  readonly value="' . $user_name . '">
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="password">Password</label></th>
                        <td>:</td>
                        <td>
                            <input type="password" id="password"  readonly value="' . $password . '" >
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="confirm-password">Confirm Password</label></th>
                        <td>:</td>
                        <td>
                            <input type="password" id="confirm-password" readonly value="' . $password . '" >
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
        </td>   
    </tr>
</table>';



?>
