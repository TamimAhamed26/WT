<?php
session_start(); 

$fieldNames = array(
    'first-name' => '',
    'last-name' => '',
    'father-name' => '',
    'mother-name' => '',
    'message' => '',
    'postcode' => '',
    'user-name' => '',
    'password' => '',
    'email' => '',
    'website' => '',
    'phone'=>'',
    'gender'=>'',
    'blood-group'=>'',
    'religion'=>'',
    'city'=>'',
    'country'=>'',
     
);

foreach ($fieldNames as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . '_error'])) {
        $fieldNames[$fieldName] = $_SESSION[$fieldName . '_error'];
        unset($_SESSION[$fieldName . '_error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $fieldNames;
    if (($fieldNames[$fieldName])) {
        echo $fieldNames[$fieldName];
    }
}

?>

<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <form action="action_page.php" autocomplete="off" method="post" novalidate target="_self">

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
                                    <input type="text" id="first-name" name="first-name" >
                                  <?php echoErrorMessage('first-name'); ?>
                                </td>
                            </tr>
                             <tr>
                                 <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="last-name"> Last Name</label></th>
                                        <td>:</td>
                                        <td><input type="text" id="last-name" name="last-name" >
                                        <?php echoErrorMessage('last-name'); ?>
                                    </td>
                                   

                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>

                            <tr>
                            <th>Gender</th>
                            <td>:</td>
                            <td>
                                    <input type="radio" name="gender" value="Male" id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="Female">
                                    <label for="female"> Female</label>
                                    <?php echoErrorMessage("gender")?>
                                   

                                </td>

                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="father-name"> Father's Name</label></th>
                                <td>:</td>
                                <td><input type="text" id="father-name" name="father-name"  >
                                <?php echoErrorMessage('father-name'); ?>
                            </td>
                              
                                
                                </tr>
                                <tr>
                                     <td><br></td>
                                </tr>

                                <tr>
                                    <th><label for="mother-name"> Mother's Name</label></th>
                                    <td>:</td>
                                    <td><input type="text" id="mother-name" name="mother-name" >
                                    <?php echoErrorMessage('mother-name'); ?>
                                </td>
                                    
                               
                                </tr>
                                <tr>
                                     <td><br></td>
                                </tr>
                                <tr>
                                    <th> <label for="blood-group"> Blood Group<label</th>
                                    <td>:</td>
                                <td>
                                <select id="blood-group" name="blood-group">
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
                                <?php echoErrorMessage('blood-group') ?>
                                
                                 </td>
                                </tr>
                                <tr><td><br></td></tr>
                                                            
                                    <tr>
                                        <th> <label for="religion"> Religion <label</th>
                                          <td>:</td>
                                                                <td>
                                        <select id="religion" name="religion">
                                                                        <option value="">Please select religion</option>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Hinduism">Hinduism</option>
                                                                        <option value="Other">Other</option>

                                        </select>
                                        <?php echoErrorMessage('religion') ?>
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
                                                                <td><input type="email" id="email" name="email" placeholder="example@example.com" >
                                                               <?php echoErrorMessage('email') ?>
                                                                </td>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="phone">Phone/Email</label></th>
                                                                <td>:</td>
                                                                <td><input type="tel" id="phone" name="phone" placeholder="+880..">
                                                                <?php echoErrorMessage('phone') ?>                                                           
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="website"> Website</label></th>
                                                                <td>:</td>
                                                                <td><input type="url" id="website" name="website" placeholder="http://www.example.com">
                                                                <?php echoErrorMessage('website') ?>  
                                                            
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
                                                                        <select id="country" name="country">
                                                                            <option value="">Select a country</option>
                                                                            <option value="Bangladesh">Bangladesh</option>
                                                                            <option value="Canada">Canada</option>
                                                                            <option value="India">India</option>
                                                                            <option value="Pakistan">Pakistan</option>
                                                                            <option value="United States of America">United States of America</option>
                                                                            <option value="Others">Others</option>
                                                                        </select>
                                                                        <?php echoErrorMessage('country') ?>  
                                                                        <select id="city" name="city">
                                                                            <option value="">Select a City</option>
                                                                            <option value="Dhaka">Dhaka</option>
                                                                            <option value="Dinajpur">Dinajpur</option>
                                                                            <option value="Potuakhali">Potuakhali</option>
                                                                            <option value="Rajshahi">Rajshahi</option>
                                                                            <option value="Others">Others</option>                                          
                                                                        </select>
                                                                        <?php echoErrorMessage('city') ?>  
                                                                    

                                                                       <br>
                                                                        <textarea name="message" rows="6" cols="30" placeholder="Road/Street/City"></textarea>
                                                                        <?php echoErrorMessage('message') ?>
                                                                        <input type="text" id="postcode" name="postcode" placeholder="Post Code"><?php echoErrorMessage('postcode') ?>
                                                                        
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
                                                                    <input type="text" id="user-name" name="user-name">
                                                                    <?php echoErrorMessage('user-name') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>
                                                            <tr>
                                                                <th><label for="password">Password</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="password" id="password" name="password">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="confirm-password">Confirm Password</label></th>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="password" id="confirm-password" name="confirm-password">
                                                                    <?php echoErrorMessage('password') ?>

                                                                </td>

                                                            </tr>

                                                        </table>
                                                    </fieldset>

                                                    <input type="submit" value="Register">
                                                    <input type="submit" name="save_draft" value="Save as Draft">
                                                    
                                                </td>



                                              
                                            </tr>
                                        </table>
    </form>



                                </body>
                                </html>
