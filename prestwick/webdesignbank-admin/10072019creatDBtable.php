<?php
$page_ID=0;
//include('../req/common-variables.php');
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');
?>
</head>
<body>
	<main>
    	<div id="main-wrapper">
        	<?php include('req-admin/header-admin.php'); ?>
        </div><!--end main-wrapper-->
  		<?php //include('req/slider.php'); ?>
        
  		<section>
        	<div class="text-formation mt-4 mb-4 position-relative admin-container-width">
            	<div class='container'>
                	<div class="row">
                    	<div class="col-3">
							<?php include('req-admin/left-admin.php');  ?>
                        </div><!--end col-4-->
                        <div class="col-9">
                        	<div class="text-typography">					
					<!--############## Create DB tabel  ####################-->								
								<div class="form-panel admin-form">
                                	<h4>create database table name</h4>
									<form action="AjaxDB-table-fields.php" method='post'>
										<div class='form-group'>	
											<div class='row d-flex align-items-center flex-wrap'>
												<label for='table_name' class='control-label col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3'>enter table name</label>
												<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4'>
													<input type='text' value='cms_' name='fixedname' id='fixedname' readonly>
													<input type='text' class='form-control' placeholder='enter table name' name='table_name' id='table_name' autocomplete='off' required>
												</div>
												<div class='col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3'>
													<select name='total_fields' class='form-control' id='total_fields' required>
														<option value=''>--no. of columns--</option>
														<?php
														for($i=1; $i<=100; $i++)
														{
															echo"<option value='$i'>$i</option>";
														}
														?>
													</select>
												</div>	
												<div class='col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-2'>
													<button type='submit' class='btn btn-dark go' name='creat_field'>go</button
												></div>
											</div><!--end row-->
										</div>										
									</form>
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
