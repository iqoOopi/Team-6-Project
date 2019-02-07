<?php
    // session_start() is called so that PHP loads the user's session
    include_once ('top.php');
    // use an empty call to the array() function to make $_SESSION an empty array - effectively wiping it
    $_SESSION = array();
    session_destroy();
    header("Location: $_root/index.php");
?>
