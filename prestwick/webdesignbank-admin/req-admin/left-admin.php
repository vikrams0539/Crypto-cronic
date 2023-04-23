<div class='list-group admin-left'>
	<?php 
	$display_block_text = "";
	$display_block_img ="";
	$issetPageID = "";
	$issetGalleryID = "";

	if($usertype['type']!=='admin')
			{ 
				$li_hide="d-none";
			}
			
			if($admin_url==$website_domain."CMS/") 
			{
				$li="li_active"; 
			}
			else
			{
				$li="";
			}
			if(isset($_GET['pageID']))
				{
					$issetPageID= $_GET['pageID'];
					
					$display_block_text="style=display:block";
				}
				if(isset($_GET['upload_img']))
				{
					$issetGalleryID=$_GET['upload_img'];
					$display_block_img="style=display:block";
				}
			?>
	
	<ul>
		<li class='<?php $li_hide;?> default-active' data-index-filter="dashboard">
			<h4 class='<?=$li_hide; ?>'><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;dashboard</h4>
		</li>
		<div class='child-index dashboard  <?php $li_hide;?>'>
			<ol type='0'>
				<li class="<?=$li; ?>"><a href="<?=$admin_url;?>"><i class="fa fa-cog fa-spin fa-1x fa-fw" aria-hidden="true"></i>&nbsp;dashboard</a></li>
			</ol>
		</div>
		<li data-index-filter="index">
			<h4><i class='fa fa-file-text-o' aria-hidden='true'></i>&nbsp;page index</h4>		
		</li>
		<div class='child-index index' <?=$display_block_text;?>>
			<ol type='1'>				
				<?php
				$page_hide="";
				$client_accessArray=array();
					$table_index=$fun_obj->commonSelect_table('cms_pages','page_ID^page_name^filename^client_access',"WHERE flag=''");
					while($run_table=mysqli_fetch_array($table_index,MYSQLI_ASSOC))
					{
						$pageID=$run_table['page_ID'];						
						$client_access=$run_table['client_access'];
						$client_accessArray=$run_table['client_access'];
						
						if($client_access==0 && $usertype['type']=='client')
						{
							$page_hide="d-none";
						}
						else
						{
							$page_hide="";
						}
							if($pageID===$issetPageID)
							{
								$li_active="li-active";
							}
							else
							{
								$li_active='';
							}
								
							if($pageID==1)
							{
								$page__name="Home Page";
							}
							else
							{
								$page__name=$run_table['page_name'];
							}
							
						echo"<li class='$li_active $page_hide'><a href='".$admin_url."index.php?pageID=$pageID'>".$page__name."</a>";
						if($usertype['type']=='admin')
						{
							echo"<span data-edit='$pageID'>edit</span>";
						}
						$sub_menu=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name^filename^page_order^for_menu^flag^client_access","WHERE flag='$pageID' AND sub_menu_active='y'");
							echo"<ul>";
						
							while($sub_run=mysqli_fetch_array($sub_menu))
								{
									$sub_pageid=$sub_run['page_ID'];
								$client_access_child=$sub_run['client_access'];
								
						if($client_access_child==0 && $usertype['type']=='client')
						{
							$page_hide="d-none";
						}
						else
						{
							$page_hide="";
						}
						
									if($sub_run['page_ID']===$issetPageID)
									{
										$li_active="li-active";
									}
									else
									{
										$li_active='';
									}
									
									echo"<li class='$li_active $page_hide'><a href='".$admin_url."index.php?pageID=".$sub_run['page_ID']."'>".$sub_run['page_name']."</a>";
									if($usertype['type']=='admin')
										{
											echo"<span data-edit='".$sub_run['page_ID']."'>edit</span>";
										}
										
									$sub_sub_menu=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name^filename^page_order^for_menu^flag^client_access","WHERE flag='$sub_pageid' AND sub_menu_active='y'");
									
									echo"
									<ul>";
										while($sub_sub_menu_run=mysqli_fetch_array($sub_sub_menu))
										{
											$sub_sub_pageid=$sub_sub_menu_run['page_ID'];
											$client_access_child_child=$sub_sub_menu_run['client_access'];
											
									if($client_access_child_child==0 && $usertype['type']=='client')
									{
										$page_hide="d-none";
									}
									else
									{
										$page_hide="";
									}
											if($sub_sub_pageid===$issetPageID)
											{
												$li_active="li-active";
											}
											else
											{
												$li_active='';
											}
											if($sub_sub_pageid!='')
											{
											echo"<li class='$li_active $page_hide'><a href='".$admin_url."index.php?pageID=".$sub_sub_menu_run['page_ID']."'>".$sub_sub_menu_run['page_name']."</a></li>";
											}
										}
									echo"</ul>
									</li>";
								
								
								}
								
							echo"</ul>";
						echo"</li>";
					}
				?>
			</ol>
		</div>
		<li data-index-filter="gallery">
			<h4><i class='fa fa-file-text-o' aria-hidden='true'></i>&nbsp;upload image</h4>
		</li> 
		<div class='child-index gallery' <?=$display_block_img;?>>
			<ol type='2'>					
					 <?php			 
					 $galleryPage=$fun_obj->commonSelect_table('cms_pages','page_ID^page_name^filename',"WHERE gallery_active='y' AND sub_menu_active!='y'");
					 while($run_galPage=mysqli_fetch_array($galleryPage))
					 {
						 if($run_galPage['page_ID']===$issetGalleryID)
							{
								$li_active="li-active";
							}
						else
							{
								$li_active='';
							}
						 $ID=$run_galPage['page_ID'];
						 if($ID==1)
						 {
							  $page_name="Home Page";
						 }
						 else
						 {
							$page_name=$run_galPage['page_name'];
						 }
						if(strlen($page_name)>22)
						{
							$page_name=substr($page_name,0,22)."...";
						}
						 echo"
						 <li class='$li_active'>
						<a href='".$admin_url."upload-img.php?upload_img=$ID'>".$page_name."</a>
						&emsp;<a class='btn-sm btn-danger text-white' href='".$admin_url."upload-img.php?upload_img=$ID'>Upload/Del</a>";
						
						$gallery_cat=$fun_obj->commonSelect_table('cms_pages','page_ID^page_name^filename',"WHERE sub_menu_active='y' and flag='$ID'");
						echo"<ul>";
						while($gallery_cat_run=mysqli_fetch_array($gallery_cat))
						{
							if($gallery_cat_run['page_ID']===$issetGalleryID)
							{
								$li_active="li-active";
							}
						else
							{
								$li_active='';
							}
							
						$cat_pagename=$gallery_cat_run['page_name'];
						$cat_pagename_id=$gallery_cat_run['page_ID'];
						
						if(strlen($cat_pagename)>22)
						{
							$cat_pagename=substr($cat_pagename,0,22)."...";
						}
							
							

							echo"<li class='$li_active'>
						<a href='".$admin_url."upload-img.php?upload_img=$cat_pagename_id'>".$cat_pagename."</a>
						&emsp;";
						
						$gallery_secndli=$fun_obj->commonSelect_table('cms_pages','page_ID^page_name^filename',"WHERE flag='$cat_pagename_id'");
							echo"<ul>";
							while($gallery_secndli_run=mysqli_fetch_array($gallery_secndli))
							{
								$secnd_li_pageid=$gallery_secndli_run['page_ID'];
								$secnd_li_pagename=$gallery_secndli_run['page_name'];
								
								echo"<li><a href='".$admin_url."upload-img.php?upload_img=$secnd_li_pageid'>".$secnd_li_pagename."</a>&emsp;</li>";
							}
							echo"</ul>";
						echo"</li>";
						}
						echo"</ul>";
					echo"</li>";
					 }
					 ?>
			</ol>
		</div>	
		
		<li data-index-filter="miscellaneous" class="<?php $li_hide?>">
			<h4><i class='fa fa-file-text-o' aria-hidden='true'></i>&nbsp;miscellaneous</h4>
		</li> 
		<div class='child-index miscellaneous' <?php $display_block_img;?>>
			<ol type='2'>					
				<li class='<?=$li_hide?>'>
					<a href="miscellaneouse.php">upload BG image</a>
				</li>				
				<li class='<?=$li_hide?>'>
					<a href="add-social-media.php">add media links</a>
				</li>				
				<li class='pdf_upload'>
					<a href="pdf-upload.php">upload PDF file</a>
				</li>
				<li class='<?=$li_active; ?>'><a href='blog-page.php' class='bg-success pt-2 pb-2 pl-2 pr-2'>add/del blog</a></li>
			</ol>
		</div>		
	</ul>
	
</div>	  
