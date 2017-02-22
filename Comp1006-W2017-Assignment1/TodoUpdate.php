<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-21
 * Time: 8:49 PM
 */
include_once('TodesDatabase.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$todoName = filter_input(INPUT_POST, "NameTextField"); //$_POST["NameTextField"];
$todoNotes = filter_input(INPUT_POST, "NotesTextField"); //$_POST["CostTextField"];

if($isAddition == "1") {
    $query = "INSERT INTO todos (Name, Notes) VALUES (:todo_name, :todo_notes)";
    $statement = $db->prepare($query); // encapsulate the sql statement
}
else {
    $todoID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
    $query = "UPDATE todos SET Name = :todo_name, Cost = :todo_notes WHERE Id = :todo_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todo_id', $todoID);

}

$statement->bindValue(':todo_name', $todoName);
$statement->bindValue(':todo_notes', $todoNotes);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
include('TodoIndex.php');
?>