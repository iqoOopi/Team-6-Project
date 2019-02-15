<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *
    *************************************************
 -->
<?php
    include_once ('top.php');
    include_once ("functions.php");
    include_once 'customerClass.php';
    // Get user file as associative array
    // Get username and password from $_POST 
    if (isset($_POST['cusSubmit'])) {
        unset($_POST['cusSubmit']);

        // trim username and password
        foreach ($_POST as $key => $value) {
            $user_input[$key] = cleanInput($value);
        }
        $validated=false;
        $matchedCustomer;
        $customers = getInstants('customers', 'customer');
        foreach ($customers as $key=>$customer){
            if ($user_input['username'] == $customer->getCustEmail()) {
                if ($user_input['password'] == $customer->getCustPassword()) {
                    $validated=true;
                    $matchedCustomer=$customer;
                    break;
                }
            }
        }

        // If validated, start session variable
     
        if ($validated) {
            $_SESSION["customer"] = $validated;
            $_SESSION["username"] = $matchedCustomer->getCustLastName();
            $_SESSION['customerId']= $matchedCustomer->getId();
            header("Location: $_root/index.php");
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
                <?php
                    print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
                ?>
	</head>

	<body class="login">
		<?php
		    include_once("header.php");	
		?>
		<form action="" method="POST" name="loginForm">
                    <div class="login-title"><span>Customer</span>Login</div>
                    <div class="login-logo"></div>
                    <div class="login-box">
                        <input type="text" placeholder="Email" name="username">
                        <input type="password" placeholder="Password" name="password">
                        <label>Do not have an account? <a href="registerCustView.php">Register Now</a></label>
                        <input type="submit" value="Login" name="cusSubmit">
                    </div>
		</form>
            <?php
                print("<script src=\"$_root/scripts/script.js\"></script>");
            ?>
	</body>
</html>
