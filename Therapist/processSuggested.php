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
    $dataUpdated = false;
    $updateData = False;

    $recordDate = 'NA';
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
    $addTreatmentData = '<h5 class="text-center">No Treatments Added</h5>';

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
        $q18 = $PSDResult['q18'];
        $addTreatmentData = $PSDResult['add_treatment'];
        $updateData = True;
        $UpdateDataId = $PSDResult['id'];
    }

    if (isset($_POST['submitData'])) {
        $recordDate = date('m-d-Y');
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        $q6 = $_POST['q6'];
        $q7 = $_POST['q7'];
        $q8 = $_POST['q8'];
        $q9 = $_POST['q9'];
        $q10 = $_POST['q10'];
        $q11 = $_POST['q11'];
        $q12 = $_POST['q12'];
        $q13 = $_POST['q13'];
        $q14 = $_POST['q14'];
        $q15 = $_POST['q15'];
        $q16 = $_POST['q16'];
        $q17 = $_POST['q17'];
        $q18 = $_POST['q18'];
        $addTreatmentData = $_POST['addTreatmentData'];

        $sql = "INSERT INTO `treatmentprocedure` (`id`, `patientId`, `recordDate`,`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18` ,`add_treatment`) VALUES (NULL, '$patientUserId', '$recordDate','$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$addTreatmentData')";
        $insertSQL = mysqli_query($naturopathyCon, $sql);
        // ($insertSQL) ? header('location:processSuggested.php?status=100&patientID=' . $patientUserId . '') : header('location:processSuggested.php?patientID=' . $patientUserId . '');
        echo $insertSQL;
        exit();
    }

    if (isset($_POST['updateData'])) {
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        $q6 = $_POST['q6'];
        $q7 = $_POST['q7'];
        $q8 = $_POST['q8'];
        $q9 = $_POST['q9'];
        $q10 = $_POST['q10'];
        $q11 = $_POST['q11'];
        $q12 = $_POST['q12'];
        $q13 = $_POST['q13'];
        $q14 = $_POST['q14'];
        $q15 = $_POST['q15'];
        $q16 = $_POST['q16'];
        $q17 = $_POST['q17'];
        $q18 = $_POST['q18'];
        $addTreatmentData = $_POST['addTreatmentData'];

        $sql = "UPDATE `treatmentprocedure` SET `q1` = '$q1', `q2` = '$q2', `q3` = '$q3', `q4` = '$q4', `q5` = '$q5', `q6` = '$q6', `q7` = '$q7', `q8` = '$q8', `q9` = '$q9', `q10` = '$q10', `q11` = '$q11', `q12` = '$q12', `q13` = '$q13', `q14` = '$q14', `q15` = '$q15', `q16` = '$q16', `q17` = '$q17' , `q18` = '$q18' ,`add_treatment` = '$addTreatmentData' WHERE `treatmentprocedure`.`id` = '$UpdateDataId'";
        $updateSQL = mysqli_query($naturopathyCon, $sql);
        // ($updateSQL) ? header('location:processSuggested.php?status=101&patientID=' . $patientUserId . '') : header('location:processSuggested.php?patientID=' . $patientUserId . '');
        echo $updateSQL;
        exit();
    }

    // if (isset($_POST['addMainTreatment'])) {
    //     $data = $_POST['treatmentData'];
    //     $updatequery = mysqli_query($naturopathyCon, "UPDATE `treatmentprocedure` SET `add_treatment` = '$data' WHERE `treatmentprocedure`.`id` = '$UpdateDataId'");
    //     ($updatequery) ? header('location:processSuggested.php?status=101&patientID=' . $patientUserId . '') : header('location:processSuggested.php?patientID=' . $patientUserId . '');
    // }

    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");

