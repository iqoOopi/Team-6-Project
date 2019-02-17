<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *
    *************************************************
 -->
<?php
class customer {
        private $CustomerId;
        private $CustFirstName;
        private $CustLastName;
        private $CustAddress;
        private $CustCity;      
        private $CustProv;
        private $CustPostal;
        private $CustCountry;
        private $CustHomePhone;
        private $CustBusPhone;
        private $CustEmail;
        private $CustPassword;
        private $AgentId;
        

        public function __construct($assoc_array) {
            foreach($assoc_array as $key => $value) {
                $this->$key = $value;
            }
        }



        public function __toString() {
            // $tempArray=[]; 
            foreach ($this as $key => $value) {
                $tempArray[$key] = $value;
                // print "$key => $value<br>";
            }

            $valueString = implode("," , $tempArray);
            return $valueString;
            
        }

        public function fieldString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $key;
            } 

            $fieldString = implode("," , $tempArray);
            return $fieldString;
        }

        public function prepString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $key;
            }

            $prepString = implode(",:" , $tempArray);
            $prepString = ":" . $prepString;
            return $prepString;
        }

        public function objToArray() {
            $array = [];
            foreach ($this as $key => $value) {
                $array[$key] = $value;
            }
            return $array;
        }

        public function getId() {
            return $this->CustomerId;
        }

        public function setId($id) {
            $this->CustomerId = $id;
        }

        public function getCustFirstName() {
            return $this->CustFirstName;
        }

        public function setCustFirstName($x) {
            $this->CustFirstName = $x;
        }
        public function getCustLastName() {
            return $this->CustLastName;
        }

        public function setCustLastName($x) {
            $this->CustLastName = $x;
        }

        public function getCustAddress() {
            return $this->CustAddress;
        }

        public function setCustAddress($m_name) {
            $this->CustAddress = $m_name;
        }

        public function getCustCity() {
            return $this->CustCity;
        }

        public function setCustCity($x) {
            $this->CustCity = $x;
        }

        public function getCustProv() {
            return $this->CustProv;
        }

        public function setCustProv($x) {
            $this->CustProv = $x;
        }

        public function getCustEmail() {
            return $this->CustEmail;
        }

        public function setCustEmail($x) {
            $this->CustEmail = $x;
        }
        public function getCustPassword() {
            return $this->CustPassword;
        }

        public function setCustPassword($x) {
            $this->CustPassword = $x;
        }
     
        public function getAgentId() {
            return $this->AgentId;
        }

        public function setAgentId($x) {
            $this->AgentId = $x;
        }

    }
?>
