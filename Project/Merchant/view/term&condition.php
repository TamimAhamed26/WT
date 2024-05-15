<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../view/login.php");
}

$userinfo=$_SESSION['userInfo'];
?>


<html>
    <center>
    <head>
        <title>banking app</title>
        <link rel="stylesheet" href="overview.css">
        <style>
        div {
        background-color: coral;
        width: 850px;
        height: 600px;
        border: 1px solid black;
        overflow: scroll;
        }
        </style>
    </head>
    

    <body>
    <h1>ABC BANGKING</h1>
    <h2>Terms & Condition </h2>
        <form action="../controller/loanprocess_aftrterms.php" aoutocomplete="off" novalidate method="post">
            
        <div>
            <b><u>Terms & Conditions</b></u>
            <table>
                <tr>
                    <td><b>1.<u> Loan Limit </b></u></td><td>BDT 50,000/-(Fifty thousand) to BDT 500,000,00/-(Five crore)<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>2.<u>Criteria of Borrower: </b></u></td><td>Bangladeshi Citizen minimum 18 (eighteen) years old;<br>
                                                                        Loan defaulter, Bank-rupt, Mentally wreaked person cannot apply for loan;<br>
                                                                        Women Entrepreneurs highly encourage to apply.<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>3.<u> Nature of Project/Enterprise: </b></u></td><td>i. Proprietorship Enterprise;<br>
                                                                                ii. Registered Partnership Enterprise;<br>
                                                                                iii. Private Limited Company;<br>
                                                                                iv. Joint Venture Company except Public Limited Company.<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>4.<u> Security </b></u></td><td>i. The collateral security free loan limit for male entrepreneurs is upto Tk. 5 lac.<br>
                                                            ii. The collateral security free loan limit for women entrepreneurs is upto Tk. 10 lac.<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>5.<u> Period: </b></u></td><td>i. Project/Term Loan: Maximum 5 years (project period may flexible according to Project nature).<br>
                                                            ii. Working capital/Trading Loan : 1 year, renewable at the end of period.<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>6.<u> Loan: Equity Ratio </b></u></td><td>i. Project/Term Loan: 70:30<br>
                                                                    ii. Working capital/Trading Loan : 75:25<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    <td><b>7.<u> Repayment procedure: </b></u></td><td>i. Project/Term Loan: monthly/quarterly basis repayable within loan period.<br>
                                                                    ii. Working capital/Trading Loan: Daily basis or fully repayment within loan period.<br><br>
                    </td>
                </tr>
                <tr><br><br></tr>
        </table>
        </div><br><br>
        <input type="checkbox" id="check" name="check"><label for="check"> I have checked all the conditions. I agree with this conditions.</label><br><br>
        <?php if(isset($_SESSION['checkboxerror'])){ echo $_SESSION['checkboxerror']; unset($_SESSION['checkboxerror']); } ?><br><br>
        <input type="submit" value="Request" > <input type="submit" value="Back" formaction="../view/loanprocess.php">

        </form>
    <footer>powered by @abc bank</footer>
</body>
</center>
    </html>