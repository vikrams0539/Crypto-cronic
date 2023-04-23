<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$gallery_id=$_GET['descID'];
$values=htmlspecialchars($_GET['descValue'], ENT_QUOTES, "ISO-8859-1");


$update_gallery=$fun_obj->common_update("cms_gallery",array("img_description"=>$values),$where="gallery_id='$gallery_id'");

if($update_gallery)
{
	echo"<p class='message-flash text-danger'>text updated</p>";
	echo"<meta http-equiv='refresh' content='2; url='".$_SERVER['REQUEST_URI']."''>";
}
?>