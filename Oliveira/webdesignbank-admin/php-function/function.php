<?php
//echo getcwd();
error_reporting(E_ALL);
ini_set('display_error',1);
include('connection.php');

class functions extends connection
{
	public function db_link_fun()
	{
		return $this->links;
	}
	public function DB_function()
	{
	//------ Create  DB Name auto -----------------//	
		$create_db="CREATE DATABASE IF NOT EXISTS ".$this->db_name;
		$query=$this->links->query($create_db);
		if(!$query)
		{
		 $error="Error creating database: " . $this->links->error;
		}
					  
	  $this->links->select_db($this->db_name);
			
	//------ Create Admin Table in DB auto -----------------//
		$create_admin_table="CREATE TABLE IF NOT EXISTS cms_admin(
		admin_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		username VARCHAR(150) NOT NULL, 
		password VARCHAR(200) NOT NULL,
		email VARCHAR(200) NOT NULL,
		domain_name VARCHAR(250) NOT NULL,
		property_name VARCHAR(200) NOT NULL,
		type TEXT NOT NULL,
		flag ENUM('1', '0') NOT NULL
		)";	
		$table_query=$this->links->query($create_admin_table);
		if(!$table_query)
		{				
			$error="Error creating Admin table: " . $this->links->error;
		}
		
	//--------- Select data From admin Table -------------//
		$sel_admin="SELECT username, password FROM cms_admin WHERE username='webdesign_admin' and password='bank202'";
		$sel_query=$this->links->query($sel_admin);
		$num_rows=$sel_query->num_rows;
		if($num_rows==1)
		{
		}
		else
		{
	//--------- Insert data into admin Table -------------//			
			$insert_admin="INSERT INTO cms_admin(username,password,property_name,type,flag)VALUES('webdesign_admin','bank202','Demo Hotel','admin','1')";
			$admin_query=$this->links->query($insert_admin);
			if(!$admin_query)
			{
				$error="data Not Inserted";
			}
		}
		
	//------ Create Pages Table in DB auto -----------------//
		$create_pageTable="CREATE TABLE IF NOT EXISTS cms_pages(
		page_ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_name TEXT NOT NULL,
		filename TEXT NOT NULL,
		page_order FLOAT NOT NULL,
		for_menu ENUM('active','deactive') NOT NULL,
		secondary_menu INT NOT NULL,
		flag TEXT NOT NULL,
		sub_menu_active TEXT NOT NULL,
		disable_dorpdown INT NOT NULL,
		gallery_active TEXT NOT NULL,
		gallery_flag INT NOT NULL,
		img_thumb INT NOT NULL,
		footer_active INT NOT NULL,
		pdf_access INT NOT NULL,
		client_access INT NOT NULL,
		blog_access  INT NOT NULL
		)";
		
		$createPage_query=$this->links->query($create_pageTable);
		if(!$createPage_query)
		{
			$error="Error creating Page table: " .$this->links->error;
		}		
		
		
	//------ Create Text Table in DB auto -----------------//
		$create_textTable="CREATE TABLE IF NOT EXISTS cms_text(
		text_ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_ID INT NOT NULL,
		text_type TEXT NOT NULL,
		text LONGTEXT NOT NULL,
		text_order FLOAT NOT NULL,		
		flag ENUM('1','0') NOT NULL
		)";
		
		$create_textTable_query=$this->links->query($create_textTable);
		if(!$create_textTable_query)
		{
			$error="Error creating Text table: " .$this->links->error;
		}
		
	//-----------Create Hotel table into DB ---------------//
		$create_hotelTabel="CREATE TABLE IF NOT EXISTS cms_hotel_info(
		hotel_ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		hotel_name TEXT NOT NULL,
		hotel_address TEXT NOT NULL,
		hotel_phone TEXT NOT NULL,
		header_logo TEXT NOT NULL,
		footer_logo TEXT NOT NULL,
		social_media_icon TEXT NOT NULL,
		hotel_email VARCHAR (200) NOT NULL,
		hotel_book_btn TEXT NOT NULL,
		hotel_map TEXT NOT NULL,
		hotel_created_year TEXT NOT NULL
		)";
		
		$create_hotelTabel_qurey=$this->links->query($create_hotelTabel);
		if(!$create_hotelTabel_qurey)
		{
			$error="Error creating Hotel table: " .$this->links->error;
		}
		
	//-----------Create Gallery table into DB ---------------//
		$create_galleryTabel="CREATE TABLE IF NOT EXISTS cms_gallery(
		gallery_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_id INT NOT NULL,
		pagename TEXT NOT NULL,
		small_img TEXT NOT NULL,
		img_description LONGTEXT NOT NULL,
		img_order TEXT NOT NULL,
		flag TEXT NOT NULL,
		date TEXT NOT NULL,
		img_for_thumb TEXT NOT NULL,
		img_for_slider TEXT NOT NULL
		)";
		
		$create_galleryTabel_qurey=$this->links->query($create_galleryTabel);
		if(!$create_galleryTabel_qurey)
		{
			$error="Error creating Gallery table: " .$this->links->error;
		}
		
	//-----------Create Hotel Facility Icons table into DB ---------------//
		$create_facilityTabel="CREATE TABLE IF NOT EXISTS cms_hotel_facility_icons(
		hotel_facility_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		facility_name TEXT NOT NULL,
		facility_page_id TEXT NOT NULL,
		facility_img TEXT NOT NULL,
		facility_alt_name TEXT NOT NULL,
		facility_icon_order INT NOT NULL,
		flag TEXT NOT NULL
		)";
		
		$create_facilityTabel_qurey=$this->links->query($create_facilityTabel);
		if(!$create_facilityTabel_qurey)
		{
			$error="Error creating Hotel Facility Icons table: " .$this->links->error;
		}		
		
	//--------------- social media table -------------------//
		$create_socialmediaTable="CREATE TABLE IF NOT EXISTS cms_socialmedia(
		social_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name TEXT NOT NULL,
		font_icon TEXT NOT NULL,
		media_url TEXT NOT NULL,
		media_order INT NOT NULL,
		display INT NOT NULL,
		flag INT NOT NULL
		)";
		$create_socialmediaTable_qurey=$this->links->query($create_socialmediaTable);
		if(!$create_socialmediaTable_qurey)
		{
			$error="Error creating social media table: " .$this->links->error;
		}
		
	//--------------- Page Privilege table -------------------//
		$create_privilegesTable="CREATE TABLE IF NOT EXISTS cms_privileges(
		privilege_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_id INT NOT NULL,
		permission_name TEXT NOT NULL,
		menu_display_status INT NOT NULL,
		secondary_menu_status INT NOT NULL,
		img_upload_status INT NOT NULL,
		img_gallery_status INT NOT NULL,
		img_thumb_status INT NOT NULL, 
		facility_icon_status INT NOT NULL,
		page_client_acess INT NOT NULL
		)";
		$create_privileges_qurey=$this->links->query($create_privilegesTable);
		
		if(!$create_privileges_qurey)
		{
			$error="Error creating Page Privilege table: " .$this->links->error;
		}
		
	//--------------- Page Privilege table -------------------//
		$create_PDFTable="CREATE TABLE IF NOT EXISTS cms_pdfUpload(
		pdf_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_id INT NOT NULL,
		page_name TEXT NOT NULL,
		pdf_desc VARCHAR(255),
		pdf_file TEXT NOT NULL,
		thumb_img_icon TEXT NOT NULL,
		pdf_status INT NOT NULL
		)";
		$create_PDF_qurey=$this->links->query($create_PDFTable);
		
		if(!$create_PDF_qurey)
		{
			$error="Error creating Page Privilege table: " .$this->links->error;
		}

	//-----------Create miscellaneous table into DB ---------------//
		$create_miscellaneousTabel="CREATE TABLE IF NOT EXISTS cms_miscellaneous(
		mis_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		page_id INT NOT NULL,
		name TEXT NOT NULL,
		summary LONGTEXT NOT NULL,
		mis_img TEXT NOT NULL,
		mis_img_order INT NOT NULL,
		x_axis TEXT NOT NULL,
		y_axis TEXT NOT NULL,
		set_css LONGTEXT NOT NULL,
		display INT NOT NULL,
		flag INT NOT NULL
		)";
		
		$create_miscellaneousTabel_qurey=$this->links->query($create_miscellaneousTabel);
		if(!$create_miscellaneousTabel_qurey)
		{
			$error="Error creating miscellaneous table: " .$this->links->error;
		}

	//-----------Create Blog & Events table into DB ---------------//
		$create_events="CREATE TABLE IF NOT EXISTS cms_blog(
		blog_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,	
		page_id INT NOT NULL,
		page_name TEXT NOT NULL,
		blog_heading TEXT NOT NULL,	
		blog_detail LONGTEXT NOT NULL,
		blog_img TEXT NOT NULL,
		blog_img_order INT NOT NULL,
		blog_status INT NOT NULL,
		flag INT NOT NULL
		)";
		
		$create_events_qurey=$this->links->query($create_events);
		if(!$create_events_qurey)
		{
			$error="Error creating Events table: " .$this->links->error;
		}


		return @$error;

	}
	public function domain_url()
	{
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on')
		{
			$url="https";
		}
		else
		{
			$url="http";
		}
		$url.="://".$_SERVER['HTTP_HOST']."/JMCKDS/Oliveira/";
		return $url;  
		 
	}
	
