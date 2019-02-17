<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *
    *************************************************
 -->
<?php
class booking{
protected $BookingDate;
protected $BookingNo;
protected $TravelerCount;
protected $customerId;
protected $TripTypeId;
protected $packageId;



public function __construct($BookingDate, $BookingNo, $TravelerCount, $customerId, $TripTypeId, $packageId) {
    $this->BookingDate = $BookingDate; 
    $this->BookingNo = $BookingNo; 
    $this->TravelerCount = $TravelerCount;
    $this->customerId = $customerId;
    $this->TripTypeId = $TripTypeId;
    $this->packageId = $packageId;
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


public function getBookingDate() {
    return $this->BookingDate;
}

public function setBookingDate($x) {
    $this->id = $x;
}

public function getTravelerCount() {
    return $this->TravelerCount;
}

public function setTravelerCount($x) {
    $this->TravelerCount = $x;
}

public function getCustomerId() {
    return $this->customerId;
}

public function setCustomerId($x) {
    $this->customerId = $x;
}

public function getTripTypeId() {
    return $this->TripTypeId;
}

public function setTripTypeId($x) {
    $this->TripTypeId = $x;
}

public function getPackageId() {
    return $this->packageId;
}

public function setPackageId($x) {
    $this->packageId = $x;
}

}


?>