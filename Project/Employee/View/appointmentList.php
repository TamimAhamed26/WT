<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}
require_once '../Model/database_model.php';
$appointment = getAllAppointment();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="external.css">
    
</head>
<body style = "margin:0">
    <?php include 'header.html'; ?>
    
    <?php include 'navigation.html'; ?>
    <br>
    <center><p style="font-size: 30px; color: #242137;">Appointment List</p>
</center><hr>
    <center>
    <form method="POST" action="../Controller/modify_customer.php">
        <table >
<tr>

<td>
<a href="../View/appointment.php" class="add-customer-btn">Back</a>
</td></tr><tr><td><br></td></tr>
</table>

<div class="table-container">
    <table class="customer-table">

<thead>
    <tr>
    <th>Action</th>
        <th>ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Purpose</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>

    <?php foreach ($appointment as $user) { ?>
    <tr>
    <td>
       
    
    <button type="submit" class="delete-customer-btn" name="deleteAppointment" value="<?php echo $user['appointment_id']; ?>">Delete</button>  
    </td>
    <td><?php echo $user['appointment_id']; ?></td>
        <td><?php echo $user['date']; ?></td>
         <td> <?php echo $user['time']; ?></td>
        <td><?php echo $user['purpose']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td><?php echo $user['email']; ?></td>
</tr>
    
    <?php } ?>
   
</tbody>

</table>
</form>
<br>
</div>

    </center>
    <a href="../Controller/logout.php" class="logout-btn"style="width: 65px; height: 20px;">Logout ⤿</a>

    <?php include 'footer.html'; ?>
    
</body>
</html>
