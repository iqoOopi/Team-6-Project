<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *Purpose: validate Customer register
    *
    *************************************************
 -->
<?php
    function registerCust()
    {
        include_once 'top.php';
        include_once 'customerClass.php';
        include_once 'functions.php';
        $errorArray = array();
        $existAgent = 0;
        $customerArray = array();
        if (!isset($_POST['registerCust'])) {
            return $errorArray;
        }
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

        $tempCustomer = new customer($customerArray);
      
        $customers  = getInstants('customers', 'customer');
        foreach ($customers as $customer) {
            if ($customer->getCustEmail() == $tempCustomer->getCustEmail()) {
                $errorArray['duplicate'] = 'Email Already Exist!';
            }
            if ($customer->getAgentId() == $tempCustomer->getAgentId()) {
                $existAgent = 1;
            }
        }
        if (!$existAgent) {
            $errorArray['agentId'] = 'No Such Agent, try contact your agent or leave it blank';
        }
        if (empty($errorArray)) {
            $pdo    = connectDb();
            $result = insertIntoDB($pdo, $tempCustomer, 'customers');
            closeConnection($pdo);

            if ($result) {
                echo "<script>alert('Success!');
    window.location.href = 'customerLogin.php'
    </script>";
            } else {
                echo "<script>alert('Failed!');
    window.location.href = '../index.php'
    </script>";
            }

        }
            return $errorArray;

}
?>
