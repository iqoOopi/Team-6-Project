<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <!--Viewport Meta Tag,for Mobile devices-->
    <meta name="viewport" content="width=device-width" , inital-scale="1.0">

    <title>Brent Ward - Travel Experts Links</title>
    
    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            margin: 2.5%;
        }
        td {
            padding: 15px;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <!--Site Header: Logo, Title, Nav Bar-->
    <?php
    $currentPage = "links";
    include_once("header.php");
    include_once("menu.php");
    ?>
    <main>
    <?php
        include_once("variables.php");
        
        print("<table>");
        $row = 1;
        foreach($urls as $url => $value) {
            print("<tr>");
            print("<td>$row</td>");
            print("<td><a href='$url'>$value</a></td>");
            print("</tr>");
            $row++;
        }
        print("</table>");    
    ?>
    </main>
    <?php include_once("footer.php");?>    
</body>
</html>