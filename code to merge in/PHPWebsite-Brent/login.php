<?php
    session_start();
    if(!isset($_SESSION["start_time"])){
        $_SESSION["start_time"] = time();
    }
    include_once("variables.php");
    include_once("functions.php");

    if(isset($_POST["submit"])) {
        $userList = getUsers();
        //checks if username exists in the user.txt file
        if(isset($userList[$_POST["username"]])){
            //checks if the password matches the username from user.txt
            if($userList[$_POST["username"]] === $_POST["password"]){
                print("You are logged in.");
                $_SESSION["logged_in"] = true;
                header("Location: http://localhost/PHPWebsite/createAgent.php");
            }else{
                print("Incorrect user name or password. Please try again.");
            }
        }else{
            print("Incorrect user name or password. Please try again.");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Brent Ward - Travel Experts Login</title>
</head>
<body>
    <?php
    $currentPage = "login";
    include_once("header.php");
    include_once("menu.php");?>

    <section class="loginSection">
        <h2>Login:</h2>
        <form method="post" action="#" id="loginForm">
            <label for="username">User Name:</label>
            <input type="text" name="username"><br>
            <label for="username">Password:</label>
            <input type="password" name="password"><br>

            <input type="submit" name="submit" value="login">
        </form>

    </section>

    <?php
    include_once("footer.php");
    ?>
</body>
</html>