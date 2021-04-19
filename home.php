<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Tipton Garage</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include "./common/navbar.html" ?>
<div class="container-fluid">
    <h1 class="text-center">
        Welcome to Tipton Garage.
    </h1>
    <h2 class="text-center text-muted"><em>
        "Servicing & Maintenance, Diagnostics, Tuning and Engine Build Services"
    </em></h2>
</div>
<div class="container overflow-hidden">
    <div class="row gy-6 p-3 justify-content-center">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <h3 class="text-center">Have a look at the services we offer:</h3>
            <div class="container p-3">
               <div class="row align-items-start">
                   <h4>Modern Car Services:</h4>
                   <p>We carry out all the essential regular maintenance and servicing of your car, plus fault diagnosis and repair, MOT testing and spares.</p>
                   <img class="rounded img-fluid" src="img/home-mod-small.jpg">
                   <a class="btn btn-primary" href="modern.php" role="button">View Modern Services</a>
               </div>
            </div>
            <div class="container p-3">
                <div class="row align-items-start">
                    <h4>Classic Car Services:</h4>
                    <p>For classic and cherished cars, we offer a tailored service to extend everyday use and life into graceful old age, as well as resolving the inevitable problems that develop over time.</p>
                    <img class="rounded img-fluid" src="img/home-classic-small.jpg">
                    <a class="btn btn-primary" href="classic.php" role="button">View Classic Services</a>
                </div>
            </div>
            <div class="container p-3">
                <div class="row align-items-start">
                    <h4>Track and Competition Services:</h4>
                    <p>Our extensive experience in preparing and running cars for track and competition gives us the edge in specialist engine build and maintenance.</p>
                    <p>We also advise on, source and fit performance parts, and our rolling-road tuning facility is extensively employed to optimise and calibrate performance development and improvements.</p>
                    <img class="rounded img-fluid" src="img/harrington-sunbeam-300x156.jpg">
                    <a class="btn btn-primary" href="track.php" role="button">View Track and Competition Services</a>
                </div>
            </div>
            <div class="container p-3">
                <div class="row align-items-start">
                    <h4>Or why not get in touch?</h4>
                    <a class="btn btn-primary" href="contact.php" role="button">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
<?php include "./common/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>