<?php
session_start();
include('../assets/php/db_conn.php');
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hospital - Ladies Details</title>

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
                        <li class=""><a href="questionnaire.php"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                        </li>
                        <li class="active"><a href="ladies-only.php"><i class="feather-life-buoy"></i> <span class="shape1"></span><span class="shape2"></span><span>Ladies Details</span></a>
                        </li>
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
                                <h5 class="card-title mb-0">Ladies Details (To be filled only by Female's)</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <h5 class="">Full Name</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <h5 class="">Regd No.</h5>
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
                                                <label class="col-md-6" for=""> Menses</label>
                                                <div class="col-md-6">
                                                    <div class="row ustify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Regular
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Irregular
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="">How Irregular ?</label>
                                                <div class="">
                                                    <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for=""> Discharge ?</label>
                                                <div class="col-md-6">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Less
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Moderate
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Excess
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for="">Discharge Detail </label>
                                                <div class="col-md-6">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> With
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Without foul smell
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for=""> Is there white discharge ?</label>
                                                <div class="col-md-6">
                                                    <div class="row ustify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="">How many days ?</label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="radio">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for=""> Backache during menses ?</label>
                                                <div class="col-md-6">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="">Do you have pain before or during menses ?</label>
                                                <div class="">
                                                    <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="">Any other trouble during menses ? </label>
                                                <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="">Any issues regarding menses in the past ?</label>
                                                <div class="">
                                                    <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
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
                                                <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for=""> Maritial Status ?</label>
                                                <div class="col-md-6">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Married
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Unmarried
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-6" for="">Date of Marriage ?</label>
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" name="radio">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="" for=""> Pregnancy (No. and Year)</label>
                                                <input type="text" class="form-control" name="">
                                            </div>
                                            <div class="form-group ">
                                                <label class="" for=""> Delivery (No. and Year)</label>
                                                <input type="text" class="form-control" name="">
                                            </div>
                                            <div class="form-group ">
                                                <label class="" for=""> Miscarriage (No. and Year)</label>
                                                <input type="text" class="form-control" name="">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label class="" for=""> Children</label>
                                                    <input type="text" class="form-control" name="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="" for=""> Sons</label>
                                                    <input type="text" class="form-control" name="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="" for=""> Daughters</label>
                                                    <input type="text" class="form-control" name="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="" for=""> Method used for Family planning ?</label>
                                                <input type="text" class="form-control" name="">
                                            </div>
                                            <div class="form-group ">
                                                <label class="" for=""> Any Other Information ?</label>
                                                <textarea rows="3" type="text" class="form-control" name="radio"></textarea>
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