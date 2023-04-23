<?php
include('php-function/function.php');

$galleryIDArray=$_GET['galleryID'];
$explodeID=explode(",",$galleryIDArray);
//print_r($imploadID);
$success="";
foreach($explodeID as $galleryID)
{
	//echo"ID".$galleryID;
$SelID=$fun_obj->commonSelect_table("cms_gallery","gallery_id^page_id^pagename^small_img","WHERE gallery_id='".$galleryID."'");
$runGallery=mysqli_fetch_array($SelID);

$small_img=$runGallery['small_img'];

$Del_trimPagename=strtolower(trim($runGallery['pagename']));
$Del_trimPagename=str_replace(" ","-",$Del_trimPagename);
													
$imagesPath=dirname(__DIR__);

$imagesPath."/images/".$Del_trimPagename."/".$small_img;

if(file_exists($imagesPath."/images/".$Del_trimPagename."/".$small_img))
{
	$delID=$fun_obj->commnon_del("cms_gallery","WHERE gallery_id='$galleryID'");
	
	if($delID)
	{
		unlink($imagesPath."/images/".$Del_trimPagename."/".$small_img);
		
		$success="<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Record deleted</h4></div>
			
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
	}
	else
	{
		$success="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Fail to delete</h4></div>";
	}
	
}
} //End foreach
echo $success;
?>