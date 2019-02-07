<?php
    session_start();  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--Viewport Meta Tag,for Mobile devices-->
    <meta name="viewport" content="width=device-width" , inital-scale="1.0">

    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Brent Ward - Travel Experts Home</title>
</head>

<body id="indexBody">
    <!--Site Header: Logo, Title, Nav Bar-->
    <?php
    $currentPage = "index";
    include_once("header.php");
    include_once("menu.php");
    ?>
    <!--Site Body-->
    <main class="indexMain">
        <?php
            //sets timezone and sets time equal to hours
            date_default_timezone_set('America/Edmonton');
            $time = date("H:i");
            print("<div class='greeting'>");//div to style in css

            //chooses a message based on the time
            if($time >= 0 && $time < 12){
                print("<p>Good Morning!</p>");
            }else if($time >= 12 && $time < 18){
                print("<p>Good Afternoon!</p>");
            }else if($time >= 18){
                print("<p>Good Evening!</p>");
            }
            Print("</div>");
        ?>
        <h1>Welcome to Travel Experts!</h1>
        <a href="contact.php"><img src="Images/Contacts.jpg" width="175" height="125"></a>
        <a href="register.php"><img src="Images/Register.jpg" width="175" height="125"></a>
        <div>
            <h2>Thinking of Traveling?</h2>
            <p>You've come to the right place! Travel Experts has the best selection of packages, at the best prices possible!<br>
                Traveling is a great way to learn and explore, and can be life changing. From the breathtaking wildlife of <br>
                South Africa, to the sandcovered beaches of Mexico, you will always know you are getting the best experience <br>
                with Travel Experts. Book your flight today!</p>
        </div>
    </main>
    <!--Travel images Album-->
    <section class="album">
        <p id="albumHeader">Inspiration for Trips!</p>
    </section>
    <!--Footer with basic Nav bar-->
    <?php include_once("footer.php"); ?>
</body>

</html>