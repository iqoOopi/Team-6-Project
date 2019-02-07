<header class="site-header">
    <div class="wrapper">

        <a href="index.php">Travel<span class="logo">Experts</span></a>

        <nav class="site-header-nav">
            <div class="drop-down-menu">
                <button class="menu-btn">Links</button>
                <ul>
                    <?php 
                        if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                            print("<li>");
                            print("<a href='agent.php'>New Agent</a>");
                            print("</li>");
                        }
                    ?>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
                        <a href="table.php">Links table</a>
                    </li>
                </ul>
            </div>
            <div class="drop-down-menu">
                <?php
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                        print("<button class=\"menu-btn\">Welcome <span style=\"color:darkred;font-size:1rem;\"><strong>" . $_SESSION["username"] . "</span></strong></button>"); 
                        print("<ul>");
                            print("<li>");
                                print("<a href=\"#\">Admin Settings</a>");
                            print("</li>");		
                            print("<li>");
                                print("<a href=\"logout.php\">Logout</a>");
                            print("</li>");
                        print("</ul>");
                    } else {
                        print("<button class=\"menu-btn\">Login</button>"); 
                        print("<ul>");
                            print("<li>");
                                print("<a href=\"login.php\">Admin Login</a>");
                            print("</li>");		
                            print("<li>");
                                print("<a href=\"#\">Customer Login</a>");
                            print("</li>");
                        print("</ul>");
                    }
                ?>
            </div>
        </nav>

        <div class="contact">
            <button><a href="contact.php">Contact Us</a></button>
        </div>
    </div>
</header>
