<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="./../css/framework.css" rel="stylesheet" />
    <link href="./../css/form.css" rel="stylesheet" />

    <?php

    include('./functions.php');
    $sno =  $_SESSION['id'];

    $studentinfo = $personal->getDatabySearching('sno', $sno);
    ?>


</head>

<body>
    <div class="container-fluid">
        <header class="mb-2">
            <div class="mb-2">
                <img src="../assets/img/logo2.png" alt="" style="height:50px">
                Academia
            </div>

            <h2 class="text-center">Certificate of Registration</h2>
            <div class="info">

                <p>
                    Name : <br />
                    Student No: <br />
                    Address:
                </p>
            </div>
        </header>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>