/*#################### Create Tabel name into DB #######################*/	
	
	public function create_table_into_DB()
	{
		$fields_count=$_SESSION['total_table_fields'];
		$T_name=$_SESSION['table_name_session'];
		
		if(isset($_POST['create_table']))
		{
			$fields_array=array();
			//$fields_array=array();
			for($i=0; $i<$fields_count; $i++)
			{
			//####### field name
				$field_name="field_name_".$i;
				$post_field=$_POST[$field_name];
				
			//####### type_field
				$type_field="type_field_".$i;
				$post_type_field=$_POST[$type_field];
					
			//######## notnull_				
				$notnull="notnull_".$i;
				$post_notnull=$_POST[$notnull];
						
			//####### AI_field
				$AI_field="AI_field_".$i;
				$post_AI_field=$_POST[$AI_field];
				
			//####### key_field
				$key_field="key_field_".$i;
				$post_key_field=$_POST[$key_field];				
				//echo $post_field."<br>".$post_type_field."<br>".$post_AI_field."<br>"."<br>".$post_key_field;
				$fields_array[]=$post_field." ".$post_type_field." ".$post_notnull." ".$post_AI_field." ".$post_key_field;
			}
			
			//print_r($fields_array);
			$explode_fields=implode(",",$fields_array);
			//echo $explode;
			$create="CREATE TABLE ".$T_name."($explode_fields)"; 
				 
				$query=mysqli_query($this->links, $create); 
				if($query)
				{
					echo"<script>alert('table created');</script>
					<meta http-equiv='refresh' content='1; url='".$this->domain_url()."webdesignbank-admin/''>
					";
				}
				else
				{
					echo"<script>alert('Error:');</script>
					<meta http-equiv='refresh' content='1; url='".$this->domain_url()."webdesignbank-admin/10072019creatDBtable.php''>
					";
				} 
		}
	}
	
/*#################### Show Tabel name From DB #######################*/		
	public function Show_table()
	{
		$show="SHOW TABLES";
		$query=mysqli_query($this->links, $show);
		//var_dump($query);
		$i=0;
		while($show_run=mysqli_fetch_array($query))
		{
			//$count=count($show_run);
			echo $show_run[$i]."<br><hr>";			
			$show_field="SHOW COLUMNS FROM ".$show_run[$i];
			
			
			$query2=mysqli_query($this->links, $show_field);
			while($run_field=mysqli_fetch_array($query2))
			{
				echo $run_field[$i]."<br>";
			}
		}
		$i++;
	}/*######################## Common Insert Fun. ###################################*/	
	public function common_insert($table, $cols)
	{
		//$cols=array("filed1"=>'one',"filed2"=>'two',"filed3"=>'three');
		$fields=array_keys($cols);
		//print_r($fields);
		$insert="INSERT INTO ".$table."(`".implode("`,`",$fields)."`) VALUES('".implode("','",$cols)."')";
		$query_insert=mysqli_query($this->links,$insert);
		return $query_insert;
	}
	
/*######################## Common Select Tabel Select Fun. ###################################*/	
	public function commonSelect_table($table,$cols,$where_clause='')
	{
		$whereSQL="";
		$field_array=explode("^",$cols);
		$comma_seperated_fields=implode("`,`",$field_array);
		//print_r($data);
		if(!empty($where_clause))
		{
			if(substr(strtoupper(trim($where_clause)),0,5)!='WHERE')
			{
				$whereSQL=" WHERE ".$where_clause;
			}
			else
			{
				$whereSQL=" ".$where_clause;
			}
		}		
			$sql = "SELECT `".$comma_seperated_fields."` FROM ".$table.$whereSQL;		
			$query_select=mysqli_query($this->links, $sql); 
			return $query_select;
	}
	
/*################## Common Update Tabel Function ######################*/
	public function common_update($table, $cols, $where_clause='')
	{
		//$cols=array("page_name"=>'index2');
		$whereSQL='';
		/*$fields=explode('^', $cols);
		echo $comma_seperated_fields=implode("`,`",$fields);*/
		if(!empty($where_clause))
		{
			if(substr(strtoupper(trim($where_clause)),0,5)!="WHERE")
			{
				$whereSQL=" WHERE ".$where_clause;
			}
			else
			{
				$whereSQL=" ".$where_clause;
			}
		}
		$update="UPDATE ".$table." set ";
		$sets=array();
		foreach($cols as $columns => $values)
		{
			 $sets[]="`".$columns."`='".$values."'";			
		}
		//print_r($sets[0]);
		$update.=implode(', ', $sets);
		echo $update.=$whereSQL;
		$query_update=mysqli_query($this->links, $update);
		return $query_update;
	}
