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
        	<div class="text-formation mt-4 mb-4 position-relative">
            	<div class='container'>
                	<div class="row">
                    	<div class="col-3">
							<?php include('req-admin/left-admin.php');  ?>
                        </div><!--end col-4-->
                        <div class="col-9">
                        	<div class="text-typography">
					<!--############## page index array values ####################-->
						<div class='common-form-formation db_table_field'>
							<div class='common-form-close'><span>X</span></div>
						</div>
					<!--############## page index array values ####################-->								
								<div class="form-panel admin-form">
                                	<h4>enter table fields name</h4>
									<?php
										if(isset($_POST['creat_field']))
										{
												$fixedname=$_POST['fixedname'];
												$table_name=$_POST['table_name'];
												$total_fields=$_POST['total_fields'];
												
										?>
										
									<form action="<?=$_SERVER['PHP_SELF']; ?>" method='post'>
										<table class='table tabel-striped table-responsive db-table'>
											<ul class='list-unstyled'>
												<li><b>Table Name:-</b>&nbsp;<?=$fixedname.$table_name ?></li>
												<li><b>Total fields:-</b>&nbsp;<?=$total_fields ?></li>
											</ul>
											<thead>	
												<tr>											
												<th>name</th><th>Type</th><th>A_I</th><th>Not Null</th><th>Index</th>
												</tr>
											</thead>
											<?php
												for($j=0; $j<$total_fields; $j++)
												{
											?>
											<tbody>
												<tr id='row_<?=$j;?>'>
													<td><input type='text' name='field_name_<?=$j;?>' autocomplete='off' required></td>
													<td>
														<select name='type_field_<?=$j;?>'>
															<option value='INT (11)'>int</option>
															<option value='VARCHAR (255)'>VARCHAR</option>
															<option value='TEXT'>TEXT</option>
															<option value='DATE'>DATE</option>
															<option value='LONGTEXT'>LONGTEXT</option>
															<option value="ENUM('0','1')">ENUM</option>			
															<option value='FLOAT'>FLOAT</option>				
														</select>
													</td>
											<?php 
											if($j==0)
											{
											?>
													<td>
														<select name='AI_field_<?=$j;?>' required>
															<option value=''>select</option>
															<option value='AUTO_INCREMENT'>AUTO_INCREMENT</option>			
														</select>
													</td>
											
													<td>
														<input type='checkbox' name='notnull_<?=$j;?>' value='NOT NULL' disabled />
													</td>											
													<td>
														<select name='key_field_<?=$j;?>' required>
															<option value=''>select</option>
															<option value='PRIMARY KEY'>PRIMARY KEY</option>			
														</select>
													</td>
											<?php 
											}
											else
											{
												?>
													<td>
														<select name='AI_field_<?=$j;?>' disabled>
															<option value=''>select</option>
															<option value='AUTO_INCREMENT'>AUTO_INCREMENT</option>			
														</select>
													</td>
													<td>
														<input type='checkbox' name='notnull_<?=$j;?>' value='NOT NULL'  required />
													</td>
													<td>
														<select name='key_field_<?=$j;?>' disabled>
															<option value=''>select</option>
															<option value='PRIMARY KEY'>PRIMARY KEY</option>			
														</select>
													</td>
											<?php }
											
											?>
													
												</tr>
											</tbody>
												<?php }//end create table fields for loop bracket ?>
												
												<tr>
													<td class='d-flex'>
													<button type='submit' name='create_table'>submit</button>
													<a href="10072019creatDBtable.php" class='btn btn-info'>go back</a></td>
												</tr>
										</table>
									</form>
									<?php 	
										$_SESSION['total_table_fields']=$total_fields;
										$_SESSION['table_name_session']=$fixedname.$table_name;
										}//End isset bracket
										
										$fun_obj->create_table_into_DB();
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
