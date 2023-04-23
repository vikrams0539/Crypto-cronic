<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');
$icon_path=dirname(__DIR__)."/images/facility-img-icons/";

if(isset($_POST['iconupdate']))
{
	$iconID=$_POST['iconsID'];
	$iconimg=$_POST['iconimg'];
	if(file_exists($icon_path.$iconimg))
	{
		unlink($icon_path.$iconimg);
			
		$del_orderID=$fun_obj->commnon_del("cms_hotel_facility_icons","WHERE hotel_facility_id='$iconID'");
		if($del_orderID)
		{
			echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Icon deleted</h4></div>
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
		}
	}
}
?>