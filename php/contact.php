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
		<h1>Agencies</h1><br>
		<?php
			include_once("agencies.php");
			$agencies = GetAgency();

			include_once("footer.php");
		?>
	</body>

</html>
