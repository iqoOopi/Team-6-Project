<?php

// Create a database connection
function connectDb()
{
    $host    = '127.0.0.1';
    $db      = 'travelexperts';
    $user    = 'admin';
    $pass    = 'P@ssw0rd';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // Create new PHP data object(PDO)
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // returns the connected PDO instance in $pdo variable
    return $pdo;
}

// Close database connection
function closeConnection($pdo_obj)
{
    $pdo_obj = null;
}

// Insert function
function insertIntoDB($pdo_obj, &$db_obj, $dbTable)
{

    $dbField = $db_obj->fieldString();
    $dbPrep  = $db_obj->prepString();

    $dbArray = $db_obj->objToArray();

    $stmt           = $pdo_obj->prepare("INSERT INTO $dbTable ($dbField) VALUES ($dbPrep)");
    $insert_success = $stmt->execute($dbArray);

    if ($insert_success) {
        return true;
    } else {
        return false;
    }
}

// get an array of package objects
function GetPackages()
{

    $my_pdo = connectDb();

    $sql = "SELECT * FROM packages";

    $stmt = $my_pdo->prepare($sql);
    $stmt->execute();
    // False is returned on failed fetch
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) {
        echo "ERROR: the sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error code: " . $stmt->errorCode() . "<br>";
        echo "Error msg: " . $stmt->errorInfo() . "<br>";
        return false;
    } else {

        $packages = [];
        foreach ($result as $pkg) {
            $package    = new Package($pkg);
            $packages[] = $package;
        }

        return $packages;
    }

    closeConnection($my_pdo);

}

//generic create instants of Classes from DB.
//For example, creating customer class instants from "customers" table in DB by call $customers=getInstants('customers','customer');
//Also you can get particular instant out of one table by assign "key" value, which is Id.
//if no key present the return will be an array, otherwise will return back a class.
function getInstants($dbTableName, $className, $key = null)
{
    //use mysqli connect style instead of PDO

    $link = connectDb();

    if (!$key) {
        $sql  = "SELECT * FROM $dbTableName";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //error handling
        if (!$result) {
            echo "ERROR: the sql failed to execute. <br>";
            echo "SQL: $sql <br>";
            echo "Error code: " . $stmt->errorCode() . "<br>";
            echo "Error msg: " . $stmt->errorInfo() . "<br>";
            return false;
        }

    } else {
        //get the primary key column name
        $sql  = "SHOW KEYS FROM $dbTableName WHERE Key_name = 'PRIMARY'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $result               = $stmt->fetch(PDO::FETCH_ASSOC);

          //error handling
          if (!$result) {
            echo "ERROR: the sql failed to execute. <br>";
            echo "SQL: $sql <br>";
            echo "Error code: " . $stmt->errorCode() . "<br>";
            echo "Error msg: " . $stmt->errorInfo() . "<br>";
            return false;
        }
        $primaryKeyColumnName = $result['Column_name'];
        $sql                  = "SELECT * FROM $dbTableName WHERE $primaryKeyColumnName=$key";
    }
    $stmt = $link->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (!$result) {
        echo "ERROR: the sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error code: " . $link->connect_errno . "<br>";
        echo "Error msg: " . $link->connect_error . "<br>";
        return false;
    }

        $instants = [];
        foreach ($result as $instant) {
            $instant    = new $className($instant);
            $instants[] = $instant;
        }
        //change return depends on $key
        if (!$key) {
            return $instants;
        } else {
            return $instants[0];
        }
    $link->Close();

}

// Clean user input
function cleanInput($var)
{
    $data = trim($var);
    $data = htmlspecialchars($data);
    return $data;
}

// Open and read userinfo file
function readAuthorizedUsers()
{
    $filename         = "userinfo.txt";
    $fh               = file($filename);
    $authorized_users = [];

    if ($fh) {
        foreach ($fh as $row) {
            $buffer = explode(",", $row);

            $username = cleanInput($buffer[0]);
            $password = cleanInput($buffer[1]);

            $authorized_users[] = array("username" => $username, "password" => $password);
        }
    } else {
        echo "Error: unable to open file: " . $filename . "for read";
    }

    return $authorized_users;
}

function validateUser($user_input)
{
    // get authorized users from file
    $user_validated   = false;
    $authorized_users = readAuthorizedUsers();

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