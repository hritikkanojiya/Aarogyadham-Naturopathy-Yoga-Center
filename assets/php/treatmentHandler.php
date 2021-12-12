<?php

// echo '<ul class="list-unstyled">
// <li>
//     <h5><i class="far fa-star"></i> This is a list.</h5>
// </li>
// <ul>
//     <h6>
//         <li><i class="fas fa-arrow-circle-right"></i> are unaffected by this style</li>
//         <li><i class="fas fa-arrow-circle-right"></i> will still show a bullet</li>
//         <li><i class="fas fa-arrow-circle-right"></i> and have appropriate left margin</li>
//     </h6>
// </ul>
// </li>
// </ul>';

/*

SELECT sub_treatment.fkey,sub_treatment.main_treatment_id,sub_treatment.treatment_id,sub_treatment.name as subname, main_treatment.name as mainname FROM `sub_treatment` LEFT JOIN main_treatment ON sub_treatment.fkey = main_treatment.id WHERE sub_treatment.id IN (13,14,17,18,20) AND main_treatment.id IS NOT NULL ORDER BY main_treatment.id ASC

*/
// error_reporting(0);
include('db_conn.php');
if (isset($_POST['ajaxRequest']) and isset($_POST['mainData'])) {
    $sql = mysqli_query($naturopathyCon, "SELECT DISTINCT(fkey) FROM `sub_treatment` LEFT JOIN main_treatment ON sub_treatment.fkey = main_treatment.id WHERE main_treatment.id IS NOT NULL ORDER BY `fkey` ASC");
    $count = 1;
    $htmlOutput = '';
    $response = [];
    while ($sqlArray = mysqli_fetch_assoc($sql)) {
        $mainID = $sqlArray['fkey'];
        $fetchsql = mysqli_query($naturopathyCon, "SELECT * FROM `main_treatment` WHERE `id` = $mainID");
        if ($fetchsql) {
            $accordionExample = "accordionExample" . $count;
            $headingOne = "headingOne" . $count;
            $collapseOne = "collapseOne" . $count;
            $fetchsqlArray = mysqli_fetch_assoc($fetchsql);
            $htmlOutput .= '<div class="accordion" id="' . $accordionExample . '">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="' . $headingOne . '">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-main-treatment="' . $fetchsqlArray['id'] . '" data-bs-target="#' . $collapseOne . '" aria-expanded="false" aria-controls="' . $collapseOne . '">' . $fetchsqlArray['name'] . '</button>
                    </h2>
                    <div id="' . $collapseOne . '" class="accordion-collapse collapse p-0" aria-labelledby="' . $headingOne . '" data-bs-parent="#' . $accordionExample . '" style="">
                        <div class="accordion-body">';
            $tempID = $fetchsqlArray['id'];
            $subDatasql = mysqli_query($naturopathyCon, "SELECT * FROM `sub_treatment` WHERE `fkey` = '$tempID'");
            if ($subDatasql) {
                while ($fetchsubDatasql = mysqli_fetch_assoc($subDatasql)) {
                    $htmlOutput .= '<ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-10">' . $fetchsubDatasql['name'] . '</div>
                            <div class="col-2 text-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input sub-treatment-switch" type="checkbox" name="treatmentData[]" value="' . $fetchsubDatasql['id'] . '" role="switch" data-subhash = ' . $fetchsubDatasql['id'] . '>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>';
                }
            } else {
                $htmlOutput .= 'No Data Found';
            }
            $htmlOutput .= '</div>
            </div>
            </div>
            </div>';
            $count++;
        } else {
            $response['status'] = 400;
            $response['message'] = "something went wrong.";
            echo json_encode($response);
            return;
        }
    }
    $response['status'] = 200;
    $response['message'] = "OPR Completed";
    if ($htmlOutput == '') {
        $response['status'] = 201;
        $response['message'] = "Data not Found";
    }
    $response['html'] = $htmlOutput;
    echo json_encode($response);
    return;
} else if (isset($_POST['ajaxRequest']) and isset($_POST['renderData'])) {
    // echo "<pre>";
    $data = $_POST['treatmentArray'];
    $cleanData = "'" . implode("','", $data) . "'";
    $fetchQuery = mysqli_query($naturopathyCon, "SELECT sub_treatment.fkey,sub_treatment.main_treatment_id,sub_treatment.treatment_id,sub_treatment.name as subname, main_treatment.name as mainname FROM `sub_treatment` LEFT JOIN main_treatment ON sub_treatment.fkey = main_treatment.id WHERE sub_treatment.id IN ($cleanData) AND main_treatment.id IS NOT NULL ORDER BY main_treatment.id ASC");
    $html = '<div class="container-fluid">';
    while ($fetchQueryData = mysqli_fetch_array($fetchQuery)) {
        $html .= '<ul class="list-unstyled">
                    <li class="fw-bold fs-6" style="font-weight: 700!important; font-size: 1rem!important; "><i class="fs-6 fas fa-star-of-life" style="font-size: 1rem!important;"></i> ' . $fetchQueryData['mainname'] . '
                        <ul>
                            <li class="fw-normal fs-6" style="font-size: 1rem!important; font-weight: 400!important;"> <i class="fas fa-hand-point-right"></i> ' . $fetchQueryData['subname'] . '</li>
                        </ul>
                    </li>
                </ul>';
    }
    $html .= '</div>';
    echo $html;
} else {
    echo "Invalid Request";
}
