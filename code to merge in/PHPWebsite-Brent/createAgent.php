<?php
    session_start();

    if(!isset($_SESSION["start_time"])){
        $_SESSION["start_time"] = time();
    }
    //if not logged in, redirected to login page
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
        header("Location: http://localhost/PHPWebsite/login.php");
    }

    //stops error from breaking on first run through
    $errorMsg = "first";

    If(isset($_POST['submit'])){
        $newAgent = array();

        //Validating fieldboxes
        $errorMsg = "";
        if(!$_POST["AgtFirstName"]){
            $errorMsg .= "This form requires a first name.<br>";
            $newAgent["AgtFirstName"] = "";//Stops an undefined index error
        }else { $newAgent["AgtFirstName"] = $_POST["AgtFirstName"]; }

        if(!$_POST["AgtMiddleInitial"]){
            $errorMsg .= "This form requires a middle initial.<br>";
            $newAgent["AgtMiddleInitial"] = "";//Stops an undefined index error
        }else { $newAgent["AgtMiddleInitial"] = $_POST["AgtMiddleInitial"]; }

        if(!$_POST["AgtLastName"]){
            $errorMsg .= "This form requires a last name.<br>";
            $newAgent["AgtLastName"] = "";//Stops an undefined index error
        }else { $newAgent["AgtLastName"] = $_POST["AgtLastName"]; }

        if(!$_POST["AgtBusPhone"]){
            $errorMsg .= "This form requires a phone number.<br>";
            $newAgent["AgtBusPhone"] = "";//Stops an undefined index error
        }else { $newAgent["AgtBusPhone"] = $_POST["AgtBusPhone"]; }

        if(!$_POST["AgtEmail"]){
            $errorMsg .= "This form requires an email.<br>";
            $newAgent["AgtEmail"] = "";//Stops an undefined index error
        }else { $newAgent["AgtEmail"] = $_POST["AgtEmail"]; }

        if(!$_POST["AgtPosition"]){
            $errorMsg .= "This form requires a position.<br>";
            $newAgent["AgtPosition"] = "";//Stops an undefined index error
        }else { $newAgent["AgtPosition"] = $_POST["AgtPosition"]; }
        if(!$_POST["AgencyId"]){
            $errorMsg .= "This form requires an agency ID.<br>";
            $newAgent["AgencyId"] = "";//Stops an undefined index error
        }else { $newAgent["AgencyId"] = $_POST["AgencyId"]; }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Brent Ward - Travel Experts Register</title>

    <!--Imports/Links-->
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        $currentPage = "createAgent";
        include_once("header.php");
        include_once("menu.php");
        include_once("functions.php");
    ?>
    <!--Puts form output in the middle of the body-->
    
    <?php
        if($errorMsg == ""){
            include_once("functions.php");
            $result = insertAgent($newAgent);

            //confirmation message
            if($result){
                print "The agent was successfully added to the database.";
            }else {
                print "There was an error adding the agent to the database";
            }
        }else if($errorMsg != "first"){//wont print on first pass, will if fields are black after submitting
            
            //reprints form while keeping the values previously entered
            print <<<EOF
            <h1>Register an Agent:</h1>
            <form method='post' action="#" class="agentForm">
                <label for="AgtFirstName">First Name:</label><input id="AgtFirstName" type="text" name="AgtFirstName" value="{$newAgent['AgtFirstName']}"><br><br>
                <label for="AgtMiddleInital">Middle Initial:</label><input id="AgtMiddleInitial" type="text" name="AgtMiddleInitial" 
                    value="{$newAgent['AgtMiddleInitial']}"><br><br>
                <label for="AgtLastName">Last Name:</label><input id="AgtLastName" type="text" name="AgtLastName" value="{$newAgent['AgtLastName']}"><br><br>
                <label for="AgtBusPhone"> Phone Number:</label><input id="AgtBusPhone" type="text" name="AgtBusPhone" value="{$newAgent['AgtBusPhone']}"><br><br>
                <label for="AgtEmail">Email:</label><input id="AgtEmail" type="text" name="AgtEmail" value="{$newAgent['AgtEmail']}"><br><br>
                <label for="AgtPosition">Position:</label><input id="AgtPosition" type="text" name="AgtPosition" value="{$newAgent['AgtPosition']}"><br><br>
                <label for="AgencyId">Agency ID:</label><input id="AgencyId" type="text" name="AgencyId" value="{$newAgent['AgencyId']}"><br><br>
                <input type="submit" name="submit" value="submit"><br>
            </form>
            
EOF;
            print $errorMsg;//When put above the EOF caused the stickybar to break, moved them to be below instead.
        }else{
            print '<h1>Register an Agent:</h1>
            <form method="post" action="#" class="agentForm">
                <label for="AgtFirstName">First Name:</label><input id="AgtFirstName" type="text" name="AgtFirstName" ><br><br>
                <label for="AgtMiddleInital">Middle Initial:</label><input id="AgtMiddleInitial" type="text" name="AgtMiddleInitial" ><br><br>
                <label for="AgtLastName">Last Name:</label><input id="AgtLastName" type="text" name="AgtLastName" ><br><br>
                <label for="AgtBusPhone"> Phone Number:</label><input id="AgtBusPhone" type="text" name="AgtBusPhone" ><br><br>
                <label for="AgtEmail">Email:</label><input id="AgtEmail" type="text" name="AgtEmail" ><br><br>
                <label for="AgtPosition">Position:</label><input id="AgtPosition" type="text" name="AgtPosition" ><br><br>
                <label for="AgencyId">Agency ID:</label><input id="AgencyId" type="text" name="AgencyId" ><br><br>
                <input type="submit" name="submit" value="submit">
            </form>';
        }
    ?>
    <?php
        include_once("footer.php");
    ?>
</body>

</html>