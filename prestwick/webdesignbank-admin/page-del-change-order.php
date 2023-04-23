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
								<!--------################## Change Page order ########----------->
							<div class=''>
								
									
								<form action='<?=$_SERVER['PHP_SELF']; ?>' method='post' style="width:100%; margin-top:3%;">
								<h4 class="order bg-dark text-white">Set page in order <strong>(You can drag and drop the row to change page order)</strong></h4>	
									<table class='table table-striped table-dark'>
										<thead>
											<tr>
												<th>SNo.</th><th>Page Id</th><th>Page Name</th><th>Page Order</th><th>Delete Page</th><th id="selectall">del all&nbsp;<input type="checkbox" id='checkall_page'> <button type='button' id='delselected_page' class='btn-sm btn-primary'>del All</button></th>
											</tr>
											<tr><td class="orderResult"></td></tr>
											<tr><td class="delall__page"></td></tr>
										</thead>
										<tbody class="row_order" id="roworder">
									<?php
										$pageOrder_sel=$fun_obj->commonSelect_table("cms_pages","page_ID^page_name^page_order","where page_ID!='' order by page_order asc");
										$sr=1;
										while($run_pageOrder=mysqli_fetch_array($pageOrder_sel))
										{
											$indexpageID=$run_pageOrder['page_ID'];
											$indexpageorder=$run_pageOrder['page_order'];
											
											echo"<tr data-indexID='$indexpageID' data-order='$indexpageorder'>";
											echo"<td>".$sr."</td>
											<td>".$run_pageOrder['page_ID']."</td>
											<td>".$run_pageOrder['page_name']."</td>
											<td>".$run_pageOrder['page_order']."</td>
											<td><a href='".$admin_url."index.php?dele_page=".$run_pageOrder['page_ID']."' class='btn-sm btn-danger'><i class='fa fa-trash-o'></i>&nbsp;Delete</a></td>
											<td><input type='checkbox' class='checked_$indexpageID' data-checked-id='$indexpageID'> </td>";
											echo"</tr>";
											$sr++;
											
											$pageOrderArray[]=$run_pageOrder['page_ID'];
										}
										$_SESSION['page_order']=$pageOrderArray;
									?>
									</tbody>
									</table>
									<?php /*<input type='submit' class='btn btn-info' name='updateOrder' value='Change Order'>*/?>
								</form>
							</div>
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
