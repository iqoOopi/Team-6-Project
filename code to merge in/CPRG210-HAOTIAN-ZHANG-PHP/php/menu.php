<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: nav bar
    *
    *************************************************
 -->
<?php
include_once "top.php";
$indexClass    = ($_SERVER['SCRIPT_NAME'] == $_root.'/index.php') ? 'class="active"' : '';
$newAgentClass = ($_SERVER['SCRIPT_NAME'] == $_root.'/php/newAgentInsert.php') ? 'class="active"' : '';
$linksClass    = ($_SERVER['SCRIPT_NAME'] == $_root.'/php/links.php') ? 'class="active"' : '';
$registerClass = ($_SERVER['SCRIPT_NAME'] == $_root.'/php/register.php') ? 'class="active"' : '';
$contactClass  = ($_SERVER['SCRIPT_NAME'] == $_root.'/php/contact.php') ? 'class="active"' : '';

echo ("
<nav class='nav'>
    <ul>
        <li>
            <a $indexClass href='$_root/index.php'>Home</a>
        </li>
        <li>
            <a $linksClass href='$_root/php/links.php'>Links</a>
        </li>
        <li>
            <a $registerClass href='$_root/php/register.php'>Registration</a>
        </li>
        <li>
            <a $newAgentClass href='$_root/php/newAgentInsert.php'>newAgent</a>
        </li>
        <li>
            <a $contactClass href='$_root/php/contact.php'>Contact Us</a>
        </li>");

// show login/logout button
if (isset($_SESSION['login'])&&$_SESSION['login'] == 1) {
 echo ("
        <li class='ultity' id='logout'>
        <a href='#'>Logout</a>
        <script>
        document.getElementById('logout').addEventListener('click', function(){
            if (confirm('Are you sure?')){
                window.location.href = '$_root/php/logoutFunction.php';
            }
        });
        </script>
       
        </li>");
} else {
 echo ("
        <li class='ultity'>
            <a href='$_root/php/login.php'>Login</a>
        </li>");
}
echo ("</ul></nav>")
?>
