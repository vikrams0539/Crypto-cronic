<?php
$pdg_id=$_GET['PDF_ID'];

include('php-function/function.php');


$Sel_PDF_ID=$fun_obj->commonSelect_table("cms_pdfUpload","pdf_id^page_id^page_name^pdf_desc^pdf_file^thumb_img_icon","WHERE pdf_id='".$pdg_id."'");
$runPDF=mysqli_fetch_array($Sel_PDF_ID);

$pdf_file=$runPDF['pdf_file'];
$thumb_img_icon=$runPDF['thumb_img_icon'];

$Del_trimPagename=strtolower(trim($runPDF['page_name']));
$Del_trimPagename=str_replace(" ","-",$Del_trimPagename);
													
$imagesPath=dirname(__DIR__);

$pdf_path=$imagesPath."/images/".$Del_trimPagename."/".$pdf_file;
$img_path=$imagesPath."/images/".$Del_trimPagename."/".$thumb_img_icon;


if(file_exists($pdf_path) AND file_exists($img_path))
{
	
	$delID=$fun_obj->commnon_del("cms_pdfUpload","WHERE pdf_id='$pdg_id'");
	
	if($delID)
	{
		unlink($pdf_path);
		unlink($img_path);
		
		echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Record deleted</h4></div>
			
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
	}
	else
	{
		echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Fail to delete</h4></div>";
	}
	
}
?>