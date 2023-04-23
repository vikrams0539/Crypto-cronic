<?php
    header("Content-Type: application/json");
    include("../db-function/php-function.php");

    $pilot_id = $_GET['pilot_id'];
    $row_select = commonSelect_table($conn, "pilot_registration", "*", "WHERE id='$pilot_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $pilot_del_row = commnon_del($conn, "pilot_registration", "WHERE id='$pilot_id'");
        if($pilot_del_row){
            $data = ["success" => 1, "message" => "Successfully Record Deleted"];
        }
    }
    else{
        $data = ["success" => 0, "message" => "Record Not found, Please Try again"];
    }

    echo json_encode($data);
?>