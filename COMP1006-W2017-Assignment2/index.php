<?php

if(!isset($_GET["pageId"])) {
    $title = "Home";
    $templateString = 'Views/dashboard.php';
}
else {
    switch($_GET["pageId"]) {
        case "Contact":
            $title = "Contact";
            $templateString = 'Views/content/contact.php';
            break;
        case "Login":
            $title = "Login";
            $templateString = 'Users/login.php';
            break;
        case "Logout":
            $title = "Logout";
            $templateString = 'Users/logout.php';
            break;
        case "Register":
            $title = "Register";
            $templateString = 'Users/register.php';
            break;
        default:
            $title = "404";
            $templateString = "Views/errors/404.php";
            break;
    }
}
?>

<?php include_once('Views/partials/header.php'); ?>

<?php include_once ('Views/partials/navbar.php'); ?>

<?php require($templateString); ?>

<?php include_once ('Views/partials/footer.php');
