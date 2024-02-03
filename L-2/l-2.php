<?php
  
?>

<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <form action="action_page.php" autocomplete="off"  method="post" >

    <table>
        <tr>
            <td>
                <fieldset>
            
                    <table>
                        <legend>General Information:</legend>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>First Name</th>
                            <td>:</td>
                            <td><input type="text" name="first-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Last Name</th>
                            <td>:</td>
                            <td><input type="text" name="last-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Father's Name</th>
                            <td>:</td>
                            <td><input type="text" name="father-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Mother's Name</th>
                            <td>:</td>
                            <td><input type="text" name="mother-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>:</td>
                            <td>
                                <select name="blood-group" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Religion</th>
                            <td>:</td>
                            <td><input type="text" name="religion" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    </table>
                </fieldset>
            </td>
            <td>
                <fieldset>
                    <table>
                        <legend>Contact Information:</legend>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td><input type="email" name="email" required placeholder="example@example.com"></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Phone/Mobile</th>
                            <td>:</td>
                            <td><input type="tel" name="phone" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Website</th>
                            <td>:</td>
                            <td><input type="url" name="website" required placeholder="http://www.example.com"></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Present Address</th>
                            <td>:</td>
                            <td><input type="text" name="address" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
    
    <input type="submit" value="Submit">

    <input type="reset" value="Reset">
    

    </form>

</body>
</html>
