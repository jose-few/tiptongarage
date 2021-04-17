<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include '../db_info.php';

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

if (!isset($_POST['bookingid'], $_POST['bookingservice'], $_POST['bookingbookee'], $_POST['bookingMake'], $_POST['bookingModel'], $_POST['bookingtime'], $_POST['bookingcomment'])) {
    exit('Please select a valid booking!');
}

function updateBooking($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('UPDATE bookings SET service=?, bookee=?, make=?, model=?, time=?, comment=? WHERE id = ?');
    $stmt->bind_param("sssssss", $_POST['bookingservice'], $_POST['bookingbookee'], $_POST['bookingMake'], $_POST['bookingModel'], $_POST['bookingtime'], $_POST['bookingcomment'], $_POST['bookingid']);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

updateBooking($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
header('Location: admin.php');
?>

