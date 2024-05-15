<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

$userinfo=$_SESSION['userInfo'];

$id = $userinfo['Serial'];
$inventories = getinventory($id);
?>





<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Inventory Page</h2>
        <form action="../controller/updateinventory.php" aoutocomplete="off" novalidate method="POST">
        <table>
            <tr>
                <th>
                <label for="product">Product Name
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <th>
                <label for="product_inventory">Product in Inventory
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <th>
                <label for="sold">Solded Product
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                
            </tr>
            <?php foreach ($inventories as $inventory) {  ?>
            <tr>
                <td>
                <?php echo $inventory['Product_Name']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                <?php echo $inventory['Product_inventory']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                <?php echo $inventory['Sold_product']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                <button type="submit" name="update" id="update" value="<?php echo $inventory['Serial']; ?>">Update</button>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                
            </tr>
            <?php } ?>
            </table><br><br><br>
            <input type="submit" value="Back" formaction="../view/profile.php">
    </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>