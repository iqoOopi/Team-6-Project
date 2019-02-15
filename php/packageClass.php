<?php
    /************************************
    *   Author: Dao Zheng
    *   Course: PROJ-216-OSD
    *   Date: 2019/Feb/15
    * *************************************/

    class Package {
        protected $PackageId;
        protected $PkgName;
        protected $PkgStartDate;
        protected $PkgEndDate;
        protected $PkgDesc;
        protected $PkgBasePrice;
        protected $PkgAgencyCommission;

        public function __construct($assoc_array) {
            foreach($assoc_array as $key => $value) {
                $this->$key = $value;
               
            }
        }

        public function __toString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $value;
                // print "$key => $value<br>";
            }

            $valueString = implode("," , $tempArray);
            return $valueString;
            
        }

        public function getId() {
            return $this->PackageId;
        }

        public function setId($id) {
            $this->PackageId = $id;
        }

        public function getPkgName() {
            return $this->PkgName;
        }

        public function setPkgName($name) {
            $this->PkgName = $name;
        }

        public function getStartDate() {
            return $this->PkgStartDate;
        }

        public function setStartDate($date) {
            $this->PkgStartDate = $date;
        }

        public function getEndDate() {
            return $this->PkgEndDate;
        }

        public function setEndDate($date) {
            $this->PkgEndDate = $date;
        }

        public function getDesc() {
            return $this->PkgDesc;
        }

        public function setDesc($desc) {
            $this->PkgDesc = $desc;
        }

        public function getPrice() {
            $price = substr($this->PkgBasePrice, 0, -2);
            return $price;
        }

        public function setPrice($price) {
            $this->PkgBasePrice = $price;
        }

        public function getCommission() {
            return $this->PkgAgencyCommission;
        }

        public function setCommission($commission) {
            $this->PkgAgencyCommission = $commission;
        }

    }        

?>
