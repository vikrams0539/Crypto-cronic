<?php
$pdg_id=$_GET['blog_id'];

include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');


$Sel_PDF_ID=$fun_obj->commonSelect_table("cms_blog","blog_id^page_id^page_name^blog_heading^blog_detail^blog_img","WHERE blog_id='".$pdg_id."'");
$runPDF=mysqli_fetch_array($Sel_PDF_ID);

$thumb_img_icon=$runPDF['blog_img'];

$Del_trimPagename=strtolower(trim($runPDF['page_name']));
$Del_trimPagename=str_replace(" ","-",$Del_trimPagename);
													
$imagesPath=dirname(__DIR__);

$img_path=$imagesPath."/images/".$Del_trimPagename."/".$thumb_img_icon;


if(file_exists($img_path))
{
	
	$delID=$fun_obj->commnon_del("cms_blog","WHERE blog_id='$pdg_id'");
	
	if($delID)
	{
		unlink($img_path);
		
		echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Record deleted</h4></div>
			
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
	}
	else
	{
		echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Fail to delete</h4></div>";
	}	
}

	else
	{
		echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>File path not exisiting</h4></div>";
	}
	
?>