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

        $agencies =getInstants('agencies','Agency');
        // $dbh = connectDb();

        // $sql = "SELECT * FROM agencies";

        // $stmt = $dbh->prepare($sql);
        // $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        //print ("result: <br><br>");
        //print_r ($result);
        //print ("<br><br>");
        // $agencies = [];
        // foreach ($result as $agen) {
        //     // Constructing a singe customer object
        //     $agency = new Agency(
        //         $agen["AgencyId"],
        //         $agen["AgencyAddress"],
        //         $agen["AgencyCity"],
        //         $agen["AgencyProv"],
        //         $agen["AgencyPostal"],
        //         $agen["AgencyCountry"],
        //         $agen["AgencyPhone"],
        //         $agen["AgencyFax"]);
        //     $agencies[] = $agency;
        // }
        foreach($agencies as $value){
            //gathers all the data for it to be added to a list
            $agencyAddress = $value->getAgencyAddress();
            $agencyCity = $value->getAgencyCity();
            $agencyProv = $value->getAgencyProv();
            $agencyPostal = $value->getAgencyPostal();
            $agencyCounty = $value->getAgencyCountry();
            $agencyPhone = $value->getAgencyPhone();
            $agencyFax = $value->getAgencyFax();
            
            //builds a list with agency information
            print "<div class='agency'><section class='contactInfo'>";
            print "<h2>" . $agencyCity . " Offices:</h2>";
            print "<ul>";
            print "<li>" . $agencyAddress . "</li>";
            print "<li>" . $agencyProv . ", " . $agencyCounty. "</li>";
            print "<li>Phone: " . $agencyPhone . "</li>";
            print "<li>Fax: " . $agencyFax . "</li>";
            print "</ul></section>";
            //creates a google maps box for agency address Google maps API was not working properly -> forced to make a manual workaround.
            print "<section class='map'>";
            if($agencyPostal === "T2P1N3"){
                print '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10033.477565530322!2d-114.0884208437619!3d51.04626678257586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53716fe76e972489%3A0x149461cedf5b7c5b!2s1155+8+Ave+SW%2C+Calgary%2C+AB!5e0!3m2!1sen!2sca!4v1550006230880" 
                    width="350" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>';
            }
            if($agencyPostal === "T7R3J5"){
                print '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.101293380268!2d-114.01508708427095!3d51.2908599796001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53715f6e569fb147%3A0x9298431dc89d1c88!2s110+Main+St+S%2C+Airdrie%2C+AB+T4B+0P8!5e0!3m2!1sen!2sca!4v1550006755754" 
                    width="350" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>';
            }
            print "</section></div>";
        }

        // if (!$result) {
        // //if (!$result = $dbh->query($sql)){
        //     echo "ERROR: the sql failed to execute. <br>";
        //     echo "SQL: $sql <br>";
        //     echo "Error #: ". $dbh->errono. "<br>";
        //     echo "Error msg: ". $dbh->error ." <br>";
        // }

        // if ($result === 0 ){
        //     echo "There were no results<br>";
        // }
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
        
        // closeConnection($dbh);
        return $agencies; // this is an array of customer objects

    }

?>
