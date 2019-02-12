<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *Purpose: the view of order form
    *
    *************************************************
 -->
<?php
include_once '..\top.php';
include_once '..\functions.php';
include_once '..\customerClass.php';
include_once '..\packageClass.php';
?>
<!DOCTYPE html>
<html class="register-bg">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <?php
print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
?>
</head>

<body class="register">
    <?php
include_once "..\header.php";
?>

    <main>
        <?php

$customers = getInstants('customers', 'customer');
// print_r($customers);


$particularCustomer = getInstants('customers', 'customer','109');

    echo ($particularCustomer);

$packages=getInstants('packages','package');
echo ("<br>$packages[1]<br>");



$packages=getInstants('packages','package',1);
echo ("<br>$packages<br>");
?>


    </main>

</body>

</html>