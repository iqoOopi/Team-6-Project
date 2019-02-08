<?php
include_once '..\top.php';
?>
<!DOCTYPE html>
<html class="register-bg">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <?php
print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
?>
</head>

<body class="register">
    <?php
include_once "..\header.php";
?>

    <main>
        <!-- Booking Date will be added in controller,
                 Package Id will be received from order button in list page.
            -->
        <form action="" method="POST" name="orderForm">

            <p class="label-head">Order Information</p>

            <!-- show selected Package -->
            <div class="form-box">
                <label for="orderFormPackageName">Package Selected:</label>
                <input id="orderFormBPackageName" type="text" value="demo data" disabled>
            </div>


            <!-- Account Num for getting customer Id, later will be replaced if customer logged in -->
            <div class="form-box">
                <label for="orderFormAccountNum">Account Num:</label>
                <input id="orderFormAccountNum" type="text" name="accountNum" placeholder="accountNum" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your Account Num</p>
                </div>
            </div>

            <!-- BookingNo, should it be added later by agent?-->
            <div class="form-box">
                <label for="orderFormBookingNo">Booking No.:</label>
                <input id="orderFormBookingNo" type="text" name="BookingNo" placeholder="should it be added later by agent?" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your BookingNo</p>
                </div>
            </div>

              <!-- ItineraryNo, should it be added later by agent?  -->
              <div class="form-box">
                <label for="orderFormItineraryNo">ItineraryNo:</label>
                <input id="orderFormItineraryNo" type="text" name="ItineraryNo" placeholder="should it be added later by agent?" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your ItineraryNo</p>
                </div>
            </div>

            <!-- TripStart Date, later will be replaced by a date calender selector -->
            <div class="form-box">
                <label for="orderFormTripStart">Trip Start Date:</label>
                <input id="orderFormTripStart" type="date" name="TripStart" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please select your Trip Start Date
                    </p>
                </div>
            </div>

            <!-- show Trip End Date -->
            <div class="form-box">
                <label for="orderFormTripEndDate">Last Day for Your Trip:</label>
                <input id="orderFormTripEndDate" type="text" value="demo data" disabled>
            </div>

            <!-- Trip Type Selector, should it be added later by agent? -->
            <div class="form-box">
                <label for="orderFormTripType">Trip Type</label>
                <select id="orderFormTripType" name="should it be added later by agent?" required>
                    <option value="B">Business</option>
                    <option value="G">Group</option>
                    <option value="L">Leisure</option>
                </select>
            </div>

            <!-- Flight Class Selector -->
            <div class="form-box">
                <label for="orderFormClassId">Flight Class:</label>
                <select id="orderFormClassId" name="ClassId" required>
                    <option value="BSN">Business</option>
                    <option value="ECN">Economy</option>
                    <option value="FST">First Class</option>
                </select>
            </div>

            <!-- Number of Travelers -->
            <div class="form-box">
                <label for="orderFormTravelerCount">Number of Passengers</label>
                <select id="orderFormTravelerCount" name="TravelerCount">
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

            <!-- show Total Price -->
            <div class="form-box">
                <label for="orderFormTotalPrice">Estimated Total Price:</label>
                <input id="orderFormTotalPrice" type="text" value="demo data" disabled>
            </div>


            <!-- <div class="form-box">
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
                <label for="postal">Postal Code</label>
                <input id="postal" type="text" name="post" placeholder="A1A 1A1"
                    pattern="^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$" maxlength="7" required
                    title="Please enter your Postal Code">
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
            </div> -->

            <input id="btn" type="submit">
            <input type="reset">

        </form>
    </main>

    <?php
print("<script src=\"$_root/scripts/script.js\"></script>");
?>
</body>

</html>