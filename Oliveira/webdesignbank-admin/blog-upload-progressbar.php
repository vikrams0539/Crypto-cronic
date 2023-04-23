<?php
//include('../req/common-variables.php');
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');
$page_ID=0;

$pagename=$_POST['page_type'];

$page_name_and_id=$_POST['page_name'];
$blog_heading=$_POST['blog_heading'];
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


$array_img_type=array("png","jpg","jpeg");



if(!in_array($img_file_ext, $array_img_type))
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
	
	
	$img_file_name=$trim_pagename."-".$rnd_name.".".$img_file_ext;
	
	$pdg_insert=$fun_obj->common_insert("cms_blog",array("page_id"=>$pdfpageID,"page_name"=>$pdfpageNmae,"blog_heading"=>$blog_heading,"blog_detail"=>$pdf_details,"blog_img"=>$img_file_name,"blog_status"=>1));
	if($pdg_insert && move_uploaded_file($thumb_img_icon_temp,$create_PDF_dir.$img_file_name))
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