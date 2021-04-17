<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Service - Tipton Garage</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<?php
include 'db_info.php';

function loadServiceList($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, name, price, comment FROM services');
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $price, $comment);
        while ($stmt->fetch()) {
            echo "<option value='$name'>$name - £$price - $comment</option>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

?>

<body>
<?php include "./common/navbar.html" ?>
<div class="container overflow-hidden">
    <div class="row gy-6 p-3 justify-content-center">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="bookingform">
                <h3 class="tipton-header">Please fill out the form below to contact us.</h3>
                <form action="bookingSubmit.php" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="vehMake">Your Vehicle Make:</span>
                        <input type="text" class="form-control" placeholder="Vehicle Make Here" id="vehicleMake" name="vehicleMake">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="vehModel">Your Vehicle Model:</span>
                        <input type="text" class="form-control" placeholder="Vehicle Model Here" id="vehicleModel" name="vehicleModel">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="serviceSelect">Service Requested:</label>
                        <select class="form-select" id="serviceSelect" name="serviceSelect">
                            <?php
                            loadServiceList($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="bookee">Your Email Address:</span>
                        <input type="text" class="form-control" placeholder="Your Email Here..." id="bookeeEmail" name="bookeeEmail">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="timeSlot">Your Requested Time-Slot:</span>
                        <input type="text" class="form-control" placeholder="Your Time Here..." id="bookingTime" name="bookingTime">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="comment">Additional Comments:</span>
                        <input type="text" class="form-control" placeholder="Any Comments Here..." id="bookingComment" name="bookingComment">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Create Booking</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?php include "./common/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>