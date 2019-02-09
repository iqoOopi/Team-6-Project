<!--
    *************************************************
    *
    *Author:Brent Ward
    *Date: Feb 08 2019
    *Purpose: To grab data from the Agency table
    *
    *************************************************
 -->
<?php
    include_once("functions.php");
    include_once("agencyClass.php");

    function GetAgency() {

        $dbh = connectDb();

        $sql = "SELECT * FROM agencies";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $result will return an array of associated arrays from the agencies database
        // Array ( [0] => Array ( 
        //              [AgencyId] => 1 
        //              [AgencyAddress] => 1155 8th Ave SW 
        //              [AgencyCity] => Calgary 
        //              [AgencyProv] => AB 
        //              [AgencyPostal] => T2P1N3 
        //              [AgencyCountry] => Canada 
        //              [AgencyPhone] => 4032719873 
        //              [AgencyFax] => 4032719872 ) 
        //          [1] => Array ( 
        //              [AgencyId] => 2 
        //              [AgencyAddress] => 110 Main Street 
        //              [AgencyCity] => Okotoks 
        //              [AgencyProv] => AB 
        //              [AgencyPostal] => T7R3J5 
        //              [AgencyCountry] => Canada 
        //              [AgencyPhone] => 4035632381 
        //              [AgencyFax] => 4035632382 ) )
        print ("result: <br><br>");
        print_r ($result);
        print ("<br><br>");
        $agencies = [];
        foreach ($result as $agen) {
            // Constructing a singe customer object
            $agency = new Agency(
                $agen["AgencyId"],
                $agen["AgencyAddress"],
                $agen["AgencyCity"],
                $agen["AgencyProv"],
                $agen["AgencyPostal"],
                $agen["AgencyCountry"],
                $agen["AgencyPhone"],
                $agen["AgencyFax"]);
            $agencies[] = $agency;
        }

        if (!$result) {
        //if (!$result = $dbh->query($sql)){
            echo "ERROR: the sql failed to execute. <br>";
            echo "SQL: $sql <br>";
            echo "Error #: ". $dbh->errono. "<br>";
            echo "Error msg: ". $dbh->error ." <br>";
        }

        if ($result === 0 ){
            echo "There were no results<br>";
        }
        // initializing array for all customers
        // $agencies = array();
        // looping through result for each customer($cust)
//        while ($agen = $dbh->fetch(PDO::FETCH_ASSOC)){
//            // Constructing a singe customer object
//            $agency = new Agency(
//                $agen["AgencyId"],
//                $agen["AgencyAddress"],
//                $agen["AgencyCity"],
//                $agen["AgencyProv"],
//                $agen["AgencyPostal"],
//                $agen["AgencyCountry"],
//                $agen["AgencyPhone"],
//                $agen["AgencyFax"]);
//            // adding the customer object to array of customers
//            $agencies[] = $agency;
//        } // end of While
        
        closeConnection($dbh);
        return $agencies; // this is an array of customer objects

    }

?>
