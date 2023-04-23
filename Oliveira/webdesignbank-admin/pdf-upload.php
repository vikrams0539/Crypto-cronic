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
								<h4>Upload PDF file</h4>

								<div class='progress uploading-bar pdf-upload-progress'>
									<div class='progress-bar progress-bar-success progress-bar-striped upload-progress' role='progressbar'
											aria-valuenow='0' aria-valuemin='0' aria-valuemax='0'></div>
								</div>

								<div class='progress-status'></div>
								<!--########### add new Page box ###############-->
								<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="social_media" id="pdf_formupload" enctype="multipart/form-data">
									<div class="form-group">
										<label for="page_name" class='label-control'>select page</label>
										<select name="page_name" id="page_name" class="form-control" required="required">
											<option value="">Select Page</option>
										<?php 
											
										$pdf_select=$fun_obj->commonSelect_table("cms_pages",'page_name^page_ID',"WHERE pdf_access='1'");
										while($pdf_run=mysqli_fetch_array($pdf_select))
										{
											$pdf_pageID=$pdf_run['page_ID'];
											$pdf_pagename=$pdf_run['page_name'];

											echo"<option value='$pdf_pageID^$pdf_pagename'>$pdf_pagename</option>";
										}
										?>
										</select>
									</div>
									<div class="pdf_panel">
									<div class="form-group">
										<label for="pdf_file_name" class='label-control'>select PDF file</label>
										<input type='file' name="pdf_file_name" id="pdf_file_name" class="form-control col-7" required="required" />
										<p class="error1">Please Select PDF file only</p>
										<p class="error2">Maximum File Size Limit is 3MB.</p>
									</div>
									<div class="form-group">
										<label for="img_description" class='label-control'>Add description <i>(Optional)</i></label>
										<textarea name="img_description" id="img_description" class="form-control col-7" ></textarea>
									</div>
									<div class="form-group">
										<label for="thumb_img_icon" class='label-control'>thumb Image icon <i>(Optional)</i> </label>
										<input type='file' name="thumb_img_icon" id="thumb_img_icon" class="form-control col-7" />
										<p class="error3">Please Select (png, jpg, jpeg) files only</p>
										<p class="error4">Maximum File Size Limit is 1MB.</p>
									</div>
								  <button type="submit" class="btn btn-primary" name="upload_pdf" disabled>Submit</button>
								</div>
								</form>
								<div class="uploaded_pdg">
								<hr>
									<h4>Uploaded PDF Files List</h4>
									<div id="pdf_result"></div>
									
									
									<?php
									$PDF_files_sel=$fun_obj->commonSelect_table("cms_pdfUpload","pdf_id^page_id^page_name^pdf_desc^pdf_file^thumb_img_icon^pdf_status","");
									$i=1;
									if(mysqli_num_rows($PDF_files_sel)>0)
									{
									?>
									<form method="post" id="pdf_form_submit">
									<table class="table table-striped">
									<thead>
										<tr>
											<th>S.NO.</th><th>Page ID</th><th>Page Name</th><th>Description</th><th>PDF File</th><th>Img Thumb icon</th><th>Status<br>Show/Hide</th><th>delete</th>											
										</tr>
									</thead>
									<tbody>
									<?php
									while($PDF_run=mysqli_fetch_array($PDF_files_sel))
									{
										$PDF_id=$PDF_run['pdf_id'];
										$PDF_page_id=$PDF_run['page_id'];
										$PDF_page_name=$PDF_run['page_name'];
										$PDF_thumb_img_icon=$PDF_run['thumb_img_icon'];
										$PDF_pdf_status=$PDF_run['pdf_status'];
										$pdf_desc=$PDF_run['pdf_desc'];
										if($PDF_pdf_status==1)
										{
											$pdg_checked="checked";
										}
										else
										{
											$pdg_checked="unchecked";
										}
										
									echo"<tr>";
									echo"<td>$i</td><td>$PDF_page_id</td><td>$PDF_page_name</td><td>$pdf_desc</td><td>$PDF_thumb_img_icon</td><td>$PDF_thumb_img_icon</td><td><input name='pdf_status_check' class='pdf_status_check' data-pdf-id='$PDF_id' type='checkbox' $pdg_checked value='$PDF_pdf_status' /></td><td><i class='fa fa-trash' aria-hidden='true' data-pdfdel='$PDF_id'></i></td>";
									echo"</tr>";
									$i++;
									}
									?>
									</tbody>
									</table>
									<input type="submit" name="pdg_status" value="save" class="btn-sm btn-success" id="pdf-edit" />
									</form>
									<?php
									}
									else
									{
										echo"<div class='alert alert-danger'>
										<span class='close' data-dismiss='alert'>X</span>
										<h4>NO Record Found</h4></div>";
									}
									
									?>
									
								</div>
                            </div><!--end text-typography-->

    <script type="text/javascript">
	//============== Edit and Delete PDF file ==============
	$("#pdf_form_submit").on("submit",function(e){
		e.preventDefault();
		
		let pdf_checkedArry=[];
		let pdf_ids=[];
		$(".uploaded_pdg>form table>tbody>tr>td>input[type='checkbox']").each(function(){
			
			pdf_ids.push($(this).attr("data-pdf-id"));
			
			pdf_checkedArry.push($(this).is(":checked") ? 1: 0);	
			
			
		});	
		//console.log(pdf_checkedArry);
		
		//pdf_ids.toString();
		pdf_checkedArry=pdf_checkedArry.toString();
		if(confirm('Are you sure you want to Update this item?'))
		{		
			$.ajax({
				method:"POST",
				url:"pdf-ajax-update.php",
				cache:false,
				data:{pdfID:pdf_ids, pdf_field_value:pdf_checkedArry},
				success:function(pdf_result){
					$("#pdf_result").html(pdf_result);
				}
			}); // end Ajax
		}	
	});
	
