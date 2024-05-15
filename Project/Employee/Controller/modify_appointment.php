<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$name = $date = $time = $purpose = $email = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAppointment'])) {
    $id = $_POST['deleteAppointment'];
    deleteAppointment($id);
    header("Location: ../View/appointmentList.php");
    exit();
}
else if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addAppointment'])) {
    $date = validateDate("date", "Date has to be future");
    $time = validateTime("time", "Time slot not available");
    $purpose = validateField("purpose", "Purpose is required");
    $name = validateField("name", "Name is required");
    $email = validateEmail("email", "Email is required");
    $phone = validatePhone("phone", "Phone is required");
    if (empty($_SESSION)) {
    $appointment = array(
        'date' => $date,
        'time' => $time,
        'purpose' => $purpose,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
    );

    if (addAppointment($appointment)) {
        $_SESSION['success_message'] = "Appointment added successfully!";
        header("Location: ../View/employee_dashboard.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Adding appointment failed. Please try again!";
        header("Location: ../View/appointment.php");
        exit();
    }
}
 else {
    header("Location: ../View/appointment.php");
    exit();
}
}
else {
    header("Location: ../View/appointment.php");
    exit();
}

?>
