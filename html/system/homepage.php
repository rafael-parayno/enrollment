<?php
include('./templates/header.php');
include('./templates/navigationhome.php');
?>

<main>
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/img/sample1-slider.jpg" />
                <div class="carousel-caption">
                    <h1 class="display-2">Academia <br /> School</h1>
                    <h3>A Quality Education For Every one</h3>

                    <button class="btn btn-primary btn-lg">Enroll Now</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/img/sample-slider4.jpg" />
            </div>
            <div class="carousel-item">
                <img src="./assets/img/sample3-slider.jpg" />
            </div>
        </div>
    </div>

    </div>
    <div class="container padding p-3">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Future First.</h1>
            </div>
            <hr />
            <div class="col-12">
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam laudantium est perspiciatis quam repellendus dolore aliquid magnam veritatis, libero cumque!
                </p>
            </div>
        </div>
    </div>
</main>

<?php

include('./templates/footer.php');
?>