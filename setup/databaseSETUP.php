<?php
include '../db_info.php';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = "CREATE TABLE admin (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "users table created successfully.";
} else {
    echo "users table failed: " .$con->error;
}

$admin='admin';
$password='password';
$stmt = $con->prepare('INSERT INTO admin (username, password) VALUES (?, ?)');
$stmt->bind_param("ss", $admin, $password);
$stmt->execute();
$stmt->close();

$sql = "CREATE TABLE bookings (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
service VARCHAR(15) NOT NULL,
bookee VARCHAR(25) NOT NULL,
time VARCHAR(30) NOT NULL,
comment VARCHAR(500) NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "bookings table created successfully.";
} else {
    echo "bookings table failed: " .$con->error;
}

$sql = " CREATE TABLE contact (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(20) NOT NULL,
 email VARCHAR(40) NOT NULL,
 query VARCHAR(500) NOT NULL
 )";

if ($con->query($sql) === TRUE) {
    echo "contacts table created successfully.";
} else {
    echo "contacts table failed: " .$con->error;
}

$sql = " CREATE TABLE services (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(20) NOT NULL,
 price VARCHAR(10) NOT NULL,
 comment VARCHAR(500) NOT NULL
 )";

if ($con->query($sql) === TRUE) {
    echo "services table created successfully.";
} else {
    echo "services table failed: " .$con->error;
}

$con->close();