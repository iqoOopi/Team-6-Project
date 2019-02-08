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

// Insert function, & is necessary for php version <5, 
function insertIntoDB($pdo_obj, &$db_obj, $dbTable)
{

    $dbField = $db_obj->fieldString();
    $dbValue = $db_obj;

    $dbSql = "INSERT INTO $dbTable ($dbField) VALUES ($dbValue)";
    $insert_success=$pdo_obj->query($dbSql);

    // $dbPrep = $db_obj->prepString();

    // $dbArray = $db_obj->objToArray();

    // $stmt = $pdo_obj->prepare("INSERT INTO $dbTable ($dbField) VALUES ($dbPrep)");
    // $insert_success = $stmt->execute($dbArray);

    if ($insert_success) {
        return true;
    } else {
        return false;
    }
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