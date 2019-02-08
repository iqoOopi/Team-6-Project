<?php
    class Agent {
        protected $AgtFirstName;
        protected $AgtMiddleInitial;
        protected $AgtLastName;
        protected $AgtBusPhone;
        protected $AgtEmail;      
        protected $AgtPosition;
        protected $AgencyId;

        public function __construct($f_name, $l_name, $bphone, $email, $pos, $agency, $m_initial = NULL) {
            $this->AgtFirstName = $f_name; 
            $this->AgtMiddleInitial = $m_initial;
            $this->AgtLastName = $l_name;
            $this->AgtBusPhone = $bphone;
            $this->AgtEmail = $email;
            $this->AgtPosition = $pos;
            $this->AgencyId = $agency;
        } 

        public function __toString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $value;
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
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getFirstName() {
            return $this->AgtFirstName;
        }

        public function setFirstName($f_name) {
            $this->AgtFirstName = $f_name;
        }

        public function getMiddleInitial() {
            return $this->AgtMiddleInitial;
        }

        public function setMiddleInitial($m_name) {
            $this->AgtMiddleInitial = $m_name;
        }

        public function getLastName() {
            return $this->AgtLastName;
        }

        public function setLastName($l_name) {
            $this->AgtLastName = $l_name;
        }

        public function getPhone() {
            return $this->AgtBusPhone;
        }

        public function setPhone($bphone) {
            $this->AgtBusPhone = $bphone;
        }

        public function getEmail() {
            return $this->AgtEmail;
        }

        public function setEmail($email) {
            $this->AgtEmail = $email;
        }

        public function getPosition() {
            return $this->AgtPosition;
        }

        public function setPosition($pos) {
            $this->AgtPosition = $pos;
        }

        public function getAgency() {
            return $this->AgencyId;
        }

        public function setAgency($agency) {
            $this->AgencyId = $agency;
        }
    }
?>
