<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        exit();
    }

   
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Employee Account</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        div.align-right {
            text-align: right;
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
        }

   
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            width: 90%;
        }

        fieldset {
            border: none;
            padding: 0;
        }

        legend {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

    
 
   table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    margin-left: 0; 
    margin-right: 0; /
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
} 
        /* Button Styles */
        button {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="align-right">
        <a href="user_dashboard.php">Back</a>
    </div>
    
    <h2>Modify Employee Account</h2>
    <form method="POST" action="../controller/modify_emp_process.php" novalidate onsubmit="return validateAllFields(event)">
        <fieldset>
            <legend>Employee Information</legend>
            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>:</td>
                    <td><input type="text" id="user-name" name="username">
                    <span id="error5" style="color: red;"></span>
                    <?php if (isset($_SESSION['username_error'])) 
                         echo $_SESSION['username_error']; 
                        unset($_SESSION['username_error']);
                        ?>
                </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" id="password" name="password">
                    <span id="error16" style="color: red;"></span>
                    <?php if (isset($_SESSION['password_error'])) 
                         echo $_SESSION['password_error']; 
                        unset($_SESSION['password_error']);
                        ?>
                 </td>
                </tr>
                <tr>
                    <td><label for="first_name">First Name</label></td>
                    <td>:</td>
                    <td><input type="text" id="first_name" name="first_name">
                    <span id="error1" style="color: red;"></span>
                    <?php if (isset($_SESSION['first_name_error'])) 
                         echo $_SESSION['first_name_error']; 
                        unset($_SESSION['first_name_error']);
                        ?>
                </td>
                </tr>
                <tr>
                    <td><label for="last_name">Last Name</label></td>
                    <td>:</td>
                    <td><input type="text" id="last_name" name="last_name">
                    <span id="error2" style="color: red;"></span>
                    <?php if (isset($_SESSION['last_name_error'])) 
                         echo $_SESSION['last_name_error']; 
                        unset($_SESSION['last_name_error']);
                        ?>
                
                </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender</label></td>
                    <td>:</td>
                    <td>
                        <input type="radio" id="gender" name="gender" value="Male"> Male
                        <input type="radio" id="gender" name="gender" value="Female"> Female
                    
                      <?php if (isset($_SESSION['gender_error']))
                         echo $_SESSION['gender_error'];
                        unset($_SESSION['gender_error']);
                        ?>  
                           <span id="error7" style="color: red;"></span>

                    </td>
                </tr>
                <tr>
                    <td><label for="phone_number">Phone Number</label></td>
                    <td>:</td>
                    <td><input type="text" id="phone_number" name="phone_number">
                    <?php if (isset($_SESSION['phone_number_error'])) 
                         echo $_SESSION['phone_number_error']; 
                        unset($_SESSION['phone_number_error']);
                        ?>
                           <span id="error12" style="color: red;"></span>
                </td>
                </tr>
                <tr>
                    <td><label for="date_of_birth">Date of Birth</label></td>
                    <td>:</td>
                    <td><input type="date" id="date_of_birth" name="date_of_birth">
                    <?php if (isset($_SESSION['date_of_birth_error'])) 
                         echo $_SESSION['date_of_birth_error']; 
                        unset($_SESSION['date_of_birth_error']);
                        ?>
                         <span id="error13" style="color: red;"></span>   
                </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>:</td>
                    <td><input type="email" id="email" name="email">
                    <span id="error6" style="color: red;"></span>
                    <?php if (isset($_SESSION['email_error'])) 
                         echo $_SESSION['email_error']; 
                        unset($_SESSION['email_error']);
                        ?>
                </td>
                    
                </tr>
                <tr>
                    <td><label for="street_address">Street Address:</label></td>
                    <td>:</td>
                    <td><input type="text" id="street_address" name="street_address">
                    <span id="error15" style="color: red;"></span>
                    <?php if (isset($_SESSION['street_address_error'])) 
                         echo $_SESSION['street_address_error']; 
                        unset($_SESSION['street_address_error']);
                        ?>
                
                </td>
                </tr>
                <tr>
                    <td><label for="city">City:</label></td>
                    <td>:</td>
                    <td><input type="text" id="city" name="city">
                    <span id="error11" style="color: red;"></span>
                    <?php if (isset($_SESSION['city_error'])) 
                         echo $_SESSION['city_error']; 
                        unset($_SESSION['city_error']);
                        ?>
                
                </td>
                </tr>
                <tr>
                    <td><label for="State">State:</label></td>
                    <td>:</td>
                    <td><input type="text" id="State" name="State">
                    <span id="error10" style="color: red;"></span>
                    <?php if (isset($_SESSION['State_error'])) 
                         echo $_SESSION['State_error']; 
                        unset($_SESSION['State_error']);
                        ?> 
                
                </td>
                </tr>
                <tr>
                    <td><label for="postal_code">Postal Code:</label></td>
                    <td>:</td>
                    <td><input type="text" id="postal_code" name="postal_code">
                    <span id="error14" style="color: red;"></span>
                    <?php if (isset($_SESSION['postal_code_error'])) 
                         echo $_SESSION['postal_code_error']; 
                        unset($_SESSION['postal_code_error']);
                        ?>
                </td>
                </tr>       
            </table>
        </fieldset>

        <input type="submit" name="Add" value="add">
<h2>All Employee Accounts</h2>
<table style="margin-left: 0;">
<thead>
    <tr>
        <th>Employee ID</th>
        <th>username</th>
        <th>First Name</th>
        <th>password</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Phone Number</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Street Address</th>
        <th>City</th>
        <th>State</th>
        <th>Postal Code</th>
        <th>Action</th>
    </tr>
    </thead> 
    <tbody>
    <?php
    require_once '../model/user_model.php'; 
    $employees = getAllEmployees(); 
    foreach($employees as $employee) { ?>
       <tr>
        <td><?php echo $employee['emp_id']; ?></td>
        <td><?php echo $employee['username']; ?></td>
        <td><?php echo $employee['first_name']; ?></td>
        <td><?php echo $employee['password']; ?></td>
        <td><?php echo $employee['last_name']; ?></td>
        <td><?php echo $employee['gender']; ?> </td>
        <td><?php echo $employee['phone_number']; ?></td>
        <td><?php echo $employee['date_of_birth']; ?></td>
        <td><?php echo $employee['email']; ?></td>
        <td><?php echo $employee['street_address']; ?></td>
        <td><?php echo $employee['city']; ?></td>
        <td><?php echo $employee['State']; ?></td>
        <td><?php echo $employee['postal_code']; ?></td>
        <td>
          <button type="submit" name="update" value="<?php echo $employee['emp_id']; ?>">Update</button>
          <button type="submit" name="delete" value="<?php echo $employee['emp_id']; ?>">Delete</button>

        </td>
        </tr>
     
    <?php } 
    ?>
    </tbody>
</table>

   
</form>
<script src="../JS/mod_emp.js"></script>
</body>
</html>