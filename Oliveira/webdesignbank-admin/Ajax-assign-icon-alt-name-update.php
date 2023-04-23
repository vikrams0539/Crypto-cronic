<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$iconID=$_GET['iconID'];
$altTextValue=$_GET['altTextValue'];

$update_gallery=$fun_obj->common_update("cms_hotel_facility_icons",array("facility_alt_name"=>$altTextValue),$where="hotel_facility_id='$iconID'");

if($update_gallery)
{
	echo"<p class='message-flash text-danger'>text updated</p>";
	echo"<meta http-equiv='refresh' content='2; url='".$_SERVER['REQUEST_URI']."''>";
}
?>