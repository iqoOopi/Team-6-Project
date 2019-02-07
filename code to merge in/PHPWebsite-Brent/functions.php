<?php
    //extra function to be used to connect to the DB
    function connectDB(){
        include_once("variables.php");
        $dbh  = mysqli_connect($host, $user, $password, $database);
        if(!$dbh){
            print "Connection Unsuccessful: " . mysqli_error($dbh);
            exit;
        }else {print "Connection success.<br>";}
        return $dbh;
    }
    //extra function to be used to disconnect from the DB
    function quitDB($dbh){mysqli_close($dbh);}

    //function to insert an agent into the database
    function insertAgent($agentArray){
        $link = connectDB();
        $sql = "INSERT INTO agents 
            (   AgtFirstName,
                AgtMiddleInitial,
                AgtLastName,
                AgtBusPhone,
                AgtEmail, 
                AgtPosition,
                AgencyId    )
                VALUES (?,?,?,?,?,?,?)";
        
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssssi', 
            $agentArray["AgtFirstName"],
            $agentArray["AgtMiddleInitial"],
            $agentArray["AgtLastName"],
            $agentArray["AgtBusPhone"],
            $agentArray["AgtEmail"],
            $agentArray["AgtPosition"],
            $agentArray["AgencyId"]);


        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        quitDB($link);
        return $result;
    }

    function getUsers(){
        $userArray = file("users.txt");
        $users = array();

        //trims spaces
        foreach($userArray as $row){
            $values = explode(",", $row);
            $users[trim($values[0])] = trim($values[1]);
        }
        return $users;
    }
?>