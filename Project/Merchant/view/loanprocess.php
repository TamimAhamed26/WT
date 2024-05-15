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
    <h2>Loan Processing</h2>
        <form action="../controller/processloan.php" aoutocomplete="off" novalidate method="post" >
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
                <th><label for="loantype" >Loan Type</th>
                <td>:</td>
                 <td>
                 <select name="loantype" id="loantype">
                <option value="none ">--None--</option>
                <option value="Personal ">Personal Loan</option>
                <option value="Home ">Home Loan</option>
                <option value="Car ">Car Loan</option>
                <option value="Business ">Business Loan</option>
                </select>
                <?php if(isset($_SESSION['loantypeerror'])) {
                          echo $_SESSION['loantypeerror'];
                          unset($_SESSION['loantypeerror']);}?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="reason" >Reason for taking loan</th>
                <td>:</td>
                 <td>
                <input type="text" id="reason" name="reason" value="">

                <?php if(isset($_SESSION['reasonerror'])) {
                          echo $_SESSION['reasonerror'];
                          unset($_SESSION['reasonerror']);}?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="amount" >Requested Amount</th>
                <td>:</td>
                 <td>
                <input type="text" id="amount" name="amount" value = ""></td><td> BDT <td>

                <?php if(isset($_SESSION['amounterror'])) {
                          echo $_SESSION['amounterror'];
                          unset($_SESSION['amounterror']);}?>
                </td>
                
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Request" > <input type="submit" value="Back" formaction="../view/profile.php"></td>
            </td>
    </table>
    </form>
    <br>
    <footer>powered by @abc bank</footer>
    <script src="loginscript.js"></script>
</body>
</center>
    </html>