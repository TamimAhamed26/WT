<?php

$user_name = $password = $confirm_password = $gender = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $father_name = $_POST["father-name"];
    $mother_name = $_POST["mother-name"];
    $blood_group = $_POST["blood-group"];
    $religion = $_POST["religion"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $website = $_POST["website"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $address = $_POST["message"];
    $postcode = $_POST["postcode"];
    $user_name = $_POST["user-name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
}

echo '<table>
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
                        <input type="text" id="first-name" readonly value="' . $first_name . '" >
                    </td>
                </tr>
                 <tr>
                     <td><br></td>
                </tr>
                <tr>
                    <th><label for="last-name"> Last Name</label></th>
                            <td>:</td>
                            <td><input type="text" id="last-name"  readonly value="' . $last_name . '" ></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>:</td>
                    <td>
                        <input type="radio"  value="Male" id="male" ' . ($gender == "Male" ? "checked" : "disabled") . '>
                        <label for="male">Male</label>
                        <input type="radio" value="Female" id="female" ' . ($gender == "Female" ? "checked" : "disabled") . '>
                        <label for="female">Female</label>
                    </td>
                </tr>
                
                
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <th><label for="father-name"> Father\'s Name</label></th>
                    <td>:</td>
                    <td><input type="text" id="father-name" name="father-name" readonly value="' . $father_name . '"  ></td>
                    </tr>
                    <tr>
                         <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="mother-name"> Mother\'s Name</label></th>
                        <td>:</td>
                        <td><input type="text" id="mother-name" readonly value="' . $mother_name . '"></td>
                    </tr>
                    <tr>
                         <td><br></td>
                    </tr>
                    <tr>
                    <tr>
                    <th> <label for="blood-group"> Blood Group<label</th>
                    <td>:</td>
                    <td>
                        <select id="blood-group" name="blood-group"  >
                            <option  value=""'    . ($blood_group == "" ? "selected" : "disabled") . '>Select Blood Group </option>
                            <option value="A+" ' . ($blood_group == "A+" ? "selected" : "disabled") . '>A+</option>
                            <option value="A-" ' . ($blood_group == "A-" ? "selected" : "disabled") . '>A-</option>
                            <option value="B+" ' . ($blood_group == "B+" ? "selected" : "disabled") . '>B+</option>
                            <option value="B-" ' . ($blood_group == "B-" ? "selected" : "disabled") . '>B-</option>
                            <option value="AB+" ' . ($blood_group == "AB+" ? "selected" : "disabled") . '>AB+</option>
                            <option value="AB-" ' . ($blood_group == "AB-" ? "selected" : "disabled") . '>AB-</option>
                            <option value="O+" ' . ($blood_group == "O+" ? "selected" : "disabled") . '>O+</option>
                            <option value="O-" ' . ($blood_group == "O-" ? "selected" : "disabled") . '>O-</option>
                        </select>
                    </td>
                </tr>
                
                    <tr><td><br></td></tr>
                                                
                    <tr>
                        <th> <label for="religion"> Religion <label</th>
                        <td>:</td>
                        <td>
                            <select id="religion" name="religion"  >
                                <option value=""   '   . ($religion == "" ? "selected" : "disabled") . ' >Please select religion</option>
                                <option value="Islam" ' . ($religion == "Islam" ? "selected" : "disabled") . '>Islam</option>
                                <option value="Hinduism" ' . ($religion == "Hinduism" ? "selected" : "disabled") . '>Hinduism</option>
                                <option value="Other" ' . ($religion == "Other" ? "selected" : "disabled") . '>Other</option>
                            </select>
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
                        <td><input type="email" id="email" readonly value="' . $email . '"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="phone">Phone/Email</label></th>
                        <td>:</td>
                        <td><input type="tel" readonly value="' . $phone . '"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <th><label for="website"> Website</label></th>
                        <td>:</td>
                        <td><input type="url" id="website" readonly value="' . $website . '"></td>
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
                                <select id="country" name="country" >
                                <option value="Bangladesh"' . ($country == "Bangladesh" ? " selected" : "disabled") . '>Bangladesh</option>
                                <option value="Canada"' . ($country == "Canada" ? " selected" : "disabled") . '>Canada</option>
                                <option value="India"' . ($country == "India" ? " selected" : "disabled") . '>India</option>
                                <option value="Pakistan"' . ($country == "Pakistan" ? " selected" : "disabled") . '>Pakistan</option>
                                <option value="United States of America"' . ($country == "United States of America" ? " selected" : "disabled") . '>United States of America</option>
                                <option value="Others"' . ($country == "Others" ? " selected" : "disabled") . '>Others</option>
                            </select>
                            <select id="city" name="city"  >
                            <option value="Dhaka" ' . ($city == "Dhaka" ? "selected" : "disabled") .'>Dhaka</option>
                            <option value="Dinajpur" ' . ($city =="Dinajpur" ? "selected" : "disabled") .'>Dinajpur</option>
                            <option value="Potuakhali" ' . ($city=="Potuakhali" ? "selected" : "disabled").'>Potuakhali</option>
                            <option value="Rajshahi" '. ($city=="Rajshahi"  ? "selected" : "disabled").'>Rajshahi</option>
                            <option value="Others" '.($city=="Others" ? "selected" : "disabled").'>Others</option>
                        </select><br>
                                <textarea name="message" rows="6" cols="30" readonly>' . $address . '</textarea>
                                <input type="text" readonly value="' . $postcode . '">
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
                            <input type="text" id="user-name"  readonly value="' . $user_name . '">
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="password">Password</label></th>
                        <td>:</td>
                        <td>
                            <input type="password" id="password"  readonly value="' . $password . '" >
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="confirm-password">Confirm Password</label></th>
                        <td>:</td>
                        <td>
                            <input type="password" id="confirm-password" readonly value="' . $confirm_password . '" >
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
        </td>   
    </tr>
</table>';
?>
