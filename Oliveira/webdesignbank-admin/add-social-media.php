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
  		<?php //include('req/slider.php'); 
		$fun_obj->uploadRoomimg(); ?>
        
  		<section>
        	<div class="text-formation position-relative admin-container-width position-relative">            	
            	<div class='container-fluid'>
                	<div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
							<?php include('req-admin/left-admin.php');  ?>
                        </div><!--end col-4-->
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 col-xl-10">
                        	<div class="text-typography">
								<h4>Add social media links</h4>
								<!--########### add new Page box ###############-->
								<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="social_media">
									<div class="form-group">
										<label for="media_name" class='label-control'>media name</label>
										<input type='text' name="media_name" id="media_name" class="form-control col-7" required="required" />
									</div>
									<div class="form-group">
										<label for="media_icon" class='label-control'>fontawsome icon</label>
										<input type='text' name="media_icon" id="media_icon" class="form-control col-7" required="required" />
									</div>
									<div class="form-group">
										<label for="media_url" class='label-control'>media url</label>
										<input type='text' name="media_url" id="media_url" class="form-control col-7" required="required" />
									</div>
								  <button type="submit" class="btn btn-primary" name="add_media">Submit</button>
								</form>
                            </div><!--end text-typography-->
							
                        </div><!--end col-12-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end text-formation-->
        </section>
    </main>
    <?php
	if(isset($_POST['add_media']))
	{
		echo $media_name=$_POST['media_name'];
		echo $media_icon=$_POST['media_icon'];
		echo $media_url=$_POST['media_url'];
	}
	?>
    <?php //include('req/booking-widget.php'); ?>
    <?php include('req-admin/footer-admin.php'); ?>
</body>
</html>
