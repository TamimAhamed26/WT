<?php
session_start();
if (isset($_SESSION['validated_values'])) {
    
    $validated_values = $_SESSION['validated_values'];
    
    unset($_SESSION['validated_values']);
} else {

    $validated_values = [
        'first-name' => '',
        'last-name' => '',
        'father-name' => '',
        'mother-name' => '',
        'blood-group' => '',
        'religion' => '',
        'email' => '',
        'phone' => '',
        'website' => '',
        'country' => '',
        'city' => '',
        'message' => '',
        'postcode' => '',
        'user-name' => '',
        'gender' => '',
        'password' => ''
    ];
}

echo' 
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Profile</h1>
  

        <table>
            <tr>
                <td>
                    <fieldset>

                        <table>
                            <legend>General Information:</legend>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                              <th><label for="first-name">First Name</label></th>
                                   <td>:</td>
                               <td>
                               <input type="text" id="first-name" name="first-name" readonly value="' . $validated_values['first-name'] . '">

                                   
                     </td>
                    </tr>
                             <tr>
                                 <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="last-name"> Last Name</label></th>
                                        <td>:</td>
                                        <td><input type="text" id="last-name" name="last-name" readonly value="' . $validated_values['last-name'] . '">
                                        
                                    </td>
                                   

                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>

                            <tr>
                            <th>Gender</th>
                            <td>:</td>
                            <td>
                            <input type="radio" name="gender" value="Male" id="male" ' . ($validated_values['gender'] == "Male" ? "checked" : "disabled") . '>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="Female" id="female" ' . ($validated_values['gender'] == "Female" ? "checked" : "disabled") . '>
                            <label for="female">Female</label>
                            <br>
                        </td>

                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="father-name"> Father\'s Name</label></th>
                                <td>:</td>
                                <td><input type="text" id="father-name" name="father-name" readonly value="' . $validated_values['father-name'] . '">
                               
                            </td>
                              
                                
                                </tr>
                                <tr>
                                     <td><br></td>
                                </tr>

                                <tr>
                                    <th><label for="mother-name"> Mother\'s Name</label></th>
                                    <td>:</td>
                                    <td><input type="text" id="mother-name" name="mother-name" readonly value="' . $validated_values['mother-name'] . '">
                                </td>
                                    
                               
                                </tr>
                                <tr>
                                     <td><br></td>
                                </tr>
                                <tr>
                                    <th> <label for="blood-group"> Blood Group<label</th>
                                    <td>:</td>
                                    <td>
                                    <input type="text" id="blood-group" name="blood-group"  readonly value="' . $validated_values['blood-group'] . '">
                                  
                               </td>
                                </tr>
                                <tr><td><br></td></tr>
                                                            
                                    <tr>
                                        <th> <label for="religion"> Religion <label</th>
                                          <td>:</td>
                                                                <td>
                                                                    <input type="text" id="religion" name="religion" readonly value="' . $validated_values['religion'] . '">
                                        
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                        </table>
                                                       
                                                    </fieldset>
                                                   
                                                </td>
                                            
                                                <td>
                                                    <fieldset>
                                                        <table>
                                                            <legend>Contact Information:</legend>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="email"> Email</label></th>
                                                                <td>:</td>
                                                                <td><input type="email" id="email" name="email"  placeholder="example@example.com" readonly value="' . $validated_values['email'] . '">
                                                               
                                                                </td>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="phone">Phone/Email</label></th>
                                                                <td>:</td>
                                                                <td><input type="tel" id="phone" name="phone" placeholder="+880.." readonly value="' . $validated_values['phone'] . '">
                                                                                                                       
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="website"> Website</label></th>
                                                                <td>:</td>
                                                                <td><input type="url" id="website" readonly  name="website" placeholder="http://www.example.com" readonly value="' . $validated_values['website'] . '">
                                                                
                                                            
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="address">Address</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <fieldset>
                                                                        <legend>Present Address</legend>
                                                                      
                                     
                                                                <input type="text"  name="country" readonly value="' . $validated_values['country'] . '">
                                                                <input type="text"  name="city" readonly value="' . $validated_values['city'] . '">
                                                                  <br>
                                                                 <textarea name="message" rows="6" cols="30" readonly>' . $validated_values['website'] . '</textarea>
                                                                <input type="text" readonly value="' . $validated_values['postcode'] . '">

 
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
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="user-name">Username</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" id="user-name" name="user-name"readonly value="' . $validated_values['user-name'] . '">
                                                                  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>
                                                            <tr>
                                                                <th><label for="password">Password</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="password" id="password" name="password" readonly value="' . $validated_values['password'] . '">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="confirm-password">Confirm Password</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="password" id="confirm-password" name="confirm-password" readonly value="' . $validated_values['password'] . '">
                                                                   

                                                                </td>

                                                            </tr>

                                                        </table>
                                                    </fieldset>

                                                   
                                                    
                                                </td>



                                              
                                            </tr>
                                        </table>
 



                                </body>
                                </html>';
                                ?>