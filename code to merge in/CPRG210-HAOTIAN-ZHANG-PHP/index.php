<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: This is the main landing page for
    *the Travel Experts website.
    *
    *************************************************
 -->
<?php include_once "php/top.php"; ?>
<!DOCTYPE html>
<html>

<head>
<?php include_once "php/head.php";?>
</head>

<body>
    <?php
       require_once "php/header.php";
   ?>
    <div class="main-container">
        <h1 class="title">Welcome to Travel Experts</h1>
        <?php
            // echo phpinfo();
            require_once "php/menu.php";
            date_default_timezone_set("US/Mountain");
            $hour = localtime()[2];
            if ($hour > 18) {
                $class    = "gE";
                $greating = "Evening";
            } elseif ($hour >= 12) {
                $class    = "gA";
                $greating = "Afternoon";
            } else {
                $class    = "gM";
                $greating = "Morning";
            }
            // $dayTime = ($hour >= 17) ? "Evening" : (($hour >= 12) ? "Afternoon" : "Morning");
            echo ("<div class='$class'><h2>Good $greating !</h2>");
        ?>

        <div class="banner-container">
            <div class="grid-image">
                <img src="pic/travel/1.jpg">
            </div>
            <div class="grid-image">
                <img src="pic/travel/2.jpg">
            </div>
            <div class="grid-image">
                <img src="pic/travel/3.jpg">
            </div>
        </div>

        <div class="function-grid">
            <div class="grid-image2">
                <a href="php/contact.php">
                    <img src="pic/contact.jpg">
                </a>
            </div>
            <div class="grid-image2">
                <a href="php/register.php">
                    <img src="pic/register.jpg">
                </a>
            </div>
        </div>


        <div id="main-banner">

        </div>

        <!-- floating contact icon -->
        <?php
        echo("
        <a href='$_root/php/contact.php'>
            <img id='customerService' src='pic/Customer-Service.png'>
        </a>
        ")
        ?>
        <!-- <img id="test" src="pic/Customer-Service.png"> -->
        <?php
            require_once "php/footer.php";
        ?>
      
        <script src="js/array-script.js"></script>
        <script src="js/customerService.js"></script>
</body>

</html>