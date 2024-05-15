

<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Verify Otp</h2>
    <form method="POST" action="../controller/otpcheck.php" >
     
     
     <table>
    
          <br>
          <tr>
             <th><label for="OTP">OTP</label></th>
             <td>:</td>
             <td>
             <input type="text" id="OTP" name="otp" >
             <span id="error1" ></span>
             </td>
         </tr>
    
    

    
    </table>
    <input type="submit" value="Submit" onclick="return otpvalidate()">
 </form>  
    <br>
    <footer>powered by @abc bank</footer>
    <script src="otpscript.js"></script>
</body>
</center>
    </html>









