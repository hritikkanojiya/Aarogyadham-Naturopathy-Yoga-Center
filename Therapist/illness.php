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

    $q1 = 'NA';
    $q2 = 'NA';
    $q3 = 'NA';
    $q4 = 'NA';
    $q5 = 'NA';
    $q6 = 'NA';
    $recordDate = 'NA';

    $activePatientIllnessInfo = mysqli_query($naturopathyCon, "SELECT * FROM illnessinformation WHERE patientId = '$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($activePatientIllnessInfo) > 0) {
        $activePatientIllnessInfoResult = mysqli_fetch_array($activePatientIllnessInfo);
        $q1 = $activePatientIllnessInfoResult['q1'];
        $q2 = $activePatientIllnessInfoResult['q2'];
        $q3 = $activePatientIllnessInfoResult['q3'];
        $q4 = $activePatientIllnessInfoResult['q4'];
        $q5 = $activePatientIllnessInfoResult['q5'];
        $q6 = $activePatientIllnessInfoResult['q6'];
        $recordDate = $activePatientIllnessInfoResult['recordDate'];
        $updateData = True;
        $updateDataId = $activePatientIllnessInfoResult['id'];
    }
    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");
?>


    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Aarogyadham-Naturopathy-Yoga-Center | Illness Information</title>

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
                            <li class="active"><a href="illness.php?centralView=True"><i class="feather-info"></i> <span class="shape1"></span><span class="shape2"></span><span>Illness Information</span></a>
                            </li>
                            <li class=""><a href="questionnaire.php?centralView=True"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
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

                    <!-- <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <h5 class="page-title">Dashboard</h5>
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="dashboard.php.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php.php">Dashboard</a></li>
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
                                    <h5 class="card-title mb-0">Information About The Illness (To be Filled by Patient)</h5>
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
                                                    <button type="button" class="btn btn-rounded btn-outline-primary active">Illness Information</button>
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
                                                    <div class="form-group">
                                                        <label class=""> How long are you suffering from the present illness ?</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q1" disabled><?= $q1; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">Is it related to any specific incident ? If so, please state the incident.</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q2" disabled><?= $q2; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">State, in detail the nature of complaints being experienced by you</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q3" disabled><?= $q3; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="">Details of present treatment</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q4" disabled><?= $q4; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">Details of various medical tests Conducted and their results.</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q5" disabled><?= $q5; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">Recommendation of your Doctor.</label>
                                                        <textarea rows="3" type="text" class="form-control" name="q6" disabled><?= $q6; ?></textarea>
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
                                                        <th>Illness Information </th>
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
                                                        $output .= '<a href="illness.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
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