/*-------------------- Common delet function -----------------*/
	public function commnon_del($table,$where_clause='')
	{
		$whereSQL='';
		if($where_clause!='')
		{
			if(substr(strtoupper(trim($where_clause)),0,5)!='WHERE')
			{
				$whereSQL=" WHERE ".$where_clause;
			}
			else
			{
				$whereSQL=" ".$where_clause;
			}
		}
		$del="DELETE FROM ".$table.$whereSQL;
		$del_query=mysqli_query($this->links,$del);
		return $del_query;
	}
/*------########### Add hotel information auto--------######*/
	public function addHotelInfo()
	{
		if(isset($_POST['hotelinfo']))
		{
			$hotel_ID=$_POST['hotel_id'];			
			$hotel_name=mysqli_real_escape_string($this->links, $_POST['hotel_name']);
			$hotel_address=mysqli_real_escape_string($this->links, $_POST['hotel_address']);
			$hotel_phone=$_POST['hotel_phone'];
			$booking_url=$_POST['booking_url'];
			$hotel_book_btn=$_POST['hotel_book_btn'];
			$hotel_createdYear=$_POST['hotel_year'];
			
			$hotel_book_btn=$booking_url.$hotel_book_btn;
			
			
		//--------- If image exists -----------//
			$h_imgExist=$_POST['header_logo_exist'];
			$f_imgExist=$_POST['footer_logo_exist'];
			
			if(empty($_FILES['header_logo']['name']))
			{
				$header_logo=$h_imgExist;
			}
			else
			{
				$header_logo=$_FILES['header_logo']['name'];
			}
			
			if(empty($_FILES['footer_logo']['name']))
			{
				$footer_logo=$f_imgExist;
			}
			else
			{
				$footer_logo=$_FILES['footer_logo']['name'];			
			}
			
			$h_tmp=$_FILES['header_logo']['tmp_name'];
			$f_tmp=$_FILES['footer_logo']['tmp_name'];
			
			$social_media_icon=mysqli_real_escape_string($this->links, $_POST['social_media_icon']);
			$hotel_email=mysqli_real_escape_string($this->links, $_POST['hotel_email']);
			
			$hotel_map=mysqli_real_escape_string($this->links,$_POST['hotel_map']);
		/*-------------- Image upload query-----------*/
		
			$ext_valid=array("jpg","JPEG","png","gif","JPG");
			
			$head_extension=pathinfo($header_logo,PATHINFO_EXTENSION);
			
			$foot_extension=pathinfo($footer_logo,PATHINFO_EXTENSION);
			
			if(!in_array($head_extension, $ext_valid, False))
			{
				$error="<div class='error-message'>
							<h4>Header Logo File Type not valid extension</h4>
							</div>";
			}
			else if(!in_array($foot_extension, $ext_valid, False))
			{
				$error="<div class='error-message'>
							<h4>Footer Logo File Type not valid extension</h4>
							</div>";
			}
			else if($_FILES['header_logo']['size'] >1024576 OR $_FILES['footer_logo']['size'] >1024576)
				{
					$error="<div class='error-message'>
							<h4>File Size not more than 1MB</h4>
							</div>";
				}
			else
				{					
					$imageUploadPath=dirname(dirname(__DIR__))."/images/";
				if(!is_dir($imageUploadPath))
				{
					mkdir($imageUploadPath,0777,true);
				}
		//-------####### Rename image while Uploading #########-----------//
					$top_logo="header-logo.".$head_extension;
					$bottom_logo="footer-logo.".$foot_extension;					
					move_uploaded_file($h_tmp,$imageUploadPath.$top_logo);
					move_uploaded_file($f_tmp,$imageUploadPath.$bottom_logo);
					
					//if(file_exists($imageUploadPath.$top_logo) or file_exists($imageUploadPath.$bottom_logo))
					//{
				$sel_hotel_info=$this->commonSelect_table("cms_hotel_info","hotel_ID^hotel_name^hotel_address^hotel_phone^header_logo^footer_logo^social_media_icon^hotel_email^hotel_book_btn^hotel_created_year", $where_clause='');
						$hotel_row=mysqli_num_rows($sel_hotel_info);
						
				//-----Only One record will insert into DB else update the text---//
						if($hotel_row==0)
						{
							$insert_hotelInfo=$this->common_insert("cms_hotel_info", array("hotel_name"=>$hotel_name,"hotel_address"=>$hotel_address,"hotel_phone"=>$hotel_phone,"header_logo"=>$top_logo,"footer_logo"=>$bottom_logo,"social_media_icon"=>$social_media_icon,"hotel_email"=>$hotel_email,"hotel_book_btn"=>$hotel_book_btn,"hotel_map"=>$hotel_map,"hotel_created_year"=>$hotel_createdYear));
							if($insert_hotelInfo)
							{
								$error="<div class='error-message'>
							<h4>Insert data successfully</h4>
							</div>
							<script> window.location.href='".$_SERVER['REQUEST_URI']."';</script>";
							}							
						}
						else
							{
								$fetch=mysqli_fetch_array($sel_hotel_info);								
								$lastID=$fetch['hotel_ID'];
								
								$hotel_update=$this->common_update("cms_hotel_info", array("hotel_name"=>$hotel_name,"hotel_address"=>$hotel_address,"hotel_phone"=>$hotel_phone,"header_logo"=>$top_logo,"footer_logo"=>$bottom_logo,"social_media_icon"=>$social_media_icon,"hotel_email"=>$hotel_email,"hotel_book_btn"=>$hotel_book_btn,"hotel_map"=>$hotel_map,"hotel_created_year"=>$hotel_createdYear), "WHERE hotel_ID='$lastID'");
								if(!$hotel_update)
								{
									$error="<div class='error-message'>
								<h4>Problem While update</h4>
								</div>
								<meta http-equiv='refresh' content='2; url='".$this->domain_url()."webdesignbank-admin/index.php?update=1'>";								
								}
								else
								{
									echo"<script>alert('Updated successfully!!!!!'); window.location.href='".$_SERVER['REQUEST_URI']."';</script>";
								}
						
							}
				}
		
	}
		return @$error;
	}
	public function hotel_facility_icon()
	{
		if(isset($_POST['add-icon']))
		{
			$icon_name=$_POST['icon_name'];
			$icon_img=$_FILES['icon_img']['name'];
			$icon_tmp=$_FILES['icon_img']['tmp_name'];
			
			$i=0;
			foreach($icon_name as $name)
			{
				//foreach($icon_img as $image_name)
			
				//$icon_img[$i];
				$name=strtolower(trim($name));
				//echo $get_ext=pathinfo($icon_img[$counts],PATHINFO_EXTENSION);
				
				$sel_icon_name=$this->commonSelect_table("cms_hotel_facility_icons","hotel_facility_id^facility_name^facility_page_id^facility_img^flag","WHERE facility_name='$name'");
				$icon_num=mysqli_num_rows($sel_icon_name);
				if($icon_num > 0)
				{
					$error="<div class='error-message'>
						<h4>($name)&emsp;<span>This Name already Exist</span></h4>						
						</div>";
				}
				else
				{
					$icon_img_path=dirname(dirname(__DIR__))."/images/facility-img-icons/";
					if(!is_dir($icon_img_path))
					{
						mkdir($icon_img_path,0777,true);
					}
					$img_ext=pathinfo($icon_img[$i],PATHINFO_EXTENSION);
					$img_name=str_replace(" ","-",$name);
					//echo $img_name;
						 if(move_uploaded_file($icon_tmp[$i],$icon_img_path.$img_name.".".$img_ext))
						{
							//$name=mysqli_real_escape_string(trim($name));
							$icon_insert=$this->common_insert("cms_hotel_facility_icons",array("facility_name"=>$name,"facility_img"=>$img_name.".".$img_ext,"flag"=>0),"");
							if($icon_insert)
							{
								$error="<div class='error-message'>
									<h4>Insert data successfully</h4>
									</div>
									<script> window.location.href='".$_SERVER['REQUEST_URI']."?pageID=".$_GET['pageID']."';</script>";
							}
						} 
						else
						{
							$error="<div class='error-message'>
									<h4>Image not Upload</h4>
									</div>
									<script> window.location.href='".$_SERVER['REQUEST_URI']."?pageID=".$_GET['pageID']."';</script>";
						}				
				}
				//} //End second foreach loop
				$i++;
			}
		}
		return @$error;
	}
	public function del_hotel_facility_icon()
	{
		
	}
