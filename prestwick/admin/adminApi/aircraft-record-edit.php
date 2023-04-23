<?php
    include("../db-function/php-function.php");

    $aircraft_id = $_GET['aircraft_id'];
    $row_select = commonSelect_table($conn, "aircraft_registration", "*", "WHERE id='$aircraft_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $row_run = mysqli_fetch_assoc($row_select);

        $id = $row_run['id'];
        $f_name = $row_run['f_name'];
        $address = $row_run['address'];
        $DOB = $row_run['DOB'];
        $type_of_license = $row_run['type_of_license'];
        $medical_date_expire = $row_run['medical_date_expire'];
        $spe_expire = $row_run['spe_expire'];
        $mep_expire = $row_run['mep_expire'];
        $ir_expire = $row_run['ir_expire'];
        $upload_attachment = $row_run['upload_attachment'];
        $status = $row_run['status'];

        $form = "<form id='aircraftForm' method='post'>";
        $form .= "<input type='hidden' name='aircraftId' value='$id' />";
        $form .= "<div class='mb-3'><label class='form-label'>First Name</label><input type='text' autocomplete='off' class='form-control' name='Inputf_name' value='$f_name'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Address</label><input type='text' autocomplete='off' class='form-control' name='Inputaddress' value='$address'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>DOB</label><input type='text' autocomplete='off' class='form-control' name='InputDOB' value='$DOB'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Type of licence</label><input type='text' autocomplete='off' class='form-control' name='Inputtype_of_license' value='$type_of_license'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Medical date expiry</label><input type='text' autocomplete='off' class='form-control' name='Inputmedical_date_expire' value='$medical_date_expire'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>SEP Expiry</label><input type='text' autocomplete='off' class='form-control' name='Inputspe_expire' value='$spe_expire'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>MEP Expiry</label><input type='text' autocomplete='off' class='form-control' name='Inputmep_expire' value='$mep_expire'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>IR Expiry</label><input type='text' autocomplete='off' class='form-control' name='Inputir_expire' value='$ir_expire'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>images</label><input type='text' autocomplete='off' class='form-control' name='Inputupload_attachment' value='$upload_attachment'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Status</label><input type='text' autocomplete='off' class='form-control' name='Inputstatus' value='$status'></div>";           
        $form .= "<div class='mb-3'><button type='submit' class='form-control btn btn-info' name='aircraft_update'>Update</button></div>";           
        $form .= "</form>";
        echo $form;
    }
?>