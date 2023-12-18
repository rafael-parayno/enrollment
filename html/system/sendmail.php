<?php

use PHPMailer\PHPMailer\PHPMailer;

require('./database/DBController.php');
require('./database/PersonalData.php');
require('./database/FamilyData.php');
require('./database/SchoolYear.php');
require('./database/Sem.php');
require('./database/Course.php');
require('./database/Subject.php');
require('./database/Fee.php');

require('./database/User.php');

require './libraries/PHPMailer.php';
require './libraries/SMTP.php';
require './libraries/Exception.php';


$db = new DBController();

$personalData = new PersonalData($db);
$family = new FamilyData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);
$course = new Course($db);
$subject = new Subject($db);
$fee = new Fee($db);

$user = new User($db);

$mail = new PHPMailer();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addSubmit'])) {
        $personalData->addToPersonal(
            $_POST['FirstName'],
            $_POST['LastName'],
            $_POST['MiddleName'],
            $_POST['Course'],
            $_POST['Pob'],
            $_POST['Dob'],
            $_POST['Gender'],
            $_POST['Civil'],
            $_POST['Nat'],
            $_POST['Address'],
            $_POST['ContactNo'],
            $_POST['email'],
            $_POST['Rel'],
            $_POST['age'],
            $_POST['sno'],
            0,
            0,
            0
        );

        $result = $family->addFamily(
            $_POST['Fname'],
            $_POST['fo'],
            $_POST['fcno'],
            $_POST['mname'],
            $_POST['mo'],
            $_POST['mcno'],
            $_POST['gname'],
            $_POST['gno'],
            $_POST['grel'],
            $_POST['Fname'],
            $_POST['sno']
        );
    }
}
