<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--Viewport Meta Tag,for Mobile devices-->
    <meta name="viewport" content="width=device-width" , inital-scale="1.0">

    <title>Brent Ward - Travel Experts Register</title>
    
    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body id="registerBody">
    <!--Site Header: Logo, Title, Nav Bar-->
    <?php
    $currentPage = "register";
    include_once("header.php");
    include_once("menu.php");
    ?>
    <!--Registration Form-->
    <main class="registerMain">
        <p id="regHeader">Register an Account:</p>

        <form class="myForm" action="" name="myForm" id="registerForm">
            <!--Main account info-->
            <div>
                <p>[Personal Infomation]</p>
                <fieldset>
                    <label for="email">Email:</label> <input id="email" type="email" name="email" placeholder="Enter Email"
                        required>
                    <p name="emailTT" id="emailTT">Please enter a valid email.</p><br>
                    <label for="password">Password:</label> <input id="password" type="password" name=password
                        placeholder="Enter a Password" required>
                    <p name="passwordTT" id="passwordTT">Please enter a password here.</p><br>
                    <label for="firstName">First Name:</label> <input id="firstName" type="text" name="firstName"
                        placeholder="Enter First Name" required>
                    <p name="firstNameTT" id="firstNameTT">Please enter your first name here.</p><br>
                    <label for="lastName">Last Name:</label> <input id="lastName" type="text" name="lastName"
                        placeholder="Enter Last Name" required>
                    <p name="lastNameTT" id="lastNameTT">Please enter your last name here.</p><br>
                </fieldset>
            </div>
            <fieldset class="genderFieldSet">
                <!--Gender--> Gender:
                <input id="Male" type="radio" name="gender" value="Male">
                <label for="male">Male</label>
                <input id="female" type="radio" name="gender" value="Female">
                <label for="female">Female</label>
            </fieldset>

            <div>
                <!--Secondary account info-->
                <fieldset>
                    <label for="address">Address:</label><input id="address" type="text" name="address" placeholder="Enter Address"
                        required>
                    <p name="addressTT" id="addressTT">Please enter your address here.</p><br>
                    <label for="city">City:</label><input id="city" type="text" name="city" placeholder="Enter City"
                        required>
                    <label for="province">Province:</label>
                    <select id="province" name="province">
                        <option name="NL" value="userProvince">NL</option>
                        <option name="PE" value="userProvince">PE</option>
                        <option name="NS" value="userProvince">NS</option>
                        <option name="NB" value="userProvince">NB</option>
                        <option name="QC" value="userProvince">QC</option>
                        <option name="ON" value="userProvince">ON</option>
                        <option name="MB" value="userProvince">MB</option>
                        <option name="SK" value="userProvince">SK</option>
                        <option name="AB" value="userProvince">AB</option>
                        <option name="BC" value="userProvince">BC</option>
                        <option name="YT" value="userProvince">YT</option>
                        <option name="NT" value="userProvince">NT</option>
                        <option name="NU" value="userProvince">NU</option>
                    </select><br>
                    <label for="postalCode">Postal Code:</label><input id="postalCode" type="text" name="postalCode"
                        placeholder="Enter Postal Code" required>
                    <p name="postalCodeTT" id="postalCodeTT">Please enter a valid postal Code.</p><br>
                </fieldset>
                <!--Payment info-->
                <p>[Payment Information]</p>
                <fieldset>
                    <label for="cardType">Card Provider:</label>
                    <select id="cardType" name="userCardType">
                        <option name="AE" value="userCardType">American Express</option>
                        <option name="MC" value="userCardType">Mastercard</option>
                        <option name="Visa" value="userCardType">Visa</option>
                    </select><br>
                    <label for="card#">Card Number:</label><input id="card#" type="text" name="cardNumber" placeholder="Enter Credit Card Number"
                        required>
                    <p name="cardNumberTT" id="cardNumberTT">Please enter a valid x digit Card number.</p><br>
                    <label for="expMonth">Exp. Month:</label>
                    <select>
                        <option name="01" value="userCardMonth">01</option>
                        <option name="02" value="userCardMonth">02</option>
                        <option name="03" value="userCardMonth">03</option>
                        <option name="04" value="userCardMonth">04</option>
                        <option name="05" value="userCardMonth">05</option>
                        <option name="06" value="userCardMonth">06</option>
                        <option name="07" value="userCardMonth">07</option>
                        <option name="08" value="userCardMonth">08</option>
                        <option name="09" value="userCardMonth">09</option>
                        <option name="10" value="userCardMonth">10</option>
                        <option name="11" value="userCardMonth">11</option>
                        <option name="12" value="userCardMonth">12</option>
                    </select>
                    <label for="expYear">Exp. Year:</label>
                    <select>
                        <option name="19" value="userCardYear">19</option>
                        <option name="20" value="userCardYear">20</option>
                        <option name="21" value="userCardYear">21</option>
                        <option name="22" value="userCardYear">22</option>
                        <option name="23" value="userCardYear">23</option>
                        <option name="24" value="userCardYear">24</option>
                        <option name="25" value="userCardYear">25</option>
                        <option name="26" value="userCardYear">26</option>
                    </select>
                </fieldset><br>
            </div>

            <!--SecurityQuestion-->
            <div>
                <fieldset>
                    <label for="secureQuestion">Choose a security Question:</label>
                    <select name="secureQuestion" id="secureQuestion">
                        <option name="secureQuestion" value="firstPet">What was the name of your first pet?</option>
                        <option name="secureQuestion" value="cityBorn">What is the name of the city you were born in?</option>
                        <option name="secureQuestion" value="motherMiddle">What is your mother's middle name?</option>
                        <option name="secureQuestion" value="attendHS">What high school did you attend?</option>
                        <option name="secureQuestion" value="buyMusic">What was the first music album you purchased?</option>
                    </select><br>


                    <!--Security Answer-->
                    <label for="secureAnswer" id="secureAnswer">Security Question Answer:</label>
                    <input id="secureAnswer" type="text" name="secureAnswer" placeholder="Enter an anwser" required><br>

                    <!--Buttons-->
                    <input type="submit" id="submitButton">
                    <input type="reset" id="resetButton">
                </fieldset>
                <div class="errorTexts">
                    <!--Empty field errors-->
                    <p id="errorEmail" style="display:none">Please enter an email address!</p>
                    <p id="errorFirstName" style="display:none">Please enter your first name!</p>
                    <p id="errorLastName" style="display:none">Please enter your last name!</p>
                    <p id="errorPassword" style="display:none">Please enter a password</p>
                    <p id="errorAddress" style="display:none">Please enter an address!</p>
                    <p id="errorCity" style="display:none">Please enter a city!</p>
                    <p id="errorPostalCode" style="display:none">Please enter your postal code!</p>
                    <p id="errorCardNumber" style="display:none">Please enter your credit card number!</p>
                </div>
            </div>


        </form><br>
        </div>
    </main>
    <!--Footer with basic Nav bar-->
    <?php include_once("footer.php");?>
</body>

</html>