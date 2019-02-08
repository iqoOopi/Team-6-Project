<?php
    class Agency{
        public $agencyId;
        public $agencyAddress;
        public $agencyCity;
        public $agencyProv;
        public $agencyPostal;
        public $agencyCountry;
        public $agencyPhone;
        public $agencyFax;

        public function __construct($id, $add, $city, $prov, $postal, $country, $phone, $fax){
            $this->$agencyId = $id;
            $this->$agencyAddress = $add;
            $this->agencyCity = $city;
            $this->$agencyProv = $prov;
            $this->$agencyPostal = $postal;
            $this->$agencyCountry = $country;
            $this->$agencyPhone = $phone;
            $this->agencyFax = $fax;
        }
    }
?>