/*######------------ Upload room and gallery page images function----------##############*/
	public function uploadRoomimg()
	{
		
		if(isset($_POST['uploadrooimage']))
		{
			$roomIDs=$_POST['room-id'];
			$imageUpload=$_FILES['room_upload']['name'];
			$tmp_img=$_FILES['room_upload']['tmp_name'];			
			$count_images=count($imageUpload);
			$valid_ext=array("jpg","JPG","JPEG","png","gif","bmp");
			for($i=0; $i<$count_images; $i++)
			{
				$uploadimg_ext=pathinfo($_FILES['room_upload']['name'][$i],PATHINFO_EXTENSION);
				if(!in_array($uploadimg_ext, $valid_ext))
				{
					echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>please select valid file type ".$imageUpload[$i]."</h4></div>";
				}
				/*else if(file_exists())
				{
					
				}*/
				else
				{
					echo"Valid";
				}
			}
			
		}
	}
	
/*######################## Get hotel info Fun. ###################################*/
		public function GetHotel_info()
		{
			$hotel_info=$this->commonSelect_table("cms_hotel_info","hotel_ID^hotel_name^hotel_address^hotel_phone^header_logo^footer_logo^social_media_icon^hotel_email^hotel_book_btn^hotel_map^hotel_created_year", "");
			
			//$hotel_info_array="";
			while($hotel_run=mysqli_fetch_array($hotel_info))
			{
				$hotel_ID=$hotel_run['hotel_ID'];
				$hotel_name=$hotel_run['hotel_name'];
				$hotel_address=$hotel_run['hotel_address'];
				$hotel_phone=$hotel_run['hotel_phone'];
				$header_logo=$hotel_run['header_logo'];
				$footer_logo=$hotel_run['footer_logo'];
				$social_media_icon=$hotel_run['social_media_icon'];
				$hotel_email=$hotel_run['hotel_email'];
				$hotel_book_btn=$hotel_run['hotel_book_btn'];
				$hotel_map=$hotel_run['hotel_map'];
				$hotel_createdYear=$hotel_run['hotel_created_year'];
				
				$hotel_info_array=array(
				"hotel_ID"=>$hotel_ID,"hotel_name"=>$hotel_name,"hotel_address"=>$hotel_address,"hotel_phone"=>$hotel_phone,"header_logo"=>$header_logo,"footer_logo"=>$footer_logo,"social_media_icon"=>$social_media_icon,"hotel_email"=>$hotel_email,"hotel_book_btn"=>$hotel_book_btn,"hotel_map"=>$hotel_map,"hotel_created_year"=>$hotel_createdYear);
			}
			return @$hotel_info_array;
			//print_r($hotel_info_array);
		}
		

	
/*################## User login Function ######################*/	
	public function userLogin()
	{	
		if(isset($_POST['login']))
		{		
			/*
			
			$username=strip_tags(mysqli_real_escape_string($this->links,$_POST['Username']));
			$pasword=strip_tags(trim($_POST['Password']));			
			
			$userStatement=$this->commonSelect_table("cms_admin","username^password","WHERE username=? AND password=?");
			
			mysqli_stmt_bind_param($userStatement, 'ss',$username,$pasword);  
			mysqli_stmt_execute($userStatement);
			mysqli_stmt_store_result($userStatement);
			
			
			
			if(mysqli_stmt_num_rows($userStatement)==1)
			{
				session_start();
				echo $_SESSION['session_user']=$username;
				header("Location:".$this->domain_url()."webdesignbank-admin/");
			}
			else
			{
				$error="<div class='error-message'>
						<h4>wrong login detail</h4>
						</div>";
			}
			
			*/
			
			$username=$_POST['Username'];
			$pasword=$_POST['Password'];			
			$sel_user="select `username`,`password` from cms_admin where username='$username' and password='$pasword'";
			$query_user=mysqli_query($this->links, $sel_user);
			$num_row=mysqli_num_rows($query_user);
			if($num_row>0)
			{
				session_start();
				$_SESSION['session_user']=$username;
				
				/*echo"<script>window.location.href='index.php';</script>";*/
				header("Location:".$this->domain_url()."webdesignbank-admin/");
			}
			else
			{
				$error="<div class='error-message'>
						<h4>wrong login detail</h4>
						</div>";
			}
		}
		return @$error;
	}
	public function userType($session_name)
	{
		//$sel_type=;
		$query_type=mysqli_query($this->links,"select*from cms_admin where username='$session_name'");
		//$fetch=mysqli_fetch_array($query_type);
		return $query_type;
	}

/*######################## Get page text arrray. ###################################*/	
	public function TextArray($page_ID, $text_type)
	{		
		$sel_text="select*from cms_text where page_ID='$page_ID' and text_type='$text_type' order by text_order";	
		$query_text=mysqli_query($this->links, $sel_text);
		$textArray=array();
		$textArrayIndex=0;
		
		while($run_text=mysqli_fetch_array($query_text))
		{
			$text=nl2br($run_text['text']);
			$textArray[$textArrayIndex]=$text;
			$textArrayIndex=$textArrayIndex+1;
		}			
		return $textArray;				
	}
	
