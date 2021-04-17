<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Tipton Garage</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include "./common/navbar.html" ?>
<div class="container overflow-hidden">
    <div class="row gy-6 p-3 justify-content-center">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div>
                <h1 class="tipton-team">The Tipton Team:</h1>
            </div>
            <div>
                <h4>Stephen Miles, HNC Mech. Eng.</h4>
                <p>
                    Stephen gained his extensive grounding in high-performance tuning at Janspeed Engineering,
                    where he was a key member of the team responsible for engine development and preparation of the works’ Nissan British Touring Car Championship team cars.
                    Now leading the Tipton Team, Stephen’s experience benefits the owners of both modern and classic cars alike, with the care, precision and quality standards expected in motorsport being applied to all customers’ cars.
                    Stephen has followed in Richard Miles’ competitive footsteps too, being extremely quick behind the wheel in the Toyo Tyres saloon car racing series;
                    he now regularly competes in the Historic Racing Drivers Club ‘Touring Greats’ series in their Austin A40 Downton.
                </p>
            </div>
            <div>
                <h4>Richard Miles, M.I.M.I., A.M. Inst. B.E.</h4>
                <p>
                    Richard has spent all his working life in motor engineering, much of it with a strong performance bias.
                    Early in his career, he spent time as a mechanic with triple World Champion Sir Jack Brabham and then forged his reputation as ‘right hand man’ to Daniel Richmond’s team at Downton Engineering,
                    famous for making (proper) Minis go indecently fast on and off the track. In 1976 he moved to Devon and founded The Tipton Garage.
                    His many years of engineering experience in extracting high performance, without sacrificing reliability, have benefited hundreds of satisfied owners of race and rally championship winning, modern and ‘classic’ cars.
                    No slouch on the track, Richard has first-hand experience of what it takes to develop a car to its full potential.
                </p>
            </div>
            <div>
                <h4>Jo and Jean Miles</h4>
                <p>
                    Jo and Jean look after the reception, office administration and finances – but, unofficially, their main task is keeping everyone in order!
                    They are the ‘go to’ people for an answer when the workshop is busy – as it invariably is – and when the ‘engineering heads’ are engrossed under bonnets, testing cars for their MOT certificates,
                    quality-inspecting engines in re-build and overseeing the running of the rolling-road.
                </p>
            </div>
            <div>
                <h4>The Tipton Team</h4>
                <p>
                    The ‘Tipton Team’ prides itself on provides good, old fashioned personal service, underpinned by an understanding of each customer’s needs.
                    They are like-minded individuals and their own cars include immaculate examples of ‘rare breeds’ such as a Lotus Elan,
                    Hillman Avenger, Sunbeam Tiger, Ford Escort Mexico, Ford Escort RS, Austin A490 and an FIA-specification Mini-Cooper S.
                </p>
            </div>
            <div>
                <h4 class="tipton-team">Check out some of the work we've done:</h4>
                <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/caterham640480.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/classic640480.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/caterham640480_2.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>
<?php include "./common/footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>