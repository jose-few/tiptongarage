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

if (!isset($_POST['booking'])) {
    exit('Please select a valid booking!');
}

function checkBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, service, bookee, make, model, time, comment  FROM bookings WHERE id = ?');
    $stmt->bind_param('i', $_POST['booking']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$service, $bookee, $make, $model, $time, $comment);
        $stmt->fetch();
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='id'>Booking ID</span>";
        echo "<input type='number' class='form-control' name='bookingid' id='bookingid' value='$id' aria-label='ID' aria-describedby='ID' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='service'>Service Requested</span>";
        echo "<input type='text' class='form-control' name='bookingservice' id='bookingservice' placeholder='$service' aria-label='Service' aria-describedby='service'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='bookee'>Booking Creator</span>";
        echo "<input type='text' class='form-control' name='bookingbookee' id='bookingbookee' placeholder='$bookee' aria-label='Booker' aria-describedby='bookee'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='vehMake'>Vehicle Make</span>";
        echo "<input type='text' class='form-control' name='bookingMake' id='bookingMake' placeholder='$make' aria-label='Make' aria-describedby='vehMake'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='vehModel'>Vehicle Model</span>";
        echo "<input type='text' class='form-control' name='bookingModel' id='bookingModel' placeholder='$model' aria-label='Model' aria-describedby='vehModel'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='time'>Booking Time-Slot</span>";
        echo "<input type='text' class='form-control' name='bookingtime' id='bookingtime' placeholder='$time' aria-label='Time' aria-describedby='time'>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='comment'>Additional Comments</span>";
        echo "<input type='text' class='form-control' name='bookingcomment' id='bookingcomment' placeholder='$comment' aria-label='Comment' aria-describedby='comment'>";
        echo "</div>";
    }
    $stmt->close();
    $con->close();
}

function deleteBooking($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, service, bookee, make, model, time, comment  FROM bookings WHERE id = ?');
    $stmt->bind_param('i', $_POST['booking']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id,$service, $bookee, $make, $model, $time, $comment);
        $stmt->fetch();
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='id'>Booking ID</span>";
        echo "<input type='number' class='form-control' name='bookingid' id='bookingid' value='$id' aria-label='ID' aria-describedby='ID' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='service'>Service Requested</span>";
        echo "<input type='text' class='form-control' name='bookingservice' id='bookingservice' value='$service' aria-label='Service' aria-describedby='service' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='bookee'>Booking Creator</span>";
        echo "<input type='text' class='form-control' name='bookingbookee' id='bookingbookee' value='$bookee' aria-label='Booker' aria-describedby='bookee' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='vehMake'>Vehicle Make</span>";
        echo "<input type='text' class='form-control' name='bookingMake' id='bookingMake' value='$make' aria-label='Make' aria-describedby='vehMake' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='vehModel'>Vehicle Model</span>";
        echo "<input type='text' class='form-control' name='bookingModel' id='bookingModel' value='$model' aria-label='Model' aria-describedby='vehModel' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='time'>Booking Time-Slot</span>";
        echo "<input type='text' class='form-control' name='bookingtime' id='bookingtime' value='$time' aria-label='Time' aria-describedby='time' readonly>";
        echo "</div>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='comment'>Additional Comments</span>";
        echo "<input type='text' class='form-control' name='bookingcomment' id='bookingcomment' value='$comment' aria-label='Comment' aria-describedby='comment' readonly>";
        echo "</div>";
    }
    $stmt->close();
    $con->close();
}
?>
<body>
<h1>Edit Booking:</h1>
<form id="bookingsUpdate" action="sendBookingUpdate.php" method="post">
    <?php
        checkBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    ?>
    <input type="submit" value="Confirm Booking Update">
</form>
<h1>Delete Booking:</h1>
<form id="bookingDelete" action="deleteBooking.php" method="post">
    <?php
        deleteBooking($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    ?>
    <input type="submit" value="Confirm Delete">
</form>
</body>
</html>