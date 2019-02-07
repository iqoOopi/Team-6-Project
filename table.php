<?php
    session_start();
?>

<!DOCTYPE html>
<html class="table-bg">
    <head>
        <title>Table</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
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
        
        <script src="scripts/script.js"></script>
    </body>

</html>
