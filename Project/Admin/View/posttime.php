<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Time Clock</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #clock {
            font-size: 36px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        div.align-right {
            text-align: right;
            padding: 10px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
        
<div class="align-right">
        <a href="user_dashboard.php">Back</a>
    </div>
    <div>
        <h1>Real Time Clock</h1>
        <div>
            <select id="formatSelect">
                <option value="local12">Local Time (12-hour)</option>
                <option value="local24">Local Time (24-hour)</option>
                <option value="gmt">GMT Time</option>
             
            </select>
        </div>
        <div id="clock">Loading...</div>
    </div>

    <script src="../JS/clock.js"></script>
</body>
</html>
