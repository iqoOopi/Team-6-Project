<?php
    include_once ('top.php');
?>

<!DOCTYPE html>
<html class="table-bg">
    <head>
        <title>Table</title>
        <?php 
            print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
        ?>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            include_once("header.php");
            include_once("variables.php");

            echo("<table>"); 
            for ($row_count = 1; $row_count <= 4; $row_count++) {
                $curr_pair = each($urls);
		// Create table row
                echo("<tr>");

		// Create table datas
                print ("<td>$row_count</td>");
                print ("<td><a href=\"$curr_pair[key]\" target=\"_blank\">$curr_pair[value]</a></td>");

                echo("<tr>");
            }

            reset($urls);
            echo("</table>");

            include_once("footer.php");    
        ?>
        
        <?php
           print("<script src=\"$_root/scripts/script.js\"></script>");
        ?>
    </body>

</html>
