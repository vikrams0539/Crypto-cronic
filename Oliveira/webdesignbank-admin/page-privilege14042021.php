<form class="form-horizontal" action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
	<div class="form-group">
			<?php
				$set_privilege=$fun_obj->commonSelect_table("cms_pages",'page_name^page_ID^filename^for_menu^sub_menu_active^disable_dorpdown^gallery_active^gallery_flag^footer_active^img_thumb^secondary_menu^client_access^pdf_access^blog_access',"WHERE page_ID='".$_GET['pageID']."'");

				$privilege_run=mysqli_fetch_array($set_privilege);

				$for_menu=$privilege_run['for_menu'];
				$secondary_menu=$privilege_run['secondary_menu'];
				$sub_menu_active=$privilege_run['sub_menu_active'];
				$disable_dorpdown=$privilege_run['disable_dorpdown'];	
				$gallery_active=$privilege_run['gallery_active'];
				$gallery_flag=$privilege_run['gallery_flag'];
				$img_thumb=$privilege_run['img_thumb'];			
				$footer_active=$privilege_run['footer_active'];	
				$client_access=$privilege_run['client_access'];
				$pdf_access=$privilege_run['pdf_access'];	
				$blog_access=$privilege_run['blog_access'];	

		//================ Check this if home menu page will active or not
				if($for_menu=='active')
				{
					$menu_status="checked";
				}
				else
				{
					$menu_status="unchecked";
				}

		// ============== Check this if dropdown menu existing
				if($sub_menu_active=='y')
				{
					$menu_dropdown_status="checked";
				}
				else
				{
					$menu_dropdown_status="unchecked";
				}

		// ============== Check this if dropdown menu existing
				if($disable_dorpdown=='1')
				{
					$disable_dorpdown_status="checked";
				}
				else
				{
					$disable_dorpdown_status="unchecked";
				}

		// ======== check this if more than home menu existing
				if($secondary_menu==1)
				{
					$second_menu_status="checked";
				}
				else
				{
					$second_menu_status="unchecked";
				}

		// ======== check this if image upload option activated
				if($gallery_active=="y")
				{
					$gallery_active_status="checked";
				}
				else
				{
					$gallery_active_status="unchecked";
				}

		// ======== check this if image will display or not
				if($gallery_flag==1)
				{
					$gallery_flag_status="checked";
				}
				else
				{
					$gallery_flag_status="unchecked";
				}
				
		// ======== check this if image set on thumbnail size
				if($img_thumb==1)
				{
					$gallery_img_tumb_status="checked";
				}
				else
				{
					$gallery_img_tumb_status="unchecked";
				}
				
		// ======== check this if page will display/hide on footer
				if($footer_active==1)
				{
					$footer_active_status="checked";
				}
				else
				{
					$footer_active_status="unchecked";
				}

		// ======== check this if client can Access  this page
				if($client_access==1)
				{
					$client_access_status="checked";
				}
				else
				{
					$client_access_status="unchecked";
				}

				if($pdf_access==1)
				{
					$pdf_access_status="checked";
				}
				else
				{					
					$pdf_access_status="unchecked";
				}
				
				if($blog_access==1)
				{
					$blog_access_status="checked";
				}
				else
				{					
					$blog_access_status="unchecked";
				}
			?>
		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="menu_d_n"  <?=$menu_status;?> />
				<span>This Page Display on Menu? <span>(display on menu).</span></span>			
			</label>				
		</div>
		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="menu_dropdown" <?=$menu_dropdown_status;?> />
				<span>if this page have any parent? then checked. <span>(Dropdown Menu/Menu Flag).</span></span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="dropdown_display" <?=$disable_dorpdown_status;?> />
				<span>display / hide individual tab<span>(Dropdown Menu).</span></span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="second_menu" <?=$second_menu_status;?> />
				<span>if you have more than one Menu, then checked it? <span>(Secondary Menu).</span></span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="gallery_active" <?=$gallery_active_status;?> />
				<span>Check this option, if image upload option is activated <span>(Image Galley).</span></span>			
			</label>			
		</div>		

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="gallery_flag" <?=$gallery_flag_status;?> />
				<span>Show/Hide the images on website page Or Gallery page. <span>(Gallery Flag).</span></span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="gallery_img_tumb" <?=$gallery_img_tumb_status;?> />
				<span>Activate this option if thumbnail image size is existing? <span>(Image Thumb).</span></span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="footer_active" <?=$footer_active_status;?> />
				<span>Show/Hide page on footer  <span>(Footer Active)</span>.</span>			
			</label>			
		</div>

		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="client_access" <?=$client_access_status;?> />
				<span>Show/Hide this page on Client side CMS option <span>(CMS Client Access).</span></span>			
			</label>			
		</div>
		
		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="pdf_access" <?=$pdf_access_status;?> />
				<span>PDF file upload  <span>(PDF Access).</span></span>			
			</label>			
		</div>
		
		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="blog_access" <?=$blog_access_status;?> />
				<span>blog & event  <span>(Blog & Event access)</span></span>			
			</label>			
		</div>
		
		<input type="submit" class="btn-sm" name="set_privilege"  value="save">
	</div>
