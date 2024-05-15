<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}
require_once '../Model/database_model.php';
$customer = getAllCustomer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link rel="stylesheet" href="external.css">
    
</head>
<body style = "margin:0">
    <?php include 'header.html'; ?>
    
    <?php include 'navigation.html'; ?>
    <br>
    <center><p style="font-size: 30px; color: #242137;">Customer Management</p>
</center><hr>
    <center>
    <form method="POST" action="../Controller/customer.php">
        <table >
<tr>
<!--<td>
    <input type="text" id="searchCustomer" name="searchCustomer" placeholder="Search by name">
</td><td>
<a href="../Controller/customer.php" class="search-customer-btn">🔎 Search</a>
    
</td>-->
<td>
<a href="../View/add_customer.php" class="add-customer-btn">➕ Add Customer</a>
</td></tr><tr><td><br></td></tr>
</table>

<div class="table-container">
    <table class="customer-table">

<thead>
    <tr>
    <th>Action</th>
        <th>ID</th>
        <th>Name</th>
       <th>Father's Name</th>
        <th>Mother's Name</th>
        <th>Gender</th>
        <th>Blood Group</th>
        <th>Religion</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Website</th>
        <th>Detailed Address</th>
        <th>City</th>
        <th>Post Code</th>
        <th>Country</th>
        <th>Username</th>
        <th>Password</th>
        <th>Created at</th>
        
    </tr>
</thead>
<tbody>

    <?php foreach ($customer as $user) { ?>
    <tr>
    <td>
       
    
    <button type="submit" class="delete-customer-btn" name="deleteCustomer" value="<?php echo $user['customer_id']; ?>">Delete</button>  
    <!-- <button type="submit" class="edit-customer-btn" name="editCustomer" value="  <?php echo $user['customer_id']; ?>">Edit</button> -->
    </td>
    <td><?php echo $user['customer_id']; ?></td>
        <td><?php echo $user['holder_name']; ?></td>
         <td> <?php echo $user['father_name']; ?></td>
        <td><?php echo $user['mother_name']; ?></td>
        <td><?php echo $user['gender']; ?></td>
        <td><?php echo $user['blood_group']; ?></td>
        <td><?php echo $user['religion']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td><?php echo $user['website']; ?></td> 
        <td><?php echo $user['message']; ?></td>
        <td><?php echo $user['city']; ?></td>
        <td><?php echo $user['postcode']; ?></td>
        <td><?php echo $user['country']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['password']; ?></td>
        <td><?php echo $user['created_at']; ?></td>
       
      
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
