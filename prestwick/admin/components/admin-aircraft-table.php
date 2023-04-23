<table class="table border-0" id="Plane">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="filterCheckBox" />
                <!-- <div class="checkboxBg"></div> -->
            </th>
            <th>Name</th>
            <th>Address</th>
            <th>DOB</th>
            <th>type of licence</th>
            <th>MDP expiry</th>
            <th>SEP Expiry</th>
            <th>MEP Expiry</th>
            <th>IR Expiry</th>
            <th>image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $selectMembers = commonSelect_table($conn, "aircraft_registration", "*", "");

            $numRows = mysqli_num_rows($selectMembers);
            if($numRows > 0){
                while($fetch_all = mysqli_fetch_array($selectMembers)){
                    
                    $aircraftId = $fetch_all['id'];
                    $f_name = $fetch_all['f_name'];
                    $address = $fetch_all['address'];
                    $DOB = $fetch_all['DOB'];
                    $type_of_license = $fetch_all['type_of_license'];
                    $spe_expire = $fetch_all['spe_expire'];
                    $mep_expire = $fetch_all['mep_expire'];
                    $ir_expire = $fetch_all['ir_expire'];
                    $upload_attachment = $fetch_all['upload_attachment'];
                    $medical_date_expire = $fetch_all['medical_date_expire'];

                    $tr = "<tr>";
                    $tr .= "<td><input type='checkbox' id='singleDataCheckBox' /></td>";
                    $tr .= "<td>$f_name</td>";
                    $tr .= "<td>$address</td>";
                    $tr .= "<td>$DOB</td>";
                    $tr .= "<td>$type_of_license</td>";
                    $tr .= "<td>$medical_date_expire</td>";
                    $tr .= "<td>$spe_expire</td>";
                    $tr .= "<td>$mep_expire</td>";
                    $tr .= "<td>$ir_expire</td>";
                    $tr .= "<td>$upload_attachment</td>";
                    $tr .= "<td class='position-relative'><div class='actionBtn'><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /><img src='images/dots.png' class='img-fluid' /></div><div class='actionDiv'><span class='stopAction'>X</span>";
                    $tr .= "<a href='#' id='editaircraftRow' data-aircraftEditId='$aircraftId' data-bs-toggle='modal' data-bs-target='#aircraftModal'><img src='images/edit_square.png' class='img-fluid' /><span>Edit</span></a>";
                    $tr .= "<a href='#' id='delaircraftRow' data-aircraftId='$aircraftId'><img src='images/delete_forever.png' class='img-fluid' /><span>delete</sapn></a>";
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
<div class="modal fade" id="aircraftModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    if(isset($_POST['aircraft_update'])){ 
        $aircraftId = $_POST['aircraftId'];
        $Inputf_name = $_POST['Inputf_name'];
        $address = $_POST['Inputaddress'];
        $DOB = $_POST['InputDOB'];
        $type_of_license = $_POST['Inputtype_of_license'];
        $medical_date_expire = $_POST['Inputmedical_date_expire'];
        $spe_expire = $_POST['Inputspe_expire'];
        $mep_expire = $_POST['Inputmep_expire'];
        $ir_expire = $_POST['Inputir_expire'];
        $upload_attachment = $_POST['Inputupload_attachment'];
        $status = $_POST['Inputstatus'];

        $aircraft_update = common_update($conn, "aircraft_registration", array("f_name" => $Inputf_name, "address" => $address, "DOB" => $DOB, "type_of_license" => $type_of_license, "medical_date_expire" => $medical_date_expire, "spe_expire" => $spe_expire, "mep_expire" => $mep_expire, "ir_expire" => $ir_expire, "upload_attachment" => $upload_attachment, "status" => $status ), "WHERE id='$aircraftId'");
        if($aircraft_update){
            echo"<script> alert('Record Updated Successfully !!!') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
        else{
            echo"<script> alert('Record not Updated') </script>
            <meta http-equiv='refresh' content='0; url=".$_SERVER['REQUEST_URI']."')";
        }
    }
?>