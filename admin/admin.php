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

function loadContactQueries($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, name, email, query FROM contact');
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email, $query);
        while ($stmt->fetch()) {
            echo "<tr><th scope='row'>$id</th><td>$name</td><td>$email</td><td>$query</td></tr>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

function loadServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
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
            echo "<tr><th scope='row'>$id</th><td>$name</td><td>$price</td><td>$comment</td></tr>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

function servicesDropdown($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, name FROM services');
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name);
        while ($stmt->fetch()) {
            echo "<option value='$id'>$name</option>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

function loadBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, service, bookee, make, model, time, comment FROM bookings');
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $service, $bookee, $make, $model, $time, $comment);
        while ($stmt->fetch()) {
            echo "<tr><th scope='row'>$id</th><td>$service</td><td>$bookee</td><td>$make</td><td>$model</td><td>$time</td><td>$comment</td></tr>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

function bookingsDropdown($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME) {
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $stmt = $con->prepare('SELECT id, service, bookee, make, model FROM bookings');
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $service, $bookee, $make, $model);
        while ($stmt->fetch()) {
            echo "<option value='$id'>$id - $service - $bookee - $make - $model</option>";
        }
    } else {
        echo "No queries found!";
    }
    $stmt->close();
    $con->close();
}

?>

<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light"> <!-- Bootstrap NavBar class -->
    <div class="container-fluid">
        <a class="navbar-brand">Admin - Tipton Garage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <!-- Dropdown toggle for menu on mobile devices -->
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container overflow-hidden">
    <div class="row gy-6 p-3 justify-content-center">
        <div class="col-sm-2">
            <h5>Tipton Garage Admin Page</h5>
            <p>
                Here you can view contact queries,
                make adjustments to services the garage
                offers, and view/edit bookings made
                by customers.
            </p>
        </div>
        <div class="col-sm-8">
            <div class="queries">
                <h3 class="tipton-header">View Contact Queries:</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Query</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        loadContactQueries($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="services">
                <h3 class="tipton-header">View Services:</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        loadServices($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <h4 class="tipton-header">Adjust Services:</h4>
                <form id="servicesForm" action="serviceUpdate.php" method="post">
                    <select form="servicesForm" name="service" id="service" class="form-select">
                        <?php
                        servicesDropdown($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                        ?>
                    </select>
                    <input type="submit" class="btn btn-light" value="Edit Service">
                </form>
                <a href="newService.php" class="btn btn-light" role="button">Add New Service</a>
            </div>
            <br>
            <div class="bookings">
                <h3 class="tipton-header">View Bookings:</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Requested</th>
                            <th>Customer Name</th>
                            <th>Vehicle Make</th>
                            <th>Vehicle Model</th>
                            <th>Requested Time-Slot</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        loadBookings($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <h4 class="tipton-header">Adjust Bookings:</h4>
                <form id="bookingsForm" action="bookingUpdate.php" method="post">
                    <select form="bookingsForm" name="booking" id="booking" class="form-select">
                        <?php
                        bookingsDropdown($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                        ?>
                    </select>
                    <input type="submit" class="btn btn-light" value="Adjust Booking">
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
</body>
</html>
