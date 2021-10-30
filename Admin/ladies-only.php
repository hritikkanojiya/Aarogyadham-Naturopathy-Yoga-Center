<?php
error_reporting(0);
session_start();
if (isset($_SESSION['adminSessionActive']) && ((isset($_GET['patientID']) && $_GET['patientID'] != '') || ($_GET['centralView'] == 'True'))) {
    include('../assets/php/db_conn.php');
    date_default_timezone_set('Asia/Kolkata');

    $adminFullName = $_SESSION['adminFullName'];
    $adminUserId = $_SESSION['adminUserId'];
    $patientUserId = $_GET['patientID'];

    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId' and gender = 'Female'");
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
    $q19 = '';
    $q20 = '';
    $q21 = '';

    $PSD = mysqli_query($naturopathyCon, "SELECT * FROM `ladiesonly` WHERE `ladiesonly`.`patientId`='$patientUserId' ORDER BY id DESC LIMIT 1");

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
        $q19 = $PSDResult['q19'];
        $q20 = $PSDResult['q20'];
        $q21 = $PSDResult['q21'];
        $updateData = True;
        $UpdateDataId = $PSDResult['id'];
    }
    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE gender = 'Female'");

?>


    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Ladies Only Details</title>

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
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'marathi'
                }, 'google_translate_element');
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
                            <li class=""><a href="questionnaire.php?centralView=True"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                            </li>
                            <li class="active"><a href="ladies-only.php?centralView=True"><i class="feather-life-buoy"></i> <span class="shape1"></span><span class="shape2"></span><span>Ladies Details</span></a>
                            </li>
                            <li class=""><a href="physicalExam.php?centralView=True"><i class="feather-edit-3"></i> <span>Physical Examination</span></a>
                            </li>
                            <li class=""><a href="reports.php?centralView=True"><i class="feather-folder"></i> <span>Reports Data</span></a>
                            </li>
                            <li class=""><a href="processSuggested.php?centralView=True"><i class="feather-list"></i> <span>Treatment Procedures</span></a>
                            </li>
                            <li class=""><a href="addTreatment.php"><i class="feather-plus"></i> <span>Add Treatment</span></a>
                            </li>
                            <li class="menu-title"> <span>Account</span>
                            </li>
                            <!-- <li class=""><a href="profile.php"><i class="feather-user"></i> <span>My Profile</span></a>
                            </li> -->
                            <li class=""><a href="therapistData.php"><i class="feather-user"></i> <span>Therapist Data</span></a>
                            </li>
                            <li class=""><a href="patientsData.php"><i class="feather-users"></i> <span>Patients Data</span></a>
                            </li>
                            <li class=""><a href="resetPass.php"><i class="feather-refresh-cw"></i> <span>Reset Password</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content container-fluid">
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
                                    <h5 class="card-title mb-0">Ladies Details (To be filled only by Female Patients)</h5>
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
                                                        <button type="button" class="btn btn-rounded btn-outline-primary active">Ladies Details</button>
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
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">General Questions (Part 1)</h5>
                                        </div>
                                        <div class="card-body pb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for=""> Menses <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row ustify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q1" value="Regular" required disabled> Regular
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q1" value="Irregular" required disabled> Irregular
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="" for="">How Irregular ?</label>
                                                        <div class="">
                                                            <textarea rows="3" type="text" class="form-control" name="q2" disabled><?= $q2 ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for=""> Discharge ? <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q3" value="Less" required disabled> Less
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q3" value="Moderate" required disabled> Moderate
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q3" value="Excess" required disabled> Excess
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for="">Discharge Detail <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q4" value="With" required> disabled With
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q4" value="Without foul smell" required disabled> Without foul smell
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for=""> Is there white discharge ? <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row ustify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q5" value="Yes" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q5" value="No" required disabled> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="" for="">How many days ? </label>
                                                        <div class="">
                                                            <input type="text" class="form-control" name="q6" value="<?= $q6 ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for=""> Backache during menses ? <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q7" value="Yes" required disabled> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q7" value="No" required disabled> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="" for="">Do you have pain before or during menses ? </label>
                                                        <div class="">
                                                            <textarea rows="3" type="text" class="form-control" name="q8" disabled><?= $q8 ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="" for="">Any other trouble during menses ? </label>
                                                        <textarea rows="3" type="text" class="form-control" name="q9" disabled><?= $q9 ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="" for="">Any issues regarding menses in the past ?</label>
                                                        <div class="">
                                                            <textarea rows="3" type="text" class="form-control" name="q10" disabled><?= $q10 ?></textarea>
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
                                            <h5 class="card-title">General Questions (Part 2)</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group ">
                                                        <label class="" for=""> Surgeries ?</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q11" disabled><?= $q11 ?></textarea>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for=""> Maritial Status ? <span class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-start">
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q12" value="Married" required disabled> Married
                                                                    </label>
                                                                </div>
                                                                <div class="radio mx-2">
                                                                    <label>
                                                                        <input type="radio" name="q12" value="Unmarried" required disabled> Unmarried
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-6" for="">Date of Marriage ?</label>
                                                        <div class="col-md-6">
                                                            <input type="date" class="form-control" name="q13" value="<?= $q13 ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="" for=""> Pregnancy (No. and Year)</label>
                                                        <input type="text" class="form-control" name="q14" value="<?= $q14 ?>" disabled>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="" for=""> Delivery (No. and Year)</label>
                                                        <input type="text" class="form-control" name="q15" value="<?= $q15 ?>" disabled>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="" for=""> Miscarriage (No. and Year)</label>
                                                        <input type="text" class="form-control" name="q16" value="<?= $q16 ?>" disabled>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label class="" for=""> Children</label>
                                                            <input type="text" class="form-control" name="q17" value="<?= $q17 ?>" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="" for=""> Sons</label>
                                                            <input type="text" class="form-control" name="q18" value="<?= $q18 ?>" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="" for=""> Daughters</label>
                                                            <input type="text" class="form-control" name="q19" value="<?= $q19 ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="" for=""> Method used for Family planning ?</label>
                                                        <input type="text" class="form-control" name="q20" value="<?= $q20 ?>" disabled>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="" for=""> Any Other Information ?</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q21" disabled><?= $q21 ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <th>Ladies Details</th>
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
                                                        $output .= '<a href="ladies-only.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
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

        <script>
            $('document').ready(function() {
                setTimeout(() => {
                    $("input[name=q1][value='<?= $q1 ?>']").prop('checked', true);
                    $("input[name=q3][value='<?= $q3 ?>']").prop('checked', true);
                    $("input[name=q4][value='<?= $q4 ?>']").prop('checked', true);
                    $("input[name=q5][value='<?= $q5 ?>']").prop('checked', true);
                    $("input[name=q7][value='<?= $q7 ?>']").prop('checked', true);
                    $("input[name=q12][value='<?= $q12 ?>']").prop('checked', true);
                }, 300);
            })
        </script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/plugins/select2/js/select2.min.js"></script>
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="../assets/plugins/datatables/datatables.min.js"></script>

        <script src="../assets/js/script.js"></script>

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