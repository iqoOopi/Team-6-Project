<?php
    session_start();
?>
<!DOCTYPE html>
<html class="register-bg">
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>

    <body class="register">
        <?php
                include_once("header.php");
        ?>

        <main>
            <form action="" method="POST" name="registerForm">
                
                <p class="label-head">Passenger Information</p>

                <div class="form-box">
                    <label for="f_name">First Name</label>
                    <input id="f_name" type="text" name="firstName" placeholder="First Name" required>
                    <div class="text-box">
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your first name</p>
                    </div>
                </div>
                
                <div class="form-box">
                    <label for="l_name">Last Name</label>
                    <input id="l_name" type="text" name="lastName" placeholder="Last Name" required>
                    <div class="text-box">
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your last name</p>
                    </div>
                </div>

                <div class="form-box">
                    <label  for="dob">Birthdate</label>
                    <input id="dob" type="date" name="bday" required>
                    <div class="text-box">
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please select your birthday</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="addr">Address</label> 
                    <input id="addr" type="text" name="address" placeholder="Address" required>
                    <div class="text-box">
                        <p id="addressDescription" style="display:none;">E.g. Suite 1221, 123 Street</p>
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your address</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="city">City</label> 
                    <input id="city" type="text" name="city" placeholder="City" required>
                    <div class="text-box">
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your city</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="prov">Province</label> 
                    <select id="prov" name="province" required>
                        <option value="AB">AB</option>
                        <option value="NL">NL</option>
                        <option value="PE">PE</option>
                        <option value="NS">NS</option>
                        <option value="NB">NB</option>
                        <option value="QC">QC</option>
                        <option value="ON">ON</option>
                        <option value="MB">MB</option>
                        <option value="SK">SK</option>
                        <option value="BC">BC</option>
                        <option value="YT">YT</option>
                        <option value="NT">NT</option>
                        <option value="NU">NU</option>
                    </select>
                </div>

                <div class="form-box">
                    <label for="postal">Postal Code</label> 
                    <input id="postal" type="text" name="post" placeholder="A1A 1A1" pattern="^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$" maxlength="7" required title="Please enter your Postal Code">
                    <div class="text-box">
                        <p id="postalDescription" style="display:none;">E.g. T2M 0L4</p>
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your postal code</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="phone">Phone Number</label>
                    <input id="phone" type="tel" name="tel_num" placeholder="Phone Number" required>
                    <div class="text-box">
                        <p id="phoneDescription" style="display:none;">E.g. (403) 284-7248</p>
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your phone number</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="e_mail">Email</label>
                    <input id="e_mail" type="email" name="email_info" placeholder="Email" required>
                    <div class="text-box">
                        <p id="emailDescription" style="display:none;">E.g. firstname.lastname@sait.ca</p>
                        <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your email</p>
                    </div>
                </div>

                <div class="form-box">
                    <label for="passenger">Number of Passengers</label>
                    <select id="passenger" name="num_passenger" >
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="10+">10+</option>
                    </select>
                </div>


                <input id="btn" type="submit">
                <input type="reset">

            </form>
        </main>
		
        <script src="scripts/script.js"></script> 
    </body>
</html>
