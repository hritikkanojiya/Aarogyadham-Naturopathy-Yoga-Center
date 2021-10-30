<?php
error_reporting(0);
session_start();
include('../assets/php/db_conn.php');
date_default_timezone_set('Asia/Kolkata');

$patientGender = $_SESSION['patientGender'];
$patientFullName = $_SESSION['patientFullName'];
$patientUserId = $_SESSION['patientUserId'];

$activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId'");
$activePatientDataResult = mysqli_fetch_array($activePatientData);

$dataInserted = False;
$dataUpdated = false;
$updateData = False;

$recordDate = date('m-d-Y');
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

$PSD = mysqli_query($naturopathyCon, "SELECT * FROM `treatmentprocedure` WHERE `treatmentprocedure`.`patientId`='$patientUserId' ORDER BY id DESC LIMIT 1");

if (mysqli_num_rows($PSD) > 0) {
    $PSDResult = mysqli_fetch_array($PSD);
    $recordDate = $PSDResult['recordDate'];
    $q1 = $PSDResult['q1'];
    $q2 = $PSDResult['q2'];
    $q3 = $PSDResult['q3'];
    $q4 = $PSDResult['q4'];
    $q5 = $PSDResult['q5'];
    $q6 = $PSDResult['q6'];
    $q7 = $PSDResult['q7'];
    $q8 = $PSDResult['q8'];
    $q9 = $PSDResult['q9'];
    $q10 = $PSDResult['q10'];
    $q11 = $PSDResult['q11'];
    $q12 = $PSDResult['q12'];
    $q13 = $PSDResult['q13'];
    $q14 = $PSDResult['q14'];
    $q15 = $PSDResult['q15'];
    $q16 = $PSDResult['q16'];
    $q17 = $PSDResult['q17'];
    $updateData = True;
    $UpdateDataId = $PSDResult['id'];
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Aarogyadham-Naturopathy-Yoga-Center | Treatment Process Suggested</title>

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
                        <!-- <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                        </li> -->
                        <li class=""><a href="recordsheet.php"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                        </li>
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
                        <li class="active"><a href="processSuggested.php"><i class="feather-list"></i> <span class="shape1"></span><span class="shape2"></span><span>Treatment Procedures</span></a>
                        </li>
                        <li class="menu-title"> <span>Account</span>
                        </li>
                        <!-- <li class=""><a href="profile.php"><i class="feather-list"></i> <span>My Profile</span></a>
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
                                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
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
                                <h5 class="card-title mb-0">Process Suggested for Treatment (To be Filled by Therapist)</h5>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"> Yoga Practises ( Yogik Prakriya) </h5>
                                </div>
                                <div class="card-body pb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="" for=""> Note : Yoga Sanjivan, Yoga Sopan,
                                                        Shankhaprakshalan, Asanas, Agnisaar (100 times). Uddiyan (5 times),
                                                        Kapalbhati (3 times), Bindutratak.</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Pranayam</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q1" placeholder="" value="<?= $q1; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Purak + Bhramari Rechak</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q2" placeholder="" value="<?= $q2; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Suraya Mantra Japa</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q3" placeholder="" value="<?= $q3; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for=""> Bharmari Pranayam</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q4" placeholder="" value="<?= $q4; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="form-group col-12 text-center m-auto">
                                                    <label class="" for="">(Daily Morning or Evening)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"> Process (Prakriyas) Suggested for doing in Centre </h5>
                                </div>
                                <div class="card-body pb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Jalaneti (Times in a Week)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q5" placeholder="" value="<?= $q5; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">L. S. P (Times in a Week)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q6" placeholder="" value="<?= $q6; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Vaman (Times in a Week)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q7" placeholder="" value="<?= $q7; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for=""> F. S. P. (Times in a Week)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q8" placeholder="" value="<?= $q8; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Hot fomentation and Massage (Times)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q9" placeholder="" value="<?= $q9; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Local steam application (Times)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q10" placeholder="" value="<?= $q10; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for="">Steambath (Times)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q11" placeholder="" value="<?= $q11; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="" for=""> Tail / Sanjivan Basti (Times)</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="q12" placeholder="" value="<?= $q12; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Practices to be done at home </h5>
                                </div>
                                <div class="card-body pb-3">
                                    <div class="row">
                                        <div class="col-12 homeMessage">
                                            <div class="form-group">
                                                Yognidra <input type="text" class="form-control" style="width:auto" name="q13" placeholder="" value="<?= $q13; ?>" disabled> daily
                                                <input type="text" class="form-control" name="q14" placeholder="" value="<?= $q14; ?>" disabled> Times. Before sleep Omkar Jap daily
                                                <input type="text" class="form-control" name="q15" placeholder="" value="<?= $q15; ?>" disabled> minutes.
                                                <div class="" style="display: inline-block;">
                                                    ( <input type="text" class="form-control" style="height:35px;" name="q16" placeholder="" value="<?= $q16; ?>" disabled> times)
                                                </div>
                                                hot foamatation after applying Sanjivan oil (Daily 2 times)
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
                                    <h5 class="card-title">Instructions about daily routine.</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <h5 class="card-title text-center" style="font-weight:bold">Useful Diet</h5>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ol class="mb-0">
                                                            <li>Lunch before 12 Noon.</li>
                                                            <li>Dinner before 7 Evening.</li>
                                                            <li>Plenty of Fruits / Leafy vegetables soup.</li>
                                                            <li>To consume more natural food.</li>
                                                            <li><label class="">Yogamrit Daily </label>
                                                                <input type="text" class="form-control d-inline" style="width:70px; height:35px;" name="q17" value="<?= $q17; ?>" disabled> <label class=""> times (in lieu tea) </label>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <h5 class="card-title text-center" style="font-weight:bold">Diet to avoided</h5>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ol class="mb-0">
                                                            <li>Non-veg, Hot & Spices, Fried food.</li>
                                                            <li>Bakery product, pickles, oil, ghee.</li>
                                                            <li>Pulses such as (Tur- udid, Gram).</li>
                                                            <li>Alcohol, smoking etc.</li>
                                                            <li>Potatos, Sweet Potatos, Sabudana Tea, Coffee</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" style="font-size:1.15rem" role="alert">
                                All the above <strong>Practices</strong> have been properly explained to me and I hereby
                                give consent for their application in my case. (Acknowledged By Patient)
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="../assets/plugins/datatables/datatables.min.js"></script>

    <script src="../assets/js/script.js"></script>


</body>


</html>