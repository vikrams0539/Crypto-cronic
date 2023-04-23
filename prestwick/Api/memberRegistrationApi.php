<?php
    header('Content-type: application/json');
    include("../admin/db-function/php-function.php");
    if(isset($_POST['inputMemberFirstName'])){
        $inputMemberFirstName = mysqli_real_escape_string($conn, $_POST['inputMemberFirstName']);
    }
    $inputMemberLastName = mysqli_real_escape_string($conn, $_POST['inputMemberLastName']);
    $inputMemberAddress = mysqli_real_escape_string($conn, $_POST['inputMemberAddress']);
    $inputMemberPassNo = mysqli_real_escape_string($conn, $_POST['inputMemberPassNo']);
    $inputMemberLicenseNo = mysqli_real_escape_string($conn, $_POST['inputMemberLicenseNo']);
    $inputMemberDOB = mysqli_real_escape_string($conn, $_POST['inputMemberDOB']);
    $inputMemberContact = mysqli_real_escape_string($conn, $_POST['inputMemberContact']);
    $inputMemberEmail = mysqli_real_escape_string($conn, $_POST['inputMemberEmail']);
    $response = [];

    if($inputMemberFirstName == "" || $inputMemberAddress == "" || $inputMemberDOB == "" || $inputMemberLicenseNo == "" || $inputMemberLastName == "" || $inputMemberPassNo == ""){
        $response = ["success" => 0, "message" => "All fields are Required"];
    }
    else{
        $selectUser = commonSelect_table($conn, "member_registration", "id^first_name^last_name^address^passport_no^license_no^DOB^contact_no^email^status", "WHERE DOB='$inputMemberDOB' AND license_no='$inputMemberLicenseNo'");
        $numRows = mysqli_num_rows($selectUser);

        if($numRows > 0){
            $response = ["success" => 0, "message" => "User Registred Already"];
        }
        else{
            $insert = common_insert($conn, "member_registration", array("first_name" => $inputMemberFirstName, "last_name" => $inputMemberLastName,"address" => $inputMemberAddress, "passport_no" => $inputMemberPassNo, "license_no" => $inputMemberLicenseNo, "DOB" => $inputMemberDOB, "contact_no" => $inputMemberContact, "email" => $inputMemberEmail, "status" => 1));
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