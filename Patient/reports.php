<?php
error_reporting(0);
session_start();
if (isset($_SESSION['patientSessionActive'])) {
    include('../assets/php/db_conn.php');
    date_default_timezone_set('Asia/Kolkata');

    $patientGender = $_SESSION['patientGender'];
    $patientFullName = $_SESSION['patientFullName'];
    $patientUserId = $_SESSION['patientUserId'];

    $dataInserted = False;
    $dataUpdated = false;
    $updateData = False;

    if ($patientGender == 'Female') {
        $reportsTable = ' <table class="table table-bordered table-nowrap mb-0 table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Scaling</th>
                <th>Female (Normal Range)</th>
                <th>Dates (Before)</th>
                <th>Dates (After)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Weight <span class="text-danger">*</span></td>
                <td><input type="text" class="form-control" name="fq1" value="" required disabled></td>
                <td><input type="date" class="form-control" name="db1" value="" disabled></td>
                <td><input type="date" class="form-control" name="da1" value="" disabled></td>
            </tr>
            <tr>
                <td>Total Fat</td>
                <td>20 - 30 %</td>
                <td><input type="date" class="form-control" name="db2" value="" disabled></td>
                <td><input type="date" class="form-control" name="da2" value="" disabled></td>
            </tr>
            <tr>
                <td>Visceral Fat</td>
                <td>1 - 9</td>
                <td><input type="date" class="form-control" name="db3" value="" disabled></td>
                <td><input type="date" class="form-control" name="da3" value="" disabled></td>
            </tr>
            <tr>
                <td>Resting Metabolism</td>
                <td>1500 - 1800 Cal.</td>
                <td><input type="date" class="form-control" name="db4" value="" disabled></td>
                <td><input type="date" class="form-control" name="da4" value="" disabled></td>
            </tr>
            <tr>
                <td>BMI</td>
                <td>18.5 - 24.9</td>
                <td><input type="date" class="form-control" name="db5" value="" disabled></td>
                <td><input type="date" class="form-control" name="da5" value="" disabled></td>
            </tr>
            <tr>
                <td>Body Age</td>
                <td><input type="text" class="form-control" name="fq2" value="" disabled></td>
                <td><input type="date" class="form-control" name="db6" value="" disabled></td>
                <td><input type="date" class="form-control" name="da6" value="" disabled></td>
            </tr>
            <tr>
                <td>Subcutaneous Fat T.F</td>
                <td><input type="text" class="form-control" name="fq3" value="" disabled></td>
                <td><input type="date" class="form-control" name="db7" value="" disabled></td>
                <td><input type="date" class="form-control" name="da7" value="" disabled></td>
            </tr>
            <tr>
                <td>Skeltel Fat T.F</td>
                <td>Upto 28 %</td>
                <td><input type="date" class="form-control" name="db8" value="" disabled></td>
                <td><input type="date" class="form-control" name="da8" value="" disabled></td>
            </tr>
            <tr>
                <td>Sub. Trunk Fat</td>
                <td>8 - 15</td>
                <td><input type="date" class="form-control" name="db9" value="" disabled></td>
                <td><input type="date" class="form-control" name="da9" value="" disabled></td>
            </tr>
            <tr>
                <td>Skel. Trunk Fat</td>
                <td><input type="text" class="form-control" name="fq4" value="" disabled></td>
                <td><input type="date" class="form-control" name="db10" value="" disabled></td>
                <td><input type="date" class="form-control" name="da10" value="" disabled></td>
            </tr>
            <tr>
                <td>Sub. Arms Fat</td>
                <td><input type="text" class="form-control" name="fq5" value="" disabled></td>
                <td><input type="date" class="form-control" name="db11" value="" disabled></td>
                <td><input type="date" class="form-control" name="da11" value="" disabled></td>
            </tr>
            <tr>
                <td>Skel. Arms Fat</td>
                <td><input type="text" class="form-control" name="fq6" value="" disabled></td>
                <td><input type="date" class="form-control" name="db12" value="" disabled></td>
                <td><input type="date" class="form-control" name="da12" value="" disabled></td>
            </tr>
            <tr>
                <td>Sub. Legs Fat</td>
                <td><input type="text" class="form-control" name="fq7" value="" disabled></td>
                <td><input type="date" class="form-control" name="db13" value="" disabled></td>
                <td><input type="date" class="form-control" name="da13" value="" disabled></td>
            </tr>
            <tr>
                <td>Skel. Legs Fat</td>
                <td><input type="text" class="form-control" name="fq8" value="" disabled></td>
                <td><input type="date" class="form-control" name="db14" value="" disabled></td>
                <td><input type="date" class="form-control" name="da14" value="" disabled></td>
            </tr>
        </tbody>
    </table>';
    } else if ($patientGender == 'Male') {
        $reportsTable = ' <table class="table table-bordered table-nowrap mb-0 table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Scaling</th>
                                <th>Male (Normal Range)</th>
                                <th>Dates (Before)</th>
                                <th>Dates (After)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Weight <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control" name="mq1" value="" disabled required></td>
                                <td><input type="date" class="form-control" name="db1" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da1" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Total Fat</td>
                                <td>10 - 19.9 %</td>
                                <td><input type="date" class="form-control" name="db2" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da2" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Visceral Fat</td>
                                <td>1 - 9</td>
                                <td><input type="date" class="form-control" name="db3" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da3" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Resting Metabolism</td>
                                <td>1800 - 2000 Cal.</td>
                                <td><input type="date" class="form-control" name="db4" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da4" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>BMI</td>
                                <td>18.5 - 24.9</td>
                                <td><input type="date" class="form-control" name="db5" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da5" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Body Age</td>
                                <td><input type="text" class="form-control" name="mq2" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db6" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da6" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Subcutaneous Fat T.F</td>
                                <td><input type="text" class="form-control" name="mq3" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db7" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da7" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Skeltel Fat T.F</td>
                                <td>Upto 37 %</td>
                                <td><input type="date" class="form-control" name="db8" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da8" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Sub. Trunk Fat</td>
                                <td>8 - 15</td>
                                <td><input type="date" class="form-control" name="db9" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da9" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Skel. Trunk Fat</td>
                                <td><input type="text" class="form-control" name="mq4" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db10" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da10" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Sub. Arms Fat</td>
                                <td><input type="text" class="form-control" name="mq5" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db11" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da11" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Skel. Arms Fat</td>
                                <td><input type="text" class="form-control" name="mq6" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db12" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da12" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Sub. Legs Fat</td>
                                <td><input type="text" class="form-control" name="mq7" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db13" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da13" value="" disabled></td>
                            </tr>
                            <tr>
                                <td>Skel. Legs Fat</td>
                                <td><input type="text" class="form-control" name="mq8" value="" disabled></td>
                                <td><input type="date" class="form-control" name="db14" value="" disabled></td>
                                <td><input type="date" class="form-control" name="da14" value="" disabled></td>
                            </tr>
                        </tbody>
                    </table>';
    }

    $fullname = $patientFullName;
    $gender = $patientGender;
    $recordDate = date('m-d-Y');

    $activePatientData = mysqli_query($naturopathyCon, "SELECT * FROM `patientregistration` WHERE `id` = '$patientUserId'");
    $activePatientDataResult = mysqli_fetch_array($activePatientData);

    $activePatientReports = mysqli_query($naturopathyCon, "SELECT * FROM `reportsdata` WHERE patientId='$patientUserId' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($activePatientReports) > 0) {
        $activePatientReportsArray = mysqli_fetch_array($activePatientReports);

        $fullname = $patientFullName;
        $gender = $patientGender;
        $updateData = True;
        $recordDate = $activePatientReportsArray['recordDate'];
        $updateDataId = $activePatientReportsArray['id'];
        $maleJson = json_decode($activePatientReportsArray['maleJson'], true);
        $femaleJson = json_decode($activePatientReportsArray['femaleJson'], true);
        $datesBefore = json_decode($activePatientReportsArray['datesBeforeJson'], true);
        $datesAfter = json_decode($activePatientReportsArray['datesAfterJson'], true);
        if ($gender == 'Female') {
            $reportsTable = ' <table class="table table-bordered table-nowrap mb-0 table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Scaling</th>
                    <th>Female (Normal Range)</th>
                    <th>Dates (Before)</th>
                    <th>Dates (After)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Weight <span class="text-danger">*</span></td>
                    <td><input type="text" class="form-control" name="fq1" value="' . $femaleJson['fq1'] . '" required disabled></td>
                    <td><input type="date" class="form-control" name="db1" value="' . $datesBefore['db1'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da1" value="' . $datesAfter['da1'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Total Fat</td>
                    <td>20 - 30 %</td>
                    <td><input type="date" class="form-control" name="db2" value="' . $datesBefore['db2'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da2" value="' . $datesAfter['da2'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Visceral Fat</td>
                    <td>1 - 9</td>
                    <td><input type="date" class="form-control" name="db3" value="' . $datesBefore['db3'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da3" value="' . $datesAfter['da3'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Resting Metabolism</td>
                    <td>1500 - 1800 Cal.</td>
                    <td><input type="date" class="form-control" name="db4" value="' . $datesBefore['db4'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da4" value="' . $datesAfter['da4'] . '" disabled></td>
                </tr>
                <tr>
                    <td>BMI</td>
                    <td>18.5 - 24.9</td>
                    <td><input type="date" class="form-control" name="db5" value="' . $datesBefore['db5'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da5" value="' . $datesAfter['da5'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Body Age</td>
                    <td><input type="text" class="form-control" name="fq2" value="' . $femaleJson['fq2'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db6" value="' . $datesBefore['db6'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da6" value="' . $datesAfter['da6'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Subcutaneous Fat T.F</td>
                    <td><input type="text" class="form-control" name="fq3" value="' . $femaleJson['fq3'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db7" value="' . $datesBefore['db7'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da7" value="' . $datesAfter['da7'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skeltel Fat T.F</td>
                    <td>Upto 28 %</td>
                    <td><input type="date" class="form-control" name="db8" value="' . $datesBefore['db8'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da8" value="' . $datesAfter['da8'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Trunk Fat</td>
                    <td>8 - 15</td>
                    <td><input type="date" class="form-control" name="db9" value="' . $datesBefore['db9'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da9" value="' . $datesAfter['da9'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Trunk Fat</td>
                    <td><input type="text" class="form-control" name="fq4" value="' . $femaleJson['fq4'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db10" value="' . $datesBefore['db10'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da10" value="' . $datesAfter['da10'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Arms Fat</td>
                    <td><input type="text" class="form-control" name="fq5" value="' . $femaleJson['fq5'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db11" value="' . $datesBefore['db11'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da11" value="' . $datesAfter['da11'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Arms Fat</td>
                    <td><input type="text" class="form-control" name="fq6" value="' . $femaleJson['fq6'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db12" value="' . $datesBefore['db12'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da12" value="' . $datesAfter['da12'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Legs Fat</td>
                    <td><input type="text" class="form-control" name="fq7" value="' . $femaleJson['fq7'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db13" value="' . $datesBefore['db13'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da13" value="' . $datesAfter['da13'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Legs Fat</td>
                    <td><input type="text" class="form-control" name="fq8" value="' . $femaleJson['fq8'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db14" value="' . $datesBefore['db14'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da14" value="' . $datesAfter['da14'] . '" disabled></td>
                </tr>
            </tbody>
        </table>';
        } else if ($gender == 'Male') {
            $reportsTable = ' <table class="table table-bordered table-nowrap mb-0 table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Scaling</th>
                    <th>Male (Normal Range)</th>
                    <th>Dates (Before)</th>
                    <th>Dates (After)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Weight <span class="text-danger">*</span></td>
                    <td><input type="text" class="form-control" name="mq1" value="' . $maleJson['mq1'] . '" required disabled></td>
                    <td><input type="date" class="form-control" name="db1" value="' . $datesBefore['db1'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da1" value="' . $datesAfter['da1'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Total Fat</td>
                    <td>10 - 19.9 %</td>
                    <td><input type="date" class="form-control" name="db2" value="' . $datesBefore['db2'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da2" value="' . $datesAfter['da2'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Visceral Fat</td>
                    <td>1 - 9</td>
                    <td><input type="date" class="form-control" name="db3" value="' . $datesBefore['db3'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da3" value="' . $datesAfter['da3'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Resting Metabolism</td>
                    <td>1800 - 2000 Cal.</td>
                    <td><input type="date" class="form-control" name="db4" value="' . $datesBefore['db4'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da4" value="' . $datesAfter['da4'] . '" disabled></td>
                </tr>
                <tr>
                    <td>BMI</td>
                    <td>18.5 - 24.9</td>
                    <td><input type="date" class="form-control" name="db5" value="' . $datesBefore['db5'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da5" value="' . $datesAfter['da5'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Body Age</td>
                    <td><input type="text" class="form-control" name="mq2" value="' . $maleJson['mq2'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db6" value="' . $datesBefore['db6'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da6" value="' . $datesAfter['da6'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Subcutaneous Fat T.F</td>
                    <td><input type="text" class="form-control" name="mq3" value="' . $maleJson['mq3'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db7" value="' . $datesBefore['db7'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da7" value="' . $datesAfter['da7'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skeltel Fat T.F</td>
                    <td>Upto 37 %</td>
                    <td><input type="date" class="form-control" name="db8" value="' . $datesBefore['db8'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da8" value="' . $datesAfter['da8'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Trunk Fat</td>
                    <td>8 - 15</td>
                    <td><input type="date" class="form-control" name="db9" value="' . $datesBefore['db9'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da9" value="' . $datesAfter['da9'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Trunk Fat</td>
                    <td><input type="text" class="form-control" name="mq4" value="' . $maleJson['mq4'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db10" value="' . $datesBefore['db10'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da10" value="' . $datesAfter['da10'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Arms Fat</td>
                    <td><input type="text" class="form-control" name="mq5" value="' . $maleJson['mq5'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db11" value="' . $datesBefore['db11'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da11" value="' . $datesAfter['da11'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Arms Fat</td>
                    <td><input type="text" class="form-control" name="mq6" value="' . $maleJson['mq6'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db12" value="' . $datesBefore['db12'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da12" value="' . $datesAfter['da12'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Sub. Legs Fat</td>
                    <td><input type="text" class="form-control" name="mq7" value="' . $maleJson['mq7'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db13" value="' . $datesBefore['db13'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da13" value="' . $datesAfter['da13'] . '" disabled></td>
                </tr>
                <tr>
                    <td>Skel. Legs Fat</td>
                    <td><input type="text" class="form-control" name="mq8" value="' . $maleJson['mq8'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="db14" value="' . $datesBefore['db14'] . '" disabled></td>
                    <td><input type="date" class="form-control" name="da14" value="' . $datesAfter['da14'] . '" disabled></td>
                </tr>
            </tbody>
        </table>';
        }
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Aarogyadham-Naturopathy-Yoga-Center | Patient Diagnosis Reports</title>

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-favicon.png">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../assets/plugins/simple-calendar/simple-calendar.css">

        <link rel="stylesheet" href="../assets/css/feather.css">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link rel="stylesheet" href="../assets/css/appstyle.css">

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body>
        <div class="main-wrapper">

            <div class="header">
                <div class="header-left">
                    <a href="dashboard.php" class="logo text-center">
                        <img src="../assets/img/logo-favicon.png" alt="Logo">
                    </a>
                    <a href="dashboard.php" class="logo logo-small">
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
                            <!-- <li class=""> <a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a>
                            </li> -->
                            <li class=""><a href="recordsheet.php"><i class="feather-file-text"></i> <span>Record Sheet</span></a>
                            <li class=""><a href="illness.php"><i class="feather-info"></i> <span>Illness Information</span></a>
                            </li>
                            <li class=""><a href="questionnaire.php"><i class="feather-activity"></i> <span>Health Questionnaire</span></a>
                            </li>
                            <?php
                            if ($patientGender == 'Female') { ?>
                                <li class=""><a href="ladies-only.php"><i class="feather-life-buoy"></i> <span>Ladies Details</span></a>
                                </li>
                            <?php } ?>
                            <li class=""><a href="physicalExam.php"><i class="feather-edit-3"></i> <span>Physical Examination</span></a>
                            </li>
                            <li class="active"><a href="reports.php"><i class="feather-folder"></i> <span class="shape1"></span><span class="shape2"></span> <span>Reports Data</span></a>
                            </li>
                            <li class=""><a href="processSuggested.php"><i class="feather-list"></i> <span>Treatment Procedures</span></a>
                            </li>
                            <li class="menu-title"> <span>Account</span>
                            </li>
                            <!-- <li class=""><a href="profile.php"><i class="feather-user"></i> <span>My Profile</span></a>
                            </li> -->
                            <li class=""><a href="resetPass.php"><i class="feather-refresh-cw"></i> <span>Reset Password</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content container-fluid">
                <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'marathi'
                            }, 'google_translate_element');
                        }
                    </script>

                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <div id="google_translate_element"></div>
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0">Patient Diagnosis Reports (To be Filled by Administrator)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Patient Name : <?= $activePatientDataResult['fullName'] ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Regd No : <?= $activePatientDataResult['regdNo'] ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">Record Date : <?= $recordDate ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Diagnosis Data</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive" id="reportsTable">
                                                    <?= $reportsTable ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
        <script src="../assets/js/calander.js"></script>
        <script src="../assets/js/script.js"></script>
        <script>
            $('document').ready(function() {
                setTimeout(() => {
                    $("input[name=ongoingTreatment][value='<?= $ongoingTreatment ?>']").prop('checked', true);
                }, 300);
            })
        </script>
        
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </body>

    </html>
<?php
} else {
    header('location:../');
}
?>