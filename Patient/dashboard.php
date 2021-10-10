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
                        <li class=""><a href="recordsheet.php"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                        </li>
                        <li class=""><a href="illness.php"><i class="feather-info"></i> <span>Illness Information</span></a>
                        </li>
                        <li class=""><a href="questionnaire.php"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                        </li>
                        <li class=""><a href="ladies-only.php"><i class="feather-life-buoy"></i> <span>Ladies Details</span></a>
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
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                        <div class="card detail-box1 details-box">
                            <div class="card-body">
                                <div class="dash-contetnt">
                                    <div class="mb-3">
                                        <img src="../assets/img/icons/accident.svg" alt="" width="26">
                                    </div>
                                    <h4 class="text-white">Total Patients</h4>
                                    <h2 class="text-white">245</h2>
                                    <div class="growth-indicator">
                                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                        <div class="card detail-box2 details-box">
                            <div class="card-body">
                                <div class="dash-contetnt">
                                    <div class="mb-3">
                                        <img src="../assets/img/icons/visits.svg" alt="" width="26">
                                    </div>
                                    <h4 class="text-white">Patients Visit</h4>
                                    <h2 class="text-white">137</h2>
                                    <div class="growth-indicator">
                                        <span class="text-white"><i class="fas fa-angle-double-down mr-1"></i> (4.78%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                        <div class="card detail-box3 details-box">
                            <div class="card-body">
                                <div class="dash-contetnt">
                                    <div class="mb-3">
                                        <img src="../assets/img/icons/hospital-bed.svg" alt="" width="26">
                                    </div>
                                    <h4 class="text-white">New Admit</h4>
                                    <h2 class="text-white">24</h2>
                                    <div class="growth-indicator">
                                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (18.32%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                        <div class="card detail-box4 details-box">
                            <div class="card-body">
                                <div class="dash-contetnt">
                                    <div class="mb-3">
                                        <img src="../assets/img/icons/operating.svg" alt="" width="26">
                                    </div>
                                    <h4 class="text-white">Operations</h4>
                                    <h2 class="text-white">05</h2>
                                    <div class="growth-indicator">
                                        <span class="text-white"><i class="fas fa-angle-double-down mr-1"></i> (25.14%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row calender-col">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div id="calendar-doctor" class="calendar-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Patients Profile</h5>
                                    <div class="dropdown" data-toggle="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-white btn-sm dropdown-toggle" role="button" data-toggle="dropdown">
                                            This Week
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                            <a href="javascript:void(0);" class="dropdown-item">This Week</a>
                                            <a href="javascript:void(0);" class="dropdown-item">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
                                    <div class="w-100 d-md-flex align-items-center mb-3 chart-count">
                                        <div class="mr-3 text-center">
                                            <span>Total Appointments</span>
                                            <p class="h4 text-primary">584</p>
                                        </div>
                                        <div class="mr-3 text-center">
                                            <span>Old Patients</span>
                                            <p class="h4 text-success">320</p>
                                        </div>
                                        <div class="mr-3 text-center">
                                            <span>New Patients</span>
                                            <p class="h4 text-warning">264</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="dsh_chart_ex_column"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row calender-col">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header no-border">
                                <h4 class="card-title">Medicine Requests</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Medicine</th>
                                                <th>Count</th>
                                                <th>Priority</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Desmopressin tabs`</td>
                                                <td>200 strips</td>
                                                <td><span class="badge bg-warning-light">Urgent</span></td>
                                                <td>10 mins ago</td>
                                                <td class="text-warning">Pending Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Abciximab-injection</td>
                                                <td>50 nos</td>
                                                <td><span class="badge bg-info-light">Next Week</span></td>
                                                <td>5 days ago</td>
                                                <td class="text-success">On Time</td>
                                            </tr>
                                            <tr>
                                                <td>Paliperidone palmitate</td>
                                                <td>75 Strips</td>
                                                <td><span class="badge bg-info-light">Next Week</span></td>
                                                <td>1 Day Ago</td>
                                                <td class="text-danger">Delay</td>
                                            </tr>
                                            <tr>
                                                <td>Sermorelin-injectable</td>
                                                <td>22 nos</td>
                                                <td><span class="badge bg-warning-light">Urgent</span></td>
                                                <td>8 mins ago</td>
                                                <td class="text-warning">Pending Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Abciximab-injection</td>
                                                <td>10 nos</td>
                                                <td><span class="badge bg-info-light">Next Week</span></td>
                                                <td>2 days ago</td>
                                                <td class="text-danger">Delay</td>
                                            </tr>
                                            <tr>
                                                <td>Kevzara sarilumab</td>
                                                <td>35 Strips</td>
                                                <td><span class="badge bg-warning-light">Urgent</span></td>
                                                <td>5 mins ago</td>
                                                <td class="text-warning">Pending Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Desmopressin</td>
                                                <td>155 Strips</td>
                                                <td><span class="badge bg-info-light">Next Week</span></td>
                                                <td>1 days ago</td>
                                                <td class="text-success">On Time</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reviews Score</h4>
                            </div>
                            <div class="card-body">
                                <div id="dsh_chart_ex_pie"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header no-border">
                        <h4 class="card-title float-left">Upcoming Appointments</h4>
                        <span class="float-right"><a href="appointments.html">View all</a></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient Name</th>
                                        <th>Age</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Disease</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>APT0001</td>
                                        <td>
                                            <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-03.jpg" class="rounded-circle m-r-5" alt=""> Maurice Guz</a>
                                        </td>
                                        <td>39</td>
                                        <td>11 Dec 2020</td>
                                        <td>10:00am-12:00am</td>
                                        <td>Cold</td>
                                        <td class="text-success">Approved</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>APT0002</td>
                                        <td>
                                            <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-07.jpg" class="rounded-circle m-r-5" alt=""> Brandon Stone</a>
                                        </td>
                                        <td>29</td>
                                        <td>5 Dec 2020</td>
                                        <td>10:00am-12:00am</td>
                                        <td>Fever</td>
                                        <td class="text-danger">Canceled</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>APT0003</td>
                                        <td>
                                            <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-06.jpg" class="rounded-circle m-r-5" alt=""> Terry Baker</a>
                                        </td>
                                        <td>42</td>
                                        <td>6 Jan 2020</td>
                                        <td>10:00am-12:00am</td>
                                        <td>heart</td>
                                        <td class="text-success">Approved</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>APT0004</td>
                                        <td>
                                            <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-04.jpg" class="rounded-circle m-r-5" alt=""> Kyle Woodbury</a>
                                        </td>
                                        <td>23</td>
                                        <td>19 Dec 2020</td>
                                        <td>10:00am-12:00am</td>
                                        <td>Diabeties</td>
                                        <td class="text-success">Approved</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>APT0005</td>
                                        <td>
                                            <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-05.jpg" class="rounded-circle m-r-5" alt=""> Marie Gallardo</a>
                                        </td>
                                        <td>55</td>
                                        <td>15 Dec 2020</td>
                                        <td>10:00am-12:00am</td>
                                        <td>Cold</td>
                                        <td class="text-success">Approved</td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 d-flex flex-wrap">
                        <div class="card">
                            <div class="card-header no-border">
                                <h4 class="card-title float-left">Recent Visits</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patients</th>
                                                <th class="text-right pt-0">Reports</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-03.jpg" class="rounded-circle m-r-5" alt=""> Maurice Guz</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="patients-profile.html" class="btn btn-sm btn-white text-success"><i class="far fa-eye mr-1"></i> View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-05.jpg" class="rounded-circle m-r-5" alt=""> Marie Gallardo</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="patients-profile.html" class="btn btn-sm btn-white text-success"><i class="far fa-eye mr-1"></i> View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-04.jpg" class="rounded-circle m-r-5" alt=""> Kyle Woodbury</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="patients-profile.html" class="btn btn-sm btn-white text-success"><i class="far fa-eye mr-1"></i> View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="patients-profile.html"><img width="28" height="28" src="../assets/img/profiles/avatar-06.jpg" class="rounded-circle m-r-5" alt=""> Terry Baker</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="patients-profile.html" class="btn btn-sm btn-white text-success"><i class="far fa-eye mr-1"></i> View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 d-flex flex-wrap">
                        <div class="card">
                            <div class="card-header no-border">
                                <h4 class="card-title float-left">Patients Group</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Issues</th>
                                                <th class="text-right pt-0">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cholesterol</td>
                                                <td class="text-right text-fade">5 Patients</td>
                                            </tr>
                                            <tr>
                                                <td>Diabetic</td>
                                                <td class="text-right text-fade">14 Patients</td>
                                            </tr>
                                            <tr>
                                                <td>Blood Pressure</td>
                                                <td class="text-right text-fade">10 Patients</td>
                                            </tr>
                                            <tr>
                                                <td>Hypertension</td>
                                                <td class="text-right text-fade">21 Patients</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 d-flex flex-wrap">
                        <div class="card">
                            <div class="card-header no-border">
                                <h4 class="card-title float-left">Doctors</h4>
                                <span class="float-right"><a href="appointments.html">View all</a></span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th class="text-right pt-0">Availabilty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../assets/img/profiles/avatar-14.jpg" class="rounded-circle m-r-5 profile-img" alt="">Dr.Jay Soni</td>
                                                <td class="text-success text-right">Available</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/profiles/avatar-17.jpg" class="rounded-circle m-r-5 profile-img" alt="">Dr.Sarah Smith</td>
                                                <td class="text-danger text-right">Absent</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/profiles/avatar-18.jpg" class="rounded-circle m-r-5 profile-img" alt=""> Dr.John Deo</td>
                                                <td class="text-success text-right">Available</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/profiles/avatar-13.jpg" class="rounded-circle m-r-5 profile-img" alt="">Dr.Kirsten Deleon</td>
                                                <td class="text-success text-right">Available</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> <i class="feather-x-circle"></i> </a>
            </div>
            <div class="noti-content">
                <ul class="notification-list">
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="../assets/img/profiles/avatar-02.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="../assets/img/profiles/avatar-03.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="../assets/img/profiles/avatar-06.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="../assets/img/profiles/avatar-17.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="../assets/img/profiles/avatar-13.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="javascript:void(0);">View all Notifications</a>
            </div>
        </div>

    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="../assets/plugins/apexchart/dsh-apaxcharts.js"></script>

    <script src="../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="../assets/js/calander.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>