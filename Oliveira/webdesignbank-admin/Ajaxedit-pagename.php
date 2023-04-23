<div class='common-form-close'><span>X</span></div>
<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$editID=$_GET['tagID'];

$editPagename=$fun_obj->commonSelect_table('cms_pages','page_ID^page_name^filename',$where_clause="where page_ID='".$_GET['tagID']."'");
$pagename_run=mysqli_fetch_array($editPagename);

	$page_name=$pagename_run['page_name'];
	$file_name=$pagename_run['filename'];
	?>
<form action="" method="post">
	<div class='form-group'>
		<label for='name'>Old page name</label>
		<input type='text' class='form-control' id='pname' name='pname' value="<?= $page_name;?>" readonly>
		<input type='hidden' class='form-control' name='P_ID' value="<?= $editID;?>" >
		<input type='hidden' class='form-control' name='O_F_Name' value="<?= $file_name;?>" >
	</div>											
	<div class='form-group'>
		<label for='name'>new page name</label>
		<input type='text' class='form-control' id='pname' name='N_P_name' required>
	</div>											
	<div class='form-group'>
		<input type='submit' name='rename_P' class='form-control btn btn-success'>
	</div>
</form>	

<script src="<?= $admin_url;?>js/custom-mini-js.js"></script>  