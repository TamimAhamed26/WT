<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $father_name = $_POST["father-name"];
    $mother_name = $_POST["mother-name"];
    $blood_group = $_POST["blood-group"];
    $religion = $_POST["religion"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $website = $_POST["website"];
    $gender = $_POST["gender"];
    
    $country = $_POST["country"];
    $city = $_POST["city"];
    $address = $_POST["message"]; 
    $postcode = $_POST["postcode"];

    // Account information
    $user_name = $_POST["user-name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    echo "<h2>Submitted Information:</h2>";
    echo "<p>First Name: $first_name</p>";
    echo "<p>Last Name: $last_name</p>";
    echo "<p>Father's Name: $father_name</p>";
    echo "<p>Mother's Name: $mother_name</p>";
    echo "<p>Blood Group: $blood_group</p>";
    echo "<p>Religion: $religion</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone/Mobile: $phone</p>";
    echo "<p>Website: $website</p>";
    echo "<p>Gender: $gender</p>";
    echo "<p>Present Address: $address, $city, $country, $postcode</p>";
    echo "<p>Username: $user_name</p>";

    

} else {
    echo "<p>No data submitted. Please go back and fill out the form.</p>";
}
?>
