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
$firstNames = isset($_COOKIE['first-name']) ? $_COOKIE['first-name'] : '';
$emails = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : '';
$bloodGroup = isset($_COOKIE['blood-group']) ? $_COOKIE['blood-group'] : '';
$religion = isset($_COOKIE['religion']) ? $_COOKIE['religion'] : '';
$city = isset($_COOKIE['city']) ? $_COOKIE['city'] : '';
$country = isset($_COOKIE['country']) ? $_COOKIE['country'] : '';
$last_name=isset($_COOKIE['last-name'])?$_COOKIE['last-name']:'';
$father_name=isset($_COOKIE['father-name'])?$_COOKIE['father-name']:'';
$mother_name=isset($_COOKIE['mother-name'])?$_COOKIE['mother-name']:'';
$message=isset($_COOKIE['message'])?$_COOKIE['message']:'';
$postcode=isset($_COOKIE['postcode'])?$_COOKIE['postcode']:'';
$user_name=isset($_COOKIE['user-name'])?$_COOKIE['user-name']:'';
$phone=isset($_COOKIE['phone'])?$_COOKIE['phone']:'';
$website=isset($_COOKIE['website'])?$_COOKIE['website']:'';
?>

<html>
<head>
 
    <link rel="stylesheet" type="text/css" href="CSS/signUp.css">
    <script src="../JS/signUp.js"></script>
    <header>
        <table>
            <tr>
                <td style="color:#fff ;">XYZ bank</td>
                <td><a href="login.php">Already registered?</a></td>   
            </tr>
        </table>
    </header>
    

 
</head>

<body>

    <div class="signup-container"> <!-- signup-container class -->
        <h2 style="text-align: center; font-style: italic ;">Signup Page</h2>
        <form method="post" action="../controller/reg.php" autocomplete="off" novalidate onsubmit="return validateAllFields()">
         
        <h3><b>Last Modified on: </b>  
            <span id="lastModified"></span> 
            </h3>
   
   
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
                            <input type="text" id="first-name" name="first-name" value="<?= $firstNames ?>">
                            <span id="error1" style="color: red;"></span>

                                   

                     </td>
                    </tr>
                             <tr>
                                 <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="last-name"> Last Name</label></th>
                                        <td>:</td>
                                        <td><input type="text" id="last-name" name="last-name" value="<?=$last_name?>">
                                        <span id="error2" style="color: red;"></span>
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
                                <input type="radio" name="gender" value="Male" id="male" <?= $gender == 'Male' ? 'checked' : '' ?>>
                              <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="Female" <?= $gender == 'Female' ? 'checked' : '' ?>>
                            <label for="female">Female</label>
                            <span id="error7" style="color: red;"></span>
                             <?php echoErrorMessage("gender")?>
                            </td>

                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="father-name"> Father's Name</label></th>
                                <td>:</td>
                                <td><input type="text" id="father-name" name="father-name"  value="<?=$father_name?>">
                                <?php echoErrorMessage('father-name'); ?>
                                <span id="error3" style="color: red;"></span>
                            </td>
                              
                                
                                </tr>
                                <tr>
                                     <td><br></td>
                                </tr>

                                <tr>
                                    <th><label for="mother-name"> Mother's Name</label></th>
                                    <td>:</td>
                                    <td><input type="text" id="mother-name" name="mother-name" value="<?=$mother_name?>">
                                    <?php echoErrorMessage('mother-name'); ?>
                                    <span id="error4" style="color: red;"></span>
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
                              <option value="" <?= $bloodGroup == '' ? 'selected' : '' ?>>Select Blood Group</option>
                              <option value="A+" <?= $bloodGroup == 'A+' ? 'selected' : '' ?>>A+</option>
                              <option value="A-" <?= $bloodGroup == 'A-' ? 'selected' : '' ?>>A-</option>
                              <option value="B+" <?= $bloodGroup == 'B+' ? 'selected' : '' ?>>B+</option>
                              <option value="B-" <?= $bloodGroup == 'B-' ? 'selected' : '' ?>>B-</option>
                              <option value="AB+" <?= $bloodGroup == 'AB+' ? 'selected' : '' ?>>AB+</option>
                               <option value="AB-" <?= $bloodGroup == 'AB-' ? 'selected' : '' ?>>AB-</option>
                              <option value="O+" <?= $bloodGroup == 'O+' ? 'selected' : '' ?>>O+</option>
                               <option value="O-" <?= $bloodGroup == 'O-' ? 'selected' : '' ?>>O-</option>
                               </select>
                                   <?php echoErrorMessage('blood-group') ?>
                                   <span id="error8" style="color: red;"></span>

                               </td>
                                </tr>
                                <tr><td><br></td></tr>
                                                            
                                    <tr>
                                        <th> <label for="religion"> Religion <label</th>
                                          <td>:</td>
                                                                <td>
                                                                <select id="religion" name="religion">
                                               <option value="" <?= $religion == '' ? 'selected' : '' ?>>Please select religion</option>
                                               <option value="Islam" <?= $religion == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                                 <option value="Hinduism" <?= $religion == 'Hinduism' ? 'selected' : '' ?>>Hinduism</option>
                                                <option value="Other" <?= $religion == 'Other' ? 'selected' : '' ?>>Other</option>
                                                   </select>
                                        <?php echoErrorMessage('religion') ?>
                                        <span id="error9" style="color: red;"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                        </table>
                                                       
                                                    </fieldset>
                                                    <input type="submit" name="register" value="Register">
                                                    <input type="submit" name="save_draft" value="Save as Draft" onclick="return updateLastModifiedAndSaveDraft();">
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
                                                                <td><input type="email" id="email"   name="email" placeholder="example@example.com"value="<?= $emails ?>">
                                                               <?php echoErrorMessage('email') ?>
                                                               <span id="error6" style="color: red;"></span>
                                                                </td>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="phone">Phone</label></th>
                                                                <td>:</td>
                                                                <td><input type="tel" id="phone" name="phone" placeholder="+880.." value="<?= $phone?>">
                                                                <?php echoErrorMessage('phone') ?>     
                                                                <span id="error12" style="color: red;"></span>                                                      
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                            <tr>
                                                                <th><label for="website"> Website</label></th>
                                                                <td>:</td>
                                                                <td><input type="url" id="website" name="website" placeholder="http://www.example.com" value="<?=$website?>">
                                                                <?php echoErrorMessage('website') ?>  
                                                                <span id="error13" style="color: red;"></span>
                                                            
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
    <option value="" <?= $country == '' ? 'selected' : '' ?>>Select a country</option>
    <option value="Bangladesh" <?= $country == 'Bangladesh' ? 'selected' : '' ?>>Bangladesh</option>
    <option value="Canada" <?= $country == 'Canada' ? 'selected' : '' ?>>Canada</option>
    <option value="India" <?= $country == 'India' ? 'selected' : '' ?>>India</option>
    <option value="Pakistan" <?= $country == 'Pakistan' ? 'selected' : '' ?>>Pakistan</option>
    <option value="United States of America" <?= $country == 'United States of America' ? 'selected' : '' ?>>United States of America</option>
    <option value="Others" <?= $country == 'Others' ? 'selected' : '' ?>>Others</option>
