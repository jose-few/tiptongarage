<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include '../db_info.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

if (!isset($_POST['serviceid'], $_POST['servicename'], $_POST['serviceprice'])) {
    exit('Please select a valid service!');
}

function deleteServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('DELETE FROM services WHERE id = ?');
    $stmt->bind_param("s", $_POST['serviceid']);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

deleteServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
header('Location: admin.php');
?>

