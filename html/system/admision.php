<?php
include('./templates/header.php');
include('./templates/navigationhome.php');
?>


<main>

    <section id="hero-section">
        <div class="container-fluid m-0 p-0">
            <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./assets/img/slider2.jpg');" class="hero-image">
                <div class="hero-text">
                    <h4>Enroll now and start studying in Academia</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="addmision">
        <div class="container py-4 text-center">
            <div class="py-2">


                <h2>REQUIREMENTS NEEDED TO COMPLY</h2>
                <div class="row">
                    <div class="col-md-6 border-top p-5">
                        <h2>FOR NEW STUDENTS</h2>
                        <p class="text-justify">
                            1. Form 137 ( Transcript of Records from High School)<br />
                            2. Good moral<br />
                            3. NSO Birth Certificate<br />
                        </p>
                    </div>
                    <div class="col-md-6 border-top p-5">
                        <h2>FOR TRANSFEREE STUDENT</h2>
                        <p class="text-justify">
                            1. Honorable Dismissal<br />
                            2. Good Moral<br />
                            3. NSO Birth Certificate<br />
                        </p>
                    </div>
                </div>

            </div>
            <div class="row mx-2">
                <div class="col-md-6 border-top pt-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-warning">New Students</h5>
                            <p class="card-text">New students are students who are not yet enrolled in any school.</p>
                            <a href="./freshproce.php" class="btn btn-primary">View Procedures</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 border-top pt-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-warning">Transferee</h5>
                            <p class="card-text">Transferees are students who have change school.</p>
                            <a href="./transproce.php"" class=" btn btn-primary">View Procedures</a>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
</main>
<?php

include('./templates/footer.php');
?>