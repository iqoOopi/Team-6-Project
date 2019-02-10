<?php
include_once '../functions.php';
include_once '../packageClass.php';
include_once '../bookingClass.php';
if (!isset($_POST['submit'])) {
//header back to package list in case of illegal view
header("Location: $_root/php/packages.php");
}
//bookings Table Structure
//BookingId auto increamental
$BookingDate=$_POST['BookingDate'];
//BookingNo to be filled later on
$TravelerCount=$_POST['TravelerCount'];
$customerId=$_POST['customerId'];
$TripTypeId=$_POST['TripTypeId'];
$packageId=$_POST['packageId'];

$booking=new booking($BookingDate,NULL,$TravelerCount,$customerId,$TripTypeId,$packageId);

$pdo=connectDb();
$result=insertIntoDB($pdo, $booking, 'bookings');
closeConnection($pdo);

if ($result) {
    echo "<p class=\"insert_notification\" style=\"color:yellow;font-size:1.2rem\">insert success</p>";
} else {
    echo "<p class=\"insert_notification\" style=\"color:red;font-size:1.2rem\">insert failed</p>";
}


// //bookingdetails Table Structure
// $pkg=getInstants('packages','package',$packageId);
// //BookingDetailId auto increamental
// //ItineraryNo to be filled later on
// $TripStart=$pkg->getStartDate();
// $TripEnd=$pkg->getEndDate();
// //Description to be added later on
// //Destination to be added later on
// $BasePrice=$pkg->getPrice();
// $AgencyCommission=$pkg->getCommission();
// //$BookingId should get from bookings table
// //$RegionId be added later on or determined by user location?
// $ClassId=$_POST['ClassId'];
// //$FeeId be added later on?
// // $ProductSupplierId be added later on?





?>