<?php
session_start();
if (!isset($_SESSION['employee'])) {
    header("Location: modify_emp.php");
    exit();
}

$employee = $_SESSION['employee'];
$id=$employee['emp_id'];
$user_name=$employee['username'];
$password=$employee['password'];
$first_name=$employee['first_name'];
$last_name=$employee['last_name'];
$phone_number=$employee['phone_number'];
$email=$employee['email'];
$date_of_birth=$employee['date_of_birth'];
$gender=$employee['gender'];
$street_address=$employee['street_address'];
$city=$employee['city'];
$postal_code=$employee['postal_code'];
$State=$employee['State']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Account</title>
    <link rel="stylesheet" type="text/css" href="CSS/up_prof.css">
    <header>
        XYZ Bank
        Update Profile Page
</header>
</head>
<body>
<div align="right">
        <a href="modify_emp.php">Back</a>
    </div>
    <h2>Update Employee Account</h2>
    <form method="POST" action="../controller/update_emp_process1.php" novalidate onsubmit="return validateAllFields()">
        <fieldset>
            <legend>Employee Information</legend>
            <table>
              
            <input type="hidden" name="emp_id" value="<?php echo $id; ?>">  
              <tr>
                    <td><label for="username">Username</label></td>
                    <td>:</td>
                    <td><input type="text" id="username" name="username" readonly value="<?php echo $user_name ; ?>">
                    <span id="error5" style="color: red;"></span>
                   
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" id="password" name="password" value="<?php echo $password; ?>" >
                    <?php if (isset($_SESSION['password_error'])) 
                         echo $_SESSION['password_error']; 
                        unset($_SESSION['password_error']);
                        ?>   
                          <span id="error16" style="color: red;"></span>             
                </td>
                </tr>
                <tr>
                    <td><label for="firstname">First Name</label></td>
                    <td>:</td>
                    <td><input type="text" id="firstname" name="firstname" value="<?php echo $first_name ?>">
                    <?php if (isset($_SESSION['firstname_error'])) 
                         echo $_SESSION['firstname_error']; 
                        unset($_SESSION['firstname_error']);
                        ?>
                     <span id="error1" style="color: red;"></span>          
               
                    </td>
                </tr> 
                <tr>
                    <td><label for="lastname">Last Name</label></td>
                    <td>:</td>
                    <td><input type="text" id="lastname" name="lastname" value="<?php echo $last_name; ?>">
                    <?php if (isset($_SESSION['lastname_error'])) 
                         echo $_SESSION['lastname_error']; 
                        unset($_SESSION['lastname_error']);
                        ?>
                         <span id="error2" style="color: red;"></span>      
                    </td>
                </tr>
                <tr>
                    <td><label for="phone_number">Phone Number</label></td>
                    <td>:</td>
                    <td><input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">  
                    <?php if (isset($_SESSION['phone_number_error'])) 
                         echo $_SESSION['phone_number_error']; 
                        unset($_SESSION['phone_number_error']);
                        ?>
                         <span id="error12" style="color: red;"></span>  
                    </td>      

                </tr>   

                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:</td>
                    <td><input type="text" id="email" name="email" value="<?php echo $email ; ?>">
                    <?php if (isset($_SESSION['email_error'])) 
                         echo $_SESSION['email_error']; 
                        unset($_SESSION['email_error']);
                        ?>
                         <span id="error6" style="color: red;"></span>  
                    </td>
                </tr>
                <tr>
                    <td><label for="date_of_birth">Date of Birth</label></td>
                    <td>:</td>
                    <td><input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>"> 
                    <?php if (isset($_SESSION['date_of_birth_error'])) 
                         echo $_SESSION['date_of_birth_error']; 
                        unset($_SESSION['date_of_birth_error']);
                        ?>
                         <span id="error13" style="color: red;"></span>  
                    </td>                   
                </tr>
                <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                <input type="radio" id="male" name="gender" value="male" <?php if ($employee['gender'] == 'Male') echo 'checked'; ?>>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female" <?php if ($employee['gender'] == 'Female') echo 'checked'; ?>>
                <label for="female">Female</label>
                 <?php if (isset($_SESSION['gender_error']))
                 echo $_SESSION['gender_error'];
                 unset($_SESSION['gender_error']);
                    ?>
                     <span id="error7" style="color: red;"></span>  
              </td>
           
              </tr>
                <tr>
                    <td><label for="street_address">Street Address</label></td>
                    <td>:</td>
                    <td><input type="text" id="street_address" name="street_address" value="<?php echo $street_address; ?>">
                    <?php if (isset($_SESSION['street_address_error'])) 
                         echo $_SESSION['street_address_error']; 
                        unset($_SESSION['street_address_error']);
                        ?>
                         <span id="error15" style="color: red;"></span>  
                    </td>
                </tr>
                <tr>
                    <td><label for="city">City</label></td>
                    <td>:</td>
                    <td><input type="text" id="city" name="city" value="<?php echo $city; ?>">
                    <?php if (isset($_SESSION['city_error'])) 
                         echo $_SESSION['city_error']; 
                        unset($_SESSION['city_error']);
                        ?>
                         <span id="error11" style="color: red;"></span>  
                    </td>
                </tr>
                <tr>
                    <td><label for="postal_code">Postal Code</label></td>
                    <td>:</td>
                    <td><input type="text" id="postal_code" name="postal_code" value="<?php echo $postal_code; ?>">
                    <?php if (isset($_SESSION['postal_code_error'])) 
                         echo $_SESSION['postal_code_error']; 
                        unset($_SESSION['postal_code_error']);
                        ?>
                         <span id="error14" style="color: red;"></span>  
                    </td>
                </tr>
                <tr>
                    <td><label for="State">State</label></td>
                    <td>:</td>
                    <td><input type="text" id="State" name="State" value="<?php echo $State; ?>">
                    <?php if (isset($_SESSION['State_error'])) 
                         echo $_SESSION['State_error']; 
                        unset($_SESSION['State_error']);
                        ?>
                         <span id="error10" style="color: red;"></span>  
                    </td>
                </tr>
                
            </table>
        </fieldset>
        <input type="submit" name="Update_emp" value="Update">
    </form>
    <script src="../JS/up_emp.js"></script>
</body>
</html>
