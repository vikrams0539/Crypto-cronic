<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');


if(isset($_POST['update']))
{
	foreach($_POST['order_position'] as $position)
	{
		$indexIDs=$position[0];
		$pageOrder=$position[1];
		
		$update=$fun_obj->common_update("cms_pages",array("page_order"=>$pageOrder),$where="page_ID='$indexIDs'");
	}
	
	exit("<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span>
		Page order Changed </div> <meta http-equiv='refresh' content='0; url='".$_SERVER['PHP_SELF']."'>");
}
//
?>