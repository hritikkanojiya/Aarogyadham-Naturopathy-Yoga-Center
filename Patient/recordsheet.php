<?php
session_start();
if (isset($_SESSION['patientSessionActive'])) {
    include('../assets/php/db_conn.php');

    $patientGender = $_SESSION['patientGender'];
    $patientFullName = $_SESSION['patientFullName'];
    $patientUserId = $_SESSION['patientUserId'];

    $dataInserted = False;
    $dataUpdated = false;
    $updateData = False;

    $fullname = $patientFullName;
    $age = '';
    $gender = $patientGender;
    $dob = '';
    $phone = '';
    $address = '';
    $occupation = '';
    $natureOfDailyWork = '';
    $execriseDoneBefore = '';
    $natureofPresentExercise = '';
    $pastSurgeries = '';
    $dateOfSurgery = '';
    $pastMajorIllnesses = '';
    $presentPhysicalComplaints = '';
    $ongoingTreatment = '';
    $doctorName = '';
    $doctorPhone = '';


    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId'");
    $activePatientDataResult = mysqli_fetch_array($activePatientData);

    $activePatientRecordSheet = mysqli_query($naturopathyCon, "SELECT * FROM `patientdetails` WHERE patientId='$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($activePatientRecordSheet) > 0) {

        $activePatientRecordSheetResult = mysqli_fetch_array($activePatientRecordSheet);

        $fullname = $patientFullName;
        $age = $activePatientRecordSheetResult['age'];
        $gender = $patientGender;
        $dob = $activePatientRecordSheetResult['dob'];
        $phone = $activePatientRecordSheetResult['phone'];
        $address = $activePatientRecordSheetResult['address'];
        $occupation = $activePatientRecordSheetResult['occupation'];
        $natureOfDailyWork = $activePatientRecordSheetResult['natureOfDailyWork'];
        $execriseDoneBefore = $activePatientRecordSheetResult['execriseDoneBefore'];
        $natureofPresentExercise = $activePatientRecordSheetResult['natureofPresentExercise'];
        $pastSurgeries = $activePatientRecordSheetResult['pastSurgeries'];
        $dateOfSurgery = $activePatientRecordSheetResult['dateOfSurgery'];
        $pastMajorIllnesses = $activePatientRecordSheetResult['pastMajorIllnesses'];
        $presentPhysicalComplaints = $activePatientRecordSheetResult['presentPhysicalComplaints'];
        $ongoingTreatment = $activePatientRecordSheetResult['ongoingTreatment'];
        $doctorName = $activePatientRecordSheetResult['doctorName'];
        $doctorPhone = $activePatientRecordSheetResult['doctorPhone'];
        $updateData = True;
        $updateDataId = $activePatientRecordSheetResult['id'];
    }
    if (isset($_POST['updateData'])) {
        $fullname = $patientFullName;
        $age = $_POST['age'];
        $gender = $patientGender;
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $occupation = $_POST['occupation'];
        $natureOfDailyWork = $_POST['natureOfDailyWork'];
        $execriseDoneBefore = $_POST['execriseDoneBefore'];
        $natureofPresentExercise = $_POST['natureofPresentExercise'];
        $pastSurgeries = $_POST['pastSurgeries'];
        $dateOfSurgery = $_POST['dateOfSurgery'];
        $pastMajorIllnesses = $_POST['pastMajorIllnesses'];
        $presentPhysicalComplaints = $_POST['presentPhysicalComplaints'];
        $ongoingTreatment = $_POST['ongoingTreatment'];
        $doctorName = $_POST['doctorName'];
        $doctorPhone = $_POST['doctorPhone'];

        $sql = "UPDATE `patientdetails` SET `fullName` = '$fullname', `address` = '$address', `age` = '$age', `dob` = '$dob', `phone` = '$phone', `occupation` = '$occupation', `natureOfDailyWork` = '$natureOfDailyWork', `execriseDoneBefore` = '$execriseDoneBefore', `natureofPresentExercise` = '$natureofPresentExercise', `pastSurgeries` = '$pastSurgeries', `pastMajorIllnesses` = '$pastMajorIllnesses', `presentPhysicalComplaints` = '$presentPhysicalComplaints', `ongoingTreatment` = '$ongoingTreatment', `doctorName` = '$doctorName', `doctorPhone` = '$doctorPhone' WHERE `patientdetails`.`id` = '$updateDataId";
        $sql_result = mysqli_query($naturopathyCon, $sql);
        if ($sql_result == True) {
            $dataUpdated = True;
        }
    }

    if (isset($_POST['submit'])) {
        $fullname = $patientFullName;
        $age = $_POST['age'];
        $gender = $patientGender;
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $occupation = $_POST['occupation'];
        $natureOfDailyWork = $_POST['natureOfDailyWork'];
        $execriseDoneBefore = $_POST['execriseDoneBefore'];
        $natureofPresentExercise = $_POST['natureofPresentExercise'];
        $pastSurgeries = $_POST['pastSurgeries'];
        $dateOfSurgery = $_POST['dateOfSurgery'];
        $pastMajorIllnesses = $_POST['pastMajorIllnesses'];
        $presentPhysicalComplaints = $_POST['presentPhysicalComplaints'];
        $ongoingTreatment = $_POST['ongoingTreatment'];
        $doctorName = $_POST['doctorName'];
        $doctorPhone = $_POST['doctorPhone'];

        $insertSQL = mysqli_query($naturopathyCon, "INSERT INTO `patientdetails` (`patientId`,`fullName`, `gender`, `address`, `age`, `dob`, `phone`, `occupation`, `natureOfDailyWork`, `execriseDoneBefore`, `natureofPresentExercise`, `pastSurgeries`, `dateOfSurgery`, `pastMajorIllnesses`, `presentPhysicalComplaints`, `ongoingTreatment`, `doctorName`, `doctorPhone`) VALUES ('$patientUserId','$fullname', '$gender', '$address', '$age', '$dob', '$phone', '$occupation', '$natureOfDailyWork', '$execriseDoneBefore', '$natureofPresentExercise', '$pastSurgeries', '$dateOfSurgery', '$pastMajorIllnesses', '$presentPhysicalComplaints', '$ongoingTreatment', '$doctorName', '$doctorPhone')");
        $dataInserted = ($insertSQL) ? True : False;
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Hospital</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body>
        <?php
        if ($dataInserted) {
            echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Inserted!',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
            $error = FALSE;
        }
        if ($dataUpdated) {
            echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Updated!',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
            $error = FALSE;
        }
        ?>
        <div class="main-wrapper">

            <div class="header">
                <div class="header-left">
                    <a class="logo text-center">
                        <img src="../assets/img/logo-favicon.png" alt="Logo">
                    </a>
                    <a href="patientDashboard.php" class="logo logo-small">
                        <img src="../assets/img/logo-favicon.png" alt="Logo" width="30" height="30">
                    </a>
                </div>
                <a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
                </a>
                <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i>
                </a>
                <ul class="nav user-menu">
                    <li class="nav-item dropdown has-arrow main-drop ml-md-3">
                        <a class="dropdown-item" href="logout.php"><i class="feather-power" style="color: red; font-weight:bold"></i></a>
                    </li>
                </ul>
            </div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"> <span>Main</span>
                            </li>
                            <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                            </li>
                            <li class="active"><a href="recordsheet.php"><i class="feather-file-text"></i> <span class="shape1"></span><span class="shape2"></span><span>Record Sheet</span></a>
                            <li class=""><a href="illness.php"><i class="feather-info"></i> <span>Illness Information</span></a>
                            </li>
                            <li class=""><a href="questionnaire.php"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                            </li>
                            <?php
                            if ($patientGender == 'Female') { ?>
                                <li class=""><a href="ladies-only.php"><i class="feather-life-buoy"></i> <span>Ladies Details</span></a>
                                </li>
                            <?php } ?>
                            <li class=""><a href="physicalExam.php"><i class="feather-edit-3"></i> <span>Physical Examination</span></a>
                            </li>
                            <li class=""><a href="reports.php"><i class="feather-folder"></i> <span>Reports Data</span></a>
                            </li>
                            <li class=""><a href="processSuggested.php"><i class="feather-list"></i> <span>Treatment Procedures</span></a>
                            </li>
                            <li class="menu-title"> <span>Account</span>
                            </li>
                            <li class=""><a href="profile.php"><i class="feather-user"></i> <span>My Profile</span></a>
                            </li>
                            <li class=""><a href="resetPass.php"><i class="feather-refresh-cw"></i> <span>Reset Password</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Patient Name : <?= $activePatientDataResult['fullName'] ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Regd No : <?= $activePatientDataResult['regdNo'] ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Patient Record Sheet</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-title">Personal Information</h5>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="fullName">Full Name</label>
                                                            <input type="text" class="form-control" id="fullName" value="<?= $activePatientDataResult['fullName']; ?>" required disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="age">Age</label>
                                                            <input type="number" class="form-control" id="age" name="age" value="<?= $age; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="">Gender</label>
                                                        <div class="row m-auto">
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" <?= ($patientGender == 'Male') ? 'checked' : '' ?> disabled>
                                                                <label class="form-check-label" for="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" <?= ($patientGender == 'Female') ? 'checked' : '' ?> disabled>
                                                                <label class="form-check-label" for="">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="dob">Date of Birth</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" value="<?= $dob; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="phone">Phone Number</label>
                                                            <input type="number" class="form-control" id="phone" name="phone" value="<?= $activePatientDataResult['phone'] ?>" readonly required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="card-title">Address Details</h5>
                                                <div class="form-group">
                                                    <label class="col-form-label" for="address"> Full Address</label>
                                                    <textarea class="form-control" name="address" id="address" cols="" rows="6" required><?= $address; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title">Other Details</h5>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="occupation">Occupation</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="occupation" name="occupation" value="<?= $occupation; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="natureOfWork">Nature of Daily Work</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="natureOfWork" name="natureOfDailyWork" value="<?= $natureOfDailyWork; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="exercisesdone">Exercises Done Before</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="exercisesdone" name="execriseDoneBefore" value="<?= $execriseDoneBefore; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="natureOfExercise">Nature of Present Exercise</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="natureOfExercise" name="natureofPresentExercise" value="<?= $natureofPresentExercise; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="pastSurgeries">Past Surgeries</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="pastSurgeries" name="pastSurgeries" value="<?= $pastSurgeries; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="dateOfSurgery">Date of Surgery</label>
                                                    <div class="col-lg-9">
                                                        <input type="date" class="form-control" id="dateOfSurgery" name="dateOfSurgery" value="<?= $dateOfSurgery; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="pastMajorilness">Past Major Illness</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="pastMajorilness" name="pastMajorIllnesses" value="<?= $pastMajorIllnesses; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="presentPhysicalComplaints">Present Physical Complaints</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="presentPhysicalComplaints" name="presentPhysicalComplaints" value="<?= $presentPhysicalComplaints; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="ongoingTreatment">Any Treatment Going on</label>
                                                    <div class="col-lg-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ongoingTreatment" id="treatment_yes" value="1">
                                                            <label class="form-check-label" for="treatment_yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ongoingTreatment" id="treatment_no" value="0" checked>
                                                            <label class="form-check-label" for="treatment_no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="doctorName">Name of the Doctor</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" id="doctorName" name="doctorName" value="<?= $doctorName; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="doctorPhone">Phone No. of the Doctor</label>
                                                    <div class="col-lg-9">
                                                        <input type="number" class="form-control" id="doctorPhone" name="doctorPhone" value="<?= $doctorPhone; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <?php
                                            if ($updateData) {
                                                echo '<button type="submit" class="btn btn-primary" name="updateData">Update</button>';
                                            } else {
                                                echo '<button type="submit" class="btn btn-primary" name="submitData">Submit</button>';
                                            }
                                            ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
        <script src="../assets/js/calander.js"></script>
        <script src="../assets/js/script.js"></script>

    </body>

    </html>
<?php
} else {
    header('location:../');
}
?>