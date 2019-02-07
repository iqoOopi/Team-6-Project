<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: Model: commit agent data into DB
    *
    *************************************************
 -->
<?php
include_once ('class.php');
function connectDB()
{
    $link = new mysqli("127.0.0.1", "admin", "P@ssw0rd", "travelexperts");
    if ($link->connect_errno) {
        echo "Error number: " . $link->connect_error . PHP_EOL;
        exit;
    }
    return $link;
}

function closeDB($link)
{
    $link->close();
}

function insertIntoDB(agent $agent,$tblName)
{
    // $TableColoumnName  = "";
    // $TableColoumnValue = "";
    $link              = connectDB();
    $result;

    //generic insert replaced by final day exerice that required use  class
    // Nested foreach to dynamic determin the amount of key=>value pair of the data.
    //1st foreach get the new row of data
        // foreach ($tempArray as $i => $data) {
        //     //2nd foreach get the key=>value pair out of the row data.
        //     foreach ($data as $key => $value) {
        //         //format to SQL syntax with extra "," in the end.
        //         $TableColoumnName .= ($key . ",");
        //         $TableColoumnValue .= ("'" . $value . "',");

        //         //code to test before touch the real database
        //         // echo ("key:" . $key . "<br>");
        //         // echo ("coloumn:" . $TableColoumnName);
        //         // echo ("<br>");
        //         // echo ("value:" . $TableColoumnValue);
        //         // echo ("<br>");
        //     }
        //     //get rid of extra ","
        //     $TableColoumnName  = substr($TableColoumnName, 0, -1);
        //     $TableColoumnValue = substr($TableColoumnValue, 0, -1);

    $sqlName=$agent->nameToString();
    $sqlValue=$agent;
   
        $sql               = "INSERT INTO $tblName ($sqlName) VALUES($sqlValue)";

         //generic insert continue Reset string holder for next data row
            // $TableColoumnName  = "";
            // $TableColoumnValue = "";
        $result            = $link->query($sql);
    //generic insert continue  
        // }
    closeDB($link);
    return $result;
}
?>