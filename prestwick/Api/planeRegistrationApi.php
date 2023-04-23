<?php
    header('Content-type: application/json');
    include("../admin/db-function/php-function.php");
    if(isset($_POST['inputPlaneFirstName'])){
        $inputPlaneFirstName = mysqli_real_escape_string($conn, $_POST['inputPlaneFirstName']);
    }
    $inputPlaneAddress = mysqli_real_escape_string($conn, $_POST['inputPlaneAddress']);
    $inputPlaneDOB = mysqli_real_escape_string($conn, $_POST['inputPlaneDOB']);
    $inputPlaneLicenseNo = mysqli_real_escape_string($conn, $_POST['inputPlaneLicenseNo']);
    $inputPlaneMedical = mysqli_real_escape_string($conn, $_POST['inputPlaneMedical']);
    $inputPlaneSEP = mysqli_real_escape_string($conn, $_POST['inputPlaneSEP']);
    $inputPlaneMEP = mysqli_real_escape_string($conn, $_POST['inputPlaneMEP']);
    $inputPlaneIR = mysqli_real_escape_string($conn, $_POST['inputPlaneIR']);
    // $upload_attachment = $_FILES['inputPlaneUpload']['name'];
    $upload_attachment = "";
    $response = [];

    if($inputPlaneFirstName == "" || $inputPlaneAddress == "" || $inputPlaneDOB == "" || $inputPlaneLicenseNo == "" || $inputPlaneMedical == "" || $inputPlaneSEP == "" || $inputPlaneMEP == "" || $inputPlaneIR == ""){
        $response = ["success" => 0, "message" => "All fields are Required"];
    }
    else{
        $selectUser = commonSelect_table($conn, "aircraft_registration", "id^f_name^address^DOB^type_of_license^medical_date_expire^spe_expire^mep_expire^ir_expire^upload_attachment^status", "WHERE DOB='$inputPlaneDOB' AND type_of_license='$inputPlaneLicenseNo'");
        $numRows = mysqli_num_rows($selectUser);

        if($numRows > 0){
            $response = ["success" => 0, "message" => "User Registred Already"];
        }
        else{
           $insert = common_insert($conn, "aircraft_registration", array("f_name" => $inputPlaneFirstName, "address" => $inputPlaneAddress,"DOB" => $inputPlaneDOB, "type_of_license" => $inputPlaneLicenseNo, "medical_date_expire" => $inputPlaneMedical, "spe_expire" => $inputPlaneSEP, "mep_expire" => $inputPlaneMEP, "ir_expire" => $inputPlaneIR, "upload_attachment" => $upload_attachment, "status" => 1));
            if($insert){
                $response = ["success" => 1, "message" => "Registration Successfully Done!!!!!"];
            }
            else{
                $response = ["success" => 0, "message" => "Registration Form Fail! try again"];
            }
            
        }
    }

    echo json_encode($response);
?>