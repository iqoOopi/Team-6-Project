<?php

    // Create a database connection
    function connect_db() {
        $host = '127.0.0.1';
        $db = 'travelexperts';
        $user = 'admin';
        $pass = 'P@ssw0rd';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // returns the connected PDO instance in $pdo variable
        return $pdo;
    }
    
    // Close database connection
    function close_connection($pdo_obj) {
        $pdo_obj = NULL;
    }

    // Insert agent
    function insert_agent($pdo_obj, &$agent_obj) {

        $stmt = $pdo_obj->prepare("INSERT INTO agents (AgtFirstName, AgtMiddleInitial, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition, AgencyId) VALUES (:AgtFirstName, :AgtMiddleInitial, :AgtLastName, :AgtBusPhone, :AgtEmail, :AgtPosition, :AgencyId)");
        $insert_success = $stmt->execute([
                     'AgtFirstName' => $agent_obj->getFirstName(),
                     'AgtMiddleInitial' => $agent_obj->getMiddleInitial(),
                     'AgtLastName' => $agent_obj->getLastName(),
                     'AgtBusPhone' => $agent_obj->getPhone(),
                     'AgtEmail' => $agent_obj->getEmail(),
                     'AgtPosition' => $agent_obj->getPosition(),
                     'AgencyId' => $agent_obj->getAgency(),
        ]);

        if ($insert_success) {
            return true;
        } else {
            return false;
        }
    }

    // Clean user input
    function clean_input($var) {
        $data = trim($var);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Open and read userinfo file
    function read_authorized_users() {
        $filename = "userinfo.txt";
        $fh = file($filename);
        $authorized_users = [];

        if ($fh) {
            foreach ($fh as $row) {
                $buffer = explode(",", $row);

                $username = clean_input($buffer[0]);
                $password = clean_input($buffer[1]);
                
                $authorized_users[] = array("username" => $username, "password" => $password);
            }
        } else {
            echo "Error: unable to open file: " . $filename . "for read";
        }

        return $authorized_users;
    }

    function validate_user($user_input) {
        // get authorized users from file
        $user_validated = false;
        $authorized_users = read_authorized_users();

        foreach ($authorized_users as $user_infile) {
            if ($user_input['username'] === $user_infile['username']) {
                if ($user_input['password'] === $user_infile['password']) {
                    $user_validated = true;
                    return $user_validated;
                }
            }
        }
        return $user_validated;
    }
  
?>
