<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate required fields
    $errors = [];
    $required_fields = ["first-name", "last-name", "email", "phone", "user-name", "password", "confirm-password"];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "$field is required";
        }
    }

    // Validate email format
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password match
    if ($_POST["password"] !== $_POST["confirm-password"]) {
        $errors[] = "Passwords do not match";
    }

    // Display errors or submitted information
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
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
    }

} else {
    echo "<p>No data submitted. Please go back and fill out the form.</p>";
}
?>
