<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-15
 * Time: 3:33 PM
 */
include_once('database.php');

$gameID = $_GET["gameID"]; // assigns the gameID from the URL

if($gameID != false) {
    $query = "DELETE FROM games WHERE Id = :game_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":game_id", $gameID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}

// redirect back to the index page
include("index.php");

?>