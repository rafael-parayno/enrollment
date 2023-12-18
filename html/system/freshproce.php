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
        <div class="container py-4">
            <div class="py-2 text-center">
                <h2>New Student PROCEDURES</h2>
                <p>New students are students who are not yet enrolled in any school.</p>

                <hr />
                <ol class=" text-justify">
                    <li class="mb-4"> &nbsp;Register in our Form then a mail will be sent to you to have the
                        downpayment for the
                        reserve and confirm register to your email account.
                    </li>
                    <li class="mb-4">&nbsp; IF PAID VIA DIRECT BANK TRANSFER YOU CAN TAKE A PICTURE OF THE RECEIPT TO PROOF YOUR PAYMENT</li>
                    <li class="mb-4">&nbsp; if you have Have an Credit Card you can pay us over through PayPal</li>
                    <li class="mb-4">&nbsp; if you have Have an Credit Card you can pay us over through registering your Credit card and will be paid by using STRIPE</li>
                    <li class="mb-4">&nbsp; if you have Have an gcash you can pay us over through our number 093823123, then YOU CAN TAKE A PICTURE OF THE RECEIPT TO PROOF YOUR PAYMENT</li>
                </ol>
                <a class="text-center btn btn-lg px-5 btn-primary" href="./admissionform.php">Go to our Form</a>
            </div>

        </div>
    </section>

</main>
<?php

include('./templates/footer.php');
?>