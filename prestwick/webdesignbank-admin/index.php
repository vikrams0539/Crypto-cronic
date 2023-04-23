<?php
//include('../req/common-variables.php');
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');
$page_ID=0;
$pageID = '';
?>
</head>
<body> 
	<main>
    	<div id="main-wrapper">
        	<?php include('req-admin/header-admin.php'); ?>
        </div><!--end main-wrapper-->
  		<?php //include('req/slider.php'); 
		$fun_obj->uploadRoomimg(); ?>
        
  		<section>
        	<div class="text-formation position-relative admin-container-width position-relative">           	
                <!-- Facility Icons List block -->
            	<div class='container-fluid'>
                	<div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
							<?php include('req-admin/left-admin.php');  ?>
                        </div><!--end col-4-->
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-xl-10">
                        	<div class="text-typography">
								<?php 
									$fun_obj->search_text();
								?>
								<!--########### add new Page box ###############-->
									<div class='common-form-formation addpage-name'>
										<div class='common-form-close'><span>X</span></div>
										<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">
											<div class='form-group'>
												<label for='name'>page name</label>
												<input type='text' class='form-control' id='pname' name='P_name' placeholder='enter page name' required>
											</div>
											<div class='form-group'>
												<label for='name'>url page</label>
												<input type='text' class='form-control' name='URL_name' id='url' value="" readonly>
												<input type='hidden' name='P_order' id='url' value="1">
											</div>
											<div class='form-group'>
												<input type='submit' name='Add_P' class='form-control btn btn-success'>
											</div>
										</form>	
									</div>
									<?php $fun_obj->AddNewPage();?>
								
					<!--##############  page rename Dialog boxBox #########-->
									<div class='common-form-formation editpage-name'></div>
										<?php $fun_obj->rename_url_page($pageID);	?>                                        
								
					<!--##############  Create New user boxBox #########-->
									<div class='common-form-formation create_user'>
										<div class='common-form-close'><span>X</span></div>
									
										<form method='post' action='<?=$_SERVER['PHP_SELF'];?>' >
											<div class='form-group'>
												<input type='text' class='form-control' name='new_user' placeholder='new username' autocomplete='off' required='required' />						
											</div>
											<div class='form-group'>
												<input type='password' id="new_user_password" class='form-control' name='new_pass' placeholder='password' autocomplete='off' required='required' /><span class="i_toggle" data-toggle="#new_user_password"><i class="fa fa-eye" aria-hidden="true"></i></span>
												<input type='hidden' name='user_type' value='client' />
											</div>
											<div class='form-group'>
												<input type='password' id="confirm_user_password" class='form-control' name='confirm_pass' placeholder='retype password' autocomplete='off' required='required' /><span data-toggle="#confirm_user_password" class="i_toggle"><i class="fa fa-eye" aria-hidden="true"></i></span>
												
											</div>
											<div class='form-group'>
												<input type='submit' class='form-control btn-sm btn-success' name='add_newuser' value='add user'/>
												<input type='reset'  class='form-control btn-sm btn-warning' value='reset fields'/>
											</div>
										</form>
									</div>
										<?php $fun_obj->create_new_user(); ?>
								
					<!--############## Add page tag Block ####################-->
								<div class='common-form-formation  add-tag-block'>
									<div class='common-form-close'><span>X</span></div>
									<form action="<?=$_SERVER['PHP_SELF']; ?>" method='post'>
										<div class='input-field-form'>
											<p><span>example:-</span> h1, h2, p, a, span, etc.</p>
												<input type='hidden' name='p_ID' value='<?=$_GET['pageID']?>' />
											<article>
												<label for="tag">tag name</label>
												<input type='text' name='tag[]' >
												<button type='button' class='btn btn-info add-more'>add more</button>
											</article>											
										</div>
										<input type='submit' name='add-tag' value='save' class='btn btn-success'>
									</form>										
								</div>
								<?php $fun_obj->addMoreTags();?>
								
					<!--############## Edit text type Block #######################-->			
								<div class='common-form-formation  edit-text-type'>	
								</div>
								<?php $fun_obj->editTextType();?>
					<!--############## Edit Hotel Information #######################-->
							
								
					
							<?php echo $fun_obj->changePageOrder();?>
					<!--############## Assign page name to accommodation page  Block #######################-->			
								<div class='common-form-formation  assign-pagename-acc'>
									<div class='common-form-close'><span>X</span></div>
									<h4>assign child page name under parent</h4>
									<?php
										$selActual_page=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name^filename^page_order^sub_menu_active^flag","");
										
										while($runActual_page=mysqli_fetch_array($selActual_page))
										{
											$assignIDs[]=$runActual_page['page_ID'];
											$assignPAge_name[]=$runActual_page['page_name'];
											$flag[]=$runActual_page['flag'];
											$sub_menu_active[]=$runActual_page['sub_menu_active'];
											
										}
										
										echo"<form action='".$_SERVER['PHP_SELF']."' method='post'><table class='table table-light'>
										<tr><th><h4>select parent page name</h4>
										<ul>";
										for($index=0; $index<count($assignIDs); $index++)
										{
											//if($sub_menu_active[$index]!='y')
											//{
											echo"<li><input type='radio' name='parentname' value='".$assignIDs[$index]."' required>&nbsp;<span>".$assignPAge_name[$index]."</span>
											
											</li>";
											//}
										}
										echo"</ul>
										</th>
										<th><h4>add child page under parent page</h4>
										<ul>";
										for($index2=0; $index2<count($assignIDs); $index2++)
										{
											// Get parent page name assigned child page name
												$selparnt_page=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name","where page_ID='".$flag[$index2]."'");
												$prent_feth=mysqli_fetch_array($selparnt_page);
											
											if($flag[$index2]!=='')
											{
												$disabled='disabled';
												$unassign="<a href='".$admin_url."index.php?unassign=".$assignIDs[$index2]."'>unassign</a> (Assigned to <b>".$prent_feth['page_name']."</b>)";
												
											}
											else
											{
												$disabled="";
												$unassign="";
											}
											echo"<li><input type='checkbox' name='child_".$assignIDs[$index2]."' value='".$assignIDs[$index2]."' $disabled />&nbsp;<span>".$assignPAge_name[$index2]."</span>
											
											&emsp;$unassign</li>";
										}
										echo"</ul></th>";
										echo"</tr>
										<tr><td><input type='submit' name='assignpage' value='assign' class='btn-sm btn-warning'></td></tr>
										</table>										
										</form>";
										$_SESSION['assign_session_id']=$assignIDs;
									?>
								</div>
								<?php echo $fun_obj->assignPage(); $fun_obj->unassignPage();?>
								
					<!--############## page index array values ####################-->								
								<div class="form-panel admin-form">
                                	<?php
									if(@$_GET['pageID']!='')
										{
											if(isset($_GET['pageID']))
											{
												$pagename=$fun_obj->commonSelect_table("cms_pages",'page_name^page_ID^filename^for_menu^gallery_active^gallery_flag^footer_active^img_thumb^secondary_menu',$where_clause='where page_ID="'.$_GET['pageID'].'"');
												//var_dump($pagename);
												$fetch=mysqli_fetch_array($pagename);
												$p_ID=$fetch['page_ID'];

					//=========== User Privilege Block ===============
												if(isset($_GET['pageID']) && $usertype['type']=='admin'){
												?>
												<div class="page_privilege">
													<button typ="button" class="privilege_btn">page privileges</button>
													<div class="privilege_block">
														<?php include_once("page-privilege14042021.php"); ?>
													</div><!--end privilege_block-->

													<button typ="button" class="page_facility_btn">add facility icons</button>
													<?php include("page-icons-list.php");?>
												</div><!--end page privilege------------->
												<?php
												echo"<h4>".$fetch['page_name']."<span class='btn btn-primary'>add tags</span></h4>
												"; 
												}
								//########### Get for menu name Active or Deactive status
												
												
						//--------##############  For Footer menu active menu Active Or Deactive ###########----------*/
												
						//--------##############  Secondary menu active menu Active Or Deactive ###########----------*/
							
												
//--------##############  For Gallery images page Active Or Deactive #############------------------*/
							
												
//--------##############  For Gallery images For thumb image #############------------------*/
							
							
							
//-------######### Active page name for galler or upload images ################--------------//
												
							
											if($usertype['type']=='client')
											{												
											echo"<h4>".$fetch['page_name']."</h4>"; 
											}
													
												$textUpdate=$fun_obj->commonSelect_table("cms_text",'text_id^text^text_type^text_order',$where_clause='where page_ID="'.$_GET['pageID'].'" ORDER BY text_order ASC');
												?>
                                                <?php if($usertype['type']=='admin'){ ?>
												<!--<input type='checkbox' id='checkall'><span>Select All</span>-->
												
												<?php } ?>
												
												<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post" >
												
											<?php
												$textArray=array();
												$textArrayIndex=0;
												$num_rows=mysqli_num_rows($textUpdate);
												
												if($usertype['type']=='client')
												{
												}
												 $counter=1;
												while($run=mysqli_fetch_array($textUpdate))
												{
													if($usertype['type']=='admin')
													{
														$text=$run['text'];
													}
													else
													{
														if($run['text']!='')
														{
															$text=$run['text'];
														}
														else
														{
															$text="";
														}
													}
													$text_type=$run['text_type'];
													//$text=$run['text'];	
													$text_id=$run['text_id'];
													$text_order=$run['text_order'];
													
													if($usertype['type']=='admin')
													{	
														$checkBox="<span class='edit_tags checkitem' title='Edit Tag' data-checkbox='$text_id'><i class='fa fa-pencil-square'></i>&nbsp;</span><input type='hidden' name='check_$text_id' class='checkitem' data-checkbox='$text_id'>&nbsp;";
														
														//============= Delete unwanted tags 
														$delete_tag="<span class='delete_tags' title='Delete tag' data-tagid='$text_id'><i class='fa fa-trash-o'></i>&nbsp;</span><div id='del_tag_rusult_$text_id'></div>";
													
													if($text_type=='li' or $text_type=='a')
													{
														$textArray[$textArrayIndex]=$text_id;
														$textArrayIndex=$textArrayIndex+1;
														
														//$textArray[$textArrayIndex]=
														echo"<div class='form-group'>
														<div class='row'>
														<label class='col-2' for='type_$text_id'><b>($counter)</b>&nbsp;$checkBox <span>$text_type</span>&nbsp;$delete_tag</label>
														<div class='col-8'>
														<input type='text' id='type_$text_id' name='text_$text_id' class='form-control' value='$text' />
														</div>
														<div class='col-2'>
														<input type='text' id='type_order_$text_id' name='text_order_$text_id' class='form-control' value='$text_order' />
														</div>
														</div>
														</div>";														
													}
													else
													{
														$textArray[$textArrayIndex]=$text_id;
														$textArrayIndex=$textArrayIndex+1;
														
														echo"<div class='form-group'>
														<div class='row'>
														<label class='col-2' for='type_$text_id'><b>($counter)</b>&nbsp;$checkBox <span>$text_type</span>&nbsp;$delete_tag</label>
														<div class='col-8'>
														<textarea cols='5' rows='5' id='type_$text_id' name='text_$text_id' class='form-control'>$text</textarea>
														</div>
														<div class='col-2'>
														<input type='text' id='type_order_$text_id' name='text_order_$text_id' class='form-control' value='$text_order' />
														</div>
														</div>
														</div>";
													}
													}
							//============== This is for client if any field is empty ==================//
												else
													{
														if($run['text']!='')
														{
													if($text_type=='li' or $text_type=='a')
													{
														$textArray[$textArrayIndex]=$text_id;
														$textArrayIndex=$textArrayIndex+1;
														
														//$textArray[$textArrayIndex]=
														echo"<div class='form-group'>
														<div class='row'>
														<label class='col-2' for='type_$text_id'>$checkBox $text_type</label>
														<div class='col-8'>
														<input type='text' id='type_$text_id' name='text_$text_id' class='form-control' value='$text' />
														</div>
														<div class='col-2'>
														<input type='text' id='type_order_$text_id' name='text_order_$text_id' class='form-control' value='$text_order' />
														</div>
														</div>
														</div>";														
													}
													else
													{
														$textArray[$textArrayIndex]=$text_id;
														$textArrayIndex=$textArrayIndex+1;
														
														echo"<div class='form-group'>
														<div class='row'>
														<label class='col-2' for='type_$text_id'>".@$checkBox." $text_type
														</label>
														<div class='col-8'>
														<textarea cols='5' rows='5' id='type_$text_id' name='text_$text_id' class='form-control'>$text</textarea>
														</div>
														<div class='col-2'>
														<input type='text' id='type_order_$text_id' name='text_order_$text_id' class='form-control' value='$text_order' />
														</div>
														</div>
														</div>";
													}
														} // end if
													} // end else
													$counter++;
												} // end while
												
											?>     
										<input type="hidden" name="current_pageID" value="<?=$_GET['pageID']?>">
										<input type="submit" name="save" value='Save' class="btn btn-info common-btn"> 
                                                </form>
                                            <?php
											}
											//return $textArray;
											//print_r($textArray);
											$_SESSION['textID']=$textArray;
											
											
										}
																				
			//--------###################### Upload Image Function #################---------//
										
										elseif(@$_GET['update']==1)
										{
											$message="<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><h4>Updated successfully!!!!!</h4></div>";
											
										}
										elseif(@$_GET['error']==1)
										{
											$message="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><h4>Error in update-------</h4></div>";
											
										}
										else
										{
											if($usertype['type']!=='admin')
											{
												$message="<div class='alert alert-info'><h4>please select page name</h4></div>";
											}
											else
											{
												include('req-admin/dashboard-content.php');
											}
										}									
									?>                              	
                                    
                                    <?= @$message;?>
									<?php 
										$fun_obj->updateText();
										//$fun_obj->uploadRoomimg(); //upload images for rooms etc.
										
									?>									
                                </div><!--end form-panel-->
                            </div><!--end text-typography-->
                        </div><!--end col-12-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end text-formation-->
        </section>
    </main>
    
    <?php //include('req/booking-widget.php'); ?>
    <?php include('req-admin/footer-admin.php'); ?>
</body>
</html>
