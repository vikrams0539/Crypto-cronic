<table class="table border-0 active" id="Pilots">
    <H4 id="successMessage"></H4>
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="filterCheckBox" class='PilotFilterCheckBox'/>
                <!-- <div class="checkboxBg"></div> -->
            </th>
            <th>Name</th>
            <th>Address</th>
            <th>DOB</th>
            <th>CAA Ref No</th>
            <th>SEP Expiry</th>
            <th>MEP Expiry</th>
            <th>medical class1 expiry</th>
            <th>medical class2 expiry</th>
            <th>medical LAPL expiry</th>
            <th>Expire in</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php 

            
            

            $selectPilot = commonSelect_table($conn, "pilot_registration", "*", "");

            $numRows = mysqli_num_rows($selectPilot);
            if($numRows > 0){
                while($fetch_all = mysqli_fetch_array($selectPilot)){
                    
                    $pilotId = $fetch_all['id'];
                    $member_name = $fetch_all['member_name'];
                    $address = $fetch_all['address'];
                    $DOB = $fetch_all['DOB'];
                    $CAA_ref_no = $fetch_all['CAA_ref_no'];
                    $licence_number = $fetch_all['licence_number'];
                    $SEP_expiry = $fetch_all['SEP_expiry'];

                    $pilot_MEP_expiry = $fetch_all['MEP_expiry'];
                    $medical_class1_expiry = $fetch_all['medical_class1_expiry'];
                    $medical_class2_expiry = $fetch_all['medical_class2_expiry'];
                    $medical_LAPL_expiry = $fetch_all['medical_LAPL_expiry'];

                    $ey = date('Y', strtotime($SEP_expiry));
                    $em = date('m', strtotime($SEP_expiry));
                    $ed = date('d', strtotime($SEP_expiry));
                    $edays = ($ey-1)*365 + ($em-1)*30 + $ed;
                    $sy = date('Y');
                    $sm = date('m');
                    $sd = date('d');
                    $sdays = ($sy-1)*365 + ($sm-1)*30 + $sd;
                    $diff = $edays - $sdays;

                    $tr = "<tr>";
                    $tr .= "<td><input type='checkbox' id='singleDataCheckBox' /></td>";
                    $tr .= "<td>$member_name</td>";
                    $tr .= "<td>$address</td>";
                    $tr .= "<td>$DOB</td>";
                    $tr .= "<td>$CAA_ref_no</td>";
                    $tr .= "<td>$SEP_expiry</td>";
                    $tr .= "<td>$pilot_MEP_expiry</td>";
                    $tr .= "<td>$medical_class1_expiry</td>";
                    $tr .= "<td>$medical_class2_expiry</td>";
                    $tr .= "<td>$medical_LAPL_expiry</td>";
                    $tr .= "<td>$diff</td>";
                    
                    $tr .= "<td class='position-relative'><div class='actionBtn'><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /></div><div class='actionDiv'><span class='stopAction'>X</span>";
                    $tr .= "<a href='#' id='editPilotRow' data-pilotEditId='$pilotId' data-bs-toggle='modal' data-bs-target='#pilotModal'><img src='images/edit_square.png' class='img-fluid' /><span>Edit</span></a>";
                    $tr .= "<a href='#' id='delPilotRow' data-pilotId='$pilotId'><img src='images/delete_forever.png' class='img-fluid' /><span>delete</sapn></a>";
                    $tr .= "</div></td>";
                    // $tr .= "<td>$medical_class2_expiry</td>";
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
<div class="modal fade" id="pilotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    if(isset($_POST['pilot_update'])){ 
        $pilotId = $_POST['pilotId'];
        $member_name = $_POST['Inputmember_name'];
        $address = $_POST['Inputaddress'];
        $DOB = $_POST['InputDOB'];
        $CAA_ref_no = $_POST['InputCAA_ref_no'];
        $SEP_expiry = $_POST['InputSEP_expiry'];
        $pilot_MEP_expiry = $_POST['InputMEP_expiry'];
        $medical_class1_expiry = $_POST['Inputmedical_class1_expiry'];
        $medical_class2_expiry = $_POST['Inputmedical_class2_expiry'];
        $medical_LAPL_expiry = $_POST['Inputmedical_LAPL_expiry'];
        $status = $_POST['Inputstatus'];

        $pilot_update = common_update($conn, "pilot_registration", array("member_name" => $member_name, "address" => $address, "DOB" => $DOB, "CAA_ref_no" => $CAA_ref_no, "SEP_expiry" => $SEP_expiry, "MEP_expiry" => $pilot_MEP_expiry, "medical_class1_expiry" => $medical_class1_expiry, "medical_class2_expiry" => $medical_class2_expiry, "medical_LAPL_expiry" => $medical_LAPL_expiry, "status" => $status ), "WHERE id='$pilotId'");
        if($pilot_update){
            echo"<script> alert('Record Updated Successfully !!!') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
        else{
            echo"<script> alert('Record not Updated') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
    }
?>