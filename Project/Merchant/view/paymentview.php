<?php
session_start();

$marchent=array(
    'product' => '',
    'price'=>'',
    'customernmbr'=>'',
    'method'=>'',
    'billingaddress'=>'',
);

foreach ($marchent as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . 'error'])) {
        $marchent[$fieldName] = $_SESSION[$fieldName . 'error'];
        unset($_SESSION[$fieldName . 'error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $marchent;
    if (($marchent[$fieldName])) {
        echo $marchent[$fieldName];
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
    <h2><u>Payment View Page</u></h2>
        <form action="../controller/pay.php" autocomplete="off"  method="post" novalidate onsubmit="return validate()">
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="product" >Product</th>
                <td>:</td>
                 <td>
                 <select name="product" id="product">
                <option value="none ">--None--</option>
                <option value="Laptop ">Laptop</option>
                <option value="Mobile ">Mobile</option>
                </select>
                <?php echoErrorMessage('product') ?>
                <span id="error4" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="price" >Total Price</th>
                <td>:</td>
                 <td>
                <input type="text" id="price" name="price" >
                <?php echoErrorMessage('price') ?>
                <span id="error2" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="customernmbr" >Customer Number</th>
                <td>:</td>
                 <td>
                <input type="text" id="customernmbr" name="customernmbr" >
                <?php echoErrorMessage('customernmbr') ?>
                <span id="error3" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="method" >Payment Method</th>
                <td>:</td>
                <td>
                 <select name="method" id="method">
                <option value="none ">--None--</option>
                <option value="Bkash ">Bkash</option>
                <option value="Nagad ">Nagad</option>
                <option value="Card ">Card</option>
                <option value="Cash ">Cash</option>
                </select>
                <?php echoErrorMessage('method') ?>
                <span id="error4" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="billingaddress" >Billing Address</th>
                <td>:</td>
                <td>
                <input type="text" id="billingaddress" name="billingaddress" >
                <?php echoErrorMessage('billingaddress') ?>
                <span id="error4" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr> <td><br></td> </tr>
            <tr> <td><br></td> </tr>
    </table>
    <input type=submit value="Pay"><br><br>
    <input type="submit" value="Back" formaction="../view/profile.php">
    </form>
    <footer>powered by @abc bank</footer>
    <script src="signupscript.js"></script>
</body>
</center>
    </html>