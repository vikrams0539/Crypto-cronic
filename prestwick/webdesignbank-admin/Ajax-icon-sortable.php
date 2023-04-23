<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

if(isset($_POST['iconupdated']))
{
	foreach($_POST['iconID'] as $iconIDs)
	{
		$icon_ID=$iconIDs[0];
		$icon_indexID=$iconIDs[1];
		
		$update=$fun_obj->common_update("cms_hotel_facility_icons",array("facility_icon_order"=>$icon_indexID),$where="hotel_facility_id='$icon_ID'");
	}
	
	exit("<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span>
		Page order Changed </div> <meta http-equiv='refresh' content='0; url='".$_SERVER['PHP_SELF']."'>");
}


?>