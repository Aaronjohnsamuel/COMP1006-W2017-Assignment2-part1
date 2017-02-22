<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-21
 * Time: 8:28 PM
 */

include_once('TodesDatabase.php'); // include the database connection file

$gameID = $_GET["todoID"]; // assigns the todoID from the URL

if($todoID == 0) {
    $todoID = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
    $query = "SELECT * FROM todos WHERE Id = :todo_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todo_id', $todoID);
    $statement->execute(); // run on the db server
    $todo = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Todo Details</h1>
            <form>
                <div class="form-group">
                    <label for="IDTextField" hidden>Todo ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Todo ID" value="<?php echo $todo['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="NameTextField">Todos</label>
                    <input type="text" class="form-control" id="NameTextField"  name="NameTextField"
                           placeholder="Todos" required  value="<?php echo $todo['Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="NotesTextField">Notes</label>
                    <input type="text" class="form-control" id="NotesTextField" name="NotesTextField"
                           placeholder="Notes" required  value="<?php echo $todo['Cost']; ?>">
                </div>
                <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">

                <a class="btn btn-primary" href="TodoUpdate.php?todoID=<?php echo $todo['id'] ?>"> Update</a>
                <a class="btn btn-danger" href="TodoDelete.php?todoID=<?php echo $todo['id'] ?>"><i class="fa fa-trash-o"></i> Delete</a>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>

