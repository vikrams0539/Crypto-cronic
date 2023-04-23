<?php
include('php-function/function.php');
include('10072019check-login.php');

$iconID=$_GET['iconID'];
$currentpageID=$_GET['currentpageID'];

$sel_icon_facility=$fun_obj->commonSelect_table("cms_hotel_facility_icons","hotel_facility_id^facility_page_id","WHERE hotel_facility_id='$iconID'");

$fetch_single_field=mysqli_fetch_array($sel_icon_facility);

$icon_ID=$fetch_single_field['hotel_facility_id'];
$facility_page_id=$fetch_single_field['facility_page_id'];

$exp_id=explode(",",$facility_page_id);

//print_r($exp_id);

if((array_search($currentpageID, $exp_id)!==false))
{
	//echo"<br> exist";
	$remove_array=\array_diff($exp_id, array($currentpageID));
	$str_replace=implode(",",$remove_array);
}
else
{
	//$pageArryID=$fetch_single_field['facility_page_id'].",".$pageisset_id_post;
	$str_replace=$facility_page_id['facility_page_id'];
	echo"<br>Not exist";
}
//print_r($str_replace);

$update_iconID=$fun_obj->common_update("cms_hotel_facility_icons",array("facility_page_id"=>$str_replace),$where="hotel_facility_id='$iconID'");

if($update_iconID)
{
	echo"<p class='message-flash text-danger'>text updated</p>";
	echo"<meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."''>";
}
else
{
	echo"Fail to update";
}
?>