/*######################## Update text arrray. ###################################*/	
		public function updateText()
		{
			$update_page_id=@$_GET['pageID'];
			//exit();
			if(isset($_POST['save']))
			{
				$text_ids=$_SESSION['textID'];
				
				$currentpageID=$_POST['current_pageID'];
				
			
				
				foreach($text_ids as $ids)
				{
					if(!filter_var($ids,FILTER_VALIDATE_INT)===false)
					{
						$text="text_".$ids;
						$text_order="text_order_".$ids;
						
				//######## Post Values ####################
						$post_text=mysqli_real_escape_string($this->links, $_POST[$text]);
						$post_text_order=$_POST[$text_order];
						
						$update=$this->common_update("cms_text", array("text"=>$post_text,"text_order"=>$post_text_order), $where_clause="WHERE text_id='$ids'");
						if($update)
						{
							echo"<script>alert('Text Updated Successfully!!!!!'); window.location.href='".$_SERVER['REQUEST_URI']."?pageID=$currentpageID';</script>";
						}
						else
						{
							echo"<script> window.location.href='index.php?error=1';</script>";
						}
					}
				}
			}
		}
/*######################## Send Email Fun. ###################################*/
	public function Email_send()
	{
		if(isset($_POST['enquiry']))
		{
			
			//echo $_POST['token'];
			/*############ For Google Captcha ##########*/
				$url="https://www.google.com/recaptcha/api/siteverify";
				$data=[
				'secret'=>"6Ld5olAaAAAAAMk4gg9YJ4hCAx0QyqVE0B6Ar64g", 'response'=>$_POST['token'], 'remoteip'=>$_SERVER['REMOTE_ADDR']
				];
				
				$options=array('http'=>array('header'=>"Content-type: application/x-www-form-urlencoded",'method'=>'POST','content'=>http_build_query($data)));
				
				//print_r($options);
				
				$context=stream_context_create($options);
				$response=file_get_contents($url, false, $context);				
				//print_r($response);
				
				$succ=json_decode($response,true);				
				
				$pro_name=$this->GetHotel_info();
				//echo $Username=$_POST['Fname'];
				$Username=filter_var($_POST['Fname'],FILTER_SANITIZE_STRING);
				
				$Email=filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL);
				  
				$Phone=filter_var($_POST['Phone'],FILTER_SANITIZE_NUMBER_INT);
				$Message=htmlentities($_POST['Message'],ENT_NOQUOTES);
				
				if(!empty($Username) || !empty($Email) || !empty($Phone) || !empty($Message))
				{
					if($Username === false)
					{
						echo"<Script>alert('Enter Valid name');
						 
						</script>";
					}
					else if(filter_var($Email,FILTER_VALIDATE_EMAIL) === false)
					{
						echo"<Script>alert('Please Enter Valid Email Address');						
						
						 </script>";
					}
				/*	else if($Phone === false)
					{
						echo"<Script>alert('Phone Number Not Valid');
						 
						 </script>";
					}
					else if(strlen($Phone)<6 || strlen($Phone)>11)
					{
						echo"<Script>alert('Phone Number Length Not Less Than 6 Nor More Than 11 Character');</script>";
					}*/
					else if(strlen($Message)<=1 || strlen($Message)>=256)
					{
						echo"<Script>alert('Message Length Not More Than 255 Character');</script>";
					}
					else
					{
						//$to=$pro_name['hotel_email'];
						$to="vikram.update247@gmail.com";
						$header="MIME-Version: 1.0"."\r\n";
						$header.="Content-type:text/html;charset=UTF-8"."\r\n";
						$header.="From: $Email"."\r\n";
						
						
						
						$subject.=" Enquiry from ".$pro_name['hotel_name'];	
						$Message="<b>First Name</b> $Username"."\r\n <br>"."<b>User Email</b> $Email"."\r\n <br>"."<b>User Phone</b> $Phone"."\r\n <br>"."<b>User Enquiry</b> $Message";
						
						
								
						if($succ['success'])
						{
							if(mail($to,$subject,$Message,$header))
								{
									$report="<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Mail send successfully !!!!!</h4></div>
									<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
								}
								else
								{
									$report="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Mail Failed to send</h4></div>";
								}
						}
						else
						{
							$report="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Email not send</h4></div>";
						}
						
						return $report;
						}
				}				
		}			
	}

/*##################### ADD NEW Page && URL file name #####################*/
	public function AddNewPage()
	{
		if(isset($_POST['Add_P']))
		{
			$P_name=mysqli_real_escape_string($this->links, $_POST['P_name']);
			$URL_name=$_POST['URL_name'];
			$P_order=$_POST['P_order'];			
			
			if(!empty($P_name))
			{
				$sel_p_order="select*from cms_pages order by page_ID DESC";
				$query_p_order=mysqli_query($this->links, $sel_p_order);
								
			//######## add page order by auto
				$fetch_p=mysqli_fetch_array($query_p_order);
				$page_order=$fetch_p['page_order'];
				if($page_order)
				{
					$page_order=$page_order+1; //get increment for page order if value already exist
				}
				else
				{
					$page_order=$P_order; //get value from form input field
				}
				
			//######## find if page and file name already existing
				$sel_samename=$this->commonSelect_table('cms_pages','page_name^filename',$where_clause="where page_name='$P_name' and filename='$URL_name'");
				$p_row=mysqli_num_rows($sel_samename);
				
				if($p_row==1)
				{
					echo"<script>alert('This File name already Exist')
							window.location.href='index.php';
					</script>";
				}
				else
				{
					//$file_path=dirname(__DIR__)."/"; //This is for live server
					$file_path=dirname(dirname(__DIR__))."/";
					//exit();
				//echo $root_path=$_SERVER['DOCUMENT_ROOT']."/admin-panel/"; //This is for On local server
					$query_p=$this->common_insert("cms_pages",array("page_name"=>$P_name,"filename"=>$URL_name,"page_order"=>$page_order));
					
					 if($query_p)
					{
						echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Insert success!!!!!</h4></div>
						<meta http-equiv='refresh' content='1; url='index.php''>
						";
						
					/*######### Create file name while inserting content #########*/
						$myfilename=fopen($file_path.$URL_name,"w");
						$text_empty="";
						fwrite($myfilename,$text_empty);
						fclose($myfilename);						
					}
					else
					{
						echo"<script>aler('Not add and pagename');</script>";
					}
				}				
			}//if field not empty
		}//end add page isset
	}

