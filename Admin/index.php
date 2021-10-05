<?php



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hospital - Admin Login</title>

    <link rel="shortcut icon" href="../assets/img/logo-favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

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
                                    <input type="tel" class="form-control" id="phoneno" name="phoneno">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" id="password" name="password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-md btn-primary" type="submit">Login</button>
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
                                <div class="text-center dont-have mt-1">Don't have an account yet? <a href="registration_form.php">Register</a></div>
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