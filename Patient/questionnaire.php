<?php
session_start();
include('../assets/php/db_conn.php');

$patientGender = $_SESSION['patientGender'];
$patientFullName = $_SESSION['patientFullName'];
$patientUserId = $_SESSION['patientUserId'];
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hospital - Health Questionnaire</title>

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

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="dashboard.php.html" class="logo">
                    <img src="../assets/img/logo-favicon.png" alt="Logo">
                </a>
                <a href="dashboard.php.html" class="logo logo-small">
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
                                <h5 class="mb-0">Health Questionnaire Sheet (Check-out which ever is applicable)</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">Full Name</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">Regd No.</h5>
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
                                                <label class="col-lg-8" for="fullName">Do you feel fresh after getting up in the morning ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row ustify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q1"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q1"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q1"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="">Do you sleep in the afternoon ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row ustify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q2"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q2"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="">Anything specially required for night sleep ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q3"> Nothing
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q3"> Some Medicine
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you dream ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q4"> Always
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q4"> Sometimes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q4"> Rarely
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Is your sleep interrupted ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q5"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q5"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q5"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">How is your sleep ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q6"> Deep
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q6"> Restless
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you feel fatigue after day's work ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q7"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q7"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q7"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Can you Concentrate your work ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q8"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q8"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q8"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you remain firm on your decision ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q9"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q9"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q9"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you become emotional instantly ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q10"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q10"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q10"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Is your appetite normal ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q11"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q11"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q11"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you Pass regular motions ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q12"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q12"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-lg-8" for="fullName">Any medicine required for Passing daily motions ?</label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q13"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="Q13"> No
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
                                                        <input type="time" class="form-control" name="Q14" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Evening Snacks</label>
                                                        <input type="time" class="form-control" name="Q15" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Lunch</label>
                                                        <input type="time" class="form-control" name="Q16" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Dinner</label>
                                                        <input type="time" class="form-control" name="Q17" id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="class-title">Timing of Tea/Coffee/Milk</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">First</label>
                                                        <input type="time" class="form-control" name="Q18" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Second</label>
                                                        <input type="time" class="form-control" name="Q19" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Third</label>
                                                        <input type="time" class="form-control" name="Q20" id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        <textarea type="text" rows="2" class="form-control" name="Q21" id=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center pb-5">
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary" name="submit">Submit</button>
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


</body>


</html>