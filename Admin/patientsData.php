<?php
error_reporting(0);
session_start();
if (isset($_SESSION['adminSessionActive'])) {
    include('../assets/php/db_conn.php');

    $adminFullName = $_SESSION['adminFullName'];
    $adminUserId = $_SESSION['adminUserId'];

    $therapistData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration`");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Patients Data Dashboard</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">

        <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../assets/css/appstyle.css">

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
                            <li class=""><a href="processSuggested.php?centralView=True"><i class="feather-list"></i> <span>Treatment Procedures</span></a>
                            </li>
                            <li class="menu-title"> <span>Account</span>
                            </li>
                            <li class=""><a href="therapistData.php"><i class="feather-user"></i> <span>Therapist Data</span></a>
                            </li>
                            <li class="active"><a href="patientsData.php"><i class="feather-users"></i> <span class="shape1"></span><span class="shape2"></span><span>Patients Data</span></a>
                            </li>
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
                                    <h5 class="card-title mb-0">Welcome, <?= $adminFullName; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size:1.15rem" role="alert">
                                Please do not <b>Share these Passwords</b> with Anyone. <b>Keep it Confidential.</b>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size:1.15rem" role="alert">
                                Only Share it with <b>Respective Patients</b> & ask them to<b> Reset there Passwords </b> once they Log In to their<b> Main Account.</b>
                            </div>
                        </div>
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
                                                    <th>Full Name</th>
                                                    <th>RegdNo</th>
                                                    <th>Gender</th>
                                                    <th>Contact No.</th>
                                                    <th>Password</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $output = '';
                                                $count = 1;
                                                while ($therapistDataArray = mysqli_fetch_array($therapistData)) {
                                                    $output .= '<tr>';
                                                    $output .= '<td>' . $count . '</td>';
                                                    $output .= '<td>' . $therapistDataArray['fullName'] . '</td>';
                                                    $output .= '<td>' . $therapistDataArray['regdNo'] . '</td>';
                                                    $output .= '<td>' . $therapistDataArray['gender'] . '</td>';
                                                    $output .= '<td>' . $therapistDataArray['phone'] . '</td>';
                                                    $output .= '<td>' . $therapistDataArray['password'] . '</td>';
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
                </div>
            </div>

        </div>

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/datatables.min.js"></script>

        <script src="../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
        <script src="../assets/js/calander.js"></script>

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
    </body>

    </html>
<?php
} else {
    header('location:../');
}
?>