<?php
    include_once ("packageClass.php");
    include_once ("functions.php");
    include_once ("top.php");
?>
<!DOCTYPE html>
<html class="packages-bg">
    <head>
        <title>Packages</title>
        <meta charset="utf-8">
        <?php
            print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
        ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <body>
    
    <?php
        include_once ("header.php");
        // Return false if fetch fails, return an array of object if success
        $Pkgs = GetPackages();

        date_default_timezone_set('America/Edmonton');
        $curDate = date('U');
        
        print("<div class=\"pkg\">");
        if ($Pkgs) {
            foreach ($Pkgs as $pkg) {
                $endDate = strtotime($pkg->getEndDate());
                $startDate = strtotime($pkg->getStartDate());
                if ($endDate >= $curDate) {
                    if ($startDate < $curDate) {
                        // package name and package price is passed to the order form
                        print ("<div class=\"pkg-box\">");
                            $str = showPkgImg($pkg);
                            if ($str != false) {
                                print($str);
                            }
                            print("<div class=\"pkg-info\">");
                            print("<p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>");
                            print("<p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>");
                            print("<p class=\"pkg-start-lt\" style=\"color:red;\"><strong>" . $pkg->getStartDate() . "</strong></p>");
                            print("<p class=\"pkg-end\">" . $pkg->getEndDate() . "</p>");
                            print("<div class=\"price-tag\"><span class=\"triangle-topright\"></span><span class=\"triangle-bottomright\"></span><span class=\"triangle-topleft\"></span><span class=\"triangle-bottomleft\"></span><p class=\"pkg-price\">" . $pkg->getPrice(). "</p></div>");
                            print("<form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">");
                                print("<input type=\"hidden\" name=\"pkgId\" value=\"" .$pkg->getId() . "\">");
                                print("<input type=\"submit\" name=\"submit\" value=\"order\">");
                            print("</form>");
                            print("</div>");
                        print("</div>");

                    } else {
                        // package name and package price is passed to the order form
                        print ("<div class=\"pkg-box\">");
                            $str = showPkgImg($pkg);
                            if ($str != false) {
                                print($str);
                            }
                            print("<div class=\"pkg-info\">");
                            print("<p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>");
                            print("<p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>");
                            print("<p class=\"pkg-start\">" . $pkg->getStartDate() . "</p>");
                            print("<p class=\"pkg-end\">" . $pkg->getEndDate() . "</p>");
                            print("<div class=\"price-tag\"><span class=\"triangle-topright\"></span><span class=\"triangle-bottomright\"></span><span class=\"triangle-topleft\"></span><span class=\"triangle-bottomleft\"></span><p class=\"pkg-price\">" . $pkg->getPrice(). "</p></div>");
                            print("<form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">");
                                print("<input type=\"hidden\" name=\"pkgId\" value=\"" .$pkg->getId() . "\">");
                                print("<input type=\"submit\" name=\"submit\" value=\"order\">");
                            print("</form>");
                            print("</div>");
                        print ("</div>");
                    }
                }
            }
            print("</div>");
        }
    ?>
    <?php
        print("<script src=\"$_root/scripts/script.js\"></script>");
        // print("<script src=\"$_root/scripts/checkFormInputEmpty.js\"></script>");
    ?>

    </body>
</html>
