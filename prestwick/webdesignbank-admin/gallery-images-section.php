<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');


if(isset($_POST['gallery_update']))
{
	foreach($_POST['gallery_data'] as $position)
	{
		$indexIDs=$position[0];
		$pageOrder=$position[1];
		
		$update=$fun_obj->common_update("cms_gallery",array("img_order"=>$pageOrder),$where="gallery_id='$indexIDs'");
	}
	
	exit("<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span>
		Page order Changed </div> <meta http-equiv='refresh' content='0; url='".$_SERVER['PHP_SELF']."'>");
}
//
?>