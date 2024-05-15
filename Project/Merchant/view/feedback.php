<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}

$feedbacks = $_SESSION['feedback'];
?>




<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Feedback Page</h2>
        <form action="" aoutocomplete="off" novalidate method="post">
        <table>
            <tr>
                <th>
                <label for="number">Customer Number
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <th>
                <label for="product">Product
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <th>
                <label for="review">Review
                </th>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                
            </tr>
            <?php foreach ($feedbacks as $feedback) { ?>
            <tr>
                <td>
                <?php echo $feedback['Customer_number']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                <?php echo $feedback['Product_name']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                <?php echo $feedback['Review']; ?>
                </td>
                <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                </td>
                
            </tr>
            <?php } ?>
            </table><br><br><br>
            <input type="submit" value="Back" formaction="../view/profile.php">
    </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>