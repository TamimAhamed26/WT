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
    <form action="../Controller/action_page.php" autocomplete="off" method="post" novalidate target="_self">

    <h3><b>Last Modified on: </b>
    <?php
    if (isset($_COOKIE['last_modified'])) {
        echo $_COOKIE['last_modified'];
    } else {
        echo ""; // Default message if the cookie is not set
    }
    ?>

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

                                     <?php echoErrorMessage('first-name'); ?>
                     </td>
                    </tr>
                             <tr>
                                 <td><br></td>
                            </tr>
                            <tr>
                                <th><label for="last-name"> Last Name</label></th>
                                        <td>:</td>
                                        <td><input type="text" id="last-name" name="last-name" value="<?=$last_name?>">
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
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                            </tr>

                                                        </table>
                                                       
                                                    </fieldset>
                                                    <input type="submit" name="register" value="Register">
                                                    <input type="submit" name="save_draft" value="Save as Draft">
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
                                                                <td><input type="email" id="email" name="email" placeholder="example@example.com"value="<?= $emails ?>">
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
                                                                <td><input type="tel" id="phone" name="phone" placeholder="+880.." value="<?= $phone?>">
                                                                <?php echoErrorMessage('phone') ?>                                                           
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
</select>
                                                                        <?php echoErrorMessage('country') ?>  
                                                                        <select id="city" name="city">
    <option value="" <?= $city == '' ? 'selected' : '' ?>>Select a City</option>
    <option value="Dhaka" <?= $city == 'Dhaka' ? 'selected' : '' ?>>Dhaka</option>
    <option value="Dinajpur" <?= $city == 'Dinajpur' ? 'selected' : '' ?>>Dinajpur</option>
    <option value="Potuakhali" <?= $city == 'Potuakhali' ? 'selected' : '' ?>>Potuakhali</option>
    <option value="Rajshahi" <?= $city == 'Rajshahi' ? 'selected' : '' ?>>Rajshahi</option>
    <option value="Others" <?= $city == 'Others' ? 'selected' : '' ?>>Others</option>
</select>
                                                                        <?php echoErrorMessage('city') ?>  
                                                                    

                                                                       <br>
                                                                       <textarea name="message" rows="6" cols="30" placeholder="Road/Street/City"><?= $message ?></textarea>

                                                                        <?php echoErrorMessage('message') ?>
                                                                        <input type="text" id="postcode" name="postcode" placeholder="Post Code"value="<?=$postcode?>"><?php echoErrorMessage('postcode') ?>
                                                                        
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

                                                   
                                                    
                                                </td>



                                              
                                            </tr>
                                        </table>
    </form>



                                </body>
                                </html>