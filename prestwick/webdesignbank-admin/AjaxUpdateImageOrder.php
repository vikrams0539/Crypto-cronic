<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$gallery_id=$_GET['ID'];
$values=$_GET['values'];

$update_gallery=$fun_obj->common_update("cms_gallery",array("img_order"=>$values),$where="gallery_id='$gallery_id'");

if($update_gallery)
{
	echo"<meta http-equiv='refresh' content='0; url='".$_SERVER['REQUEST_URI']."''>";
}
?>