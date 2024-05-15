<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}
require_once '../Model/database_model.php';
$merchant = getAllMerchant();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Management</title>
    <link rel="stylesheet" href="external.css">
    
</head>
<body style = "margin:0">
    <?php include 'header.html'; ?>
    
    <?php include 'navigation.html'; ?>
    <br>
    <center><p style="font-size: 30px; color: #242137;">Merchant Management</p>
</center><hr>
    <center>
    <form method="POST" action="../Controller/merchant.php">
        <table >
<tr>
<!--<td>
    <input type="text" id="searchCustomer" name="searchCustomer" placeholder="Search by name">
</td><td>
<a href="../Controller/customer.php" class="search-customer-btn">🔎 Search</a>
    
</td>-->
<td>
<a href="../View/add_merchant.php" class="add-customer-btn">➕ Add Merchant</a>
</td></tr><tr><td><br></td></tr>
</table>

<div class="table-container">
    <table class="customer-table">

<thead>
    <tr>
    <th>Action</th>
        <th>ID</th>
        <th>First Name</th>
       <th>Last Name</th>
        <th>NID</th>
        <th>Present Address</th>
        <th>Permanent Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
</thead>
<tbody>

    <?php foreach ($merchant as $user) { ?>
    <tr>
    <td>
       
    
    <button type="submit" class="delete-customer-btn" name="deleteMerchant" value="<?php echo $user['Serial']; ?>">Delete</button>  
    <!-- <button type="submit" class="edit-customer-btn" name="editMerchant" value="  <?php echo $user['Serial']; ?>">Edit</button> -->
    </td>
    <td><?php echo $user['Serial']; ?></td>
        <td><?php echo $user['FirstName']; ?></td>
         <td> <?php echo $user['LastName']; ?></td>
        <td><?php echo $user['NID']; ?></td>
        <td><?php echo $user['PresentAddress']; ?></td>
        <td><?php echo $user['PermanentAddress']; ?></td>
        <td><?php echo $user['PhoneNumber']; ?></td>
        <td><?php echo $user['Email']; ?></td>
        <td><?php echo $user['Username']; ?></td>
        <td><?php echo $user['Password']; ?></td>        
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
