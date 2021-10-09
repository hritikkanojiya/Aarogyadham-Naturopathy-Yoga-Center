<?php
session_start();
include('../assets/php/db_conn.php');
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Do you sleep in the afternoon ? </label>
                                                <div class="col-lg-4">
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
                                            <div class="form-group row">
                                                <label class="col-lg-8" for="fullName">Anything specially required for night sleep ? </label>
                                                <div class="col-lg-4">
                                                    <div class="row justify-content-start">
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Nothing
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Some Medicine
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
                                                                <input type="radio" name="radio"> Always
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Sometimes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Rarely
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                                                <input type="radio" name="radio"> Deep
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Restless
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                                                <input type="radio" name="radio"> Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> No
                                                            </label>
                                                        </div>
                                                        <div class="radio mx-2">
                                                            <label>
                                                                <input type="radio" name="radio"> Can't Say
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
                                            <div class="form-group row mb-3">
                                                <label class="col-lg-8" for="fullName">Any medicine required for Passing daily motions ?</label>
                                                <div class="col-lg-4">
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
                                                        <input type="time" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Evening Snacks</label>
                                                        <input type="time" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Lunch</label>
                                                        <input type="time" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Dinner</label>
                                                        <input type="time" class="form-control" name="" id="">
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
                                                        <input type="time" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Second</label>
                                                        <input type="time" class="form-control" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="" for="fullName">Third</label>
                                                        <input type="time" class="form-control" name="" id="">
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
                                                        <textarea type="text" rows="2" class="form-control" name="" id=""></textarea>
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