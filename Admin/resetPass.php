<?php
error_reporting(0);
session_start();
if (isset($_SESSION['adminSessionActive'])) {
    include('../assets/php/db_conn.php');

    $adminFullName = $_SESSION['adminFullName'];
    $adminUserId = $_SESSION['adminUserId'];

    $activeTherapistData = mysqli_query($naturopathyCon, "SELECT * FROM `adminregistration` WHERE id = '$adminUserId'");
    $activeTherapistDataResult = mysqli_fetch_array($activeTherapistData);

    if (isset($_POST['resetPass'])) {
        $cpass = $_POST['cpass'];
        $npass = $_POST['npass'];
        if ($cpass == $activeTherapistDataResult['password']) {
            $updatePass = mysqli_query($naturopathyCon, "UPDATE `adminregistration` SET `password` = '$npass' WHERE `adminregistration`.`id` = $adminUserId");
            ($updatePass) ? header('location:resetPass.php?status=102') : header('location:resetPass.php');
        } else {
            header('location:resetPass.php?status=103');
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Therapist Reset Password</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">

        <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../assets/css/appstyle.css">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>

    <body>
        <?php
        if ($_GET['status'] == 102) {
            echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Operation Completed, Clearing Sessions...',
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
        })
        setTimeout(() => {
            window.open('logout.php','_parent');
        }, 2000);
    </script>";
        }

        if ($_GET['status'] == 103) {
            echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Incorrect Details',
            timer: 1500,
            timerProgressBar: true,
            showConfirmButton: false,
        })
    </script>";
        }

        ?>
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
                            <!-- <li class=""><a href="profile.php"><i class="feather-user"></i> <span>My Profile</span></a>
                            </li> -->
                            <li class=""><a href="therapistData.php"><i class="feather-user"></i> <span>Therapist Data</span></a>
                            </li>
                            <li class=""><a href="patientsData.php"><i class="feather-users"></i> <span>Patients Data</span></a>
                            </li>
                            <li class="active"><a href="resetPass.php"><i class="feather-refresh-cw"></i> <span class="shape1"></span><span class="shape2"></span><span>Reset Password</span></a>
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
                                    <h5 class="card-title mb-0">Follow the Procedure to Reset Your Password</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size:1.15rem" role="alert">
                                Please Remember your <b>New Password</b>. All your <b>Active Sessions Would be Cleared</b> & You need to <b>Log In</b> again with your <b>New Password</b>.
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" style="font-size:1.15rem" role="alert">
                                <b>Contact Administrator if you can't Recall your Current Password.</b>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row rounded-lg">
                                <div class="login-wrapper pt-0">
                                    <div class="container">
                                        <img class="img-fluid logo-dark mb-2" width="90px" height="90px" src="../assets/img/logo-favicon.png" alt="Logo">
                                        <div class="loginbox">
                                            <div class="login-right">
                                                <div class="login-right-wrap">
                                                    <h1>Reset Password</h1>
                                                    <form method="POST" action="">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="phoneno">Current Password</label>
                                                            <input type="password" class="form-control" name="cpass" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="password">New Password</label>
                                                            <div class="pass-group">
                                                                <input type="password" class="form-control pass-input" id="password" name="npass" required>

                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button class="btn btn-md btn-primary" type="submit" name="resetPass">Change</button>
                                                        </div>
                                                    </form>
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