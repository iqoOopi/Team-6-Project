<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: controller for insert new agent data
    *
    *************************************************
 -->
<?php
include_once "top.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "head.php";?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js">
    </script>
</head>

<body>
    <?php
        include_once "header.php";
        include_once "menu.php";
        include_once "drawAgentTable.php";
    ?>

    <?php
        //not logged in
        if (!isset($_SESSION['login']) || $_SESSION['login'] == 0) {
            header("Location: http://localhost/$_root/php/login.php");
        } else {//logged in
            
            //show logged in time
            echo("Logged in at:".date("F d, Y h:i:s A", $_SESSION['loginTime'])."<br>");
            $error = 0;
            //initial the temp array to hold correct POST Data
            $tempValue[0] = array("AgtFirstName" => "", "AgtMiddleInitial" => "", "AgtLastName" => "", "AgencyId" => "", "AgtEmail" => "", "AgtPosition" => "");
            //initial the placeHolder array to hold error method
            $placeHolder = array("AgtFirstName" => "", "AgtMiddleInitial" => "", "AgtLastName" => "", "AgencyId" => "", "AgtEmail" => "", "AgtPosition" => "");
            $tblName;

            if (!isset($_POST['submit'])) {
                //first time enter the form Page, no submit yet
                drawTable($tempValue[0], $placeHolder);
            } else {
                //form is already submmited
                //check error and assign error message or value
                foreach ($_POST as $key => $value) {
                    switch ($key) {
                        case 'submit':
                            break;
                        case 'tblName':
                            $tblName = $value;
                            break;
                        default:
                            if ($value == null) {
                                $error             = 1;
                                $placeHolder[$key] = "Please re-enter the data";
                            } else {
                                $tempValue[0][$key] = $value;
                            }
                            break;
                    }
                }
                //error handling
                if ($error == 1) {
                    //when one field is empty, send back the correct data and errormessage
                    drawTable($tempValue[0], $placeHolder);
                } else {
                    //no error,ready to go
                    //Lazy load
                    include_once "../php/insertFunction.php";
                    $agent=new agent(1,$tempValue[0]);
                    $insertResult = insertIntoDB($agent, $tblName);
                    if ($insertResult) {
                        print("successed");
                    } else {
                        print("faild");
                    }
                }
            }
        }
    ?>
<?php
    include_once "footer.php";
?>
    <!-- input mask for phone input -->
    <script type="text/javascript">
    $("#AgtBusPhone").inputmask({
        "mask": "(999) 999-9999"
    });
    </script>
</body>
</html>