<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *
    *************************************************
 -->
<?php
    include_once 'top.php';
    include_once 'registerCustController.php';
?>
<!DOCTYPE html>
<html class="register-bg">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php
        print("<link rel=\"stylesheet\" type=\"text/css\" href=\"$_root/styles/styles.css\">");
    ?>
</head>

<body class="register">
    <?php
        include_once "header.php";
        if (isset($_POST['registerCust'])) {
            echo ('preventDefault failed');
        }
        $errorArray = registerCust();
        if (!empty($errorArray)){
            echo ("<script>alert('{$errorArray['duplicate']}'+'\\n'+'{$errorArray['agentId']}')</script>");
        }
    ?>
    <main>
        <form id="customerRegisterForm" action="#" method="POST" name="customerRegisterForm">

            <p class="label-head">Customer Information</p>

            <div class="form-box">
                <label for="f_name">First Name</label>
                <input id="f_name" type="text" name="CustFirstName" placeholder="First Name" >
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your first name</p>
                </div>
            </div>

            <div class="form-box">
                <label for="l_name">Last Name</label>
                <input id="l_name" type="text" name="CustLastName" placeholder="Last Name" >
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your last name</p>
                </div>
            </div>

            <div class="form-box">
                <label for="addr">Address</label>
                <input id="addr" type="text" name="CustAddress" placeholder="Address" >
                <div class="text-box">
                    <p id="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span> Suite 1221, 123 Street</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your address</p>
                </div>
            </div>

            <div class="form-box">
                <label for="city">City</label>
                <input id="city" type="text" name="CustCity" placeholder="City" >
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your city</p>
                </div>
            </div>

            <div class="form-box">
                <label for="prov">Province</label>
                <select id="prov" name="CustProv" >
                    <option value="AB">AB</option>
                    <option value="NL">NL</option>
                    <option value="PE">PE</option>
                    <option value="NS">NS</option>
                    <option value="NB">NB</option>
                    <option value="QC">QC</option>
                    <option value="ON">ON</option>
                    <option value="MB">MB</option>
                    <option value="SK">SK</option>
                    <option value="BC">BC</option>
                    <option value="YT">YT</option>
                    <option value="NT">NT</option>
                    <option value="NU">NU</option>
                </select>
            </div>

            <div class="form-box">
                <label for="postal">Postal Code</label>
                <input id="postal" type="text" name="CustPostal" placeholder="A1A 1A1" >
                <div class="text-box">
                    <p class="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span> T2M 0L4</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your postal code</p>
                </div>
            </div>

            <div class="form-box">
                <label for="Country">Country</label>
                <input id="Country" type="text" name="CustCountry" title="Please enter your Country">
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your Country</p>
                </div>
            </div>

            <div class="form-box">
                <label for="phone">Home Phone</label>
                <input id="homePhone" type="tel" name="CustHomePhone" placeholder="Home Phone" >
                <div class="text-box">
                    <p class="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span> (403) 284-7248</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your Home phone number
                    </p>
                </div>
            </div>

            <div class="form-box">
                <label for="phone">Business Phone</label>
                <input id="busPhone" type="tel" name="CustBusPhone" placeholder="Business Phone" >
                <div class="text-box">
                    <p class="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span> (403) 284-7248</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your Bus phone number
                    </p>
                </div>
            </div>

            <div class="form-box">
                <label for="e_mail">Email</label>
                <input id="e_mail" type="text" name="CustEmail" placeholder="Email" >
                <div class="text-box">
                    <p class="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span> firstname.lastname@sait.ca</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your email</p>
                </div>
            </div>

            <div class="form-box">
                <label for="password">Password</label>
                <input id="password" type="password" name="CustPassword" placeholder="" >
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your password</p>
                </div>
            </div>

            <div class="form-box">
                <label for="rePassword"> Re-enter Password</label>
                <input id="rePassword" type="password" name="rePassword" placeholder="Re-enter your Password" >
                <div class="text-box">
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your password</p>
                </div>
            </div>


            <div class="form-box">
                <label for="agentId">Agent Id</label>
                <input id="agentId" type="text" name="AgentId" placeholder="agentId" >
                <div class="text-box">
                    <p class="descMsgs" style="display:none;"><span><i class="fas fa-info-circle"></i></span>If there was an agent helping you, please enter their agent ID</p>
                    <p class="errorMsgs" style="display:none;"><span><i class="fas fa-exclamation-circle"></i></span> Please enter your Agent Id</p>
                </div>
            </div>

            <input id="btn" name="registerCust" type="submit">
            <input type="reset">

        </form>
    </main>

    <?php
        print("<script src=\"$_root/scripts/script.js\"></script>");
    ?>
    <script>
    showInstruction("customerRegisterForm");
    checkInputEmptyAndPasswordMatch("btn");
    
    // input mask for field
    $("#postal").inputmask({
        "mask": "a9a 9a9"
    });
    $("#homePhone").inputmask({
        "mask": "(999) 999-9999"
    });
    $("#busPhone").inputmask({
        "mask": "(999) 999-9999"
    });

    $("#e_mail").inputmask({
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    greedy: false,
    onBeforePaste: function (pastedValue, opts) {
      pastedValue = pastedValue.toLowerCase();
      return pastedValue.replace("mailto:", "");
    },
    definitions: {
      '*': {
        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
        casing: "lower"
      }
    }
  });
    </script>
</body>

</html>
