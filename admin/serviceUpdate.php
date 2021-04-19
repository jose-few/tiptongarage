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

if (!isset($_POST['service'])) {
    exit('Please select a valid service!');
}

function checkServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, name, price FROM services WHERE id = ?');
    $stmt->bind_param('i', $_POST['service']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$name, $price);
        $stmt->fetch();
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='id'>Service ID</span>";
        echo "<input type='number' class='form-control' name='serviceid' id='serviceid' value='$id' aria-label='ID' aria-describedby='ID' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='name'>Service Name</span>";
        echo "<input type='text' class='form-control' name='servicename' id='servicename' placeholder='$name' aria-label='Name' aria-describedby='name'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='price'>Service Price</span>";
        echo "<input type='text' class='form-control' name='serviceprice' id='serviceprice' placeholder='$price' aria-label='Price' aria-describedby='price'>";
        echo "</div>";
    }
    $stmt->close();
    $con->close();
}

function deleteService($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, name, price FROM services WHERE id = ?');
    $stmt->bind_param('i', $_POST['service']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$name, $price);
        $stmt->fetch();
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='id'>Service ID</span>";
        echo "<input type='number' class='form-control' name='serviceid' id='serviceid' value='$id' aria-label='ID' aria-describedby='ID' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='name'>Service Name</span>";
        echo "<input type='text' class='form-control' name='servicename' id='servicename' value='$name' aria-label='Name' aria-describedby='name' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='price'>Service Price</span>";
        echo "<input type='text' class='form-control' name='serviceprice' id='serviceprice' value='$price' aria-label='Price' aria-describedby='price' readonly>";
        echo "</div>";
    }
    $stmt->close();
    $con->close();
}
?>
<body>
<h1>Edit Service:</h1>
<form id="servicesUpdate" action="sendServiceUpdate.php" method="post">
    <?php
        checkServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    ?>
    <input type="submit" value="Confirm Service Update">
</form>
<h1>Delete Service:</h1>
<form id="serviceDelete" action="deleteService.php" method="post">
    <?php
        deleteService($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    ?>
    <input type="submit" value="Confirm Delete">
</form>
</body>
</html>