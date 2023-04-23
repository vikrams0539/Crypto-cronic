<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');
if(isset($_POST['checking']))
{
	foreach($_POST['pageIDs'] as $extract_id)
	{
		$pageSel=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name^filename^page_order","where page_ID='$extract_id'");
		$fetch_page=mysqli_fetch_array($pageSel);
		$file_name=$fetch_page['filename'];
		$pageName=$fetch_page['page_name'];
		
		$dir_pathname=dirname(__DIR__)."/".$file_name;
		if(file_exists($dir_pathname))
		{
			$del_orderID=$fun_obj->commnon_del("cms_pages","WHERE page_ID='$extract_id'");
			$del_orderID.=$fun_obj->commnon_del("cms_text","WHERE page_ID='$extract_id'");
			$del_orderID.=$fun_obj->commnon_del("cms_gallery","WHERE page_id='$extract_id'");
			
			unlink($dir_pathname);
			
			$pageName=dirname(__DIR__)."/images/".str_replace(" ","-",strtolower(trim($pageName)));
			foreach(glob($pageName."/*") as $files) 
						{
							if(is_file($files))
							{
								unlink($files);
							}
						}	
			rmdir($pageName);
		}
		else
		{
			echo"Not exist";
		}
	}// end foreach
	if($del_orderID)
		{
			echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Page deleted</h4></div>
			<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
		}
	else
		{
			echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Fail to delete</h4></div>";
		}
}
?>       