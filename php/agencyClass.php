<!--
    *************************************************
    *
    *Author:Brent Ward
    *Date: Feb 08 2019
    *Purpose: Class for the Agency Table
    *
    *************************************************
 -->
<?php
    class Agency{
        private $AgencyId;
        private $AgencyAddress;
        private $AgencyCity;
        private $AgencyProv;
        private $AgencyPostal;
        private $AgencyCountry;
        private $AgencyPhone;
        private $AgencyFax;

        public function __construct($id, $add, $city, $prov, $postal, $country, $phone, $fax){
            $this->AgencyId = $id;
            $this->AgencyAddress = $add;
            $this->AgencyCity = $city;
            $this->AgencyProv = $prov;
            $this->AgencyPostal = $postal;
            $this->AgencyCountry = $country;
            $this->AgencyPhone = $phone;
            $this->AgencyFax = $fax;
        }

        //Allows Values to be grabbed for use on Contact page
        public function getAgencyId() {
            return $this->AgencyId;
        }
        public function getAgencyAddress() {
            return $this->AgencyAddress;
        }
        public function getAgencyCity() {
            return $this->AgencyCity;
        }
        public function getAgencyProv() {
            return $this->AgencyProv;
        }
        public function getAgencyPostal() {
            return $this->AgencyPostal;
        }
        public function getAgencyCountry() {
            return $this->AgencyCountry;
        }
        public function getAgencyPhone() {
            return $this->AgencyPhone;
        }
        public function getAgencyFax() {
            return $this->AgencyFax;
        }
    }
?>
