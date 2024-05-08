<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | </title>
    <link rel="stylesheet" href="CSS/change_pass.css">
    <header>
        XYZ Bank
        Update Profile Page
 </header>
</head>

<body>
  
    <div class="container">
    Change password for Admin:<b><span style="color: purple;"><?php echo $_SESSION['username']; ?></span></b> 
    <a href=" ../View/updateProfile.php">Back</a>
    <form method="post" action=" ../controller/ChangePasswordCheck.php" novalidate onsubmit="return validateForm()">
        <fieldset>
         
            Current Password : <input type="password" name="cur-passwd" id="cur-passwd"> <br>
            <span id="cur-passwd-error" style="color: red;"></span> <br>
            New Password : <input type="password" name="new-passwd" id="new-passwd"> <br>
            <span id="new-passwd-error" style="color: red;"></span> <br>

            Retype New Password : <input type="password" name="re-new-passwd" id="re-new-passwd" > <br>
            <span id="re-new-passwd-error" style="color: red;"></span> <br>

            <input type="submit" name="submit"> 
        </fieldset>
    </form>
   
    <?php
        if (isset($_SESSION['change_password_error'])) {
            echo '<span style="color: red;">' . $_SESSION['change_password_error'] . '</span>';
            unset($_SESSION['change_password_error']); 
        }
    ?>

</div>
       <?php include 'footer.html'; ?>
       <script src="../JS/change_pass.js"></script>
</body>




</html>
