<?php

include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

if ($_FILES['imgupload']['name']!='') {

    //$path = "../images/uploads/"; //set your folder path
    //set the valid file extensions 
    $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "GIF", "JPG", "PNG", "doc", "txt", "docx", "pdf", "xls", "xlsx"); //add the formats you want to upload

   $name = $_FILES['imgupload']['name']; //get the name of the file    
   $size = $_FILES['imgupload']['size']; //get the size of the file
   $new_ext=pathinfo($name,PATHINFO_EXTENSION);
   
   
	$getcurerntPageID=$_POST['CurrentgetPageID'];
	
	$page_Name=$_POST['page_Name'];	
	$old_img_Name=$_POST['old_img_Name'];
	$existing_galleyID=$_POST['existing_galleyID'];
	$file_nametrim=str_replace(" ","-",strtolower(trim($page_Name)));
	$path ="../images/".$file_nametrim."/";
	//$path ="../images/text/";
	
	if(is_dir($path))
	{
		if(file_exists($path.$old_img_Name))
		{
			//echo $path.$old_img_Name;
			
			unlink($path.$old_img_Name);
		}
		
		if (strlen($name)) 
		{ //check if the file is selected or cancelled after pressing the browse button.
        list($txt, $ext) = explode(".", $name); //extract the name and extension of the file
        if (in_array($ext, $valid_formats)) 
		{ //if the file is valid go on.
            if ($size < 650000) 
			{ // check if the file size is more than 2 mb
                $file_name = $file_nametrim."_".md5(rand()); //get the file name
                $tmp = $_FILES['imgupload']['tmp_name'];
				
                if (move_uploaded_file($tmp, $path . $file_name.'.'.$ext)) 
				{ //check if it the file move successfully.
					$update_gallery=$fun_obj->common_update("cms_gallery",array("small_img"=>$file_name.'.'.$ext),$where="gallery_id='$existing_galleyID'");

					if($update_gallery)
					{	
									
						//echo "File uploaded successfully!!";
						//echo"<meta http-equiv='refresh' content='0; url='".$_SERVER['REQUEST_URI']."''>";
						echo"<script>window.location.href='upload-img.php?upload_img=$getcurerntPageID'</script>";
					}
                } 
				else 
				{
                    echo "failed";
                }
            } 
			else 
			{
                echo "Fail!!!!! File size not more than 500KB";
            }
        } 
		else 
		{
            echo "Invalid file format..";
        }
    } 
	else 
	{
        echo "Please select a file..!";
    } 
	} //===========End if the filename not existing DIR 
	else
	{
		echo"not exist";
	}
  
    exit;
} //==========end if for file not empty