<?php

    // Create a database connection
    function connect_db() {
        $host = '127.0.0.1';
        $db = 'travelexperts';
        $user = 'admin';
        $pass = 'P@ssw0rd';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // Create new PHP data object(PDO)
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // returns the connected PDO instance in $pdo variable
        return $pdo;
    }
    
    // Close database connection
    function close_connection($pdo_obj) {
        $pdo_obj = NULL;
    }

    // Insert function
    function insertIntoDB($pdo_obj, &$db_obj, $dbTable) {

        $dbField = $db_obj->fieldString();
        $dbPrep = $db_obj->prepString();

        $dbArray = $db_obj->objToArray();

        $stmt = $pdo_obj->prepare("INSERT INTO $dbTable ($dbField) VALUES ($dbPrep)");
        $insert_success = $stmt->execute($dbArray);

        if ($insert_success) {
            return true;
        } else {
            return false;
        }
    }

    // get an array of package objects
    function GetPackages() {

        $my_pdo = connect_db();

        $sql = "SELECT * FROM packages";

        $stmt = $my_pdo->prepare($sql);
        $stmt->execute();
        // False is returned on failed fetch
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "ERROR: the sql failed to execute. <br>";
            echo "SQL: $sql <br>";
            echo "Error code: ". $stmt->errorCode() . "<br>";
            echo "Error msg: ". $stmt->errorInfo() . "<br>";
            return false;
        } else {

            $packages = [];
            foreach ($result as $pkg) {
                $package = new Package($pkg);
                $packages[] = $package;
            }

            return $packages;
        }

        close_connection($my_pdo);

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