?>


    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Treatment Process Suggested</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                            <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                            </li>
                            <li class=""><a href="recordsheet.php?centralView=True"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                            </li>
                            <li class=""><a href="illness.php?centralView=True"><i class="feather-info"></i> <span>Illness Information</span></a>
                            </li>
                            <li class=""><a href="questionnaire.php?centralView=True"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                            </li>
                            <li class=""><a href="ladies-only.php?centralView=True"><i class="feather-life-buoy"></i> <span>Ladies Details</span></a>
                            </li>
                            <li class=""><a href="physicalExam.php?centralView=True"><i class="feather-edit-3"></i> <span>Physical Examination</span></a>
                            </li>
                            <li class=""><a href="reports.php?centralView=True"><i class="feather-folder"></i> <span>Reports Data</span></a>
                            </li>
                            <li class="active"><a href="processSuggested.php?centralView=True"><i class="feather-list"></i> <span class="shape1"></span><span class="shape2"></span><span>Treatment Procedures</span></a>
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
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0">Process Suggested for Treatment (To be Filled by Therapist)</h5>
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
                                            <div class="col">
                                                <a href="recordsheet.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Record Sheet</button>
                                                </a>
                                                <a href="illness.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Illness Information</button>
                                                </a>
                                                <a href="questionnaire.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Health Questionnaire</button>
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
                                                    <button type="button" class="btn btn-rounded btn-outline-primary active">Treatment Procedures</button>
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
                        <form action="" method="post" id="mainForm">
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
                                                                <input type="text" class="form-control" name="q1" placeholder="" value="<?= $q1; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Purak + Bhramari Rechak</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q2" placeholder="" value="<?= $q2; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Suraya Mantra Japa</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q3" placeholder="" value="<?= $q3; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for=""> Bharmari Pranayam</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q4" placeholder="" value="<?= $q4; ?>">
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
                                                                <input type="text" class="form-control" name="q5" placeholder="" value="<?= $q5; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">L. S. P (Times in a Week)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q6" placeholder="" value="<?= $q6; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Vaman (Times in a Week)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q7" placeholder="" value="<?= $q7; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for=""> F. S. P. (Times in a Week)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q8" placeholder="" value="<?= $q8; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Hot fomentation and Massage (Times)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q9" placeholder="" value="<?= $q9; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Local steam application (Times)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q10" placeholder="" value="<?= $q10; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for="">Steambath (Times)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q11" placeholder="" value="<?= $q11; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="" for=""> Tail / Sanjivan Basti (Times)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" name="q12" placeholder="" value="<?= $q12; ?>">
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
                                                        Yognidra <input type="text" class="form-control" style="width:auto" name="q13" placeholder="" value="<?= $q13; ?>"> daily
                                                        <input type="text" class="form-control" name="q14" placeholder="" value="<?= $q14; ?>"> Times. Before sleep Omkar Jap daily
                                                        <input type="text" class="form-control" name="q15" placeholder="" value="<?= $q15; ?>"> minutes.
                                                        <div class="" style="display: inline-block;">
                                                            ( <input type="text" class="form-control" style="height:35px;" name="q16" placeholder="" value="<?= $q16; ?>"> times)
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
                                                                        <input type="text" class="form-control d-inline" style="width:70px; height:35px;" name="q17" value="<?= $q17; ?>"> <label class=""> times (in lieu tea) </label>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="card-title d-inline">Additional Treatments</h5>
                                                    <button type="button" class="btn btn-primary float-right mx-3 d-none d-lg-inline" onclick="getMainData()">Add Treatment</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mb-0">
                                                        <div class="addTreatmentData" id="addTreatmentData">
                                                            <?= $addTreatmentData ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Important Instruction to the Patient</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mb-0">
                                                        <label class="">Detailed Note</label>
                                                        <textarea class="form-control" name="q18" id="" rows="11"><?= $q18 ?></textarea>
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
                            <div class="row justify-content-center pb-5">
                                <div class="text-center">
                                    <?php
                                    if ($updateData) {
                                        echo '<button type="button" class="btn btn-lg btn-primary" id="updateData">Update</button>';
                                    } else {
                                        echo '<button type="button" class="btn btn-lg btn-primary" id="submitData">Submit</button>';
                                    }
                                    ?>

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
                                                        <th>Treatment Procedures</th>
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
                                                        $output .= '<a href="processSuggested.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
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
                    <div class="modal fade" id="addTreatmentModal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Main Treatment Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="" id="treatmentDataForm">
                                    <div class="modal-body">
                                        <div id="mainData"></div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger mx-5" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success mx-5" onclick="addTreatmentData()">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="../assets/plugins/datatables/datatables.min.js"></script>

        <script src="../assets/js/script.js"></script>

        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

        <script>
            window.getMainDataFlag = false;

            $(document).ready(function() {
                $('.table').DataTable({
                    "lengthMenu": [
                        [15, 20, -1],
                        [15, 20, "All"]
                    ],
                    responsive: true,
                });

                treatmentArray = [];

                $(document).on('change', '.sub-treatment-switch', function() {
                    var data = $(this).data('subhash');
                    if ($(this).is(':checked')) {
                        if (!treatmentArray.includes(data)) {
                            treatmentArray.push(data);
                        }
                    } else {
                        var dummyArray = treatmentArray.filter(function(f) {
                            return f !== data
                        });
                        treatmentArray = dummyArray;
                    }
                    window.treatmentArrayData = treatmentArray;
                })

                $('#submitData').on('click', function() {
                    // e.preventDefault();
                    var addTreatmentData = $('#addTreatmentData').html();
                    $.ajax({
                        url: '',
                        type: 'POST',
                        data: $('#mainForm').serialize() + "&addTreatmentData=" + addTreatmentData + "&submitData=",
                        success: function(response) {
                            // window.location.reload();
                            if (response) {
                                window.open("processSuggested.php?status=100&patientID=<?= $patientUserId ?>", "_parent");
                            } else {
                                window.open("processSuggested.php?patientID=<?= $patientUserId ?>", "_parent");
                            }
                        }
                    })
                })

                $('#updateData').on('click', function() {
                    // e.preventDefault();
                    var addTreatmentData = $('#addTreatmentData').html();
                    $.ajax({
                        url: '',
                        type: 'POST',
                        data: $('#mainForm').serialize() + "&addTreatmentData=" + addTreatmentData + "&updateData=",
                        success: function(response) {
                            // window.location.reload();
                            if (response) {
                                window.open("processSuggested.php?status=101&patientID=<?= $patientUserId ?>", "_parent");
                            } else {
                                window.open("processSuggested.php?patientID=<?= $patientUserId ?>", "_parent");
                            }
                        }
                    })
                })
            });

            // $('#treatmentDataForm').on('submit', function(e) {
            //     e.preventDefault();
            //     itemData = $(this).serializeArray();
            //     submitData = true;
            //     $.ajax({
            // url : 'processSuggested.php?patientID=<?php //$_GET['patientID']
                                                        ?>',
            //         type: 'POST',
            //         data: {
            //             submitData: submitData,
            //             itemData: itemData
            //         },
            //         success: function() {
            //             window
            //         }
            //     })
            // })

            function getMainData() {
                treatmentArray = [];
                let ajaxRequest = true;
                let mainData = true;
                $.ajax({
                    url: '../assets/php/treatmentHandler.php',
                    data: {
                        ajaxRequest: ajaxRequest,
                        mainData: mainData,
                    },
                    type: 'POST',
                    success: function(response) {
                        response = JSON.parse(response);
                        if (response['status'] == 200) {
                            window.getMainDataFlag = true;
                            $('#mainData').html(response.html);
                            $('#addTreatmentModal').modal('show');
                        } else if (response['status'] == 201) {
                            window.getMainDataFlag = false;
                            alert(response.message);
                        } else {
                            window.getMainDataFlag = false;
                            alert(response.message);
                        }
                    }
                })
            }

            function addTreatmentData() {
                // let main_treatment = $('.accordion-button[data-bs-toggle="collapse"][aria-expanded="true"]');
                // main_treatment.forEach(element => {
                //     console.log(this);
                // });
                let ajaxRequest = true;
                let renderData = true;
                let treatmentArray = window.treatmentArrayData;
                $.ajax({
                    url: '../assets/php/treatmentHandler.php',
                    data: {
                        ajaxRequest: ajaxRequest,
                        renderData: renderData,
                        treatmentArray: treatmentArray,
                    },
                    type: 'POST',
                    success: function(response) {
                        $('#addTreatmentData').html(response);
                        $('#addTreatmentModal').modal('hide');
                    }
                })
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('location:../');
}
?>