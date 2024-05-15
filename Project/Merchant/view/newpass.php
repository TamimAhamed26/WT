

<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Ceate New Password</h2>
    
    <form method="POST" action="../controller/newpasscheck.php" novalidate>
     
     
    <table>
             <br>
             <tr>
                <th><label for="PASS">New Pass</label></th>
                <td>:</td>
                <td>
                <input type="text" id="PASS" name="Pass" >
                <span id="error1" ></span>
                </td>
            </tr>
       
       </table>

       <input type="submit" value="Set Password" onclick="return validate()">
    </form>


    <br>
    <footer>powered by @abc bank</footer>
    <script src="newpassscript.js"></script>
</body>
</center>
    </html>

















