<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$gallery_ID=$_GET['gallery_ID'];

$sel_gallery=$fun_obj->commonSelect_table("cms_gallery","gallery_id^page_id^pagename^small_img","WHERE gallery_id='$gallery_ID'");
$fetch_data=mysqli_fetch_array($sel_gallery);

$gallery_pagename=$fetch_data['pagename'];
$gallery_small_img=$fetch_data['small_img'];
$gallery_id=$fetch_data['gallery_id'];
$pageIDs=$fetch_data['page_id'];

$trim_gallery_pagename=str_replace(" ","-",strtolower(trim($gallery_pagename)));

?>
<form method="post" id="submitForm">
<label for="imgupload">select new image</label><input type="file" name="upload_new_img" class="upload_new_<?=$gallery_id?>" id="imgupload" required />
<input type='hidden' name="page_Name" id="pagename" value="<?=$trim_gallery_pagename?>" />
<input type='hidden' name="old_img_Name" id="old_img" value="<?=$gallery_small_img?>" />
<input type='hidden' name="existing_galleyID" id="current_pageID" value="<?=$gallery_id?>" />
<input type='hidden' id="getcurerntPageID" value="<?=$pageIDs?>" />

<div class="progress progress-width">
	<div class="progress-bar progress-bar-success myprogress" role="progress"></div>
</div>
<div class="success_msg"></div>

<input type="submit" name="replace_with" class="btn-sm btn-success" id="uploadImg_btn">
</form>
<div class="existing-img">
<hr>
	<h4>Existing image</h4>
	<img src="<?=$website_domain."images/".$trim_gallery_pagename."/".$gallery_small_img?>" class="img-fluid" />
</div>
<script>
	$(function(){
		$("#uploadImg_btn").on("click",function(e){
			e.preventDefault();
			$(".myprogress").css("width","0%");
			$(".myprogress").text("");
			var fileField=$("#imgupload").val();
			var pagename=$("#pagename").val();
			var old_img=$("#old_img").val();
			var current_pageID=$("#current_pageID").val();
			var getPageid=$("#getcurerntPageID").val();
			
			$(".myprogress").text("");
			
			if(fileField=='')
			{
				alert("Please Select Required field");
				return;
			}
			$(".success_msg").text("Uploading...");
			$(".success_msg").css({"text-align":"center", "font:size":"1.2rem"});
			var formData=new FormData();
			formData.append('imgupload',$("#imgupload")[0].files[0]);
			formData.append('page_Name',pagename);
			formData.append('old_img_Name',old_img);
			formData.append('existing_galleyID',current_pageID);
			formData.append('CurrentgetPageID',getPageid);
			
			$.ajax({
				url:"AjaxImageProgressbar.php",
				method:"POST",
				processData:false,
				contentType:false,
				data:formData,
				xhr:function(){
					var XHR=new window.XMLHttpRequest();
					XHR.upload.addEventListener("progress",function(evnt){
						var percentage=evnt.loaded / evnt.total;
						percentage=parseInt(percentage * 100);
						$(".myprogress").css("width",percentage+"%");
						$(".myprogress").text(percentage+"%");
						
					}, false)
					return XHR;
				},
				success:function(result){
				$(".success_msg").html(result);
				}
			});
			
		});
	});
</script>