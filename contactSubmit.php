<?php
include 'db_info.php';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['name'], $_POST['email'], $_POST['query']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill out all of the required fields.');
}
$stmt = $con->prepare('INSERT INTO contact (name, email, query) VALUES (?, ?, ?)');
$stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['query']);
$stmt->execute();
$stmt->close();
$con->close();
header('Location: contact.php');