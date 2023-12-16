<?php
include('header.php');
include('navigation.php');
$sno = $_GET['sid'];

$studentinfo = $personal->getDatabySearching('sno', $sno);
$courseList = $course->getData();

$faminfo = $family->getDatabySearching('sno', $sno);

if ($studentinfo == "" || $studentinfo == null) {
    header('Location: ./students.php');
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['editSubmit'])) {
        $result =  $personal->updatePersonalData(
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
            $_POST['sno']
        );

        $result = $family->editFamily(
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
        echo "<script>window.location='/academia/system/pages/students.php';</script>";
    }
}




?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Students</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Students</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-user mr-1"></i>Edit Students

            </div>
            <p style="font-size: 16px" class='text-danger text-center mt-3'>Just Put N/a In the field if no info in that field</p>
            <div class="card-body">
                <div class="container">
                    <form id="regForm2" method="POST">
                        <div style="text-align:center">
                            <span class="step"></span>
                            <span class="step"></span>

                        </div>

                        <div class="tab">

                            <h2 class="text-center">Student Basic Info</h2>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="sno" value="<?= $sno ?>" />
                                    <label for="FirstName">First Name</label>
                                    <input type="text" value="<?= $studentinfo['firstname'] ?>" name="FirstName" class="form-control" id="FirstName" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="MiddleName">Middle Name</label>
                                    <input type="text" value="<?= $studentinfo['middlename'] ?>" name="MiddleName" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" value="<?= $studentinfo['lastname'] ?>" name="LastName" class="form-control" id="LastName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Course">Course</label>
                                <select name="Course" class="form-control" id="exampleFormControlSelect1">

                                    <?php array_map(function ($course) use ($studentinfo) { ?>
                                        <option value="<?= $course['courses_id']  ?>" <?php
                                                                                        $selected = $studentinfo['Course'] == $course['courses_id'] ? 'selected' : '';
                                                                                        echo $selected;
                                                                                        ?>>
                                            <?= $course['coursesName'] . '-' . $course['coursesCode'] ?>
                                        </option>
                                    <?php }, $courseList) ?>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="Dob">Date of Birth</label>
                                    <input type="text" value="<?= $studentinfo['dob'] ?>" name="Dob" class="form-control" id="Dob" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Pob">Place of Birth</label>
                                    <input type="text" value="<?= $studentinfo['pob'] ?>" name="Pob" class="form-control" id="Pob">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Gender">Gender</label>
                                    <input type="text" value="<?= $studentinfo['gender'] ?>" name="Gender" class="form-control" id="Gender">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="age">Age</label>
                                    <input type="number" value="<?= $studentinfo['age'] ?>" name="age" class="form-control" min="0" id="age">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Civil">Civil</label>
                                    <input type="text" value="<?= $studentinfo['civil'] ?>" name="Civil" class="form-control" id="Civil">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Nat">Nationality</label>
                                    <input type="text" value="<?= $studentinfo['nationality'] ?>" name="Nat" class="form-control" id="Nat">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Rel">Religion</label>
                                    <input type="text" value="<?= $studentinfo['Religion'] ?>" name="Rel" class="form-control" id="Rel">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address </label>
                                <input type="text" value="<?= $studentinfo['Address'] ?>" name="Address" class="form-control" id="inputAddress" placeholder="Address">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" value="<?= $studentinfo['EmailAdd'] ?>" name="email" class="form-control" id="email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ContactNo">Contact No</label>
                                    <input type="text" value="<?= $studentinfo['CpNo'] ?>" name="ContactNo" class="form-control" id="ContactNo">
                                </div>

                            </div>
                        </div>


                        <div class="tab">
                            <h2 class="text-center">Family Details</h2>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Fname">Father Name</label>
                                    <input type="text" value="<?= $faminfo['fname'] ?>" name="Fname" class="form-control" id="Fname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fo">Father Occupation</label>
                                    <input type="text" value="<?= $faminfo['fo'] ?>" name="fo" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fcno">Father's Contact Number</label>
                                    <input type="text" value="<?= $faminfo['fcno'] ?>" name="fcno" class="form-control" id="fcno">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="mname">Mother Name</label>
                                    <input type="text" value="<?= $faminfo['mname'] ?>" name="mname" class="form-control" id="mname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mo">Mother Occupation</label>
                                    <input type="text" value="<?= $faminfo['mo'] ?>" name="mo" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mcno">Mother's Contact Number</label>
                                    <input type="text" value="<?= $faminfo['mcno'] ?>" name="mcno" class="form-control" id="mcno">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="gname">Guardian's Name</label>
                                    <input type="text" value="<?= $faminfo['gname'] ?>" name="gname" class="form-control" id="mname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gno">Guardian Contact Number</label>
                                    <input type="text" value="<?= $faminfo['gno'] ?>" name="gno" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grel">Guardians's Rel</label>
                                    <input type="text" value="<?= $faminfo['grel'] ?>" name="grel" class="form-control" id="grel">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gadd">Guardian's Address </label>
                                <input type="text" value="<?= $faminfo['gadd'] ?>" name="gadd" class="form-control" id="gadd" placeholder="Guardian Address">
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary btn-lg px-5">Prev</button>
                            <button type="button" name="editSubmit" id="nextBtn" class="btn btn-primary btn-lg px-5" onclick="nextPrev(1)">Next</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>