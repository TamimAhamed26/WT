<?php
session_start();

$userinfo=$_SESSION['userInfo'];

?>


<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Tax Calculating Page</h2>
        <form action="../controller/calculatingtax.php" aoutocomplete="off" novalidate method="post">
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="name" >MArchent's Name</th>
                <td>:</td>
                 <td>
                <?php echo $userinfo['FirstName']." ".$userinfo['LastName'];   ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="account" >MArchent's Account Number</th>
                <td>:</td>
                 <td>
                <?php echo $userinfo['Serial'];   ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="income" >Total Income</th>
                <td>:</td>
                 <td>
                <input type="text" id="income" name="income" value="<?php if(isset($_SESSION['income'])) {
                          echo $_SESSION['income'];
                          unset($_SESSION['income']);}?>">
                          <span id="error1" ></span>

                <?php if(isset($_SESSION['incomeerror'])) {
                          echo $_SESSION['incomeerror'];
                          unset($_SESSION['incomeerror']);}?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="month" >Total Month</th>
                <td>:</td>
                 <td>
                <input type="text" id="month" name="month" value = "<?php if(isset($_SESSION['month'])) {
                          echo $_SESSION['month'];
                          unset($_SESSION['month']);}?>">
                          <span id="error2" ></span>

                <?php if(isset($_SESSION['montherror'])) {
                          echo $_SESSION['montherror'];
                          unset($_SESSION['montherror']);}?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="tax" >Calcuted Tax</th>
                <td>:</td>
                 <td>
                 <?php if(isset($_SESSION['tax'])) {
                          echo $_SESSION['tax'];
                          unset($_SESSION['tax']);}?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Calculate"  onclick="return validate()"> 
            <input type="submit" value="Back" formaction="../view/profile.php"></td>
    </table>
    </form>
    <br>
    <footer>powered by @abc bank</footer>
    <script src="taxcalculatescript.js"></script>
</body>
</center>
    </html>