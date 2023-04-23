<?php
    include("../db-function/php-function.php");

    $pilot_id = $_GET['pilot_id'];
    $row_select = commonSelect_table($conn, "pilot_registration", "*", "WHERE id='$pilot_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $row_run = mysqli_fetch_assoc($row_select);

        $id = $row_run['id'];
        $member_name = $row_run['member_name'];
        $address = $row_run['address'];
        $DOB = $row_run['DOB'];
        $CAA_ref_no = $row_run['CAA_ref_no'];
        $SEP_expiry = $row_run['SEP_expiry'];
        $MEP_expiry = $row_run['MEP_expiry'];
        $medical_class1_expiry = $row_run['medical_class1_expiry'];
        $medical_class2_expiry = $row_run['medical_class2_expiry'];
        $medical_LAPL_expiry = $row_run['medical_LAPL_expiry'];
        $status = $row_run['status'];

        $form = "<form id='pilotForm' method='post'>";
        $form .= "<input type='hidden' name='pilotId' value='$id' />";
        $form .= "<div class='mb-3'><label class='form-label'>Name</label><input type='text' autocomplete='off' class='form-control' name='Inputmember_name' value='$member_name'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Address</label><input type='text' autocomplete='off' class='form-control' name='Inputaddress' value='$address'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>DOB</label><input type='text' autocomplete='off' class='form-control' name='InputDOB' value='$DOB'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>CAA Reference</label><input type='text' autocomplete='off' class='form-control' name='InputCAA_ref_no' value='$CAA_ref_no'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>SEP Expiry</label><input type='text' autocomplete='off' class='form-control' name='InputSEP_expiry' value='$SEP_expiry'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>MEP Expiry</label><input type='text' autocomplete='off' class='form-control' name='InputMEP_expiry' value='$MEP_expiry'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Medical Class 1</label><input type='text' autocomplete='off' class='form-control' name='Inputmedical_class1_expiry' value='$medical_class1_expiry'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Medical Class 2</label><input type='text' autocomplete='off' class='form-control' name='Inputmedical_class2_expiry' value='$medical_class2_expiry'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Medical LAPL</label><input type='text' autocomplete='off' class='form-control' name='Inputmedical_LAPL_expiry' value='$medical_LAPL_expiry'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Status</label><input type='text' autocomplete='off' class='form-control' name='Inputstatus' value='$status'></div>";           
        $form .= "<div class='mb-3'><button type='submit' class='form-control btn btn-info' name='pilot_update'>Update</button></div>";           
        $form .= "</form>";
        echo $form;
    }
?>