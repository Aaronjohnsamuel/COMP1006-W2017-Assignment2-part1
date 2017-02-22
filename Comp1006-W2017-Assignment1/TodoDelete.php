<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-21
 * Time: 8:49 PM
 */
include_once('TodesDatabase.php');

$todoID = $_GET["id"]; // assigns the gameID from the URL

if($todoID != false) {
    $query = "DELETE FROM todos WHERE id = :todo_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":todo_id", $todoID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}

// redirect back to the index page
include("TodoIndex.php");

?>