<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Tipton Garage</title>
</head>
<body>
<div>
    <h1>Admin Page</h1>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>
</body>
</html>
