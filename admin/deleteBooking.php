<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include '../db_info.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

if (!isset($_POST['bookingid'], $_POST['bookingservice'], $_POST['bookingbookee'], $_POST['bookingtime'], $_POST['bookingcomment'])) {
    exit('Please select a valid booking!');
}


function deleteBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('DELETE FROM bookings WHERE id = ?');
    $stmt->bind_param("s", $_POST['bookingid']);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

deleteBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
header('Location: admin.php');
?>