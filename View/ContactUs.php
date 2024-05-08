
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>

<div align="right">
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        echo '<a href="user_dashboard.php">Back</a>';
    } else {
        echo '<a href="login.php">Back</a>';
    }
    ?>
</div>
    <form method="post">
        <select name="language" onchange="this.form.submit()">
            <option value="english" <?php if(isset($_POST['language']) && $_POST['language'] == 'english') echo 'selected'; ?>>English</option>
            <option value="bangla" <?php if(isset($_POST['language']) && $_POST['language'] == 'bangla') echo 'selected'; ?>>Bangla</option>
        </select>
    </form>
    
    <div id="content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $language = $_POST["language"];
            include "content_$language.php";
        } else {
            include "content_english.php";
        }
        ?>
    </div>
</body>
</html>
