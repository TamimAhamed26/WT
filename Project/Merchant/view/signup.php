<?php
session_start();

$marchent=array(
    'firstname' => '',
    'lastname'=>'',
    'nid'=>'',
    'presentaddress'=>'',
    'permanentaddress'=>'',
    'phonenumber'=>'',
    'email'=>'',
    'username'=>'',
    'password'=>'',
    'confirmpassword'=>'',
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
    <h2><u>Sign Up Page</u></h2>
        <form action="../controller/signmarchent.php" autocomplete="off"  method="post" novalidate onsubmit="return validate()">
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="firstname" >First Name</th>
                <td>:</td>
                 <td>
                <input type="text" id="firstname" name="firstname" >
                <?php echoErrorMessage('firstname') ?>
                <span id="error1" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="lastname" >Last Name</th>
                <td>:</td>
                 <td>
                <input type="text" id="lastname" name="lastname" >
                <?php echoErrorMessage('lastname') ?>
                <span id="error2" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="nid" >NID</th>
                <td>:</td>
                 <td>
                <input type="text" id="nid" name="nid" >
                <?php echoErrorMessage('nid') ?>
                <span id="error3" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="presentaddress" >Present Address</th>
                <td>:</td>
                 <td>
                <input type="text" id="presentaddress" name="presentaddress" >
                <?php echoErrorMessage('presentaddress') ?>
                <span id="error4" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="permanentaddress" >Permanent Address</th>
                <td>:</td>
                 <td>
                <input type="text" id="permanentaddress" name="permanentaddress" >
                <?php echoErrorMessage('permanentaddress') ?>
                <span id="error5" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="phonenumber" >Phone Number</th>
                <td>:</td>
                 <td>
                <input type="text" id="phonenumber" name="phonenumber" >
                <?php echoErrorMessage('phonenumber') ?>
                <span id="error6" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="email" >E-mail</th>
                <td>:</td>
                 <td>
                <input type="text" id="email" name="email" >
                <?php echoErrorMessage('email') ?>
                <span id="error7" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="username" >Username</th>
                <td>:</td>
                 <td>
                <input type="text" id="username" name="username" >
                <?php echoErrorMessage('username') ?>
                <span id="error8" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="password" >Password</th>
                <td>:</td>
                 <td>
                <input type="text" id="password" name="password" >
                <?php echoErrorMessage('password') ?>
                <span id="error9" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="confirmpassword" >Confirm Password</th>
                <td>:</td>
                 <td>
                <input type="text" id="confirmpassword" name="confirmpassword" >
                <?php echoErrorMessage('confirmpassword') ?>
                <span id="error10" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            <tr> <td><br></td> </tr>
    </table>
    <input type=submit value="Sign Up">
    </form>
    <footer>powered by @abc bank</footer>
    <script src="signupscript.js"></script>
</body>
</center>
    </html>