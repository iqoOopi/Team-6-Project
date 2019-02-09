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
        private $AgentId;

        public function __construct($assoc_array) {
            foreach($assoc_array as $key => $value) {
                $this->$key = $value;
            }
        }



        public function __toString() {
            // $tempArray=[]; why not needed?
            foreach ($this as $key => $value) {
                $tempArray[] = $value;
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

   
      



        public function getId() {
            return $this->CustomerId;
        }

        public function setId($id) {
            $this->CustomerId = $id;
        }

        public function getFirstName() {
            return $this->CustFirstName;
        }

        public function setFirstName($f_name) {
            $this->CustFirstName = $f_name;
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
            return $this->getCustProv;
        }

        public function setCustProv($x) {
            $this->CustProv = $x;
        }
    }
?>