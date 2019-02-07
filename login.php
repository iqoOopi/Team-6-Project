<?php
    session_start();
    include_once ("functions.php");
    // Get user file as associative array
    // Get username and password from $_POST 
    if (isset($_POST['submit'])) {
        unset($_POST['submit']);

        // trim username and password
        foreach ($_POST as $key => $value) {
            $usr_array[$key] = clean_input($value);
        }

        // If validated, start session variable
        $validated = validate_user($usr_array);
        if ($validated) {
            $_SESSION["admin"] = $validated;
            $_SESSION["username"] = $usr_array["username"];
            header("Location: index.php");
        } else {
            print("<div class=\"login-error\">Invalid username and/or password</div>");
        } 

    }
?>
<!DOCTYPE html>
<html class="login-bg">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<head>

	<body class="login">
		<?php
		    include_once("header.php");	
		?>
		<form action="" method="POST" name="loginForm">
                    <div class="login-title"><span>Admin</span>Login</div>
                    <div class="login-logo"></div>
                    <div class="login-box">
                        <input type="text" placeholder="Username" name="username">
                        <input type="password" placeholder="Password" name="password">
                        <input type="submit" value="Login" name="submit">
                    </div>
		</form>

            <script src="scripts/script.js"></script>
	</body>
</html>
