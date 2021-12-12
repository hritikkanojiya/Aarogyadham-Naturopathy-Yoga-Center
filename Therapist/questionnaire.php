<?php
error_reporting(0);
session_start();
if (isset($_SESSION['therapistSessionActive']) && ((isset($_GET['patientID']) && $_GET['patientID'] != '') || ($_GET['centralView'] == 'True'))) {
    include('../assets/php/db_conn.php');
    date_default_timezone_set('Asia/Kolkata');

    $therapistFullName = $_SESSION['therapistFullName'];
    $therapistUserId = $_SESSION['therapistUserId'];
    $patientUserId = $_GET['patientID'];

    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId'");
    $activePatientDataResult = mysqli_fetch_array($activePatientData);
    if ((mysqli_num_rows($activePatientData) == 0) && (!$_GET['centralView'])) {
        header('location:index.php');
    }

    $patientGender = $activePatientDataResult['gender'];

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
    $recordDate = 'NA';

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

    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");
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
        <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../assets/css/appstyle.css">

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
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
                            <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                            </li>
                            <li class=""><a href="recordsheet.php?centralView=True"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                            </li>
                            <li class=""><a href="illness.php?centralView=True"><i class="feather-info"></i> <span>Illness Information</span></a>
                            </li>
                            <li class="active"><a href="questionnaire.php?centralView=True"><i class="feather-activity"></i><span class="shape1"></span><span class="shape2"></span> <span>Health Questionnaire</span></a>
                            </li>
                            <li class=""><a href="ladies-only.php?centralView=True"><i class="feather-life-buoy"></i> <span>Ladies Details</span></a>
                            </li>
                            <li class=""><a href="physicalExam.php?centralView=True"><i class="feather-edit-3"></i> <span>Physical Examination</span></a>
                            </li>
                            <li class=""><a href="reports.php?centralView=True"><i class="feather-folder"></i> <span>Reports Data</span></a>
                            </li>
                            <li class=""><a href="processSuggested.php?centralView=True"><i class="feather-list"></i> <span>Treatment Procedures</span></a>
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
                <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'marathi'
                            }, 'google_translate_element');
                        }
                    </script>

                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <div id="google_translate_element"></div>
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
                    <?php if (isset($_GET['patientID'])) { ?>
                        <div class="page-header d-none d-sm-none d-md-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="row align-items-center">
                                        <div class="col-1">
                                            <h5 class="card-title mb-0">Navigate</h5>
                                        </div>
                                        <div class="col-11">
                                            <div class="row justify-content-between">
                                                <a href="recordsheet.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Record Sheet</button>
                                                </a>
                                                <a href="illness.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Illness Information</button>
                                                </a>
                                                <a href="questionnaire.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary active">Health Questionnaire</button>
                                                </a>
                                                <?php if ($patientGender == 'Female') { ?>
                                                    <a href="ladies-only.php?patientID=<?= $_GET['patientID']; ?>">
                                                        <button type="button" class="btn btn-rounded btn-outline-primary">Ladies Details</button>
                                                    </a>
                                                <?php } ?>
                                                <a href="physicalExam.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Physical Examination</button>
                                                </a>
                                                <a href="reports.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Reports Data</button>
                                                </a>
                                                <a href="processSuggested.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Treatment Procedures</button>
                                                </a>
                                            </div>
                                        </div>
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
                                                                        <input type="radio" value="Yes" name="Q1" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q1" required disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" name="Q1" required disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" name="Q2" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q2" required disabled> No
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
                                                                        <input type="radio" value="Nothing" name="Q3" required disabled> Nothing
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Some Medicine" name="Q3" required disabled> Some Medicine
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
                                                                        <input type="radio" value="Always" name="Q4" required disabled> Always
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Sometimes" name="Q4" required disabled> Sometimes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Rarely" name="Q4" required disabled> Rarely
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
                                                                        <input type="radio" value="Yes" name="Q5" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q5" required disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" name="Q5" required disabled> Can`t Say
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
                                                                        <input type="radio" value="Deep" name="Q6" required disabled> Deep
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Restless" name="Q6" required disabled> Restless
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
                                                                        <input type="radio" value="Yes" name="Q7" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q7" required disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" name="Q7" required disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" name="Q8" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q8" required disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" name="Q8" required disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" required name="Q9" disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" required name="Q9" disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" required name="Q9" disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" required name="Q10" disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" required name="Q10" disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" required name="Q10" disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" required name="Q11" disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" required name="Q11" disabled> No
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="Can`t Say" required name="Q11" disabled> Can`t Say
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
                                                                        <input type="radio" value="Yes" name="Q12" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q12" required disabled> No
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
                                                                        <input type="radio" value="Yes" name="Q13" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" value="No" name="Q13" required disabled> No
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
                                                                <input type="time" class="form-control" name="Q14" value="<?= $q14 ?>" id="" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="" for="fullName">Evening Snacks</label>
                                                                <input type="time" class="form-control" name="Q15" value="<?= $q15 ?>" id="" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="" for="fullName">Lunch</label>
                                                                <input type="time" class="form-control" name="Q16" value="<?= $q16 ?>" id="" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="" for="fullName">Dinner</label>
                                                                <input type="time" class="form-control" name="Q17" value="<?= $q17 ?>" id="" disabled>
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
                                                        <input type="time" class="form-control" name="Q18" value="<?= $q18 ?>" id="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Second</label>
                                                        <input type="time" class="form-control" name="Q19" value="<?= $q19 ?>" id="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="" for="fullName">Third</label>
                                                        <input type="time" class="form-control" name="Q20" value="<?= $q20 ?>" id="" disabled>
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
                                                                <textarea type="text" rows="5" class="form-control" name="Q21" id="" disabled><?= $q21 ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>.
                                </div>
                            </div>
                        </form>
                    <?php } else if (isset($_GET['centralView'])) { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Patients Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>RegdNo</th>
                                                        <th>Full Name</th>
                                                        <th>Gender</th>
                                                        <th>Contact No.</th>
                                                        <th>Health Questionnaire</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $output = '';
                                                    $count = 1;
                                                    while ($patientDataArray = mysqli_fetch_array($patientData)) {
                                                        $output .= '<tr>';
                                                        $output .= '<td>' . $count . '</td>';
                                                        $output .= '<td>' . $patientDataArray['regdNo'] . '</td>';
                                                        $output .= '<td>' . $patientDataArray['fullName'] . '</td>';
                                                        $output .= '<td>' . $patientDataArray['gender'] . '</td>';
                                                        $output .= '<td>' . $patientDataArray['phone'] . '</td>';
                                                        $output .= '<td class="text-center">';
                                                        $output .= '<a href="questionnaire.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
                                                        $output .= 'View Details';
                                                        $output .= '</button></a>';
                                                        $output .= '</td>';
                                                        $output .= '</tr>';
                                                        $count++;
                                                    }
                                                    echo $output;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        header('location:index.php');
                    } ?>
                </div>
            </div>
        </div>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="../assets/plugins/datatables/datatables.min.js"></script>

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

        <script>
            $(document).ready(function() {
                $('.table').DataTable({
                    "lengthMenu": [
                        [10, 15, 20, -1],
                        [10, 15, 20, "All"]
                    ],
                    responsive: true,
                });
            });
        </script>

    </body>


    </html>
<?php
} else {
    header('location:../');
}
?>