</select>                                                                   <span id="error10" style="color: red;"></span>
                                                                        <?php echoErrorMessage('country') ?>  
                                                                        <select id="city" name="city">
    <option value="" <?= $city == '' ? 'selected' : '' ?>>Select a City</option>
    <option value="Dhaka" <?= $city == 'Dhaka' ? 'selected' : '' ?>>Dhaka</option>
    <option value="Dinajpur" <?= $city == 'Dinajpur' ? 'selected' : '' ?>>Dinajpur</option>
    <option value="Potuakhali" <?= $city == 'Potuakhali' ? 'selected' : '' ?>>Potuakhali</option>
    <option value="Rajshahi" <?= $city == 'Rajshahi' ? 'selected' : '' ?>>Rajshahi</option>
    <option value="Others" <?= $city == 'Others' ? 'selected' : '' ?>>Others</option>
</select>            <span id="error11" style="color: red;"></span>
                     <?php echoErrorMessage('city') ?>  
                                                                    
  <br>
                  <textarea name="message" id="message" rows="6" cols="30" placeholder="Road/Street/City"><?= $message ?></textarea>
                  <span id="error15" style="color: red;"></span>
         <?php echoErrorMessage('message') ?>
      <input type="text" id="postcode" name="postcode" placeholder="Post Code"value="<?=$postcode?>">
      <?php echoErrorMessage('postcode') ?>
      <span id="error14" style="color: red;"></span>
                                                                        
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
                                                                    <input type="text" id="user-name" name="user-name"value="<?=$user_name?>">
                                                                    <span id="error5" style="color: red;"></span>
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
                                                                    <span id="error16" style="color: red;"></span>
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
                                                                    <span id="error17" style="color: red;"></span>
                                                                    <?php echoErrorMessage('password') ?>

                                                                </td>

                                                            </tr>

                                                        </table>
                                                    </fieldset>

                                                   
                                                    
                                                </td>

                                                <?php

                              if (isset($_SESSION['error_message'])) {
                                   $error_message = $_SESSION['error_message'];
                                   unset($_SESSION['error_message']); 
                                     }
                                     ?>
                                                  
                                              
                                            </tr>
                                        </table>
            </form>
            </div>
            <footer>
           <?php include 'Footer.html'; ?> 
        </footer>                  
                    </body>
                    
               
                        </html>