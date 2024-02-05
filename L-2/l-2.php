<php
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
                            <th><label for="last-name"> Last Name</label></th>
                            <td>:</td>
                            <td><input type="text" id="last-name" name="last-name" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th>Gender</th>
                            <td>:</td>
                            <td>
                                <input type="radio" name="gender" value="Male" id="male" required>
                                <label for="male">Male</label>
                                <input type="radio" id="female"  name="gender" value="Female" required> 
                                <label for="female">Female</label>
                                
                            </td>
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
                            <th> <label for="religion"> Religion <label</th>
                            <td>:</td>
                            <td>
                                <select id="religion" name="religion"required>
                                    <option value="">Please select religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Other">Other</option>
                           
                                </select>
                            </td>
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
                            <th><label for="email"> Email</label></th>
                            <td>:</td>
                            <td><input type="email" id="email" name="email" required placeholder="example@example.com"></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="phone">Phone/Email</label></th>
                            <td>:</td>
                            <td><input type="tel" id="phone" name="phone" required></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for ="website"> Website</label></th>
                            <td>:</td>
                            <td><input type="url" id="website" name="website" required placeholder="http://www.example.com"></td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="address">Address</label></th>
                            <td>:</td>
                            <td>
                            <fieldset>
                               <legend>Present Address</legend>
                               <select id="country" name="country">
                                 <option value="country">Bangladesh</option>
                                 <option value="country">Canada</option>
                                 <option value="country">India</option>
                                 <option value="country">Pakistan</option>
                                 <option value="country">United States of America</option>
                                 <option value="country">Others</option>
                              </select>
                              <select id="city" name="city">
                                 <option value="city">Dhaka</option>
                                 <option value="city">Dinajpur</option>
                                 <option value="city">Potuakhali</option>
                                 <option value="city">Rajshahi</option>
                                 <option value="city">Others</option>
                              </select><br>
                              <textarea name="message" rows="6" cols="30" placeholder="Road/Street/City"></textarea>
                              <input type="text" id="postcode" name="postcode" placeholder="Post Code">
                            </fieldset>
                               </td>
                           </tr>
                    </table>
                </fieldset>
            </td>
            <td>
                <fieldset>
                    <table>
                        <legend>Account Information:</legend>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="user-name">Usertname</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="user-name" name="user-name" required>
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th><label for="password">Password</label></th>
                            <td>:</td>
                            <td>
                                <input type="password" id="password" name="password" required>
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                    
                        <tr>
                            <th><label for="confirm-password">Confirm Password</label></th>
                            <td>:</td>
                            <td>
                                <input type="password" id="confirm-password" name="confirm-password" required>
                            </td>
            </td> 
                   
           
            
            </table>
            </fieldset>  
            <br>
            <input type="submit" value="Register">  

            </td>
          </tr>
        </form>
      
    </table>

</body>
</html>