//=============== Delete PDF File ========================
$(".uploaded_pdg table tbody>tr>td>i.fa-trash").on({
	
"click":function(){
	
	var PDF_delID=$(this).attr("data-pdfdel");
		//alert(delID);
		
		if(confirm('Are you sure to remove this record ?'))
		{
			$.ajax({
				method:"GET",
				url:"pdf-delete-file.php",
				data:"PDF_ID="+PDF_delID,
				success:function(result){
					$("#pdf_result").html(result);
				},
				error:function(){
					alert('Fail to get');
				}
			});
		}
}
});
	
	//=========== Select PDF file on change 
	$("#pdf_file_name").on({
		"change":function()
		{
			let PDF_file_selected=$(this).val();
			let fileSize=(this.files[0].size);			
						
			if(PDF_file_selected!='')
			{
				let ext=PDF_file_selected.split(".").pop().toLowerCase();
				
				
				let fileType=["pdf","PDF"];
				if($.inArray(ext, fileType) == -1)
				{
					$(".error1").fadeIn("slow");
					$(".social_media button[type='submit']").attr("disabled","disabled");
				}
				else if(fileSize > 3000000)
				{
					$(".error2").fadeIn("slow");
					$(".social_media button[type='submit']").attr("disabled","disabled");
				}
				else
				{		
					$(".error1").fadeOut("slow");
					$(".error2").fadeOut("slow");
					$(".social_media button[type='submit']").removeAttr("disabled");
				}
			}
		}
	});
	
		$("#thumb_img_icon").on({
			"change":function(){
				
			let img_file_selected=$(this).val();
			let img_fileSize=(this.files[0].size);	
			
				let img_ext=img_file_selected.split(".").pop().toLowerCase();
				
				
				let img_fileType=["png","jpg","jpeg"];
				if($.inArray(img_ext, img_fileType) == -1)
				{
					$(".error3").fadeIn("slow");
					$(".social_media button[type='submit']").attr("disabled","disabled");
				}
				else if(img_fileSize > 1000000)
				{
					$(".error4").fadeIn("slow");
					$(".social_media button[type='submit']").attr("disabled","disabled");
				}
				else
				{		
					$(".error3").fadeOut("slow");
					$(".error4").fadeOut("slow");
					$(".social_media button[type='submit']").removeAttr("disabled");
				}
			}
		});
    	$("#page_name").on({
    		"change":function(){

    			let sel_val=$(this).val();

    			if(sel_val=="")
    			{
    				$(".pdf_panel").slideUp('slow');
    			}
    			else
    			{
    				$(".pdf_panel").slideDown('slow');
    			}
    		}
    	})
    	let pdf_form_data=document.getElementById("pdf_formupload");
    	let pdf_input_field=document.getElementById("pdf_file_name");
    	let pdf_progressFill=document.querySelector(".progress-bar");

    	pdf_form_data.addEventListener("submit",uploadpdf_file);

    	function uploadpdf_file(e)
    	{
    		$(".progress-status").text("Uploading...");

    		e.preventDefault();
    		// let xhr=new XMLHttpRequest();
    		let formData=new FormData(pdf_formupload);
    		let field_page_name=$("#page_name").val();

    		formData.append("page_type",field_page_name);

    		$.ajax({
			url:"pdf-upload-progressbar.php",
			method:"POST",
			data:formData,
			processData:false,
			contentType:false,
			cache:false,
			xhr:function(){
				var xmlRequest=new window.XMLHttpRequest();
				xmlRequest.upload.addEventListener("progress",function(evnt)
				{
					if(evnt.lengthComputable)
					{
						var load_percentage=evnt.loaded / evnt.total;
						load_percentage=parseInt(load_percentage * 100);
						$(".upload-progress").css("width",load_percentage+"%");
						$(".upload-progress").text(load_percentage+"%");
					}
				},false)
				return xmlRequest;
			},
			success:function(successresult){
					$(".progress-status").html(successresult);
			}
		});
    		/*xhr.open("POST","pdf-upload-progressbar.php",true); 
    		xhr.upload.addEventListener("progress",function(evnt)
				{
					if(evnt.lengthComputable)
					{
						var load_percentage=evnt.loaded / evnt.total;
						load_percentage=parseInt(load_percentage * 100);
						$(".upload-progress").css("width",load_percentage+"%");
						$(".upload-progress").text(load_percentage+"%");
					}
				})			

    		xhr.setRequestHeader("Content-type","multipart/form-data");
    		xhr.send(formData); */
    	}
    </script>
	
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
