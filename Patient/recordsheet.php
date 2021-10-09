<?php
session_start();
include('../assets/php/db_conn.php');

$gender = $_SESSION['gender'];
$ID = $_SESSION['activeUserID'];

$activeUserData = "SELECT * FROM `patientregistration` WHERE `id` = '$ID'";
$activeUserDataResult = mysqli_query($naturopathyCon, $activeUserData);
$activeUserDataResultArray = mysqli_fetch_array($activeUserDataResult);

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullName'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
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

    $sql = "INSERT INTO `patientdetails` (`id`, `fullName`, `gender`, `address`, `age`, `dob`, `phone`, `occupation`, `natureOfDailyWork`, `execriseDoneBefore`, `natureofPresentExercise`, `pastSurgeries`, `pastMajorIllnesses`, `presentPhysicalComplaints`, `ongoingTreatment`, `doctorName`, `doctorPhone`) VALUES (NULL, '$fullname', '$gender', '$address', '$age', '$dob', '$phone', '$occupation', '$natureOfDailyWork', '$execriseDoneBefore', '$natureofPresentExercise', '$pastSurgeries', '$pastMajorIllnesses', '$presentPhysicalComplaints', '$ongoingTreatment', '$doctorName', '$doctorPhone')";
    $sqlResult = mysqli_query($naturopathyCon, $sql);
    if ($sqlResult == TRUE) {
        $dataInsert = TRUE;
    } else {
        $dataInsert = FALSE;
    }
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
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

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
                        <li class="active"> <a href="dashboard.php"><i class="feather-home"></i><span class="shape1"></span><span class="shape2"></span><span>Dashboard</span></a>
                        </li>
                        <li class="submenu"><a href="#"><i class="feather-user"></i> <span>Patients</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="recordsheet.php">Record Sheet</a></li>
                                <li><a href="patients-profile.html">Patient Profile</a></li>
                                <li><a href="patients-history.html">History</a></li>
                                <li><a href="patients-report.html">Report</a></li>
                                <li><a href="patients-documents.html">Documents</a></li>
                                <li><a href="patients-transactions.html">Transactions</a></li>
                                <li><a href="patients-issues.html">Issues</a></li>
                                <li><a href="patients-data.html">External Data</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="appointments.html"><i class="feather-list"></i> <span>Appointments</span><span class="badge bg-success-text">2</span></a>
                        </li>
                        <li class=""><a href="flow-board.html"><i class="feather-bar-chart"></i> <span>Flow Board</span></a>
                        </li>
                        <li class=""><a href="recall-board.html"><i class="feather-calendar"></i> <span>Recall Board</span></a>
                        </li>
                        <li class=""><a href="chat.html"><i class="feather-message-circle"></i> <span>Messages</span><span class="badge bg-orange-text">4</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-disc"></i> <span> Procedures</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="electronics-report.html">Electronics Reports</a></li>
                                <li><a href="lab-documents.html">Lab Documents</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="feather-book"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Clients</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="client-list.html"><span>List</span></a></li>
                                        <li>
                                            <a href="client-rx.html"> <span>RX</span></a>
                                        </li>
                                        <li>
                                            <a href="patient-list.html"> <span>Patient List Creation</span></a>
                                        </li>
                                        <li>
                                            <a href="clinical-report.html"> <span>Clinical</span></a>
                                        </li>
                                        <li>
                                            <a href="referals-report.html"> <span>Reference</span></a>
                                        </li>
                                        <li>
                                            <a href="immunization-registry.html"> <span>Immunization Registry</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Clinics</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="report-results.html"><span>Report Results</span></a></li>
                                        <li>
                                            <a href="standard-measures.html"> <span>Standard Measures</span></a>
                                        </li>
                                        <li>
                                            <a href="quality-measures.html"> <span>Quality Measures (CQM)</span></a>
                                        </li>
                                        <li>
                                            <a href="automated-measures.html"> <span>Automated Measures (AMC)</span></a>
                                        </li>
                                        <li>
                                            <a href="amc-tracking.html"> <span>AMC Tracking</span></a>
                                        </li>
                                        <li>
                                            <a href="alert-log.html"> <span>Alerts Log</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Visits</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="appointments-visit.html"><span>Appointments</span></a></li>
                                        <li>
                                            <a href="flow-board-record.html"> <span>Patient Flow Board</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Procedure</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="pending-orders.html"><span>Pending Res</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Insurance</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="unique-insurance.html"><span>Unique SP</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="feather-settings"></i> <span>Settings</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-grid"></i> <span> Application</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="inbox.html">Email</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>
                        <li>
                            <a href="profile.html"><i class="feather-user-plus"></i> <span>Profile</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-lock"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php"> Login </a></li>
                                <li><a href="registration.php"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-alert-octagon"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="users.html"><i class="feather-user"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="blank-page.html"><i class="feather-file"></i> <span>Blank Page</span></a>
                        </li>
                        <li>
                            <a href="maps-vector.html"><i class="feather-map-pin"></i> <span>Vector Maps</span></a>
                        </li>
                        <li class="menu-title">
                            <span>UI Interface</span>
                        </li>
                        <li>
                            <a href="components.html"><i class="feather-layers"></i> <span>Components</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-sidebar"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <!-- <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                                <li><a href="form-input-groups.html">Input Groups </a></li> -->
                                <li><a href="registration-form.html">Registration Form </a></li>
                                <!-- <li><a href="form-vertical.html"> Vertical Form </a></li>
                                <li><a href="form-mask.html"> Form Mask </a></li>
                                <li><a href="form-validation.html"> Form Validation </a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-layout"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="tables-basic.html">Basic Tables </a></li>
                                <li><a href="data-tables.html">Data Table </a></li>
                            </ul>
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
                                <h5 class="page-title">Dashboard</h5>
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Patient Details</li>
                                </ul>
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
                                <h5 class="card-title">Personal Information</h5>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="fullName">Full Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $activeUserDataResultArray['fullName']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="age">Age</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" id="age" name="age" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gender</label>
                                                <div class="col-lg-9">
                                                    <?php
                                                    if ($activeUserDataResultArray['gender'] == 'Male') {
                                                        echo '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" checked >
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" disabled>
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>';
                                                    } else if ($activeUserDataResultArray['gender'] == 'Female') {
                                                        echo '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" disabled>
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female"checked >
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>';
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="dob">Date of Birth</label>
                                                <div class="col-lg-9">
                                                    <input type="date" class="form-control" id="dob" name="dob" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="phone">Phone Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $activeUserDataResultArray['phone'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Address Details</h5>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="address"> Full Address</label>
                                                <div class="col-lg-9">
                                                    <!-- <input type="text" class="form-control" id="address" name="address"> -->
                                                    <textarea class="form-control" name="address" id="address" cols="" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">Other Details</h5>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="occupation">Occupation</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="occupation" name="occupation">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="natureOfWork">Nature of Daily Work</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="natureOfWork" name="natureOfDailyWork">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="exercisesdone">Exercises Done Before</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="exercisesdone" name="execriseDoneBefore">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="natureOfExercise">Nature of Present Exercise</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="natureOfExercise" name="natureofPresentExercise">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="pastSurgeries">Past Surgeries</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="pastSurgeries" name="pastSurgeries">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="dateOfSurgery">Date of Surgery</label>
                                                <div class="col-lg-9">
                                                    <input type="date" class="form-control" id="dateOfSurgery" name="dateOfSurgery">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="pastMajorilness">Past Major Illness</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="pastMajorilness" name="pastMajorIllnesses">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="presentPhysicalComplaints">Present Physical Complaints</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="presentPhysicalComplaints" name="presentPhysicalComplaints">
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
                                                    <input type="text" class="form-control" id="doctorName" name="doctorName">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="doctorPhone">Phone No. of the Doctor</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" id="doctorPhone" name="doctorPhone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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