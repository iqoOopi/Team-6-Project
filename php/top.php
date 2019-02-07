<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: start the session and set the root folder
    *
    *************************************************
 -->
<?php
if (!isset($_SESSION)) {
 session_start();
}
$GLOBALS['_root']='/Team-6-Project';
?>
