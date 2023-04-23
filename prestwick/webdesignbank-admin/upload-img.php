<?php
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');
$page_ID=0;

?>
</head>
<body> 
	<main>
    	<div id="main-wrapper">
        	<?php include('req-admin/header-admin.php'); ?>
        </div><!--end main-wrapper-->
  		<section>
        	<div class="text-formation position-relative admin-container-width position-relative">            	
            	<div class='container-fluid'>
                	<div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
							<?php include('req-admin/left-admin.php');  ?>
                        </div><!--end col-4-->
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-xl-10">
                        	<div class="text-typography admin-form">
							<?php
							if(isset($_GET['upload_img']))
											{
												echo"<h4>you can select multiple images at a time</h4>";
												$sel_gallery=$fun_obj->commonSelect_table("cms_pages",'page_ID^page_name^gallery_active',"WHERE page_ID='".$_GET['upload_img']."' AND gallery_active='y'");
												//var_dump($sel_gallery);
												while($run_gallery=mysqli_fetch_array($sel_gallery))
												{
													$gallery_id=$run_gallery['page_ID'];
													
													echo"
													<div class='image-upload-form'>
														<form class='form-inline' method='post' enctype='multipart/form-data' id='formupload'>";
														echo"<div class='form-group'>";
														echo"<label class='label-control' for='page_".$run_gallery['page_ID']."'><span>".$run_gallery['page_name']."</span> select images</label>";
														
							//----------- If some pages use submenu like li>ul>ul---------------//
															/*if($run_gallery['page_ID']==9)
															{
																
																echo"<select class='form-control' id='roomname' name='roomname' required>
																	<option value=''>--select--</option>
																	<option value='1-queen-bedroom-room'>1 QUEEN BEDROOM</option>
																	<option value='1-queen-with-bunk'>1 QUEEN WITH BUNK BEDS</option>
																	<option value='2-queen-bedroom'>2 QUEEN BEDROOM</option>
																</select>";
															}*/
														echo"<input type='file' id='choose_img' name='filesname[]' class='form-control filesname' accept='image/*'  multiple required='required'>
														<input type='hidden' id='Page_type' name='pagetype' value='".trim($run_gallery['page_name'])."' />
														
														<input type='hidden' id='current_Page_ID' value='".trim($run_gallery['page_ID'])."' />
														
														<div class='progress uploading-bar'>
															<div class='progress-bar progress-bar-success progress-bar-striped upload-progress' role='progressbar'
															aria-valuenow='0' aria-valuemin='0' aria-valuemax='0'></div>
														</div>
														<div class='progress-status'></div>
														
														<input type='submit' id='submit' name='imageupload' value='upload'>";
														echo"</div>";
														
														echo"</form>
													</div>
													";													
												
												}
												echo"<br><p><b>NOTE:-</b> <code>1). image size not more than 1MB.</code></p>";
												
												echo"<div class='message_box'></div>";
												echo"<div id='preview'></div>";												
												echo $fun_obj->Upload_img();
												
												echo"<h4>images update panel (You can drag and drop the row to change page order)</h4>";
												$getImages=$fun_obj->commonSelect_table("cms_gallery","gallery_id^page_ID^pagename^small_img^img_order^flag^img_description^img_for_thumb^img_for_slider","WHERE page_ID='".$_GET['upload_img']."' ORDER BY img_order ASC");
												$sr_no=1;
												
												
												$pannel_hide="";
												if($usertype['type']!=='admin')
												{
													$pannel_hide="d-none";
												}

												echo"<form id='slider_index' method='post' action='".$_SERVER['REQUEST_URI']."'>
												<div class='gallery_order_block'></div><table class='table gallery-table'>
												<thead>
													<tr><th>Sr No.</th><th>page name</th><th>Activate Thumb img/slider img</th><th>image/Replace with</th><th>img order</th><th>display</th><th class='$pannel_hide'>Delete image</th><th class='$pannel_hide'>delete all&nbsp;<input type='checkbox' name='all' id='selectall'/><button type='button' id='delall' disabled>delete all</button></th></tr>
													</thead>
													<tbody class='gallery_row' data-galleryID='$gallery_id'>";
													$gallery_num_rows=mysqli_num_rows($getImages);
													
											if($gallery_num_rows >0)
											{
												while($run_getimg=mysqli_fetch_array($getImages))
												{
													$trimPagename=strtolower(trim($run_getimg['pagename']));
													$trimPagename=str_replace(" ","-",$trimPagename);
													
													$img_description=$run_getimg['img_description'];
													if(!empty($img_description))
													{
														$desc=$img_description;
													}
													else
													{
														$desc="";
													}
													
													if($run_getimg['flag']==1)
													{
														$dispable_y='d-none';
														$dispable_n='';
													}
													else
													{
														$dispable_n='d-none';
														$dispable_y='';						
													}
													
													$thumb_value=$run_getimg['img_for_thumb'];
													
													if($thumb_value==1)
													{
														$radio_active="checked";
													}
													else
													{
														$radio_active="unchecked";
													}
													
													$slider_value=$run_getimg['img_for_slider'];
													
													if($slider_value==1)
													{
														$slider_checked="checked";
													}
													else
													{
														$slider_checked="unchecked";
													}
												
												
													$img_gallery_id=$run_getimg['gallery_id'];
													
													$img_gallery_order=$run_getimg['img_order'];
													
													echo"<tr data-galleryid='$img_gallery_id' data-galleryindex='$img_gallery_order'>
													<td>$sr_no</td>
													<td>".$run_getimg['pagename']."</td>										
													<td>";
													
													/* <strong>Set Thumb img&nbsp:-&nbsp;</strong><input type='radio' class='img_for_thumb_$img_gallery_id' name='img_for_thumb[]' data-thumid='$img_gallery_id' $radio_active value='$thumb_value' id='img_for_thumb_$img_gallery_id' /><br> */
													
													echo"<strong>Set Signature img&nbsp:-&nbsp;</strong><input type='checkbox' class='img_for_slider' name='img_for_slider$img_gallery_id' data-sliderID='$img_gallery_id' $slider_checked  value='$slider_value' />
													<input type='hidden' name='ids[]' value='$img_gallery_id' />
													<div class='image_result_$img_gallery_id'></div>
													</td>
													
													<td class='gallery__img'>
													<img src='".$website_domain."images/".$trimPagename."/".$run_getimg['small_img']."'/>
													
													<textarea width='100%' data-desc='".$run_getimg['gallery_id']."' placeholder='Enter Description' id='desc_".$run_getimg['gallery_id']."'>$desc</textarea>
													
													
													<span class='replace__img btn-sm btn-primary' data-imgChange='".$run_getimg['gallery_id']."'>change image</span>
													
													<span class='save-desc btn-sm btn-success' data-save-desc='".$run_getimg['gallery_id']."'>save description</span>									
													
													<div class='desc-update".$run_getimg['gallery_id']."'></div>";
													
													list($width,$height)=getimagesize($website_domain."images/".$trimPagename."/".$run_getimg['small_img']);
													echo"<code style='display:block; text-align: center; margin: 0.5rem auto;font-weight: 600; font-size: 1rem; text-transform: capitalize;'>image dimensions= ".$width."X".$height."px</code>";
													
													
													echo"</td>
													<td class='change__order'><input type='text' value='".$run_getimg['img_order']."' name='change_order_".$run_getimg['gallery_id']."' id='".$run_getimg['gallery_id']."' /></td>
													<td>
													<button class='btn-sm btn-success $dispable_y' data-active='1' id='".$run_getimg['gallery_id']."'>Yes</button>
													<button class='btn-sm btn-danger $dispable_n' data-active='0' id='".$run_getimg['gallery_id']."'>No</button>
													</td>
													<td class='$pannel_hide'><a href='index.php?del_img=".$run_getimg['gallery_id']."' class='btn-sm btn-danger remove_img' data-del='".$run_getimg['gallery_id']."'><i class='fa fa-trash-o'></i>&nbsp;Delete</a></td>
													<td class='$pannel_hide'><input type='checkbox' name='checkall' class='child_select' value='".$img_gallery_id."' /></td>
													</tr>
													";
													$sr_no++;
												}
												echo"<tr><td></td><td>Click to Update signature img</td><td><input type='submit' name='set_img_slider' class='btn btn-dark' value='Update' /></td></tr>
												</form>";												
												echo"</tbody> </table>";
												echo"<div class='replace__img__outer__wrap'><div class='replace__img__wrap'>
														<span>X</span>
														<div class='upload-form'>
														
														</div>
													</div> 
													</div>";//======== replace outer wrap image  block========//
												echo"<div class='imgactivated'></div>
												<div class='img-order'></div>";
													}
											}
											
											
											?>
                            </div><!--end text-typography-->							
                        </div><!--end col-12-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end text-formation-->
        </section>
    </main>
    <?php include('req-admin/footer-admin.php'); ?>
</body>
</html>
<?php
if(isset($_POST['set_img_slider']))
{
	//print_r($_POST);
	$post_tmpVal="";
	$set_value="";
	foreach($_POST['ids'] as $ids)
	{		
		$post_tmpVal="img_for_slider".$ids;
		
		$post_orVal=$_POST[$post_tmpVal];
		if(isset($_POST[$post_tmpVal]))
		{
			$set_value=1;
		}
		else
		{
			$set_value=0;
		}
		
		$sliderIMG=$fun_obj->common_update("cms_gallery",array("img_for_slider"=>$set_value), "WHERE gallery_id='$ids'");
		
		if($sliderIMG)
		{
			$slider_mess_pdf="<script>alert('Update Successfully!!!!!!');</script> <meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."'>";
		}
		else
		{
			$slider_mess_pdf="<script>alert('Status Fail');</script><meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."'>";
		}
	}
	echo $slider_mess_pdf;
}

?>
