<?php
    include_once("functions.php");
    include_once("agencyClass.php");

    function GetAgency() {

        $dbh = connect_db();

        $sql = "SELECT * FROM agencies";

        if (!$result = $dbh->query($sql)){
            echo "ERROR: the sql failed to execute. <br>";
            echo "SQL: $sql <br>";
            echo "Error #: ". $dbh->errono. "<br>";
            echo "Error msg: ". $dbh->error ." <br>";
        }

        if ($result === 0 ){
            echo "There were no results<br>";
        }
        // initializing array for all customers
        $agencies = array();
        // looping through result for each customer($cust)
        while ($agen = $result->fetch_assoc()){
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
            // adding the customer object to array of customers
            $agencies[] = $agency;
        } // end of While
        
        CloseDB($dbh);
        return $agencies; // this is an array of customer objects

    }

?>