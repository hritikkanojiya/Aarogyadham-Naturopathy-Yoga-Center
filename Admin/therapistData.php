<?php
error_reporting(0);
session_start();
if (isset($_SESSION['adminSessionActive'])) {
    include('../assets/php/db_conn.php');

    $adminFullName = $_SESSION['adminFullName'];
    $adminUserId = $_SESSION['adminUserId'];

    $therapistData = mysqli_query($naturopathyCon, "SELECT * FROM `therapistregistration`");

    if (isset($_POST['addTherapist'])) {
        $fname = $_POST['fname'];
        $phone = $_POST['phoneno'];
        $pass = $_POST['password'];

        $add = mysqli_query($naturopathyCon, "INSERT INTO `therapistregistration` (`id`, `fullName`, `phone`, `password`) VALUES (NULL, '$fname', '$phone', '$pass')");
        ($add) ? header('location:therapistData.php?status=100') : header('location:therapistData.php');
    }

    if (isset($_GET['delTherapist'])) {
        $id = $_GET['delTherapist'];
        $delete = mysqli_query($naturopathyCon, "DELETE FROM `therapistregistration` WHERE `therapistregistration`.`id` = '$id'");
        ($delete) ? header('location:therapistData.php?status=101') : header('location:therapistData.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Therapist Data Dashboard</title>

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
        <?php
        if ($_GET['status'] == 100) {
            echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Data Inserted!',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
            $error = FALSE;
        }
        if ($_GET['status'] == 101) {
            echo "<script>
                Swal.fire({
                icon: 'success',
                title: 'Record Deleted!',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
            $error = FALSE;
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
                            <li class=""><a href="addTreatment.php"><i class="feather-plus"></i> <span>Add Treatment</span></a>
                            </li>
                            <li class="menu-title"> <span>Account</span>
                            </li>
                            <li class="active"><a href="therapistData.php"><i class="feather-user"></i><span class="shape1"></span><span class="shape2"></span> <span>Therapist Data</span></a>
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
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="card-title mb-0">Welcome, <?= $adminFullName; ?></h5>
                                    <button class="btn btn-primary d-none d-lg-block" data-toggle="modal" data-target="#addTherapist">Add New Therapist</button>
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
                                Only Share it with <b>Respective Therapist</b> & ask them to<b> Reset there Passwords </b> once they Log In to their<b> Main Account.</b>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Therapist Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Full Name</th>
                                                    <th>Contact No.</th>
                                                    <th>Password</th>
                                                    <th>Delete Record</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($therapistData)) {
                                                    $output = '';
                                                    $count = 1;
                                                    while ($therapistDataArray = mysqli_fetch_array($therapistData)) {
                                                        $output .= '<tr>';
                                                        $output .= '<td>' . $count . '</td>';
                                                        $output .= '<td>' . $therapistDataArray['fullName'] . '</td>';
                                                        $output .= '<td>' . $therapistDataArray['phone'] . '</td>';
                                                        $output .= '<td>' . $therapistDataArray['password'] . '</td>';
                                                        $output .= '<td class="text-center"><button class="btn btn-danger" onclick=window.open("therapistData.php?delTherapist=' . $therapistDataArray['id'] . '","_parent")>Delete</button></td>';
                                                        $output .= '</tr>';
                                                        $count++;
                                                    }
                                                    echo $output;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addTherapist" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Therapist Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body">
                                        <div class="loginbox">
                                            <div class="login-right">
                                                <div class="login-right-wrap">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="phoneno">Full Name</label>
                                                        <input type="text" class="form-control" id="phoneno" name="fname" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="phoneno">Phone No.</label>
                                                        <input type="tel" class="form-control" id="phoneno" name="phoneno" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="password">Password</label>
                                                        <div class="pass-group">
                                                            <input type="password" class="form-control pass-input" id="password" name="password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger mx-5" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success mx-5" name="addTherapist">Save changes</button>
                                    </div>
                                </form>
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