<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$tag_delID=$_GET['tag_delid'];
	
$del_tag=$fun_obj->commnon_del("cms_text","WHERE text_ID='$tag_delID'");
		if($del_tag)
		{
			echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Tag deleted</h4></div>
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
		}

?>