<!DOCTYPE html>
<html>
<head>
    <title>Transaction Logs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Transaction Logs</h1>

    <?php
    require_once '../model/user_model.php';

    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM transaction_logs ORDER BY timestamp DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>User ID</th><th>Action</th><th>Timestamp</th><th>IP Address</th><th>Details</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['action'] . "</td>";
            echo "<td>" . $row['timestamp'] . "</td>";
            echo "<td>" . $row['ip_address'] . "</td>";
            echo "<td>" . $row['details'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No transaction logs found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>