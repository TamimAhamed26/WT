<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}

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
    <h2>Profile </h2>
        <form action="" aoutocomplete="off" novalidate method="post">
            <table>
            <tr><td>
                <table>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="firstname" >First Name</th>
                    <td>:</td>
                    <td><?php echo $userinfo['FirstName']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="lastname" >Last Name</th>
                    <td>:</td>
                    <td><?php echo $userinfo['LastName']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="nid" >NID</th>
                    <td>:</td>
                    <td><?php echo $userinfo['NID']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="presentaddress" >Present Address</th>
                    <td>:</td>
                    <td><?php echo $userinfo['PresentAddress']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="permanentaddress" >Permanent Address</th>
                    <td>:</td>
                    <td><?php echo $userinfo['PermanentAddress']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="phonenumber" >Phone Number</th>
                    <td>:</td>
                    <td><?php echo $userinfo['PhoneNumber']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                    <th><label for="email" >E-mail</th>
                    <td>:</td>
                    <td><?php echo $userinfo['Email']; ?></td>
                    </tr>
                    <tr><td><br></td></tr>
                </table>
            </td>
            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
            <td>
                <table>
                <tr>
                    <td>
                    <input type="submit" id="payment" value="Payment View" formaction="../view/paymentview.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="loaan" value="Loan Processing" formaction="../view/loanprocess.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="feedback" value="Get Feedback" formaction="../controller/forfeedback.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="tax" value="Calculate Tax" formaction="../view/taxcalculate.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="inventory" value="Check Inventory" formaction="../view/inventory.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="update" value="Update Profile" formaction="../view/updateprofile.php">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                    <input type="submit" id="logout" value="Logout" formaction="../controller/logout.php">
                    </td>
                </tr>
                </table>
            </td>

            </table>
    </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>