/*################ Rename page Function ###############*/
	public function rename_url_page($pageID)
	{
		if(isset($_POST['rename_P']))
		{
		/*##### Previous Data ######*/
			$pageID=$_POST['P_ID'];
			$O_F_Name=$_POST['O_F_Name'];		
			$pname=$_POST['pname'];	
			
		/*##### Update With New Data ######*/		
			$N_P_name=strtolower($_POST['N_P_name']);
			
			$N_F_Name=trim($N_P_name);
			$N_F_Name=strtolower($N_F_Name);
			$N_F_Name=preg_replace("/\s+/"," ",$N_F_Name);
			$N_F_Name=str_replace(" ","-",$N_F_Name);
			$N_F_Name=$N_F_Name.".php";
			
			$root_path= dirname(dirname(__DIR__))."/";//This is for live server
			
			$pagename_DIR=$root_path."images/".str_replace(" ","-",strtolower(trim($pname)));
			if(is_dir($pagename_DIR))
			{
				rename($pagename_DIR, $root_path."images/".str_replace(" ","-",strtolower(trim($_POST['N_P_name']))));
				
				//echo"File renamed".str_replace(" ","-",strtolower(trim($_POST['N_P_name'])));
			}
			//echo $root_path=$_SERVER['DOCUMENT_ROOT']."/admin-panel/"; //This is for On local server
			
			$existing_pagename=$this->commonSelect_table('cms_pages',"page_ID^page_name","WHERE filename='$N_F_Name'");
			$num_rows=mysqli_num_rows($existing_pagename);
			//var_dump($num_rows);
			//echo"<br>".$num_rows;
			if($num_rows==1)
			{
				echo"<script>alert('This page Name already exists');
				window.location.href='index.php?error=1';</script>";			
			}
			else
			{
			//##### Check if filename already exist, then overwrite the whole content ######
				if(file_exists($root_path.$O_F_Name))
				{
					//echo"<br>File Exists=".$root_path.$O_F_Name;
					$file_get=file_get_contents($root_path.$O_F_Name);
					file_put_contents($root_path.$N_F_Name, $file_get);
					rename($root_path.$O_F_Name, $root_path.$N_F_Name);
				}
				else
				{
					$create_filename=fopen($root_path.$N_F_Name,"w");
					$file_text=$O_F_Name;
					fwrite($create_filename, $file_text);
					fclose($create_filename);
				}
				
				$update_pagename=$this->common_update('cms_pages',array("page_name"=>$N_P_name,"filename"=>$N_F_Name),"WHERE page_ID='$pageID'");
				
				$update_pagename.=$this->common_update('cms_gallery',array("pagename"=>$N_P_name),"WHERE page_ID='$pageID'");
				
				$update_pagename.=$this->common_update('cms_pdfUpload',array("page_name"=>$N_P_name),"WHERE page_id='$pageID'");
				
				if($update_pagename)
				{
					echo"<script> alert('Page Rename Successfully!!!!!');</script>
					<meta http-equiv='refresh' content='0; url='".$this->domain_url()."webdesignbank-admin/' >";
				}
			} 
		}			
	}
	
//################ Add More tag function
	public function addMoreTags()
	{
		if(isset($_POST['add-tag']))
		{
			
			//$text_order=0;
			$tagname=$_POST['tag'];
			$page_id=$_POST['p_ID'];
			
			$com_sel=$this->commonSelect_table("cms_text","text_id^page_id^text_type^text_order",$where="page_id='$page_id' order by text_id DESC");
			//var_dump($com_sel);			
			$num_rows=mysqli_num_rows($com_sel);
			if($num_rows==0)
			{
				$text_order=0;					
			}
			else
			{
				$run=mysqli_fetch_array($com_sel);									
				$text_order=$run['text_order']+0.1;				
			}
			
			foreach($tagname as $value)
			{
				$this->common_insert("cms_text",array("page_id"=>$page_id,"text_type"=>$value,"text_order"=>$text_order));
				//echo $text_order;
				if($text_order <= 10) 
				{
					$text_order+=0.1;
				}				
			}
			echo"<script> window.location.href='".$_SERVER['REQUEST_URI']."?pageID=$page_id';</script>";
			//echo $_SERVER['REQUEST_URI'];
		}
	}
	public function editTextType()
	{
		if(isset($_POST['edit-text-type']))
		{
			$tag_name=$_POST['tag_name'];
			$T_id=$_POST['T_id'];
			$Page_id=$_POST['Page_id'];
			
			$update=$this->common_update("cms_text",array("text_type"=>$tag_name),$where="where text_ID='$T_id'");
			if($update)
			{
				echo"<script>alert('tag Update Succefully');</script>";
				echo"<meta http-equiv='refresh' content='0; url='".$_SERVER['REQUEST_URI']."'>";
			}
			else
			{
					echo"<script> window.location.href='index.php?error=1';</script>";
			}
		}
	}
	//############################ Subscribe Function ################################

	public function subscribe()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		//return $ip;
		if(isset($_POST['subscribe']))
		{
			$Useremail=$_POST['Useremail'];
			$userName=$_POST['userName'];
			if($Useremail!='')
			{
				$sel_sub="select*from subscribe where email_address='$Useremail' and username='$userName' and status='1'";
				$query_sub=mysqli_query($this->links, $sel_sub);
				$num_row=mysqli_num_rows($query_sub);
				if($num_row==0)
				{
					$insert="insert into subscribe(email_address,ip_address,date,username)values('$Useremail','$ip',NOW(),'$userName')";
					$query_insert=mysqli_query($this->links, $insert);
					if($query_insert)
					{
						echo"<script>alert('Thanks for subscription')</script>
						<meta http-equiv='refresh' content='0; URL='".$this->DB_function()."''>
						";
					}
					else
					{
						echo"<script>alert('ERROR: in subscription')</script>
						<meta http-equiv='refresh' content='0; URL='".$this->DB_function()."''>
						";
					}
				}
				else
				{
					echo"<script>alert('This email already exist!!!')</script>
					<meta http-equiv='refresh' content='0; URL='".$this->DB_function()."''>
					";
				}
			}
		}
	}

//############################ Un-subscribe Function ################################
	public function unsbuscribe()
	{
		if(isset($_POST['unsubscribe']))
		{
			$email=$_POST['Email'];	
			$optradio=$_POST['optradio'];	
			$userName=$_POST['userName'];
			$sel_sub="select*from subscribe where email_address='$email' and username='$userName' and tatus='1'";
				$query_sub=mysqli_query($this->links, $sel_sub);
				$num_row=mysqli_num_rows($query_sub);
				if($num_row==1)
				{
					$update=mysqli_query($this->links,"update subscribe set status='0' where mail_address='$email' and username='$userName'");
					
					if($update)
					{
						echo"<script>alert('Un-subscription successfull')</script>";
					}
					else
					{
						echo"<script>alert('ERROR: in subscription')</script>";
					}
				}
				else
				{
					echo"<script>alert('This email or user name Not exist!!!')</script>";
					
				}
		}
	}

