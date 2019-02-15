<?php
    include_once 'top.php';
    if (!isset($_SESSION["admin"]) || $_SESSION["admin"] === false) {
        header("Location: $_root/php/login.php");
    }

    include_once "functions.php";
    include_once "agentClass.php";

    // check if it's the first time the form is being submitted
    if (isset($_POST['submit'])) {

        unset($_POST['submit']);

        foreach ($_POST as $key => $value) {
            $agent_array[$key] = clean_input($value);
        }

        $dbTable = $agent_array['tbName'];
        unset($agent_array['tbName']);

        $agt = new Agent($agent_array["AgtFirstName"], $agent_array["AgtLastName"], $agent_array["AgtBusPhone"], $agent_array["AgtEmail"], $agent_array["AgtPosition"], $agent_array["AgencyId"], empty($agent_array["AgtMiddleInitial"]) ? null : $agent_array["AgtMiddleInitial"]);

        $my_pdo  = connect_db();
        $success = insertIntoDB($my_pdo, $agt, $dbTable);
        close_connection($my_pdo);

        if ($success) {
            echo "<p class=\"insert_notification\" style=\"color:yellow;font-size:1.2rem\">insert success</p>";
        } else {
            echo "<p class=\"insert_notification\" style=\"color:red;font-size:1.2rem\">insert failed</p>";
        }

    }
?>

<!DOCTYPE html>
<html class="agent-bg">
    <head>
        <title>New Agent</title>
        <meta charset="utf-8">
        <?php
            print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
        ?>
    </head>

    <body class="agent">
        <?php
            include_once "header.php";
        ?>

        <main>
            <form action="" method="POST" id="agentForm" name="agentForm">


                    <p class="label-head">Please enter new agent information</p>

                    <div class="form-box">
                            <label for="f_name">Agent First Name</label>
                            <input id="f_name" type="text" name="AgtFirstName" placeholder="First Name" required>
                            <div class="text-box">
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter agent first name</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="l_name">Agent Last Name</label>
                            <input id="l_name" type="text" name="AgtLastName" placeholder="Last Name" required>
                            <div class="text-box">
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter agent last name</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="m_name">Agent Middle Initial</label>
                            <input id="m_name" type="text" name="AgtMiddleInitial" placeholder="Middle Initial" maxlength="2" >
                            <div class="text-box">
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter agent middle initial</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="phone">Agent Business Phone Number</label>
                            <input id="phone" type="tel" name="AgtBusPhone" placeholder="Phone Number" maxlength="14" required>
                            <div class="text-box">
                                    <p id="phoneDescription" style="display:none;">E.g. (403) 284-7248</p>
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter agent phone number</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="position">Agent Position</label>
                            <input id="position" type="text" name="AgtPosition" placeholder="Position" required>
                            <div class="text-box">
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter agent position</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="e_mail">Agent Email</label>
                            <input id="e_mail" type="email" name="AgtEmail" placeholder="Email" required>
                            <div class="text-box">
                                    <p id="emailDescription" style="display:none;">E.g. firstname.lastname@sait.ca</p>
                                    <p class="errorMsgs" style="display:none;"><span>&excl;</span> Please enter your email</p>
                            </div>
                    </div>

                    <div class="form-box">
                            <label for="agency">Agency</label>
                            <select id="agency" name="AgencyId" >
                                    <option selected value="1">1 - 1155 8th Ave SW, Calgary</option>
                                    <option value="2">2 - 110 Main Street, Okotoks</option>
                            </select>
                    </div>

                    <input type="hidden" name="tbName" value="agents">

                    <input id="btn" type="submit" name="submit" value="submit" >
                    <input type="reset">

            </form>

            <div class="notification"></div>
        </main>

        <?php
            print("<script src=\"$_root/scripts/script.js\"></script>");
        //     print("<script src=\"$_root/scripts/checkFormInputEmpty.js\"></script>");
        //     print("<script>showInstruction(\"agentForm\");</script>");
        ?>
        <script>
        showInstruction("agentForm");
        checkInputEmptyAndPasswordMatch("btn");
        </script>

    </body>
</html>
