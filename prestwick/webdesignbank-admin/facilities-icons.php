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
                        	<div class="text-typography">
							
								
			<!--############## Upload And Update Hotel Facilities Icon's ####################-->
								<div class=''>
									
										<div class='facility-icon-wrap'>
											<h4 class='admin-common-h4'>Upload And Update Hotel Facilities Icon's</h4>
											<hr>
											<form action="<?=$_SERVER['PHP_SELF']; ?>" method='post' enctype="multipart/form-data">
												<div class='input-field-form facility-icon'>		
													<article>
														<label for="tag">Icon Name</label>
														<input type='text' name='icon_name[]' required >
														<input type='file' name='icon_img[]' >
														<button type='button' class='btn btn-info add-more-icon'>add more</button>
													</article>											
												</div>
												<input type='submit' name='add-icon' value='save' class='btn btn-success'>
											</form>	
											<hr>
											
											<table class="table table-striped assignpage">
												<h4  class='admin-common-h4'> Hotel/Room Amenities List</h4>
                                                <thead>
                                                	<tr><th>SNo.</th><th>Facility ID</th><th>Facility Name</th><th>Alternate Name</th><th>Image</th><th>Assigned Page ID's</th><th>icon order</th><th>delete</th></tr>
													<tr class='icon__result'></tr>
                                                </thead>
												<?php 
												$icon_list=$fun_obj->commonSelect_table("cms_hotel_facility_icons","hotel_facility_id^facility_name^facility_page_id^facility_img^facility_alt_name^facility_icon_order^flag","WHERE hotel_facility_id!='' order by facility_icon_order ASC");
												
												//echo"<tbody>";
												
												$icon_srno=1;
												while($run_icon=mysqli_fetch_array($icon_list))
												{
													$hotel_facility_id=$run_icon['hotel_facility_id'];
													$facility_name=$run_icon['facility_name'];
													$facility_page_id=$run_icon['facility_page_id'];
													$facility_icon=$run_icon['facility_img'];
													$facility_flag=$run_icon['flag'];
													$facility_alt_name=$run_icon['facility_alt_name'];
													$facility_iconOrder=$run_icon['facility_icon_order'];
													
													if(!empty($facility_alt_name))
													{
														$alt_name=$facility_alt_name;
													}
													else
													{
														$alt_name="";
													}
													$facility_page_id_Array=explode(",",$facility_page_id);
													
								//----------- Assign Page id for hotel facility icons------------//
													echo"<tr data-iconIndex='$facility_iconOrder' data-iconID='$hotel_facility_id' data-assign-id='assign-$hotel_facility_id'><td>$icon_srno</td><td>$hotel_facility_id</td><td>$facility_name</td>
													<td class='td-alt-name'>
													
													<span id='result-assign-$hotel_facility_id'></span>
													<form method='post' action='' class='facility-icon-name'>";
														echo"<div class='form-group'>
													<textarea name='textname-$hotel_facility_id' class='form-control assignpage' id='textname-$hotel_facility_id' placeholder='Enter Name'>$alt_name</textarea>
													
													<input type='hidden' value='$hotel_facility_id' id='icon_alt_id_$hotel_facility_id' />
													<span id='icon_alt_name_$hotel_facility_id' class='btn-sm btn-info icon_alt_name' data-icon-altname='$hotel_facility_id'>save</span>
													</div>
													<div class='desc-update$hotel_facility_id'></div>		
													</form></td><td><img src='".$website_domain."images/facility-img-icons/".$facility_icon."'  />
													
													</td>
													<td>";
												//------ Unassign Page ID if not required------
												
													echo $facility_page_id; 
													
													echo"</td>
													<td class='icon__order'><input type='text' value='$facility_iconOrder' id='icon_order$hotel_facility_id' data-iconorder='$hotel_facility_id' />
													<div id='result$hotel_facility_id'></div>
													</td>
													<td class='icon_del icondel_$hotel_facility_id' data-delicon='$hotel_facility_id' data-iconimg-name='$facility_icon'><i class='fa fa-trash' aria-hidden='true'></i></td>
													 
													</tr>";
													
						//----------- End Assign Page id for hotel facility icons------------//
													
													$icon_srno++; 
												}
												//echo"</tbody>";
												?>
													
											</table>
										</div><!--end facility-icon-wrap-->										
									</div>
								<?php  echo $fun_obj->hotel_facility_icon();?>
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
