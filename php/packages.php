<?php
    include_once ("packageClass.php");
    include_once ("functions.php");
    include_once ("top.php");

    // Return false if fetch fails, return an array of object if success
    $Pkgs = GetPackages();

    date_default_timezone_set('America/Edmonton');
    $curDate = date('U');
    
    if ($Pkgs) {
        foreach ($Pkgs as $pkg) {
            $endDate = strtotime($pkg->getEndDate());
            $startDate = strtotime($pkg->getStartDate());
            if ($endDate >= $curDate) {
                if ($startDate < $curDate) {
                    // package name and package price is passed to the order form
                    print ("<div class=\"pkg-box\">
                            <p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>
                            <p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>
                            <p class=\"pkg-start-lt\" style=\"color:red;\"><strong>" . $pkg->getStartDate() . "</strong></p>
                            <p class=\"pkg-end\">" . $pkg->getEndDate() . "</p>
                            <p class=\"pkg-price\">" . $pkg->getPrice(). "</p>
                            <form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">
                                <input type=\"hidden\" name=\"pkgName\" value=\"" .$pkg->getPkgName() . "\">
                                <input type=\"hidden\" name=\"pkgPrice\" value=\"" .$pkg->getPrice() . "\">
                                <input type=\"submit\" name=\"submit\" value=\"order\">
                            </form>");

                } else {
                    // package name and package price is passed to the order form
                    print ("<div class=\"pkg-box\">
                            <p class=\"pkg-name\">" . $pkg->getPkgName() . "</p>
                            <p class=\"pkg-desc\">" . $pkg->getDesc() . "</p>
                            <p class=\"pkg-start\">" . $pkg->getStartDate() . "</p>
                            <p class=\"pkg-end\">" . $pkg->getEndDate() . "</p>
                            <p class=\"pkg-price\">" . $pkg->getPrice(). "</p>
                            <form action=\"$_root/php/orderPage/orderPageView.php\" method=\"POST\">
                                <input type=\"hidden\" name=\"pkgName\" value=\"" .$pkg->getPkgName() . "\">
                                <input type=\"hidden\" name=\"pkgPrice\" value=\"" .$pkg->getPrice() . "\">
                                <input type=\"submit\" name=\"submit\" value=\"order\">
                            </form>");

                }
            }
        }
    }
?>
