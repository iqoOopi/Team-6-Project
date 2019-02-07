<!--Adds a navagation bar to the page-->
<nav class="topNav" id="topNav">
    <a class="<?php if($currentPage =='index'){echo 'active';}?>" href="index.php">Home page</a>
    <a class="<?php if($currentPage =='register'){echo 'active';}?>" href="register.php">Register a User</a>
    <?php
        //wont load unless logged in  
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true)
        {
           print('<a class="' . ($currentPage == "createAgent" ? "active" : "") . '"href="createAgent.php">Register an Agent</a>');
        }
    ?>
    <a class="<?php if($currentPage =='contact'){echo 'active';}?>" href="contact.php">Contacts</a>
    <a class="<?php if($currentPage =='links'){echo 'active';}?>" href="links.php">Links</a>
    <?php
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true)
        {
            print('<a class="" id="logout" href="logout.php">Log Out</a>');
        }else{
            print('<a class="'. ($currentPage == "login" ? "active" : "") . '"id="login" href="login.php">Login</a>');
        }
    ?>
</nav>