//---------- Create new user for CMS login -----------//
		public function create_new_user()
		{
			if(isset($_POST['add_newuser']))
			{
				$new_user=$_POST['new_user'];
				$new_pass=$_POST['new_pass'];
				$user_type=$_POST['user_type'];
				$confirm_pass=$_POST['confirm_pass'];
				
				 if($confirm_pass==$new_pass)
				{
				
					$sel_user=$this->commonSelect_table('cms_admin','username^password',"where username='$new_user' AND password='$new_pass'");
					$user_row=$sel_user->num_rows;
					if($user_row==1)
					{
						echo"<script>alert('This Username and Password already exist');</script>
						<meta http-equiv='refresh' content='2; url='".$this->domain_url()."webdesignbank-admin' >
						";
					}
					else
					{
						$insert_user=$this->common_insert('cms_admin',array("username"=>$new_user,"password"=>$new_pass,"type"=>$user_type));
						if($insert_user)
						{
							echo"<script>alert('User name created successfully!!!!!');</script>
							<meta http-equiv='refresh' content='0; url='".$this->domain_url()."webdesignbank-admin/' >";
						}
						else
						{
							echo"<script>alert('Unable to create user');</script>";
						}
					}
				}//=====end user passeord equal to confirm pass if
				else
				{
					echo"<script>alert('Both password‘s Should be the Same !!!!!')</script>
					<meta http-equiv='refresh' content='0; url='".$this->domain_url()."webdesignbank-admin/' >";
				}
			}//====end isset if 
		}
		
	
//######################### Upload image function ###################//
	public function Upload_img()
	{
		$pageID=$_GET['upload_img'];
		if(isset($_POST['imageupload']))
		{		
			$pagetype=$_POST['pagetype'];
			
		//------------############## Count  the no. of selected files ###############-----------------//
			/*echo"<br>".$count_files=count($_FILES['filesname']['name']);
			for($total=0; $total<$count_files; $total++)
			{
				echo"<br>".$selected_img=$_FILES['filesname']['name'][$total];
				
				echo"<br>".$dirPath=dirname(dirname(__DIR__));  //----------Home Dir path
				
				echo"<br>".$upload_path=$dirPath."/images/".str_replace(" ","-",strtolower(trim($pagetype)));
			}*/
			if(!empty($_POST['roomname']))
			{
				$roomname=$_POST['roomname'];
				
				$getpath= dirname(dirname(__DIR__))."/images/".strtolower(trim(str_replace(" ","-",$pagetype)))."/".strtolower(trim($roomname))."/";
				
				$dbpath=strtolower(trim($roomname));
				$pagetype=$roomname;
			}
			else
			{
				$getpath= dirname(dirname(__DIR__))."/images/".strtolower(trim(str_replace(" ","-",$pagetype)))."/";
				
				$dbpath=strtolower(trim(str_replace(" ","-",$pagetype)));
			}
			$getpath."<br> DB Path ".$dbpath;
			
		//-----------Creat dirname if not exists-------------//
			if(!is_dir($getpath))
			{
				mkdir($getpath,0777,true);
			}
			
	//---------#######count the number of images while uploading #############-----------//
			$count=count($_FILES['filesname']['name']);			
			for($i=0; $i<$count; $i++)
			{
				$filename=$_FILES['filesname']['name'][$i];
				$tmp=$_FILES['filesname']['tmp_name'][$i];
					
				$in_array=array("jpg","JPG","png","gif");
				$getExt=pathinfo($filename,PATHINFO_EXTENSION);
				if(!in_array($getExt, $in_array))
				{
					$error="<div class='alert alert-danger'>
								<span class='close' data-dismiss='alert'>X</span>
								<h4>Fail!!!! $getExt, please select valid file type</h4>
							</div>";
				}
				elseif($_FILES['filesname']['size'][$i] > 950000)
				{
					$error="<div class='alert alert-danger'>
								<span class='close' data-dismiss='alert'>X</span>
								<h4>Fail!!!! file size not more than 950KB</h4>
							</div>";
				}
				else
				{
					//$images=file_get_contents();
					$filename= strtolower(trim(str_replace(" ","-",$pagetype)))."_".md5(rand());
					//echo"<br>". $getpath.$filename.".".$getExt; 
					if(move_uploaded_file($tmp,$getpath.$filename.".".$getExt))
						{
							list($width,$height)=getimagesize($getpath.$filename.".".$getExt);
							//echo"Width=".$width;
							//echo"<br>height=".$height;
							
							$max_width=830;
							//$ratio=$max_width/$width; 
							
							$max_height=440;
							
							$getImg=imagecreatefromstring(file_get_contents($getpath.$filename.".".$getExt));
							$imagecolor=imagecreatetruecolor($max_width, $max_height);
							imagecopyresampled($imagecolor, $getImg, 0,0,0,0,$max_width, $max_height, $width, $height);
							
							$small_size=$filename.".".$getExt;
							//$small_imgpath=$dbpath;
							imagejpeg($imagecolor, $small_size, 50);
							
							$set_order=1;
							if(file_exists($small_size))
							{
								$sel_order=$this->commonSelect_table("cms_gallery","page_id^img_order^pagename","WHERE page_id='$pageID'");
								$num_row=mysqli_num_rows($sel_order);
								$lastID=mysqli_insert_id($sel_order);
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
								
								if(file_exists(getcwd()."/".$small_size))
								{
									unlink($small_size);
								}
								//echo $set_order;
			//------------------- Order Value not set yet ------------------//
								$gallery_insert=$this->common_insert("cms_gallery", array("page_ID"=>$pageID,"pagename"=>$pagetype,"small_img"=>$small_size,"img_order"=>$set_order,"flag"=>"1"));
								if($gallery_insert)
								{
									$error="<div class='alert alert-success'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Success!!!! Upload images for <b><code>$pagetype</code></b> page</h4>
								</div>
								<meta http-equiv='refresh' content='2; url='".$_SERVER['REQUEST_URI']."'>
								";								 
								} 							
							} 
							else
							{
								$error="<div class='alert alert-danger'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Error!!!! Filename not existing</h4>
								</div>";
							}		  					
						}
					else
						{
							$error="<div class='alert alert-danger'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Fail!!!! Error in upload</h4>
								</div>";
						}					
				}
			} //-----End for loop 
			
			echo"<img src='".$this->domain_url()."images/loading.gif' id='loadimg' style='display:none;' />";
		}
		return @$error; 
	}
//------######################### Assigne page name function ###########---------------//
	public function assignPage()
	{
		if(isset($_POST['assignpage']))
		{			
			$parentID=$_POST['parentname'];
			
			//session_start();
			//echo $strpos=substr($_POST['child_'],strpos($_POST['child_'],"-")+1);
			
			$childID=$_SESSION['assign_session_id'];
			//print_r($childID);
			
			foreach($childID as $childIDArray)
			{				
				if(!empty($_POST['child_'.$childIDArray]))
				{
					$update_assign=$this->common_update("cms_pages",array("flag"=>$parentID),"WHERE page_ID='".$_POST['child_'.$childIDArray]."'");
					//var_dump($update_assign);
					if(!$update_assign)
					{
						$success="<div class='alert alert-danger'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Fail!!!! to Update Assign page</h4>
								</div>";
					}
					else
					{
						$success="<div class='alert alert-success'>
									<span class='close' data-dismiss='alert'>X</span>
									<h4>Success!!!! Page assigne </h4>
								</div>
								<meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."'>
								";
					}
				}
				
			}
		}
		return @$success;
	}
