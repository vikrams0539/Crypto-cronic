<div class='common-form-close'><span>X</span></div>
<?php
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
$TextID=$_GET['TextID'];
$sel_id=$fun_obj->commonSelect_table("cms_text","text_ID^page_ID^text_type^text^text_order",$where="text_ID='$TextID'");
$fetch=mysqli_fetch_array($sel_id);
$textID=$fetch['text_ID'];
$text_type=$fetch['text_type'];
$text_order=$fetch['text_order'];
$pageID=$fetch['page_ID'];
	?>
<form action="" method="post">
	<div class='input-field-form'>
		<article>
			<input type='text' id='tag_name' name='tag_name' value='<?=$text_type; ?>'>	
			<input type='hidden' id='T_id' name='T_id' value="<?=$textID;?>">			
			<input type='hidden' id='Page_id' name='Page_id' value="<?=$pageID;?>">				
		</article>
	</div>
	<input type="submit" name="edit-text-type" value="save" class="btn btn-success">
</form>	


<script src="<?= $admin_url;?>js/custom-mini-js.js"></script>  
