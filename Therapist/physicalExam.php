<?php
error_reporting(0);
session_start();
if (isset($_SESSION['therapistSessionActive']) && ((isset($_GET['patientID']) && $_GET['patientID'] != '') || ($_GET['centralView'] == 'True'))) {
    include('../assets/php/db_conn.php');
    date_default_timezone_set('Asia/Kolkata');

    $therapistFullName = $_SESSION['therapistFullName'];
    $therapistUserId = $_SESSION['therapistUserId'];
    $patientUserId = $_GET['patientID'];

    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId' LIMIT 1");
    $activePatientDataResult = mysqli_fetch_array($activePatientData);
    if ((mysqli_num_rows($activePatientData) == 0) && (!$_GET['centralView'])) {
        header('location:index.php');
    }

    $patientGender = $activePatientDataResult['gender'];

    $dataInserted = False;
    $dataUpdated = False;
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
    $q18 = '';
    $q19 = '<tbody>';

    for ($i = 1; $i <= 20; $i++) {
        $q19 .= '<tr>
                <td>' . $i . '</td>
                <td><input type="date" name="remarkTableDom[]" class="form-control" id=""></td>
                <td><input type="text" name="remarkTableDom[]" class="form-control" id=""></td>
            </tr>';
    }

    $q19 .= '</tbody>';
    $q20 = '';

    $physicalExamData = mysqli_query($naturopathyCon, "SELECT * FROM physicalexamination WHERE patientId = '$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($physicalExamData) > 0) {
        $physicalExamDataArray = mysqli_fetch_array($physicalExamData);

        $recordDate = $physicalExamDataArray['recordDate'];
        $q1 = $physicalExamDataArray['q1'];
        $q2 = $physicalExamDataArray['q2'];
        $q3 = $physicalExamDataArray['q3'];
        $q4 = $physicalExamDataArray['q4'];
        $q5 = $physicalExamDataArray['q5'];
        $q6 = $physicalExamDataArray['q6'];
        $q7 = $physicalExamDataArray['q7'];
        $q8 = $physicalExamDataArray['q8'];
        $q9 = $physicalExamDataArray['q9'];
        $q10 = $physicalExamDataArray['q10'];
        $q11 = $physicalExamDataArray['q11'];
        $q12 = $physicalExamDataArray['q12'];
        $q13 = $physicalExamDataArray['q13'];
        $q14 = $physicalExamDataArray['q14'];
        $q15 = $physicalExamDataArray['q15'];
        $q16 = $physicalExamDataArray['q16'];
        $q17 = $physicalExamDataArray['q17'];
        $q18 = $physicalExamDataArray['q18'];
        $q19Array = json_decode($physicalExamDataArray['q19']);
        $q19update = '<tbody>';
        $count = 0;
        for ($i = 1; $i <= 20; $i++) {
            $q19update .= '<tr><td>' . $i . '</td>';
            $date = "$q19Array[$count]";
            $q19update .= '<td><input type="date" name="remarkTableDom[]" value="' . $date . '" class="form-control" id=""></td>';
            $count++;
            $pressure = "$q19Array[$count]";
            $q19update .= '<td><input type="text" name="remarkTableDom[]" value="' . $pressure . '" class="form-control" id=""></td></tr>';
            $count++;
        }
        $q19update .= '</tbody>';
        $q20 = $physicalExamDataArray['q20'];
        $updateData = True;
        $updateDataId = $physicalExamDataArray['id'];
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
        $q19 = json_encode($_POST['remarkTableDom']);
        $q20 = $_POST['Q20'];
        $updateSQL = mysqli_query($naturopathyCon, "UPDATE `physicalexamination` SET `q1` = '$q1', `q2` = '$q2', `q3` = '$q3', `q4` = '$q4', `q5` = '$q5', `q6` = '$q6',`q7` = '$q7',`q8` = '$q8',`q9` = '$q9',`q10` = '$q10',`q11` = '$q11',`q12` = '$q12',`q13` = '$q13',`q14` = '$q14',`q15` = '$q15',`q16` = '$q16',`q17` = '$q17',`q18` = '$q18',`q19` = '$q19',`q20` = '$q20' WHERE `physicalexamination`.`id` = '$updateDataId'");
        ($updateSQL) ? header('location:physicalExam.php?patientID=' . $patientUserId . '&status=101') : header('location:physicalExam.php?patientID=' . $patientUserId . '');
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
        $q19 = json_encode($_POST['remarkTableDom']);
        $q20 = $_POST['Q20'];
        $insertSQL = mysqli_query($naturopathyCon, "INSERT INTO `physicalexamination` (`id`, `patientId`, `recordDate`,`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`) VALUES (NULL, '$patientUserId','$recordDate', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20')");
        ($insertSQL) ? header('location:physicalExam.php?patientID=' . $patientUserId . '&status=100') : header('location:physicalExam.php?patientID=' . $patientUserId . '');
    }

    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");

?>


    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Patient Physical Examination</title>

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
                            <li class="active"><a href="physicalExam.php?centralView=True"><i class="feather-edit-3"></i> <span class="shape1"></span><span class="shape2"></span><span>Physical Examination</span></a>
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
                                    <h5 class="card-title mb-0">Physical Examination (To be Filled by Therapist)</h5>
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
                                                    <button type="button" class="btn btn-rounded btn-outline-primary">Health Questionnaire</button>
                                                </a>
                                                <?php if ($patientGender == 'Female') { ?>
                                                    <a href="ladies-only.php?patientID=<?= $_GET['patientID']; ?>">
                                                        <button type="button" class="btn btn-rounded btn-outline-primary">Ladies Details</button>
                                                    </a>
                                                <?php } ?>
                                                <a href="physicalExam.php?patientID=<?= $_GET['patientID']; ?>">
                                                    <button type="button" class="btn btn-rounded btn-outline-primary active">Physical Examination</button>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">General Questions</h5>
                                        </div>
                                        <div class="card-body pb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="">Examination Date </label>
                                                            <div class="">
                                                                <input type="date" class="form-control" value="<?= $q1 ?>" name="Q1">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="">Height (cms)</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" value="<?= $q2 ?>" name="Q2" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <label class="">Chest (After Inhalation) in cms</label>
                                                                    <input type="text" class="form-control" value="<?= $q3 ?>" name="Q3">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <label class="">Chest (After Exhalation) in cms</label>
                                                                    <input type="text" class="form-control" value="<?= $q4 ?>" name="Q4">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="">Abdomen (Circumference) in cms</label>
                                                        <div class="">
                                                            <input type="text" class="form-control" value="<?= $q5 ?>" name="Q5" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-auto">
                                                        <div class="row">
                                                            <label class="col-md-6" for=""> Arch of the sole ? <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-start">
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Normal" name="Q6" required> Normal
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Flat" name="Q6" required> Flat
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-auto">
                                                        <div class="row">
                                                            <label class="col-md-6" for=""> Body Appearance ? <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-start">
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Fat" name="Q7" required> Fat
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Medium" name="Q7" required> Medium
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Thin" name="Q7" required> Thin
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-auto">
                                                        <div class="row">
                                                            <label class="col-md-6" for=""> Constitution ? <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-start">
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Vaat" name="Q8" required> Vaat
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Pitta" name="Q8" required> Pitta
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mx-2">
                                                                        <label>
                                                                            <input type="radio" value="Kafa" name="Q8" required> Kafa
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Weight Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5 class="card-title">First</h5>
                                                        <div class="row">
                                                            <div class="col-md-6 pb-2">
                                                                <label class="">Weight (Kg)</label>
                                                                <input type="text" class="form-control" value="<?= $q9 ?>" name="Q9">
                                                            </div>
                                                            <div class="col-md-6 pb-2">
                                                                <label class="">Date</label>
                                                                <input type="date" class="form-control" value="<?= $q10 ?>" name="Q10">
                                                            </div>
                                                        </div>
                                                        <h5 class="card-title">Second</h5>
                                                        <div class="row">
                                                            <div class="col-md-6 pb-2">
                                                                <label class="">Weight (Kg)</label>
                                                                <input type="text" class="form-control" value="<?= $q11 ?>" name="Q11">
                                                            </div>
                                                            <div class="col-md-6 pb-2">
                                                                <label class="">Date</label>
                                                                <input type="date" class="form-control" value="<?= $q12 ?>" name="Q12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Pulse Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5 class="card-title">First</h5>
                                                        <div class="row">
                                                            <div class="col-md-4 pb-2">
                                                                <div class>
                                                                    <label class="">Pulse</label>
                                                                    <input type="text" class="form-control" value="<?= $q13 ?>" name="Q13">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pb-2">
                                                                <div class="">
                                                                    <label class="">B.P</label>
                                                                    <input type="text" class="form-control" value="<?= $q14 ?>" name="Q14">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pb-2">
                                                                <div class="">
                                                                    <label class="">Date</label>
                                                                    <input type="date" class="form-control" value="<?= $q15 ?>" name="Q15">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="card-title">Second</h5>
                                                        <div class="row">
                                                            <div class="col-md-4 pb-2">
                                                                <div class="">
                                                                    <label class="">Pulse</label>
                                                                    <input type="text" class="form-control" value="<?= $q16 ?>" name="Q16">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pb-2">
                                                                <div class="">
                                                                    <label class="">B.P</label>
                                                                    <input type="text" class="form-control" value="<?= $q17 ?>" name="Q17">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pb-2">
                                                                <div class="">
                                                                    <label class="">Date</label>
                                                                    <input type="date" class="form-control" value="<?= $q18 ?>" name="Q18">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Remark and Opinion of the Experts</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" style="height:290px; overflow:auto;">
                                                <div class="col-12">
                                                    <div class="form-group mb-1">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-nowrap mb-0" id="remarkTable">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>Sr.</th>
                                                                        <th>Date</th>
                                                                        <th>B.P</th>
                                                                    </tr>
                                                                </thead>
                                                                <?= ($updateData) ? $q19update : $q19; ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Important Instruction to the patient</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mb-0">
                                                        <label class="">Detailed Note</label>
                                                        <textarea class="form-control" name="Q20" id="" rows="11"><?= $q20 ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <th>Physical Examination</th>
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
                                                        $output .= '<a href="physicalExam.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
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
                    $("input[name=Q6][value='<?= $q6 ?>']").prop('checked', true);
                    $("input[name=Q7][value='<?= $q7 ?>']").prop('checked', true);
                    $("input[name=Q8][value='<?= $q8 ?>']").prop('checked', true);
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