</form>
<?php
if(isset($_POST['set_privilege']))
{
	$menu_post_value=$_POST['menu_d_n'];
	$dropdown_post_value=$_POST['menu_dropdown'];
	
	$dropdown_display_post_value=$_POST['dropdown_display'];
	
	$second_menu_post_value=$_POST['second_menu'];
	$gallery_active_post_value=$_POST['gallery_active'];
	$gallery_flag_post_value=$_POST['gallery_flag'];
	$img_thumb_post_value=$_POST['gallery_img_tumb'];
	$footer_active_post_value=$_POST['footer_active'];
	$client_access_post_value=$_POST['client_access'];
	$pdf_access_post_value=$_POST['pdf_access'];
	$blog_access_post_value=$_POST['blog_access'];

	if(isset($menu_post_value))
	{
		$menu_checked_value="active";
	}
	else
	{
		$menu_checked_value="deactive";
	}

	if(isset($dropdown_post_value))
	{
		$dropdown_menu_value='y';
	}
	else
	{
		$dropdown_menu_value='n';
	}

	if(isset($dropdown_display_post_value))
	{
		$dropdown_display_value=1;
	}
	else
	{
		$dropdown_display_value=0;
	}

	if(isset($second_menu_post_value))
	{
		$second_menu_value=1;
	}
	else
	{
		$second_menu_value=0;
	}

	if(isset($gallery_active_post_value))
	{
		$gallery_active_value='y';
	}
	else
	{
		$gallery_active_value="n";
	}

	if(isset($gallery_flag_post_value))
	{
		$gallery_flag_value=1;
	}
	else
	{
		$gallery_flag_value=0;
	}

	if(isset($img_thumb_post_value))
	{
		$img_thumb_value=1;
	}
	else
	{
		$img_thumb_value=0;
	}

	if(isset($footer_active_post_value))
	{
		$footer_active_value=1;
	}
	else
	{
		$footer_active_value=0;
	}

	if(isset($client_access_post_value))
	{
		$client_access_value=1;
	}
	else
	{
		$client_access_value=0;
	}

	if(isset($pdf_access_post_value))
	{
		$pdf_access_value=1;
	}
	else
	{
		$pdf_access_value=0;
	}

	if(isset($blog_access_post_value))
	{
		$blog_access_value=1;
	}
	else
	{
		$blog_access_value=0;
	}


	$privilege_update=$fun_obj->common_update("cms_pages",array('for_menu'=>$menu_checked_value,"secondary_menu"=>$second_menu_value,"sub_menu_active"=>$dropdown_menu_value,'disable_dorpdown'=>$dropdown_display_value, "gallery_active"=>$gallery_active_value,"gallery_flag"=>$gallery_flag_value,"img_thumb"=>$img_thumb_value,"footer_active"=>$footer_active_value,"client_access"=>$client_access_value,"pdf_access"=>$pdf_access_value,"blog_access"=>$blog_access_value),"WHERE page_ID='".$_GET['pageID']."'");

	if($privilege_update)
	{
		echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><p>Update Successfully!!!!!!</p></div><meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
	}
}

?>