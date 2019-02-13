<!-- Henry validate Customer register -->
<?php
include_once 'top.php';
include_once 'customerClass.php';
include_once 'functions.php';
if (!isset($_POST['registerCust'])) {
    header("Location: $_root/php/registerCustView.php");
}
$customerArray = array();
foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'registerCust':
            # code...
            break;
        case 'rePassword':
            # code...
            break;

        default:
            $customerArray[$key] = $value;
            break;
    }
}
//   print_r ($customer);
print_r($customerArray);
$tempCustomer = new customer($customerArray);
echo "<br>" . $customer;

?>