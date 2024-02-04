<?php
  
?>

<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <form action="action_page.php" autocomplete="off"  method="post" target="_blank" >

    <table>
        <tr>
            <td>
                <fieldset>
            
                    <table>
                        <legend>General Information:</legend>
                        <tr><td><br></td></tr>
                        <tr>
                            <th><label for="first-name">First Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="first-name" name="first-name" required>
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th><label for="last-name"> Last Name></label></th>
                            <td>:</td>
                            <td><input type="text" id="last-name" name="last-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="father-name"> Father's Name</label></th>
                            <td>:</td>
                            <td><input type="text" id="father-name" name="father-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="mother-name"> Mother's Name</label></th>
                            <td>:</td>
                            <td><input type="text" id="mother-name" name="mother-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th> <label for="blood-group"> Blood Group<label</th>
                            <td>:</td>
                            <td>
                                <select id="blood-group" name="blood-group"required>
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
                            <td>
                                <input type="radio" name="religion" value="Islam" required> Islam
                                <input type="radio" name="religion" value="Hindu" required> Hindu
                                <input type="radio" name="religion" value="Christian" required> Christian
                                <input type="radio" name="religion" value="Other" required> Other
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Hobbies</th>
                            <td>:</td>
                            <td>
                                <input type="checkbox" name="hobbies[]" value="Reading"> Reading
                                <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming
                                <input type="checkbox" name="hobbies[]" value="Sports"> Sports
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th><label for ="date_of_birth"> Date of Birth</label></th>
                            <td>:</td>
                            <td><input type="date" id="date_of_birth" name="date_of_birth" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Password</th>
                            <td>:</td>
                            <td><input type="password" name="password" required></td>
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
                            <th for>Email </th>
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
