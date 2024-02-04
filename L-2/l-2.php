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
                                <input type="radio" name="religion" value="Islam" id="islam" required>
                                <label for="islam">Islam</label>
                                <input type="radio" id="hindu"  name="religion" value="Hindu" required> 
                                <label for="hindu">Hindu</label>
                                <input type="radio" id="christian"  name="religion" value="Christian" required> 
                                <label for="christian">Christian</label>
                                <input type="radio" id="other" name="religion" value="Other" required>
                                <label for="other">Other</label> 
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th>Hobbies</th>
                            <td>:</td>
                            <td>
                                <input type="checkbox" id="reading" name="hobbies[]" value="Reading">
                                 <label for="reading">Reading</label>
                                <input type="checkbox" id="gaming"  name="hobbies[]" value="Gaming"> 
                                <label for="gaming">Gaming</label>
                                <input type="checkbox" id="sport" name="hobbies[]" value="Sports">
                                <label for="sport">Sports</label>
                                <input type="checkbox" id="music" name="hobbies[]" value="Music">
                                <label for="music">Music</label>
                                <input type="checkbox" id="others" name="hobbies[]" value="Others">
                                <label for="others"> Others</label>
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
                            <th><label for="password"> Password</label> </th>
                            <td>:</td>
                            <td><input type="password" id="password" name="password" required></td>
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
