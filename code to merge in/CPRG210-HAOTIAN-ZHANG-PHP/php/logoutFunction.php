<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: Log out function destroy all session
    *
    *************************************************
 -->
<?php
include_once "top.php";
      session_destroy();
      header("Location: http://localhost$_root/");
  ?>
