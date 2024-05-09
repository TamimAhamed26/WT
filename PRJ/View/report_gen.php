<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Generation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div align="right">
        <a href="user_dashboard.php">Back</a>
    </div>
    <h1>Report Generation</h1>
    <form id="report-form" method="POST">
        <label for="report_type">Select Report Type:</label>
        <select name="report_type" id="report_type">
            <option value="User Activities" <?php echo isset($_POST["report_type"]) && $_POST["report_type"] == "User Activities" ? 'selected' : ''; ?>>User Activities</option>
            <option value="Account Balances" <?php echo isset($_POST["report_type"]) && $_POST["report_type"] == "Account Balances" ? 'selected' : ''; ?>>Account Balances</option>
            <option value="Transaction Summaries" <?php echo isset($_POST["report_type"]) && $_POST["report_type"] == "Transaction Summaries" ? 'selected' : ''; ?>>Transaction Summaries</option>
        </select>
        <br>
        <button type="submit" name="generate_report">Generate Report</button>
        <button type="button" id="export-report-btn">Export Report as PDF</button>
        <?php
        if (isset($_POST["report_type"])) {
            echo '<h2>' . $_POST["report_type"] . '</h2>';
        }
        ?>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate_report"])) {
        include '../controller/report_gen_process.php';
        if (isset($table_html)) {
            echo $table_html;
        }
    }
    ?>

<script>
    document.getElementById('export-report-btn').addEventListener('click', function() {
        var reportType = document.getElementById('report_type').value;
        var form = document.getElementById('report-form');
        // Store the original action
        var originalAction = form.action;
        // Set the action to export_report.php
        form.action = '../controller/export_report.php';
        // Submit the form
        form.submit();
        // Reset the form's action to its original state or to an empty string
        form.action = originalAction || '';
    });
</script>

</body>
</html>