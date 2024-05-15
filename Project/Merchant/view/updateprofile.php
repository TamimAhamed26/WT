<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}


$userinfo=$_SESSION['userInfo'];

$userupdate=array(
    'firstname' => '',
    'lastname'=>'',
    'nid'=>'',
    'presentaddress'=>'',
    'permanentaddress'=>'',
    'phonenumber'=>'',
    'email'=>'',
);

foreach ($userupdate as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . 'error'])) {
        $marchent[$fieldName] = $_SESSION[$fieldName . 'error'];
        unset($_SESSION[$fieldName . 'error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $userupdate;
    if (($userupdate[$fieldName])) {
        echo $userupdate[$fieldName];
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
        <form action="../controller/upProfile.php" autocomplete="off"  method="post" novalidate>
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="firstname" >First Name</th>
                <td>:</td>
                 <td>
                <input type="text" id="firstname" name="firstname" value="<?php echo $userinfo['FirstName']; ?>" >
                <?php echoErrorMessage('firstname') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="lastname" >Last Name</th>
                <td>:</td>
                 <td>
                <input type="text" id="lastname" name="lastname" value="<?php echo $userinfo['LastName']; ?>" >
                <?php echoErrorMessage('lastname') ?>
                </td>
            </tr>
            
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="nid" >NID</th>
                <td>:</td>
                 <td>
                <input type="text" id="nid" name="nid" value="<?php echo $userinfo['NID']; ?>" >
                <?php echoErrorMessage('nid') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="presentaddress" >Present Address</th>
                <td>:</td>
                 <td>
                <input type="text" id="presentaddress" name="presentaddress" value="<?php echo $userinfo['PresentAddress']; ?>" >
                <?php echoErrorMessage('presentaddress') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="permanentaddress" >Permanent Address</th>
                <td>:</td>
                 <td>
                <input type="text" id="permanentaddress" name="permanentaddress" value="<?php echo $userinfo['PermanentAddress']; ?>" >
                <?php echoErrorMessage('permanentaddress') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="phonenumber" >Phone Number</th>
                <td>:</td>
                 <td>
                <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $userinfo['PhoneNumber']; ?>" >
                <?php echoErrorMessage('phonenumber') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="email" >E-mail</th>
                <td>:</td>
                 <td>
                <input type="text" id="email" name="email" value="<?php echo $userinfo['Email']; ?>" >
                <?php echoErrorMessage('email') ?>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
  
            <tr> <td><br></td> </tr>
            <tr> <td><br></td> </tr>
    </table>
    <input type=submit value="Update"> <input type="submit" value="Change Password" formaction="../view/passchange.php"><br><br><br>
    <input type="submit" value="Back" formaction="../view/profile.php">
    </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>