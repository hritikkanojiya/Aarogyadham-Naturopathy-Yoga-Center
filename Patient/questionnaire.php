<?php
error_reporting(0);
session_start();
if (isset($_SESSION['patientSessionActive'])) {
    include('../assets/php/db_conn.php');
    date_default_timezone_set('Asia/Kolkata');

    $patientGender = $_SESSION['patientGender'];
    $patientFullName = $_SESSION['patientFullName'];
    $patientUserId = $_SESSION['patientUserId'];

    $dataInserted = False;
    $dataUpdated = False;
    $updateData = False;

    $q1 = '';
    $q2 = '';
    $q3 = '';
    $q4 = '';
    $q5 = '';
    $q6 = '';
    $q7 = '';
    $q8 = '';
    $q9 = '';
    $q10 = '';
    $q11 = '';
    $q12 = '';
    $q13 = '';
    $q14 = '';
    $q15 = '';
    $q16 = '';
    $q17 = '';
    $q18 = '';
    $q19 = '';
    $q20 = '';
    $q21 = '';
    $recordDate = date('m-d-Y');

    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId'");
    $activePatientDataResult = mysqli_fetch_array($activePatientData);

    $questionnaireData = mysqli_query($naturopathyCon, "SELECT * FROM healthquestionnaire WHERE patientId = '$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($questionnaireData) > 0) {
        $questionnaireDataArray = mysqli_fetch_array($questionnaireData);
        $recordDate = $questionnaireDataArray['recordDate'];
        $q1 = $questionnaireDataArray['q1'];
        $q2 = $questionnaireDataArray['q2'];
        $q3 = $questionnaireDataArray['q3'];
        $q4 = $questionnaireDataArray['q4'];
        $q5 = $questionnaireDataArray['q5'];
        $q6 = $questionnaireDataArray['q6'];
        $q7 = $questionnaireDataArray['q7'];
        $q8 = $questionnaireDataArray['q8'];
        $q9 = $questionnaireDataArray['q9'];
        $q10 = $questionnaireDataArray['q10'];
        $q11 = $questionnaireDataArray['q11'];
        $q12 = $questionnaireDataArray['q12'];
        $q13 = $questionnaireDataArray['q13'];
        $q14 = $questionnaireDataArray['q14'];
        $q15 = $questionnaireDataArray['q15'];
        $q16 = $questionnaireDataArray['q16'];
        $q17 = $questionnaireDataArray['q17'];
        $q18 = $questionnaireDataArray['q18'];
        $q19 = $questionnaireDataArray['q19'];
        $q20 = $questionnaireDataArray['q20'];
        $q21 = $questionnaireDataArray['q21'];
        $updateData = True;
        $updateDataId = $questionnaireDataArray['id'];
    }

    if (isset($_POST['updateData'])) {
        $q1 = $_POST['Q1'];
        $q2 = $_POST['Q2'];
        $q3 = $_POST['Q3'];
        $q4 = $_POST['Q4'];
        $q5 = $_POST['Q5'];
        $q6 = $_POST['Q6'];
        $q7 = $_POST['Q7'];
        $q8 = $_POST['Q8'];
        $q9 = $_POST['Q9'];
        $q10 = $_POST['Q10'];
        $q11 = $_POST['Q11'];
        $q12 = $_POST['Q12'];
        $q13 = $_POST['Q13'];
        $q14 = $_POST['Q14'];
        $q15 = $_POST['Q15'];
        $q16 = $_POST['Q16'];
        $q17 = $_POST['Q17'];
        $q18 = $_POST['Q18'];
        $q19 = $_POST['Q19'];
        $q20 = $_POST['Q20'];
        $q21 = $_POST['Q21'];
        $updateSQL = mysqli_query($naturopathyCon, "UPDATE `healthquestionnaire` SET `q1`= '$q1' ,`q2`= '$q2',`q3`= '$q3',`q4`= '$q4',`q5`= '$q5',`q6`= '$q6',`q7`= '$q7',`q8`= '$q8',`q9`= '$q9',`q10`= '$q10',`q11`= '$q11',`q12`= '$q12',`q13`= '$q13',`q14`= '$q14',`q15` = '$q15',`q16`= '$q16',`q17`= '$q17',`q18`= '$q18',`q19`= '$q19',`q20`= '$q20',`q21`= '$q21' WHERE `healthquestionnaire`.`id` = '$updateDataId'");
        ($updateSQL) ? header('location:questionnaire.php?status=101') : header('location:questionnaire.php');
    }

    if (isset($_POST['submitData'])) {
        $recordDate = date('m-d-Y');
        $q1 = $_POST['Q1'];
        $q2 = $_POST['Q2'];
        $q3 = $_POST['Q3'];
        $q4 = $_POST['Q4'];
        $q5 = $_POST['Q5'];
        $q6 = $_POST['Q6'];
        $q7 = $_POST['Q7'];
        $q8 = $_POST['Q8'];
        $q9 = $_POST['Q9'];
        $q10 = $_POST['Q10'];
        $q11 = $_POST['Q11'];
        $q12 = $_POST['Q12'];
        $q13 = $_POST['Q13'];
        $q14 = $_POST['Q14'];
        $q15 = $_POST['Q15'];
        $q16 = $_POST['Q16'];
        $q17 = $_POST['Q17'];
        $q18 = $_POST['Q18'];
        $q19 = $_POST['Q19'];
        $q20 = $_POST['Q20'];
        $q21 = $_POST['Q21'];
        $insertSQL = mysqli_query($naturopathyCon, "INSERT INTO `healthquestionnaire` (`id`, `patientId`,`recordDate` ,`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20` ,`q21`) VALUES (NULL, '$patientUserId', '$recordDate','$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20' ,'$q21')");
        ($insertSQL) ? header('location:questionnaire.php?status=100') : header('location:questionnaire.php');
    }

?>


    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Hospital Aarogyadham-Naturopathy-Yoga-Center | Health Questionnaire</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">

        <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../assets/css/appstyle.css">

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <?php
        if ($_GET['status'] == 100) {
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

        if ($_GET['status'] == 101) {
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
                    <a href="dashboard.php" class="logo">
                        <img src="../assets/img/logo-favicon.png" alt="Logo">
                    </a>
                    <a href="dashboard.php" class="logo logo-small">
                        <img src="../assets/img/logo-favicon.png" alt="Logo" width="30" height="30">
                    </a>
                </div>

                <a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
                </a>

                <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i>
                </a>


                <ul class="nav user-menu">
                    <li class="nav-item dropdown has-arrow main-drop ml-md-3">
                        <a class=" dropdown-item" href="logout.php"><i class="feather-power" style="color: red; font-weight:bold"></i></a>
                    </li>
                </ul>

            </div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"> <span>Main</span>
                            </li>
                            <!-- <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                        </li> -->
                            <li class=""><a href="recordsheet.php"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                            </li>
                            <li class=""><a href="illness.php"><i class="feather-info"></i> <span>Illness Information</span></a>
                            </li>
                            <li class="active"><a href="questionnaire.php"><i class="feather-activity"></i> <span class="shape1"></span><span class="shape2"></span><span>Health Questionnaire</span></a>
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
                            <!-- <li class=""><a href="profile.php"><i class="feather-user"></i> <span>My Profile</span></a>
                        </li> -->
                            <li class=""><a href="resetPass.php"><i class="feather-refresh-cw"></i> <span>Reset Password</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content container-fluid">

                    <!-- <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <h5 class="page-title">Dashboard</h5>
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="dashboard.php.html"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Health Questionnaire</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0">Health Questionnaire (To be Filled by Patient)</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Patient Name : <?= $activePatientDataResult['fullName'] ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Regd No : <?= $activePatientDataResult['regdNo'] ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Record Date : <?= $recordDate ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">General Questions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you feel fresh after getting up in the morning ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row ustify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q1" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q1" required> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" name="Q1" required> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="">Do you sleep in the afternoon ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row ustify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q2" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q2" required> No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="">Anything specially required for night sleep ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Nothing" name="Q3" required> Nothing
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Some Medicine" name="Q3" required> Some Medicine
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you dream ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Always" name="Q4" required> Always
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Sometimes" name="Q4" required> Sometimes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Rarely" name="Q4" required> Rarely
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Is your sleep interrupted ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q5" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q5" required> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" name="Q5" required> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">How is your sleep ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Deep" name="Q6" required> Deep
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Restless" name="Q6" required> Restless
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you feel fatigue after day`s work ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q7" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q7" required> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" name="Q7" required> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Can you Concentrate your work ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q8" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q8" required> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" name="Q8" required> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you remain firm on your decision ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" required name="Q9"> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" required name="Q9"> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" required name="Q9"> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you become emotional instantly ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" required name="Q10"> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" required name="Q10"> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" required name="Q10"> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Is your appetite normal ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" required name="Q11"> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" required name="Q11"> No
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Can`t Say" required name="Q11"> Can`t Say
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-8" for="fullName">Do you Pass regular motions ? <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q12" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q12" required> No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-lg-8" for="fullName">Any medicine required for Passing daily motions ?<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="row justify-content-start">
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="Yes" name="Q13" required> Yes
                                                                </label>
                                                            </div>
                                                            <div class="radio mx-2">
                                                                <label>
                                                                    <input type="radio" value="No" name="Q13" required> No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Food Timing</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="fullName">Breakfast</label>
                                                            <input type="time" class="form-control" name="Q14" value="<?= $q14 ?>" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="fullName">Evening Snacks</label>
                                                            <input type="time" class="form-control" name="Q15" value="<?= $q15 ?>" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="fullName">Lunch</label>
                                                            <input type="time" class="form-control" name="Q16" value="<?= $q16 ?>" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="" for="fullName">Dinner</label>
                                                            <input type="time" class="form-control" name="Q17" value="<?= $q17 ?>" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Timing of Tea/Coffee/Milk</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="" for="fullName">First</label>
                                                    <input type="time" class="form-control" name="Q18" value="<?= $q18 ?>" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="" for="fullName">Second</label>
                                                    <input type="time" class="form-control" name="Q19" value="<?= $q19 ?>" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label class="" for="fullName">Third</label>
                                                    <input type="time" class="form-control" name="Q20" value="<?= $q20 ?>" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Addictions (if any)</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="" for="fullName">Please Elaborate</label>
                                                            <textarea type="text" rows="5" class="form-control" name="Q21" id=""><?= $q21 ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right"><span class="text-danger">*</span> marked fields represents as required</div>
                            </div>
                        </div>
                        <div class="row justify-content-center pb-5">
                            <div class="text-center">
                                <?php
                                if ($updateData) {
                                    echo  '<button type="submit" class="btn btn-lg btn-primary" name="updateData">Update</button>';
                                } else {
                                    echo '<button type="submit" class="btn btn-lg btn-primary" name="submitData">Submit</button>';
                                } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../assets/js/script.js"></script>

        <script>
            $('document').ready(function() {
                setTimeout(() => {
                    $("input[name=Q1][value='<?= $q1 ?>']").prop('checked', true);
                    $("input[name=Q2][value='<?= $q2 ?>']").prop('checked', true);
                    $("input[name=Q3][value='<?= $q3 ?>']").prop('checked', true);
                    $("input[name=Q4][value='<?= $q4 ?>']").prop('checked', true);
                    $("input[name=Q5][value='<?= $q5 ?>']").prop('checked', true);
                    $("input[name=Q6][value='<?= $q6 ?>']").prop('checked', true);
                    $("input[name=Q7][value='<?= $q7 ?>']").prop('checked', true);
                    $("input[name=Q8][value='<?= $q8 ?>']").prop('checked', true);
                    $("input[name=Q9][value='<?= $q9 ?>']").prop('checked', true);
                    $("input[name=Q10][value='<?= $q10 ?>']").prop('checked', true);
                    $("input[name=Q11][value='<?= $q11 ?>']").prop('checked', true);
                    $("input[name=Q12][value='<?= $q12 ?>']").prop('checked', true);
                    $("input[name=Q13][value='<?= $q13 ?>']").prop('checked', true);
                }, 300);
            })
        </script>

        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </body>


    </html>
<?php
} else {
    header('location:../');
}
?>