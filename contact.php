<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Tipton Garage</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include "./common/navbar.html" ?>
<div class="container overflow-hidden">
    <div class="row gy-6 p-3 justify-content-center">
        <div class="col-3">
            <h4>You can find us here:</h4>
            <p>The Tipton Garage<br>Tipton St John<br>Near Sidmouth<br>Devon<br>EX10 0AF</p>
        </div>
        <div class="col-6">
            <h3 class="text-center">Please fill out the form below to contact us:</h3>
            <div class="contactform">
                <form action="contactSubmit.php" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="namelabel">Your Name:</span>
                        <input type="text" class="form-control" placeholder="Your Name" aria-label="Name" aria-describedby="namelabel" name="name" id="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="emaillabel">Your Email:</span>
                        <input type="text" class="form-control" placeholder="Your Email" aria-label="Email" aria-describedby="emaillabel" name="email" id="email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="querylabel">Your Query:</span>
                        <textarea class="form-control" placeholder="Your Query" aria-label="Query" aria-describedby="querylabel" name="query" id="query"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit Query</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3">
            <h4>Other Contact Information:</h4>
            <h5>Opening Hours:</h5>
            <p>Mon - Fri: 8.30AM - 5.30PM<br>Sat: 8.30AM - 12.30PM</p>
            <h5>Phone:</h5>
            <p>Call: 01404 812091<br>Fax: 01404 814597</p>
            <h5>Emails:</h5>
            <a href="mailto:tiptongarage@hotmail.co.uk">tiptongarage@hotmail.co.uk</a>
        </div>
    </div>
    <div class="container-fluid">
        <h3 class="text-center">See us on the map:</h3>
        <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d631.5254232560889!2d-3.289657837577176!3d50.71805251558319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486d9bf7985add8d%3A0xc3e9da824f2b272f!2sTipton%20Garage!5e0!3m2!1sen!2suk!4v1618409317261!5m2!1sen!2suk" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>        </div>
    </div>
</div>
<?php include "./common/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>