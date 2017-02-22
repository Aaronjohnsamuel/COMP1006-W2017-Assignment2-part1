<?php
/**
 * Created by PhpStorm.
 * User: Aaron John
 * Date: 2017-02-21
 * Time: 5:46 PM
 */

include_once('TodesDatabase.php');

$query = "SELECT * FROM todos"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$todos= $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMP1006</title>
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
            <h1>Todo List</h1>
            <a class="btn btn-primary" href="TodoDetiles.php?gameID=0">
                <i class="fa fa-plus"></i> Add New Todo</a>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Todos</th>
                    <th></th>
                    <th>Notes</th>
                </tr>
                <?php foreach($todos as $todo) : ?>
    <tr>
        <td><?php echo $todo['id'] ?></td>
        <td><?php echo $todo['Name'] ?></td>
        <td><input type="checkbox" name="myTodoCheckBox" value="unchecked" <?php echo $todo['Completed'] ?> /></td>
        <td><?php echo $todo['Notes'] ?></td>

        <td><a class="btn btn-primary" href="TodoDetiles.php?todoID=<?php echo $todo['Id'] ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
    </tr>
<?php endforeach; ?>

</table>

</div>
</div>
</div>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>