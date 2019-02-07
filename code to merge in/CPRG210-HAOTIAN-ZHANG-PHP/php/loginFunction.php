<!--
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: login Function
    *
    *************************************************
 -->
<?php
include_once "top.php";

//get stored pasword
$userPassword = getUserPasswordInfo();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = 0;
}

//initial wrong pwd indicated to false.
if (!isset($_SESSION['wrongPassword'])) {
    $_SESSION['wrongPassword'] = 0;
}

if (isset($_POST['submit'])) {
//get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

//check record
    $error = true;
    foreach ($userPassword as $key => $value) {
        if ($username == $key) {
            if (password_verify($password, $value)) {
                $error = false;
            }
        }
    }

//result handling
    if ($error) {
        $_SESSION['wrongPassword'] = 1;
        $location                  = 'Location: http://localhost' . $_root . '/php/login.php';
        header($location);
    } else {
        $_SESSION['login']     = 1;
        $_SESSION['loginTime'] = time();
        unset($_SESSION['wrongPassword']);
        $location = 'Location: http://localhost' . $_root . '/php/newAgentInsert.php';
        header($location);
    }
}

//get stored password
function getUserPasswordInfo()
{
    $filePointer  = fopen("../database/users.txt", "r") or die("Unable to open file!");
    $userPassword = array();
    while (!feof($filePointer)) {
        //get rid of the '/n' from fgets. [0]for username [1] for password
        $line           = trim(fgets($filePointer));
        $tempArray      = explode(' ', $line);
        $hashedPassword = password_hash($tempArray[1], PASSWORD_DEFAULT);
        //simulate getting hashedPassword from database
        $userPassword[$tempArray[0]] = $hashedPassword;
        // $userPassword[$tempArray[0]] = $tempArray[1];
    }
    fclose($filePointer);
    return $userPassword;
}
?>