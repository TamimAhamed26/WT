<?php
require_once '../model/user_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate_report"])) {
    $report_type = $_POST["report_type"];
    $table_html = generateReport($report_type);
} else {
    header("Location: ../View/login.php");
}