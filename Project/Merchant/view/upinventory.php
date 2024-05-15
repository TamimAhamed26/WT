<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}


$userinfo=$_SESSION['userInfo'];
$inventory = $_SESSION['SIngle_inventory'];

$inventoryupdate=array(
    'productInventory' => '',
    'sold'=>'',
);

foreach ($inventoryupdate as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . 'error'])) {
        $marchent[$fieldName] = $_SESSION[$fieldName . 'error'];
        unset($_SESSION[$fieldName . 'error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $inventoryupdate;
    if (($inventoryupdate[$fieldName])) {
        echo $inventoryupdate[$fieldName];
    }
}

?>


<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Update Profile Page</h2>
        <form action="../controller/mainUpInventory.php" autocomplete="off"  method="post" novalidate>
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="productname" >Product Name</th>
                <td>:</td>
                 <td>
                <?php echo $inventory['Product_Name']; ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="productInventory" >Product in Inventory</th>
                <td>:</td>
                 <td>
                <input type="text" id="productInventory" name="productInventory" value="<?php echo $inventory['Product_inventory']; ?>" >
                <?php echoErrorMessage('productInventory') ?>
                </td>
            </tr>
            
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="sold" >Total Sold</th>
                <td>:</td>
                 <td>
                <input type="text" id="sold" name="sold" value="<?php echo $inventory['Sold_product']; ?>" >
                <?php echoErrorMessage('sold') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr> <td><br></td> </tr>
    </table>
    <input type=submit value="Update"> 
    </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>