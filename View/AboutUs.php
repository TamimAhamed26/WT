<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>AboutUs</title>
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

    <p>Welcome to xyz bank, where your financial well-being is our top priority. With a rich history spanning over 99 years, we have been dedicated to serving our customers with integrity, security, and innovation. As a trusted institution, 
        we are committed to providing personalized solutions tailored to meet your unique financial needs, whether it's managing your savings, securing a loan, or planning for the future. Our team of experienced professionals is here to guide you 
        every step of the way, ensuring that you have the support and expertise you deserve. At xyz, we strive to build lasting relationships built on trust, reliability, and exceptional service. Join us on the journey towards financial success and prosperity
    </p>
</body>
</html>