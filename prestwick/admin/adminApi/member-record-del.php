<?php
    header("Content-Type: application/json");
    include("../db-function/php-function.php");

    $member_id = $_GET['member_id'];
    $row_select = commonSelect_table($conn, "member_registration", "*", "WHERE id='$member_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $member_del_row = commnon_del($conn, "member_registration", "WHERE id='$member_id'");
        if($member_del_row){
            $data = ["success" => 1, "message" => "Successfully Record Deleted"];
        }
    }
    else{
        $data = ["success" => 0, "message" => "Record Not found, Please Try again"];
    }

    echo json_encode($data);
?>