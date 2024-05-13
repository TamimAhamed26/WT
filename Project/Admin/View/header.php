<?php


if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];
} elseif (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'english'; // Default language
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>XYZ Banking</title>
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 15px;
        }

        header table {
            margin: 1px auto 0;
        }

        header table td {
            padding: 5 10px;
        }

        header table a {
            color: #fff;
            text-decoration: none;
            padding: 20px;
        }

        header table a:hover {
            text-decoration: underline;
        }
    </style>
</head>
</style>
</head>
<body>
    <header>
        <center>
            <h1>XYZ Banking</h1>
            <table>
                <tr>
                    <td><a href="Home.php"><?php echo ($_SESSION['language'] == 'bangla') ? 'হোম' : 'Home'; ?></a></td>
                    <td><a href="AboutUs.php"><?php echo ($_SESSION['language'] == 'bangla') ? 'আমাদের সম্পর্কে' : 'About Us'; ?></a></td>
                    <td><a href="ContactUs.php"><?php echo ($_SESSION['language'] == 'bangla') ? 'যোগাযোগ করুন' : 'Contact Us'; ?></a></td>
                    <?php if(isset($_SESSION['username'])) { ?>
                        <td><a href="../controller/logout.php"><?php echo ($_SESSION['language'] == 'bangla') ? 'লগআউট' : 'Logout'; ?></a></td>
                    <?php } else { ?>
                        <td><a href="login.php"><?php echo ($_SESSION['language'] == 'bangla') ? 'লগইন' : 'Login'; ?></a></td>
                    <?php } ?>
                </tr>
            </table>
        </center>
    </header>
    
    <form method="post" style="position: absolute; top: 10px; right: 10px;">
        <select name="language" onchange="this.form.submit()">
            <option value="english" <?php if($_SESSION['language'] == 'english') echo 'selected'; ?>>English</option>
            <option value="bangla" <?php if($_SESSION['language'] == 'bangla') echo 'selected'; ?>>Bangla</option>
        </select>
    </form>
</body>
</html>
