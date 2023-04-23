<?php
error_reporting(1);
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');


$pagename=$_POST['page_type'];
$fileNameArray=$_FILES['pdf_file_name']['name'];
$fileName_temp=$_FILES['pdf_file_name']['tmp_name'];

$page_name_and_id=$_POST['page_name'];
$pdf_details=$_POST['img_description'];

$thumb_img_icon=$_FILES['thumb_img_icon']['name'];
$thumb_img_icon_temp=$_FILES['thumb_img_icon']['tmp_name'];

$id_name_explode=explode("^",$pagename);
$pdfpageID=$id_name_explode[0];
$pdfpageNmae=$id_name_explode[1];

//============= Page name formting
$trim_pagename=str_replace(" ","-",strtolower(trim($pdfpageNmae)));

$file_ext=pathinfo($fileNameArray, PATHINFO_EXTENSION);
$img_file_ext=pathinfo($thumb_img_icon, PATHINFO_EXTENSION);

$array_filetype=array("pdf","PDF");
$array_img_type=array("png","jpg","jpeg");

if(!in_array($file_ext, $array_filetype))
{
	$mess_error="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>Please choose PDF format file type only</p></div>";
}

else if($_FILES['pdf_file_name']['size'] > 3072000)
{
	$mess_error="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>Maximum File Size Limit is 3MB.</p></div>";
}

else if(!in_array($img_file_ext, $array_img_type))
{
	$mess_error="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>Please choose PNG, JPG, JPEG format file type only</p></div>";
}
else if($_FILES['thumb_img_icon']['size'] > 1000000)
{
	$mess_error="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>Maximum File Size Limit is 1MB.</p></div>";
}
else
{
	$upload_path=dirname(__DIR__)."/images/";
	$create_PDF_dir=$upload_path."/".$trim_pagename."/";
	if(!is_dir($create_PDF_dir))
	{
		mkdir($create_PDF_dir,0777,true);	
	}
	
	$rnd_name=substr(md5(rand()),0,10);
	
	$pdf_file_name=$trim_pagename."-".$rnd_name.".".$file_ext;
	$img_file_name=$trim_pagename."-".$rnd_name.".".$img_file_ext;
	
	$pdg_insert=$fun_obj->common_insert("cms_pdfUpload",array("page_id"=>$pdfpageID,"page_name"=>$pdfpageNmae,"pdf_desc"=>$pdf_details,"pdf_file"=>$pdf_file_name,"thumb_img_icon"=>$img_file_name,"pdf_status"=>1));
	if($pdg_insert && move_uploaded_file($fileName_temp,$create_PDF_dir.$pdf_file_name) && move_uploaded_file($thumb_img_icon_temp,$create_PDF_dir.$img_file_name))
	{
		$mess_error="<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><p>File Upload successfully !!!!!</p></div>
		<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
		
	}
	else
	{
		$mess_error="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>File Upload Fail</p></div>
		<meta http-equiv='refresh' content='2; url='".$_SERVER['PHP_SELF']."'>"; 
	}	
	
}	

echo $mess_error;		
?>