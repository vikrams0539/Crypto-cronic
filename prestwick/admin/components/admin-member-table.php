<table class="table border-0" id="Member">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="filterCheckBox" />
                <!-- <div class="checkboxBg"></div> -->
            </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>last_name</th>
            <th>Passport No.</th>
            <th>licence No.</th>
            <th>address</th>
            <th>Contact No.</th>
            <th>Email</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $selectMembers = commonSelect_table($conn, "member_registration", "*", "");

            $numRows = mysqli_num_rows($selectMembers);
            if($numRows > 0){
                while($fetch_all = mysqli_fetch_array($selectMembers)){
                    
                    $memberId = $fetch_all['id'];
                    $first_name = $fetch_all['first_name'];
                    $last_name = $fetch_all['last_name'];
                    $address = $fetch_all['address'];
                    $last_name = $fetch_all['last_name'];
                    $passport_no = $fetch_all['passport_no'];
                    // $MEP_expiry = $fetch_all['MEP_expiry'];
                    $contact_no = $fetch_all['contact_no'];
                    $email = $fetch_all['email'];
                    // $medical_LAPL_expiry = $fetch_all['medical_LAPL_expiry'];
                    $license_no = $fetch_all['license_no'];

                    $tr = "<tr>";
                    $tr .= "<td><input type='checkbox' id='singleDataCheckBox' /></td>";
                    $tr .= "<td>$first_name</td>";
                    $tr .= "<td>$last_name</td>";
                    $tr .= "<td>$last_name</td>";
                    $tr .= "<td>$passport_no</td>";
                    $tr .= "<td>$license_no</td>";
                    $tr .= "<td>$address</td>";
                    $tr .= "<td>$contact_no</td>";
                    $tr .= "<td>$email</td>";
                    $tr .= "<td class='position-relative'><div class='actionBtn'><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /></div><div class='actionDiv'><span class='stopAction'>X</span>";
                    $tr .= "<a href='#' id='editmemberRow' data-memberEditId='$memberId' data-bs-toggle='modal' data-bs-target='#memberModal'><img src='images/edit_square.png' class='img-fluid' /><span>Edit</span></a>";
                    $tr .= "<a href='#' id='delmemberRow' data-memberId='$memberId'><img src='images/delete_forever.png' class='img-fluid' /><span>delete</sapn></a>";
                    $tr .= "</div></td>";
                    $tr .= "</tr>";
                    echo $tr;
                }
            }
            else{
                echo"<tr><p>No Record Found</p></tr>";
            }
        ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="memberModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editRecord">
                
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['member_update'])){ 
        $memberId = $_POST['memberId'];
        $first_name = $_POST['Inputfirst_name'];
        $last_name = $_POST['Inputlast_name'];
        $address = $_POST['Inputaddress'];
        $passport_no = $_POST['Inputpassport_no'];
        $license_no = $_POST['Inputlicense_no'];
        $DOB = $_POST['InputDOB'];
        $contact_no = $_POST['Inputcontact_no'];
        $email = $_POST['Inputemail'];
        $status = $_POST['Inputstatus'];

        $member_update = common_update($conn, "member_registration", array("first_name" => $first_name, "last_name" => $last_name, "address" => $address, "passport_no" => $passport_no, "license_no" => $license_no, "DOB" => $DOB, "contact_no" => $contact_no, "email" => $email, "status" => $status ), "WHERE id='$memberId'");
        if($member_update){
            echo"<script> alert('Record Updated Successfully !!!') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
        else{
            echo"<script> alert('Record not Updated') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
    }
?>