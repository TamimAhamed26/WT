<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstName = $_POST['first-name'];
    if (empty($firstName)) {
        echo "First Name is empty";
    } else {
        echo $firstName;
    }
}