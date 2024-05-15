
<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Forget Password</h2>
        <form action="../controller/frogetpassmerchant.php" aoutocomplete="off" novalidate method="post" >
        <table>
            <tr> <td><br></td> </tr>
            <tr>
                <th><label for="username" >Username</th>
                <td>:</td>
                 <td>
                <input type="text" id="username" name="username" >
                <?php if(isset($_SESSION['user_error'])) {
                          echo $_SESSION['user_error'];
                          unset($_SESSION['user_error']);}?>
                          <span id="error1" ></span>
                </td>
            </tr>
            <tr> <td><br></td> </tr>
            
            <tr> <td><br></td> </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Get OTP"  onclick="return forgetpassvalidate()"></td>
    </table>
    </form>
    <br>
    <footer>powered by @abc bank</footer>
    <script src="forgetpassScript.js"></script>
</body>
</center>
    </html>