<?php
    header('Content-type: application/json');
    include("../admin/db-function/php-function.php");
    if(isset($_POST['inputName'])){
        $inputName = mysqli_real_escape_string($conn, $_POST['inputName']);
    }

    $inputAddress = mysqli_real_escape_string($conn, $_POST['inputAddress']);
    $inputDOB = mysqli_real_escape_string($conn, $_POST['inputDOB']);
    $inputRefNo = mysqli_real_escape_string($conn, $_POST['inputRefNo']);
    $inputSEP = mysqli_real_escape_string($conn, $_POST['inputSEP']);
    $inputMEP = mysqli_real_escape_string($conn, $_POST['inputMEP']);
    $inputMedicalClass1 = mysqli_real_escape_string($conn, $_POST['inputMedicalClass1']);
    $inputMedicalClass2 = mysqli_real_escape_string($conn, $_POST['inputMedicalClass2']);
    $inputMedicalLAPL = mysqli_real_escape_string($conn, $_POST['inputMedicalLAPL']);
    $response = [];

    if($inputName == "" || $inputAddress == "" || $inputDOB == "" || $inputRefNo == "" || $inputSEP == "" || $inputMEP == "" || $inputMedicalClass1 == "" || $inputMedicalClass2 == "" || $inputMedicalLAPL == ""){
        $response = ["success" => 0, "message" => "All fields are Required"];
    }
    else{
        $selectUser = commonSelect_table($conn, "pilot_registration", "id^member_name^address^DOB^CAA_ref_no^licence_number^SEP_expiry^MEP_expiry^medical_class1_expiry^medical_class2_expiry^medical_LAPL_expiry^status", "WHERE DOB='$inputDOB' AND CAA_ref_no='$inputRefNo'");
        $numRows = mysqli_num_rows($selectUser);

        if($numRows > 0){
            $response = ["success" => 0, "message" => "User Registred Already"];
        }
        else{
            $insert = common_insert($conn, "pilot_registration", array("member_name" => $inputName, "address" => $inputAddress, "DOB" => $inputDOB, "CAA_ref_no" => $inputRefNo, "licence_number" => "12345", "SEP_expiry" => $inputSEP, "MEP_expiry" => $inputMEP, "medical_class1_expiry" => $inputMedicalClass1, "medical_class2_expiry" => $inputMedicalClass2, "medical_LAPL_expiry" => $inputMedicalLAPL, "status" => 1));
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