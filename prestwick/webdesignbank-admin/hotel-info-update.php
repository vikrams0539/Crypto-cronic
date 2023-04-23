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
							
								<?php 
								$h_name = array();
								$h_address = array();
								$h_phone = array();
								$h_logo1 = array();
								$h_logo2 = array();
								$h_media = array();
								$h_email = array();
								$hotel_book_btn = array();
								$h_map = array();
								$h_year = array();
								
								$sel_hotelinfo= $fun_obj->commonSelect_table("cms_hotel_info","hotel_ID^hotel_name^hotel_address^hotel_phone^header_logo^footer_logo^social_media_icon^hotel_email^hotel_book_btn^hotel_map^hotel_created_year", $where_clause='');
								while($hotel_run=mysqli_fetch_array($sel_hotelinfo))
								{
									$h_name[]=$hotel_run['hotel_name'];
									$h_address[]=$hotel_run['hotel_address'];
									$h_phone[]=$hotel_run['hotel_phone'];
									$h_logo1[]=$hotel_run['header_logo'];
									$h_logo2[]=$hotel_run['footer_logo'];
									$h_media[]=$hotel_run['social_media_icon'];
									$h_email[]=$hotel_run['hotel_email'];
									$hotel_book_btn[]=$hotel_run['hotel_book_btn'];
									
									$h_map[]=$hotel_run['hotel_map'];
									$h_year[]=$hotel_run['hotel_created_year'];
								}
							?>
								<div class='common-form-formation  edit-hotel-info'>
									<h4 class='admin-common-h4 bg-warning pb-2'>Update & Insert the Hotel/Property Detail</h4>
										<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
											<div class='form-group'>
												<label for='hname'>hotel name</label>
								<input type='text' class='form-control' id='hname' name='hotel_name' <?php if(@$h_name[0]!='') { echo" value='".$h_name[0]."'"; } else {?>placeholder='enter hotel name' required <?php } ?> >
												<input type='hidden' name='hotel_id' value=''>
											</div>
											<div class='form-group'>
												<label for='hotel_address'>hotel address</label>
												<input type='text' class='form-control' id='hotel_address' name='hotel_address' <?php if(@$h_address[0]!='') { echo" value='".$h_address[0]."'"; } else {?>placeholder='enter hotel address' required <?php } ?> >
											</div>
											<div class='form-group'>
												<label for='hotel_phone'>hotel phone</label>
												<input type='text' class='form-control' id='hotel_phone' name='hotel_phone' <?php if(@$h_phone[0]!='') { echo" value='".$h_phone[0]."'"; } else {?>placeholder='enter hotel phone' required <?php } ?> >
											</div>
											<div class='form-group'>
												<label for='header_logo'>header logo</label>
												<input type='file' class='form-control' id='header_logo' name='header_logo' <?php if(empty(@$h_logo1[0])) {echo "required";}?>>
												
												<?php if(@$h_logo1[0]!='') {?>
												<input type='hidden' class='form-control' id='header_logo_exist' name='header_logo_exist' value='<?=$h_logo1[0]; ?>'>
												<?php } ?>
												<div id='img-prv'></div>
											</div>
											<div class='form-group'>
												<label for='footer_logo'>footer logo</label>
												<input type='file' class='form-control' id='footer_logo' name='footer_logo' <?php if(empty(@$h_logo2[0])) {echo "required";}?>>
												
												<?php if(@$h_logo2[0]!='') {?>
												<input type='hidden' class='form-control' id='footer_logo_exist' name='footer_logo_exist' value='<?=$h_logo2[0]; ?>'>
												<?php } ?>
											</div>
											<div class='form-group'>
												<label for='social_media_icon'>social media icon</label>
												<?php if(@$h_media[0]!='') { echo"<textarea class='form-control' id='social_media_icon' name='social_media_icon'>".$h_media[0]."</textarea>"; } else {?>
												<textarea class='form-control' id='social_media_icon' name='social_media_icon'  ></textarea>
												<?php } ?>
											</div>
											<div class='form-group'>
												<label for='hotel_email'>hotel email</label>
												<input type='text' class='form-control' id='hotel_email' name='hotel_email' <?php if(@$h_email[0]!='') { echo" value='".$h_email[0]."'"; } else {?>placeholder='enter hotel email' required <?php } ?> >
											</div>
											<div class='form-group'>
												<label for='hotel_book_btn'>booking ID</label>
												<input type="hidden" name="booking_url" value="https://www.bookings247.com.au/booking2/booknow.php?property_id=" readonly>
												<input type='number' class='form-control' id='hotel_book_btn' name='hotel_book_btn' <?php 
												$exp=explode("=",@$hotel_book_btn[0]);
												//print_r($exp);
												
												if(@$hotel_book_btn[0]!='') { echo" value='".$exp[1]."'"; } else {?>placeholder='enter property ID' required <?php } ?> >
											</div>
											<div class='form-group'>
												<label for='hotel_map'>hotel map</label>
												<textarea col="5" rows="7" class='form-control' id='hotel_map' name='hotel_map'><?php if(@$h_map[0]!='') { echo $h_map[0]; } ?></textarea>
											</div>
											<div class='form-group'>
												<label for='hotel_year'>Created Year <small>(&copy; rights)</small></label>
												<input type='text' class='form-control' id='hotel_year' name='hotel_year' <?php if(@$h_year[0]!='') { echo" value='".$h_year[0]."'"; } else {?>placeholder='enter copyright year' required <?php } ?> >
											</div>
											<div class='form-group'>
												<input type='submit' name='hotelinfo' value='Update Info' class='form-control btn btn-success'>
											</div>
										</form>	
								</div>
								
								<?php  echo $fun_obj->addHotelInfo();?>	
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
