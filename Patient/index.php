<?php
session_start();
if (isset($_SESSION['activeUserID'])) {
    header('location: dashboard.php');
}
$error = FALSE;
include('../assets/php/db_conn.php');
echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

if (isset($_POST['login'])) {
    $phone = $_POST['phoneno'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `patientregistration` WHERE `phone` = '$phone' AND `password` = '$password' ORDER BY id DESC LIMIT 1";
    $sql_result = mysqli_query($naturopathyCon, $sql);
    $sql_result_array = mysqli_fetch_array($sql_result);
    if (isset($sql_result_array['id'])) {
        $_SESSION['gender'] = $sql_result_array['gender'];
        $_SESSION['activeUserID'] = $sql_result_array['id'];
        header('location: dashboard.php');
    } else {
        $error = TRUE;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hospital - Login</title>

    <link rel="shortcut icon" href="../assets/img/logo-favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
    if ($error == TRUE) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Invalid Details!',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
        $error = FALSE;
    }
    ?>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" width="110px" height="110px" src="../assets/img/logo-favicon.png" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <form method="POST">
                                <div class="form-group">
                                    <label class="form-control-label" for="phoneno">Phone No.</label>
                                    <input type="tel" class="form-control" id="phoneno" name="phoneno" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" id="password" name="password" required>
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-md btn-primary" type="submit" name="login">Login</button>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="m-auto">
                                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="login-or p-1">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="text-center dont-have mt-1">Don't have an account yet? <a href="registration.php">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>