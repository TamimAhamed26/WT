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
            padding: auto;
            margin:  auto;
            max-width: auto;
          
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
    <form method="POST" action="../controller/access_check.php" novalidate onsubmit="return validateAllFields(event)">
        <fieldset>
            <legend>Employee Information</legend>
         
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
        <th>Status</th>
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
            <?php
            $status = $employee['Status'];
            if ($status == 'Active') {
                echo '<span style="color: green;">' . $status . '</span>';
            } elseif ($status == 'Inactive') {
                echo '<span style="color: red;">' . $status . '</span>';
            } else {
                echo $status;
            }
            ?>
        </td>
        <td>
          <?php
            $status = $employee['Status'];
            if ($status == 'Active') {
            echo '<button type="submit" name="block" value="' . $employee['emp_id'] . '" style="background-color: red; color: white;">block</button>';
            } elseif ($status == 'Inactive') {
            echo '<button type="submit" name="unblock" value="' . $employee['emp_id'] . '" style="background-color: green; color: white;">unblock</button>';
            } else {
            echo '<button type="submit" name="block" value="' . $employee['emp_id'] . '" style="background-color: red; color: white;">block</button>';
            }
          ?>
        </td>
        </tr>
     
    <?php } 
    ?>
    </tbody>
</table>

   
</form>

</body>
</html>