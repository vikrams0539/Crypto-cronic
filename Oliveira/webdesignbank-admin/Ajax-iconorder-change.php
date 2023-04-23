<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$icon_id=$_GET['facility_iconID'];
$iconvalue=$_GET['facility_iconvalue'];

$update_gallery=$fun_obj->common_update("cms_hotel_facility_icons",array("facility_icon_order"=>$iconvalue),$where="hotel_facility_id='$icon_id'");

if($update_gallery)
{
	echo"<p class='message-flash text-danger'>text updated</p>";
	echo"<meta http-equiv='refresh' content='2; url='".$_SERVER['REQUEST_URI']."''>";
} 
?>