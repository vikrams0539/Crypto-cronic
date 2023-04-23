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
								<h4>upload Background Image Panel</h4>
								<!--########### add new Page box ###############-->
								<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="miscell" enctype="multipart/form-data">
									<div class="form-group">
										<label for="bgimg" class='label-control'>select image</label>
										<input type='file' name="bg-img" id="bgimg" class="form-control" required="required" />
									</div>
								  <button type="submit" class="btn btn-primary" name="upload_bgimg">Submit</button>
								</form>
                            </div><!--end text-typography-->
							<?php
	$upload_imgDIR=dirname(__DIR__)."/images/";
	
	if(isset($_POST['upload_bgimg']))
	{
		$bgimage=$_FILES['bg-img']['name'];
		$bgimage_tmp=$_FILES['bg-img']['tmp_name'];
		
		$img_ext=pathinfo($bgimage, PATHINFO_EXTENSION);
		
		$valid_img=array("jpg");
		
		
		if(in_array($img_ext, $valid_img))
		{
			if($_FILES['bg-img']['size'] > 204800)
			{
				echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span>File size not more than 200KB</div>";
			}
			else
			{
				
				if(move_uploaded_file($bgimage_tmp,$upload_imgDIR."body-bg.".$img_ext))
				{
					echo"<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span>Image uploaded</div>";
				}
				else
				{
					echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span>Upload fail</div>";
				}
			}
		}
		else
		{
			echo"<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span>Select valid File Format (jpg) only</div>";
		}
		
	}
	
	?>
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
