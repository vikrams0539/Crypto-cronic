<?php 
if($usertype['type']=='admin')
	{
		
		
?>
	<ul class='database-table d-flex flex-wrap align-items-center'>
		<li class=''>
			<h4>database table panel</h4>		
			<div class='DB-panel'>
				<a href='<?=$admin_url;?>10072019creatDBtable.php' class='btn btn-dark'>create table </a>
				<a href='javascript:Void(0);' class='btn btn-dark DB-table-panel' id="addpage-name" data-rename='rename'><span>add page</span></a>
				<a href='javascript:Void(0);' class='btn btn-dark DB-table-panel' data-del='del'><label>rename page</label></a>
				<a href='page-del-change-order.php' class='btn btn-dark DB-table-panel' ><cite>change order / <span class='text-warning'>Del page</span></cite></a>
			</div><!--end DB-panel-->	
		</li>
		<li  class='flex-column hotel-li'>
			<h4>update Hotel/Motel information</h4>
			<div class='DB-panel DB-hotel-table'>
			<!--id='edit-hotel-detail'-->
				 <a href='hotel-info-update.php' class='btn btn-dark DB-table-panel'  data-hoteltable='hotelupdate'>
					<span>update hotel/motel info</span>
				 </a>
				 <a href='javascript:Void(0);' id='accommodation' class='btn btn-dark DB-table-panel' data-accommodation='accommodation'>
					<span>page assign to acco.</span>
				 </a>
				 <!--id='hotel-facility'-->
				<a href='facilities-icons.php'  class='btn btn-dark DB-table-panel' data-facility='hotel-facility'>
					<span>hotel facility icon</span>
				 </a> 
				<a href='duplicate-page.php'  class='btn btn-dark DB-table-panel'>
					<span>create duplicate page</span>
				 </a> 
			</div>
		</li>
		<hr>
		<li class='user-panel'>
			<h4>user panel</h4>		
			<div class='DB-panel position-relative'>
				<a href='javascript:void(0);' class='btn btn-dark ' data-total='total' id='create_user'>create user</a>
				<a href='' class='btn btn-dark ' data-login='total' id='login__details'>login details</a>
				<div class="total_loginuser">
					
					<?php
					$count_i=1;
					$disabled="";
					$user_sel=$fun_obj->commonSelect_table("cms_admin","admin_id^username^password^type^flag","");
					if(mysqli_num_rows($user_sel)!=0)
					{
					echo"<table class='table table-striped'>
					<tr>
						<th>sno.</th><th>user name</th><th>password</th><th>type</th><th>edit</th><th>del</th>
						</tr>
						<div class='user_updated'></div>";
					}
					else
					{
						echo"<tr><th><h3>Record Not Found</h3></tr>";
					}
					
					while($user_run=mysqli_fetch_array($user_sel))
					{
						$u_name=$user_run['username'];
						$u_password=$user_run['password'];
						$u_type=$user_run['type'];
						$admin_ID=$user_run['admin_id'];
						if($u_type=='admin')
						{
							$disabled="disabled";
							$edit_user="";
							$delete_user="";
							$UAdmin_ID="";
							$uPassID="";
						}
						else
						{
							$disabled="active_user";
							$edit_user="edit_user";
							$delete_user="delete_user";
							$UAdmin_ID="uname_".$admin_ID;
							$uPassID="password".$admin_ID;
						}
						echo"<tr class='$disabled'>
						<td>$count_i</td>
						<td><input type='text' name='$UAdmin_ID' value='$u_name' disabled='disabled' class='$UAdmin_ID' id='exist_user_".$admin_ID."' data-existID='$admin_ID' /></td>
						<td>
						<input type='text' name='$uPassID' value='$u_password' disabled='disabled' class='$UAdmin_ID' id='exist_password_".$admin_ID."' data-existID='$admin_ID' />
						<button type='button' class='btn-sm btn-primary submit_btn $UAdmin_ID' disabled='disabled' data-sbumitID='$admin_ID'>save</button>
						</td> 
						<td>$u_type</td>
						<td class='$edit_user'><span data-edit='.".$UAdmin_ID."'><i class='fa fa-pencil-square' aria-hidden='true'></i></span></td>
						<td class='$delete_user'><span data-deluser='$admin_ID'><i class='fa fa-trash' aria-hidden='true'></i></span></td>
						</tr> ";
						$count_i++;
					}
					?>
					</table>
				</div><!-- total_loginuser-->
			</div><!--end DB-panel-->	
		</li>
		<?php /*<li  class='flex-column'>
			<h4>all tablename list</h4>
			<div class='DB-panel DB-table-panel'>
				<?php
				//$fun_obj->Show_table();
				?>
			</div><!--end DB-panel-->
		</li>*/?>
	</ul>
	<?php } ?>