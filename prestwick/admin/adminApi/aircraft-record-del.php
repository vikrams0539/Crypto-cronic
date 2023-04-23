<?php
    header("Content-Type: application/json");
    include("../db-function/php-function.php");

    $aircraft_id = $_GET['aircraft_id'];
    $row_select = commonSelect_table($conn, "aircraft_registration", "*", "WHERE id='$aircraft_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $aircraft_del_row = commnon_del($conn, "aircraft_registration", "WHERE id='$aircraft_id'");
        if($aircraft_del_row){
            $data = ["success" => 1, "message" => "Successfully Record Deleted"];
        }
    }
    else{
        $data = ["success" => 0, "message" => "Record Not found, Please Try again"];
    }

    echo json_encode($data);
?>