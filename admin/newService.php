<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Tipton Garage</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include '../db_info.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<body>
<h1>New Service:</h1>
<form id="serviceCreate" action="addNewService.php" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text" id="name">Service Name</span>
        <input type='text' class='form-control' name='newservicename' id='newservicename' placeholder='Name of Service' aria-label='Name' aria-describedby='name'>
    </div>
    <div class="input-group mb-3">
        <span class='input-group-text' id='price'>Service Price</span>
        <input type='text' class='form-control' name='newserviceprice' id='newserviceprice' placeholder='Price of Service' aria-label='Price' aria-describedby='price'>
    </div>
    <div class="input-group mb-3">
        <span class='input-group-text' id='comment'>Service Comment</span>
        <input type='text' class='form-control' name='newservicecomment' id='newservicecomment' placeholder='Additional Comments' aria-label='comment' aria-describedby='comment'>
    </div>
    <input type="submit" value="Confirm New Service">
</form>
</body>
</html>