//------------################## Unassigned Room name ###########------------------//
	public function unassignPage()
	{
		if(isset($_GET['unassign']))
		{
			$update_unassign=$this->common_update("cms_pages",array("flag"=>''),"WHERE page_ID='".$_GET['unassign']."'");
			if($update_unassign)
			{
				echo"<div class='error-message'>
							<h4>Unassigne successfully!!!!!!!</h4>
							</div>
							<script> window.location.href='".$this->domain_url()."/webdesignbank-admin';</script>"; 
			}
		}
	}
	
//------------################## Active Room name For gallery ###########------------------//
	
	
//------------################## DeActive Room name For gallery ###########------------------//	
	
//-----------################## Change Page Order ################----------------//
	public function changePageOrder()
	{
		if(isset($_POST['updateOrder']))
		{
			session_start();
			$session_orderID=$_SESSION['page_order'];
			
			
			foreach($session_orderID as $orderID)
			{
				$PageOrder="pageorder_".$orderID;
				//echo"<br>".$pageorder;
				$Post_Pageorder=$_POST[$PageOrder];
				
				echo"<br>post order".$Post_Pageorder;
				//echo"<br>".$orderID;
				
				$update_order=$this->common_update("cms_pages",array("page_order"=>$Post_Pageorder), "WHERE page_ID='".$orderID."'");
				if($update_order)
				{
					echo"<div class='error-message'>
							<h4>Page Order Set successfully!!!!!!!</h4>
							</div>
							<script> window.location.href='".$this->domain_url()."/webdesignbank-admin';</script>";
				}
				else
				{
				}
			}
		}
		else if(isset($_GET['dele_page']))
		{
			
			echo"<div class='alert alert-danger'>
					<span class='close' data-dismiss='alert'>X</span>
					<h4>Are you sure to remove this record ?</h4>
					<a href='".$this->domain_url()."/webdesignbank-admin/index.php?delete-page=".$_GET['dele_page']."' class='btn btn-warning'>Yes</a>
				</div>";
		}
		else if(isset($_GET['delete-page']))
				{
					$dir_Path=dirname(dirname(__DIR__));			
					$sel_filename=$this->commonSelect_table("cms_pages","page_ID^page_name^filename","WHERE page_ID='".$_GET['delete-page']."'"); 
					$fetch_filename=mysqli_fetch_array($sel_filename);
					
					$exist_dir=$dir_Path."/images/".str_replace(" ","-",strtolower(trim($fetch_filename['page_name'])))."/";
					$exist_file=$dir_Path."/".$fetch_filename['filename'];
					
					if(file_exists($exist_file))
					{
						foreach(glob($exist_dir."/*") as $files) 
						{
							if(is_file($files))
							{
								unlink($files);
							}
						}						
						
						rmdir($exist_dir); //--remove the dir related with page name
						unlink($exist_file); //--remove pagename if exists
						
						$delPage=$this->commnon_del("cms_pages","WHERE page_ID='".$_GET['delete-page']."'");
						$delPage.=$this->commnon_del("cms_gallery","WHERE page_id='".$_GET['delete-page']."'");
						$delPage.=$this->commnon_del("cms_text","WHERE page_ID='".$_GET['delete-page']."'");
						
						echo"<div class='error-message'>
							<h4>Page Deleted successfully!!!!!!!</h4>
							</div>
						<script> window.location.href='".$this->domain_url()."/webdesignbank-admin';</script>";
					}					
				}
		else
		{
			//unset($_POST['updateOrder']);
			//unset($_GET['dele_page']);
		}
	}
	public function search_text()
	{
		if(isset($_POST['search_text']))
		{
			$search=$_POST['search'];
			$sel_search=$this->commonSelect_table("cms_text","text_ID^page_ID^text_type^text^text_order^flag", "WHERE text LIKE '%$search%' ORDER BY page_ID ASC");
			echo"<h4>Searching result</h4>";
			echo"<table class='table table-striped table-dark search-table'><thead>
			<tr><th>Page Id</th><th>Page Name</th><th>Text</th></tr></thead><tbody>";
			$row_num=mysqli_num_rows($sel_search);
			if($row_num==0)
			{
				echo"<tr><td><h4>No Record Found</h4></td></tr>";
				
			}
			else
			{
				while($query_search=mysqli_fetch_array($sel_search))
				{
					
						echo"<tr><td>".$query_search['page_ID']."</td><td>".$query_search['text_type']."</td><td>".$query_search['text']."</td></tr>";						
				}
			}
			echo"</tbody></table>";
		}
	}
	public function add_icons()
	{
		
	}
	
}//End class bracket

$fun_obj=new functions();


$fun_obj->DB_function();
//User Login Functino 
@$error=$fun_obj->userLogin();

//$user_type=userType($session_name);
$fun_obj->subscribe();
$fun_obj->unsbuscribe();


//Text Function
$title=$fun_obj->TextArray(@$page_ID, "title");
$description=$fun_obj->TextArray(@$page_ID, "description");
$keywords=$fun_obj->TextArray(@$page_ID, "keywords");
$span=$fun_obj->TextArray(@$page_ID, "span");
$h1=$fun_obj->TextArray(@$page_ID, "h1");
$h2=$fun_obj->TextArray(@$page_ID, "h2");
$h3=$fun_obj->TextArray(@$page_ID, "h3");
$h4=$fun_obj->TextArray(@$page_ID, "h4");
$p=$fun_obj->TextArray(@$page_ID, "p");
$li=$fun_obj->TextArray(@$page_ID, "li");
$a=$fun_obj->TextArray(@$page_ID, "a");
$caption=$fun_obj->TextArray(@$page_ID, "caption");
$date=$fun_obj->TextArray(@$page_ID, "date");
$by=$fun_obj->TextArray(@$page_ID, "by");
$booking_btn=$fun_obj->TextArray(@$page_ID, "book_now");
$dis=$fun_obj->TextArray(@$page_ID, "dis");
$address=$fun_obj->TextArray(@$page_ID, "address");
$map=$fun_obj->TextArray(@$page_ID, "map");
$strong=$fun_obj->TextArray(@$page_ID, "strong");
$heading=$fun_obj->TextArray(@$page_ID, "heading");
$href=$fun_obj->TextArray(@$page_ID, "href");
$th=$fun_obj->TextArray(@$page_ID, "th");
$td=$fun_obj->TextArray(@$page_ID, "td");



//############## Get Hotel/Motel personal info 
$hotel_array=$fun_obj->GetHotel_info();
//print_r($hotel_address_array);

// Our Apartnents function


$db_links=$fun_obj->db_link_fun();
$website_domain=$fun_obj->domain_url();
$hotel_info_array=$fun_obj->GetHotel_info();
//print_r($hotel_info_array);
?>