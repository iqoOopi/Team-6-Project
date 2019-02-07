<?php
    session_start();  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--Viewport Meta Tag,for Mobile devices-->
    <meta name="viewport" content="width=device-width" , inital-scale="1.0">

    <title>Brent Ward - Travel Experts Contacts</title>
    
    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body id="contactBody">
    <!--Site Header: Logo, Title, Nav Bar-->
    <?php
    $currentPage = "contact";
    include_once("header.php");
    include_once("menu.php");
    ?>
    <!--Contact Information-->
    <main class="contactMain">
        <h1>Contact Information:</h1>
        <h2>Main Offices</h2>
        <ul id="offices">
            <li>Calgary: 4551 Center Lane, NW T6R 6G6</li>
            <li>Edmonton: 392 Raymond Road, SE Q7A 3P5</li>
            <li>Toronto: 87 Loral Cresent Street, SW T3P 7A6</li>
        </ul>
        <h2>Support</h2>
        <ul id="support">
            <li>Customer Feedback: 1-800-688-7439</li>
            <li>Customer Support: 1-800-688-8261</li>
            <li>Quality Assurance: 1-800-688-3247</li>
        </ul>
        <!--Small support contact form-->
        <h2>Contact Us</h2>
        <form class="myForm" action="" name="myForm" id="contactForm">
            <label for="userName">Name:</label>
            <input id="userName" type="text" name="userName" placeholder="Enter First and Last Name"><br>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" placeholder="Enter Email"><br><br>
            <textarea id="response" name="response" height=350 placeholder="What can we help you with?"></textarea><br>

            <input type="submit" id="submitButton">
            <input type="reset" id="resetButton">
        </form>

    </main>
    <!--Footer with basic Nav bar-->
    <?php include_once("footer.php");?>
</body>

</html>