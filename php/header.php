<?php
    include_once ("top.php");
?>
<header class="site-header">
    <div class="wrapper">
        <?php
            print("<a href=\"$_root/index.php\"><span class=\"img-logo\"><img src=\"$_root/imgs/logo.png\" alt=\"logo-img\"></span><span>Travel<span class=\"logo\">Experts</span></a>");
        ?>

        <nav class="site-header-nav">
            <div class="drop-down-menu">
                <button class="menu-btn">Links</button>
                <ul>
                    <div class="triangle-up"></div>
                    <?php 
                        if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                            print("<li>");
                            print("<a href=\"$_root/php/agent.php\">New Agent</a>");
                            print("</li>");
                        }
                    ?>
                    <li>
                        <?php
                            print("<a href=\"$_root/php/registerCustView.php\">Register</a>");
                        ?>
                    </li>
                    <!--
                    <li>
                        <?php
                            print("<a href=\"$_root/php/table.php\">Links table</a>");
                        ?>
                    </li>
                    -->
                    <li>
                        <?php
                            print("<a href=\"$_root/php/packages.php\">Packages</a>");
                        ?>
                    </li>
                </ul>
            </div>
            <div class="drop-down-menu">
                <?php
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                        print("<button class=\"menu-btn\">Welcome: <span style=\"color:darkred;font-size:1rem;\"><strong>" . $_SESSION["username"] . "</span></strong></button>"); 
                        print("<ul>");
                            print("<div class=\"triangle-up\"></div>");
                            
                            print("<li>");
                                print("<a href=\"$_root/php/adminDashBoard.php\">Admin Settings</a>");
                            print("</li>");		
                            print("<li>");
                                print("<a href=\"$_root/php/logout.php\">Logout</a>");
                            print("</li>");
                        print("</ul>");
                    } elseif(isset($_SESSION["customer"]) && $_SESSION["customer"] === true) {
                        print("<button class=\"menu-btn\">Welcome: <span style=\"color:darkred;font-size:1rem;\"><strong>" . $_SESSION["username"] . "</span></strong></button>"); 
                        print("<ul>");
                            print("<div class=\"triangle-up\"></div>");
                            print("<li>");
                                print("<a href=\"#\">Your Account</a>");
                            print("</li>");		
                            print("<li>");
                                print("<a href=\"$_root/php/logout.php\">Logout</a>");
                            print("</li>");
                        print("</ul>");
                    } else{
                        print("<button class=\"menu-btn\">Login</button>"); 
                        print("<ul>");
                            print("<div class=\"triangle-up\"></div>");
                            print("<li>");
                                print("<a href=\"$_root/php/login.php\">Admin Login</a>");
                            print("</li>");		
                            print("<li>");
                                print("<a href=\"$_root/php/customerLogin.php\">Customer Login</a>");
                            print("</li>");
                        print("</ul>");
                    }
                ?>
            </div>
        </nav>

        <div class="contact">
            <?php
                print("<button><a href=\"$_root/php/contact.php\">Contact Us</a></button>");
            ?>
        </div>
    </div>
</header>
