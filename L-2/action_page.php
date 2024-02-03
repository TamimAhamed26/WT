

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
    $address = $_POST["address"];

 


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
    echo "<p>Present Address: $address</p>";
} else {
    echo "<p>No data submitted. Please go back and fill out the form.</p>";
}
?>

