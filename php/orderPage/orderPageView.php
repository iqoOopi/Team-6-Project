<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *Purpose: the view of order form
    *
    *************************************************
 -->
<?php
    include_once '..\top.php';
    include_once '..\functions.php';
    include_once '..\packageClass.php';
    if (!isset($_SESSION["customer"]) || $_SESSION["customer"] === false) {
        header("Location: $_root/php/customerLogin.php");
    }

?>
<!DOCTYPE html>
<html class="orderPage-bg">

<head>
    <title>Order Page</title>
    <meta charset="utf-8">
    <?php
        print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
    ?>
</head>

<body class="orderPage">
    <?php
        include_once "..\header.php";
    ?>
    <main>
        <?php
            $pkgId = $_POST['pkgId'];
            $pkg   = getInstants('packages', 'package', $pkgId);
        ?>
        <!-- Booking Date will be added in controller,
                 Package Id will be received from order button in list page.
            -->
        <form action="orderModel.php" method="POST" name="orderForm" id="orderForm">

            <p class="label-head">Order Information</p>

            <!-- show selected Package -->
            <div class="form-box">
                <label for="orderFormPackageName">Package Selected:</label>
                <input id="orderFormBPackageName" type="text" <?php echo ("value={$pkg->getPkgName()}"); ?> disabled>
            </div>

            <div class="form-box">
                <input id="orderFormBPackageId" name="packageId" type="hidden" <?php echo ("value=$pkgId"); ?>>
            </div>

            <!-- Account Num for getting customer Id, later will be replaced if customer logged in -->
            <!-- <div class="form-box">
                <label for="orderFormAccountNum">Account Num:</label>
                <input id="orderFormAccountNum" type="text" name="customerId" placeholder="accountNum" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your Account Num</p>
                </div>
            </div> -->


            <!-- BookingDate -->
            <div class="form-box">
                <input id="orderFormBookingDate" type="hidden" name="BookingDate"
                    <?php $now=time();echo ("value=$now"); ?>>
            </div>

            <!-- BookingNo, should it be added later by agent?
            <div class="form-box">
                <label for="orderFormBookingNo">Booking No.:</label>
                <input id="orderFormBookingNo" type="text" name="BookingNo"
                    placeholder="should it be added later by agent?" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your BookingNo</p>
                </div>
            </div> -->

            <!-- ItineraryNo, should it be added later by agent?
            <div class="form-box">
                <label for="orderFormItineraryNo">ItineraryNo:</label>
                <input id="orderFormItineraryNo" type="text" name="ItineraryNo"
                    placeholder="should it be added later by agent?" required>
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your ItineraryNo</p>
                </div>
            </div> -->

            <!-- TripStart Date, later will be replaced by a date calender selector -->
            <div class="form-box">
                <label for="orderFormTripStart">Trip Start Date:</label>
                <input id="orderFormTripStart" type="text" name="TripStart"
                    <?php echo ("value={$pkg->getStartDate()}"); ?> disabled>
                <!-- <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please select your Trip Start Date
                    </p>
                </div> -->
            </div>

            <!-- show Trip End Date -->
            <div class="form-box">
                <label for="orderFormTripEndDate">Last Day for Your Trip:</label>
                <input id="orderFormTripEndDate" type="text" <?php echo ("value={$pkg->getEndDate()}"); ?> disabled>
            </div>

            <!-- Trip Type Selector, should it be added later by agent? -->
            <div class="form-box">
                <label for="orderFormTripType">Trip Type</label>
                <select id="orderFormTripType" name="TripTypeId" required>
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
                <select id="orderFormTravelerCount" name="TravelerCount" onchange="myFunction()">
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
                <input id="orderFormTotalPrice" type="text" <?php echo "value={$pkg->getPrice()}" ?> disabled>
            </div>

            <input id="btn" type="submit" name="CheckOut">
            <input type="reset">

        </form>
    </main>

    <!-- update Total Price on the go -->
    <script>
    function myFunction() {
        var pkgPrice = <?php print($pkg->getPrice());?>;
        var numTravellers = document.getElementById("orderFormTravelerCount").value;
        if (numTravellers != "10+") {
            document.getElementById("orderFormTotalPrice").value = pkgPrice * numTravellers;
        } else {
            document.getElementById("orderFormTotalPrice").value = "Please contact us";
        }
    }
    </script>
    <?php
        print("<script src=\"$_root/scripts/script.js\"></script>");
        print("<script src=\"$_root/scripts/checkFormInputEmpty.js\"></script>");
    
    ?>
</body>

</html>
