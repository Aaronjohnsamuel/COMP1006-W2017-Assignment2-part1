<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-21
 * Time: 8:05 PM
 */

//local db access
$dsn = 'mysql:host=localhost;dbname=todolist';
$userName = 'aaron';
$password = '12345';

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