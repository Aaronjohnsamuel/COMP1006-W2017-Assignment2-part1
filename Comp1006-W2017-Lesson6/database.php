<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-15
 * Time: 3:32 PM
 */
// connection string

// cleardb access
$dsn = 'mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=videogamesdb';
$userName = 'b6ee96bd470785';
$password = 'dc381279';

//local db access
//$dsn = 'mysql:host=localhost;dbname=gamedb';
//$userName = 'dasha';
//$password = '12345';

// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);

}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}

?>