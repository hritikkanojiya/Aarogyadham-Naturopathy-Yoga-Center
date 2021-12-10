<?php
session_start();
if (isset($_SESSION['patientSessionActive'])) {
    header('location: dashboard.php');
}
include('../assets\php\db_conn.php');

$phone_found = False;

if (isset($_POST['register'])) {
    $fullName = $_POST['fullName'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $phone_exist = "SELECT COUNT(phone) AS total_phone FROM `patientregistration` WHERE phone ='$phone'";
    $phone_exist_result = mysqli_query($naturopathyCon, $phone_exist);
    $phone_exist_result_data = mysqli_fetch_array($phone_exist_result);
    if ($phone_exist_result_data['total_phone'] > 0) {
        $phone_found = True;
    } else {
        $randNo = mt_rand(1000,9999);
        $regdNo = 'ANYC'.$randNo;
        $sql = "INSERT INTO `patientregistration` (`regdNo`,`fullName`, `gender`, `phone`, `password`) VALUES ('$regdNo','$fullName', '$gender', '$phone', '$password')";
        $sql_result = mysqli_query($naturopathyCon, $sql);
        if ($sql_result == True) {
            $_SESSION['patientGender'] = $gender;
            $_SESSION['patientFullName'] = $fullName;
            $_SESSION['patientUserId'] = mysqli_insert_id($naturopathyCon);
            $_SESSION['patientSessionActive'] = True;
            header('location:dashboard.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Aarogyadham-Naturopathy-Yoga-Center | Patient Registration</title>

    <link rel="shortcut icon" href="../assets/img/logo-favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if ($phone_found == TRUE) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Phone Number Already Registered!',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                })
            </script>";
        $phone_found = FALSE;
    }
    ?>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" height="110px" width="110px" src="../assets/img/logo-favicon.png" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>

                            <form method="POST" class="m-0">
                                <div class="form-group mb-0">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Full Name</label>
                                        <input class="form-control" type="text" id="name" name="fullName" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Gender</label>
                                        <div class="row justify-content-around mx-4">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="Male" name="gender" required> Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="Female" name="gender" required> Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="phoneno">Phone No.</label>
                                        <input class="form-control" type="number" id=" phoneno" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" minlength="6" maxlength="16" required>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-md btn-primary" type="submit" name="register">Register</button>
                                    </div>
                            </form>

                            <div class="login-or p-1">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="text-center dont-have mt-1">Already have an account? <a href="index.php">Login</a></div>
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