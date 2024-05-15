<?php

session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

// Function to set error message in session variable
function setErrorMessage($fieldName, $message) {
    $_SESSION[$fieldName . '_error'] = $message;
}

// Function to retrieve error message from session variable
function getErrorMessage($fieldName) {
    return isset($_SESSION[$fieldName . '_error']) ? $_SESSION[$fieldName . '_error'] : '';
}

$fieldNames = array(
    'date' => '',
    'time' => '',
    'purpose' => '',
    'message'=>'',
    'name'=>'',
    'phone' => '',
    'email'=>'',
);

foreach ($fieldNames as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . '_error'])) {
        $fieldNames[$fieldName] = $_SESSION[$fieldName . '_error'];
        unset($_SESSION[$fieldName . '_error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $fieldNames;
    if (($fieldNames[$fieldName])) {
        echo $fieldNames[$fieldName];
    }
}

$date = isset($_COOKIE['date']) ? $_COOKIE['date'] : '';
$time = isset($_COOKIE['time']) ? $_COOKIE['time'] : '';
$purpose = isset($_COOKIE['purpose']) ? $_COOKIE['purpose'] : '';
$name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$phone = isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '';
?>

<html>
<head>
    <title>Schedule Appointment</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/appointment.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="appointment.png" alt="reg" style="width: 150; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Set Appointment<p></td></tr></table><hr>
    <form action="../Controller/modify_appointment.php" method="POST"  novalidate onsubmit="return validateAppointment()"  autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr><td></td>
    <td style="text-align: right;">
        <a href="../View/appointmentList.php" class="edit-customer-btn" style="width: 65px; height: 20px;">All Appointment List</a>
    </td>
</tr>
<tr><td><br></td></tr>
    <tr>
    <td>Date</td>
    <td>
        <input type="date" id="date" name="date" value="<?= $date ?>">
        <span id="errorDate" style="color: red;"><?= getErrorMessage('date'); ?></span>
        <?php echoErrorMessage('date'); ?>
    </td>
</tr>
<tr>
    <td>Time</td>
    <td>
        <input type="time" id="time" name="time" value="<?= $time ?>">
        <span id="errorTime" style="color: red;"><?= getErrorMessage('time'); ?></span>
        <?php echoErrorMessage('time'); ?>
    </td>
</tr>
<tr>
    <td>Purpose</td>
    <td>
        <input type="text" id="purpose" name="purpose" value="<?= $purpose ?>">
        <span id="errorPurpose" style="color: red;"><?= getErrorMessage('purpose'); ?></span>
        <?php echoErrorMessage('purpose'); ?>
    </td>
</tr>

<tr>
    <td>Name</td>
    <td>
        <input type="text" id="name" name="name" value="<?= $name ?>" >
        <span id="errorName" style="color: red;"><?= getErrorMessage('name'); ?></span>
        <?php echoErrorMessage('name'); ?>
    </td>
</tr>

<tr>
    <td>Phone</td>
    <td>
        <input type="text" id="phone" name="phone" value="<?= $phone ?>" placeholder="+8801XXXXXXXXX">
        <span id="errorPhone" style="color: red;"><?= getErrorMessage('phone'); ?></span>
        <?php echoErrorMessage('phone'); ?>
    </td>
</tr>
<tr>
    <td>Email</td>
    <td>
        <input type="text" id="email" name="email" value="<?= $email ?>" placeholder="...@example.com">
        <span id="errorEmail" style="color: red;"><?= getErrorMessage('email'); ?></span>
        <?php echoErrorMessage('email'); ?>
    </td>
</tr>
<tr><td><br></td></tr>

<tr>
    <td><input type="submit" name="SetAppointment" value="Set" class="addCustomer-btn"></td>
    <td><a href="../View/employee_dashboard.php" class="cancelcustomer-btn">Cancel</a></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>