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
								<h4>Create duplicate page</h4>
								<!--########### add new Page box ###############-->
								<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="social_media" id="pdf_formupload" enctype="multipart/form-data">
									<div class="form-group">
										<label for="page_name" class='label-control'>select page copy from</label>
										<select name="page_name" id="page_name" class="form-control" required="required">
											<option value="">Select Page </option>
										<?php 
											
										$pdf_select=$fun_obj->commonSelect_table("cms_pages",'page_name^page_ID',"WHERE page_ID!=''");
										while($pdf_run=mysqli_fetch_array($pdf_select))
										{
											$pdf_pageID=$pdf_run['page_ID'];
											$pdf_pagename=$pdf_run['page_name'];

											echo"<option value='$pdf_pageID'>$pdf_pagename</option>";
										}
										?>
										</select>										
									</div>
									
									
									<div class="pdf_panel">
									
									<div class="form-group copied_to" id="copied_to">									
									
									</div>
									
									<button type="submit" class="btn btn-primary create_duplicate" name="create_duplicate" disabled>Submit</button>
								</div>
								</form>
							
                            </div><!--end text-typography-->

    <script type="text/javascript">
	$(document).ready(function(){
		$("#page_name").on("change",function(){
			let sel_empty=$(this).val();
			if(sel_empty!='')
			{
				$(".pdf_panel").slideDown();
				$(".create_duplicate").removeAttr("disabled");
			}
			else
			{
				$(".pdf_panel").slideUp();
				$(".create_duplicate").attr("disabled","disabled");
			}
			
			$.ajax({
				
				method:"GET",
				url:"duplicate-pageAjax.php",
				data:{"dataID":sel_empty},
				success:function(duplicatepage)
				{
					$("#copied_to").html(duplicatepage);
				}
			});
		});
		
	})
    </script>
	<?php
	if(isset($_POST['create_duplicate']))
	{ 
		$copied_from=$_POST['page_name'];
		$page_paste_to=$_POST['page_paste_to'];
		

		$sel_copy_from=$fun_obj->commonSelect_table("cms_text",'text_ID^page_ID^text_type^text^text_order^flag',"WHERE page_ID='$copied_from'");
		while($run_copied_from=mysqli_fetch_array($sel_copy_from))
		{
			$copied_text_ID=$run_copied_from['text_ID'];
			$copied_text_type=$run_copied_from['text_type'];
			$copied_text=nl2br($run_copied_from['text']);
			
			$copied_text=str_replace('<br />', PHP_EOL, $copied_text);
			
			//$copied_text=mysqli_real_escape_string($db_links,preg_replace("/\r|\n/", "",nl2br(trim($run_copied_from['text']))));
			
			$copied_text=mysqli_real_escape_string($db_links, $copied_text);
			
			$copied_text_order=$run_copied_from['text_order'];
			$copied_flag=$run_copied_from['flag'];
			
			$insert_paste_to=$fun_obj->common_insert("cms_text",array("page_ID"=>$page_paste_to,"text_type"=>$copied_text_type,"text"=>$copied_text,"text_order"=>$copied_text_order,"flag"=>$copied_flag));	
			
		}
		
	if($insert_paste_to)
			{
				echo"<script>alert('data copied successfully');</script>";
			}
		else
			{
				echo"<script>alert('data copied fail');</script>";
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
