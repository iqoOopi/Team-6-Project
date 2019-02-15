<!--
    *************************************************
    *
    *Author:Brent Ward
    *Date: Feb 08 2019
    *Purpose: Grabs agency data and puts it on a contact page
    *
    *************************************************
 -->
<?php
	include_once("top.php");
?>
<!DOCTYPE html>
<html class="contact-bg">
	<head>
		<title>Contact Us</title>
		<meta charset="utf-8">
		<?php
           print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
        ?>
	<head>

	<body>
		<?php include_once("header.php"); ?>
		<u><h1 style="margin-left:38%;">Our Current Agencies</h1></u>
		<?php
			include_once("agencies.php");
			$agencies = GetAgency();

			include_once("footer.php");
			print("<script src=\"$_root/scripts/script.js\"></script>");
		?>
	</body>

</html>
