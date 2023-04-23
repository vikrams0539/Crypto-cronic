<?php
    include("../db-function/php-function.php");

    $member_id = $_GET['member_id'];
    $row_select = commonSelect_table($conn, "member_registration", "*", "WHERE id='$member_id'");
    $num_rows = mysqli_num_rows($row_select);
    if($num_rows > 0){
        $row_run = mysqli_fetch_assoc($row_select);

        $id = $row_run['id'];
        $first_name = $row_run['first_name'];
        $last_name = $row_run['last_name'];
        $address = $row_run['address'];
        $passport_no = $row_run['passport_no'];
        $license_no = $row_run['license_no'];
        $DOB = $row_run['DOB'];
        $contact_no = $row_run['contact_no'];
        $email = $row_run['email'];
        $status = $row_run['status'];

        $form = "<form id='memberForm' method='post'>";
        $form .= "<input type='hidden' name='memberId' value='$id' />";
        $form .= "<div class='mb-3'><label class='form-label'>First Name</label><input type='text' autocomplete='off' class='form-control' name='Inputfirst_name' value='$first_name'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Last Name</label><input type='text' autocomplete='off' class='form-control' name='Inputlast_name' value='$last_name'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>address</label><input type='text' autocomplete='off' class='form-control' name='Inputaddress' value='$address'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Passport No.</label><input type='text' autocomplete='off' class='form-control' name='Inputpassport_no' value='$passport_no'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>License No.</label><input type='text' autocomplete='off' class='form-control' name='Inputlicense_no' value='$license_no'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>DOB</label><input type='text' autocomplete='off' class='form-control' name='InputDOB' value='$DOB'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Contact No.</label><input type='text' autocomplete='off' class='form-control' name='Inputcontact_no' value='$contact_no'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Email</label><input type='text' autocomplete='off' class='form-control' name='Inputemail' value='$email'></div>";
        $form .= "<div class='mb-3'><label class='form-label'>Status</label><input type='text' autocomplete='off' class='form-control' name='Inputstatus' value='$status'></div>";           
        $form .= "<div class='mb-3'><button type='submit' class='form-control btn btn-info' name='member_update'>Update</button></div>";           
        $form .= "</form>";
        echo $form;
    }
?>