<?php
    /************************************
    *   Author: Dao Zheng
    *   Course: PROJ-216-OSD
    *   Date: 2019/Feb/15
    * *************************************/

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
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Permanent+Marker" rel="stylesheet">
    </head>

    <body class="package">
    
    <?php
        include_once ("header.php");
        // Return false if fetch fails, return an array of object if success
        $Pkgs = GetPackages();

        date_default_timezone_set('America/Edmonton');
        $curDate = date('U');
        
        print("<h1 class=\"pkg-greet\">Current Packages</h1>"); 
        print("<div class=\"pkg\">");
        if ($Pkgs) {
            foreach ($Pkgs as $pkg) {
                $endDate = strtotime($pkg->getEndDate());
                $startDate = strtotime($pkg->getStartDate());
                $price = "$ " . $pkg->getPrice();
                if ($endDate >= $curDate) {
                    if ($startDate < $curDate) {
                        $startDate = explode(" ", $pkg->getStartDate());
                        $endDate = explode(" ", $pkg->getEndDate());
                        $startDate[0] = "Start: " . $startDate[0];
                        $endDate[0] = "End: " . $endDate[0];
                        print ("<div class=\"pkg-box\">");

                            $str = showPkgImg($pkg);
                            if ($str != false) {
                                print($str);
                            }
                            print("<div class=\"pkg-info\">");
                            print("<p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>");
                            print("<p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>");
                            print("<p class=\"pkg-start pkg-start-lt\">" . $startDate[0] . "</p>");
                            print("<p class=\"pkg-end\">" . $endDate[0] . "</p>");
                            print("<div class=\"price-tag\"><span class=\"triangle-topright\"></span><span class=\"triangle-bottomright\"></span><span class=\"triangle-topleft\"></span><span class=\"triangle-bottomleft\"></span><p class=\"pkg-price\">" . $price. "</p></div>");
                            print("<form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">");
                                print("<input type=\"hidden\" name=\"pkgId\" value=\"" .$pkg->getId() . "\">");
                                print("<input type=\"hidden\" name=\"pkgPrice\" value=\"" .$pkg->getPrice() . "\">");
                                print("<input type=\"submit\" name=\"submit\" value=\"Order Now\" class=\"hvr-bob\">");
                            print("</form>");
                            print("</div>");
                        print("</div>");

                    } else {
                        $startDate = explode(" ", $pkg->getStartDate());
                        $endDate = explode(" ", $pkg->getEndDate());
                        $startDate[0] = "Start: " . $startDate[0];
                        $endDate[0] = "End: " . $endDate[0];
                        print ("<div class=\"pkg-box\">");
                            $str = showPkgImg($pkg);
                            if ($str != false) {
                                print($str);
                            }
                            print("<div class=\"pkg-info\">");
                            print("<p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>");
                            print("<p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>");
                            print("<p class=\"pkg-start\">" . $startDate[0] . "</p>");
                            print("<p class=\"pkg-end\">" . $endDate[0] . "</p>");
                            print("<div class=\"price-tag\"><span class=\"triangle-topright\"></span><span class=\"triangle-bottomright\"></span><span class=\"triangle-topleft\"></span><span class=\"triangle-bottomleft\"></span><p class=\"pkg-price\">" . $price. "</p></div>");
                            print("<form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">");
                                print("<input type=\"hidden\" name=\"pkgId\" value=\"" .$pkg->getId() . "\">");
                                print("<input type=\"hidden\" name=\"pkgPrice\" value=\"" .$pkg->getPrice() . "\">");
                                print("<input type=\"submit\" name=\"submit\" value=\"Order Now\" class=\"hvr-bob\">");
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
