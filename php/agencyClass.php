<?php
    class Agency{
        public $AgencyId;
        public $AgencyAddress;
        public $AgencyCity;
        public $AgencyProv;
        public $AgencyPostal;
        public $AgencyCountry;
        public $AgencyPhone;
        public $AgencyFax;

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
    }
?>
