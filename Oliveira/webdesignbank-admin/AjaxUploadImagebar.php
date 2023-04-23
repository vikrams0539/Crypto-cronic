<?php
error_reporting(1);
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$fileNameArray=$_FILES['choose_img']['name'];

$pagetype=$_POST['pagetype'];
$pageID=$_POST['current_pagID'];

$root_DIR=dirname(__DIR__)."/";

$page_name_trim=str_replace(" ","-",strtolower(trim($pagetype)));
$getpath=$root_DIR."images/".$page_name_trim."/";


if(!is_dir($getpath))
{
	mkdir($getpath,0777,true);
}



	
	for($i=0; $i<count($fileNameArray); $i++)
	{
	
		$filename=$_FILES['choose_img']['name'][$i];
		$tmp=$_FILES['choose_img']['tmp_name'][$i];
		
		$in_array=array("jpg","JPG","png","gif");
		$getExt=pathinfo($filename,PATHINFO_EXTENSION);
		
		if(!in_array($getExt, $in_array))
		{
			echo"<div class='alert alert-danger'>
					<span class='close' data-dismiss='alert'>X</span>
					<h4>Fail!!!! $getExt, please select valid file type</h4>
					</div>";
		}
		elseif($_FILES['choose_img']['size'][$i] > 950000)
		{
				echo"<div class='alert alert-danger'>
					<span class='close' data-dismiss='alert'>X</span>
					<h4>Fail!!!! file size not more than 950KB</h4>
					</div>";
		}
		else
		{
				//echo"<br>".$filename= strtolower(trim(str_replace(" ","-",$pagetype)))."_".md5(rand());
				//$images=file_get_contents();
				$filename= strtolower(trim(str_replace(" ","-",$pagetype)))."_".md5(rand());
						//echo"<br>". $getpath.$filename.".".$getExt; 
						
				$sel_order=$fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename","WHERE page_id='$pageID'");
					$num_row=mysqli_num_rows($sel_order);
					// $lastID=mysqli_insert_id($sel_order);
					if($num_row>0)
					{
						while($fetch=mysqli_fetch_array($sel_order))
						{								
							$orders[]=$fetch['img_order'];										
						}									
							$set_order=max($orders)+1; 
						
					}
					else
					{
						$set_order=$set_order+$i;
					}
					if(move_uploaded_file($tmp,$getpath.$filename.".".$getExt))
						{
							$small_size=$filename.".".$getExt;
							
							$gallery_insert=$fun_obj->common_insert("cms_gallery", array("page_id"=>$pageID,"pagename"=>$pagetype,"small_img"=>$small_size,"img_order"=>$set_order,"flag"=>"1"));
								if($gallery_insert)
								{
									/*echo"<div class='alert alert-success'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Success!!!! Upload images for <b><code>$pagetype</code></b> page</h4>
								</div>
								<meta http-equiv='refresh' content='2; url='".$_SERVER['REQUEST_URI']."'>
								";*/
								echo"<script>window.location.href='upload-img.php?upload_img=$pageID'</script>";								
								} 
						}
		} //==== else end
	} //==== \For loop end 
//echo $msg;

?>