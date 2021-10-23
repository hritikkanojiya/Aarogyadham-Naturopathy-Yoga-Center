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
    $dataUpdated = false;
    $updateData = False;

    $patientBatch = 'NA';
    $fullname = $patientFullName;
    $age = 'NA';
    $gender = $patientGender;
    $dob = 'NA';
    $phone = 'NA';
    $address = 'NA';
    $occupation = 'NA';
    $natureOfDailyWork = 'NA';
    $execriseDoneBefore = 'NA';
    $natureofPresentExercise = 'NA';
    $pastSurgeries = 'NA';
    $dateOfSurgery = 'NA';
    $pastMajorIllnesses = 'NA';
    $presentPhysicalComplaints = 'NA';
    $ongoingTreatment = 'NA';
    $doctorName = 'NA';
    $doctorPhone = 'NA';
    $recordDate = 'NA';

    $activePatientRecordSheet = mysqli_query($naturopathyCon, "SELECT * FROM `patientdetails` WHERE patientId='$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($activePatientRecordSheet) > 0) {

        $activePatientRecordSheetResult = mysqli_fetch_array($activePatientRecordSheet);

        $fullname = $patientFullName;
        $age = $activePatientRecordSheetResult['age'];
        $gender = $patientGender;
        $patientBatch = $activePatientRecordSheetResult['batch'];
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
        $recordDate = $activePatientRecordSheetResult['recordDate'];
        $updateData = True;
        $updateDataId = $activePatientRecordSheetResult['id'];
    }
    $patientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Patient Record Sheet</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">
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
                    <a href="dashboard.php" class="logo text-center">
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
                            <li class="active"><a href="recordsheet.php?centralView=True"><i class="feather-file-text"></i> <span class="shape1"></span><span class="shape2"></span><span>Record Sheet</span></a>
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
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0">Patient Record Sheet (To be Filled by Patient)</h5>
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
                                                    <button type="button" class="btn btn-rounded btn-outline-primary active">Record Sheet</button>
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
                                                                <label class="col-form-label" for="fullName">Full Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="fullName" value="<?= $activePatientDataResult['fullName']; ?>" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="age">Age <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" id="age" name="age" value="<?= $age; ?>" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="col-form-label" for="">Gender <span class="text-danger">*</span></label>
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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="dob">Date of Birth <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" id="dob" name="dob" value="<?= $dob; ?>" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="phone">Phone Number <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" id="phone" name="phone" value="<?= $activePatientDataResult['phone'] ?>" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="col-form-label" for="">Batch <span class="text-danger">*</span></label>
                                                            <div class="row m-auto">
                                                                <div class="form-check mx-2">
                                                                    <input class="form-check-input" type="radio" name="batch" value="Morning" <?= ($patientBatch == 'Morning') ? 'checked' : '' ?> required disabled>
                                                                    <label class="form-check-label" for="">
                                                                        Morning
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mx-2">
                                                                    <input class="form-check-input" type="radio" name="batch" value="Evening" <?= ($patientBatch == 'Evening') ? 'checked' : '' ?> required disabled>
                                                                    <label class="form-check-label" for="">
                                                                        Evening
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">Address Details</h5>
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="address"> Full Address <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="address" id="address" cols="" rows="6" required disabled><?= $address; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Other Details</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Occupation</label>
                                                                <input type="text" class="form-control" name="occupation" value="<?= $occupation; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Nature of Daily Work</label>
                                                                <input type="text" class="form-control" name="natureOfDailyWork" value="<?= $natureOfDailyWork; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Exercises Done Before</label>
                                                                <input type="text" class="form-control" name="execriseDoneBefore" value="<?= $execriseDoneBefore; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Nature of Present Exercise</label>
                                                                <input type="text" class="form-control" name="natureofPresentExercise" value="<?= $natureofPresentExercise; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Past Surgeries</label>
                                                                <input type="text" class="form-control" name="pastSurgeries" value="<?= $pastSurgeries; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Date of Surgery</label>
                                                                <input type="date" class="form-control" name="dateOfSurgery" value="<?= $dateOfSurgery; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Past Major Illness</label>
                                                                <input type="text" class="form-control" name="pastMajorIllnesses" value="<?= $pastMajorIllnesses; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Present Physical Complaints</label>
                                                                <input type="text" class="form-control" name="presentPhysicalComplaints" value="<?= $presentPhysicalComplaints; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <div class="row">
                                                                <label class="col-md-12 col-form-label" for="ongoingTreatment">Any Treatment Going on <span class="text-danger">*</span></label>
                                                                <div class="col-md-12 mt-2 mb-3">
                                                                    <div class="row justify-content-center">
                                                                        <div class="radio mx-2 col-3">
                                                                            <label>
                                                                                <input class="form-check-input" type="radio" name="ongoingTreatment" value="Yes" required disabled>Yes
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio mx-2 col-3">
                                                                            <label>
                                                                                <input class="form-check-input" type="radio" name="ongoingTreatment" value="No" required disabled>No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Name of the Doctor</label>
                                                                <input type="text" class="form-control" name="doctorName" value="<?= $doctorName; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Phone No. of the Doctor</label>
                                                                <input type="number" class="form-control" name="doctorPhone" value="<?= $doctorPhone; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                        <th>Record Sheet</th>
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
                                                        $output .= '<a href="recordsheet.php?patientID=' . $patientDataArray['id'] . '"><button type="button" class="btn btn-rounded btn-outline-success">';
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
        <script src="../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
        <script src="../assets/js/calander.js"></script>
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/datatables.min.js"></script>
        <script src="../assets/js/script.js"></script>
        <script>
            $('document').ready(function() {
                setTimeout(() => {
                    $("input[name=ongoingTreatment][value='<?= $ongoingTreatment ?>']").prop('checked', true);
                }, 300);
            })
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