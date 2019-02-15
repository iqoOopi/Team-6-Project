<!--
    *************************************************
    *
    *Author:Haotian Zhang
    *Date: Feb 08 2019
    *Purpose: commit booking info to DB
    *
    *************************************************
 -->

<?php
include '../top.php';
include_once '../functions.php';
include_once '../packageClass.php';
include_once '../bookingClass.php';
if (!isset($_POST['CheckOut'])) {
//header back to package list in case of illegal view
header("Location: http://localhost{$_root}/php/packages.php");
}
//bookings Table Structure
//BookingId auto increamental
$BookingDate=date("Y-m-d H:i:s",$_POST['BookingDate']);
//BookingNo to be filled later on
$TravelerCount=$_POST['TravelerCount'];
$customerId=$_SESSION['customerId'];
$TripTypeId=$_POST['TripTypeId'];
$packageId=$_POST['packageId'];

//for large group contain more than 10 people. Will need agent to edit later on
if ($TravelerCount=='10+'){
    $TravelerCount=NULL;
}

$booking=new booking($BookingDate,NULL,$TravelerCount,$customerId,$TripTypeId,$packageId);

$pdo=connectDb();
$result=insertIntoDB($pdo, $booking, 'bookings');
closeConnection($pdo);

if ($result) {
    echo "<script>alert('Success!');
    window.location.href = '../../index.php'
    </script>";
} else {
    echo "<script>alert('Failed!');
    window.location.href = '../../index.php'
    </script>";
}
?>