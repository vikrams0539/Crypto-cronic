$(document).ready(function(){
		var urlpath=window.location.pathname.split("/").pop();
		var targeturl=$('.child-index.miscellaneous>ol>li a[href="'+urlpath+'"]');
		
		$(targeturl).parents(".miscellaneous").addClass("d-block");
		
		
	//----------- Add li-active Class on left menu on click page --------//
		$(".child-index>ol>li").on('click',function(){	
			//e.preventDefault();			
			var filter=$(".child-index>ol>li").attr("data-index-filter");
			var pageid=$(this).attr("data-pageID");	
			var imgpageid=$(this).attr("data-imagpageID");
			
		});

		
		$(".admin-left>ul>li").on('click',function(e){
			e.preventDefault();
			var present_li=$(this).attr("data-index-filter");
			$(this).addClass("default-active").siblings().removeClass("default-active");
			if($("li.default-active+.child-index").is(":hidden"))
			{
				$("li.default-active+.child-index").slideDown('slow');
				$(".admin-left>ul>li+.child-index").not("."+present_li).slideUp('slow');
			}
			else
			{	
				$(".admin-left>ul>li+.child-index").not("."+present_li).slideUp('slow');
			}
			
			
		});	
		
//Open add new page when click on add new 	
		$(".DB-table-panel#addpage-name>span").on('click',function(e){
			e.preventDefault();
			$(".addpage-name").css({"transform":"translateY(-50%) scale(1)"});
			$(".admin-left.list-group>ul>li>label").hide(1000);
			$(".child-index>ol>li>span").hide(1000);
			
		});

//Close dialog box when click on X button
		$(".common-form-close").on("click",function(e){
			e.preventDefault();			
			$(".common-form-formation").css({"transform":"translate(-50%,0%) scale(0)"});
			$(".checkitem").prop("checked",false);
			
			$(".admin-left.list-group>ul>li>label").show(1000);			
			$(".admin-left.list-group>ul>li>span").show(1000);
			//$(".child-index>ol>li>span").show(1000);
			
			$(".edit-text-type").fadeOut();
			$(".checkitem.active").prop("disabled",false).removeClass("active");
		});
		
//On Key Up function
		$("#pname").on("keyup",function(){			
			var Pname=$(this).val();
			
			Pname= Pname.toLowerCase();
			Pname=Pname.trim();
			Pname= Pname.replace(/\s+/g, "-");
			Pname=Pname+".php";
			
			$("#url").val(Pname);
		});
		
//Enable edit when on click rename page button 
	$(".DB-table-panel>label").on('click',function(e){
		e.preventDefault();
		$(".index").slideDown('slow');
		
		if($(this))
		{
			$(".child-index>ol>li>span").show(1000);
			$(".child-index>ol>li>ul>li>span").show(1000);
		}
		else
		{			
			$(".child-index>ol>li>span").hide(1000);
			$(".child-index>ol>li>ul>li>span").hide(1000);
		}
	});
	
//click on edit button open dialog box to renaem the page name
	$(".child-index>ol>li>span").on('click',function(e){
		e.preventDefault();
		
		var editID=$(this).attr('data-edit');
		//alert(editID);
		$(".editpage-name").css({"transform": "translate(-50%, 0%) scale(1)", "top":"0"});
		$(".admin-left.list-group>ul>li>span").hide(1000);
		
		$.ajax({
		
			method:"GET",
			url:"Ajaxedit-pagename.php",
			data:"tagID="+editID,
			success:function(editresult)
			{
				$(".editpage-name").html(editresult);
			}
		});
	});

//click on Room edit button open dialog box to renaem the page name
	$(".child-index>ol>li>ul>li>span").on('click',function(e){
		e.preventDefault();
		//alert("Please change the root dir path first where you have mentioned $_SERVER['DOCUMENT_ROOT'] To dirname(__dir__,1)");
		var editID=$(this).attr('data-edit');
		//alert(editID);
		$(".editpage-name").css({"transform": "translate(-50%, 0%) scale(1)", "top":"0"});
		$(".admin-left.list-group>ul>li>ul>li>span").hide(1000);
		
		$.ajax({
		
			method:"GET", 
			url:"Ajaxedit-pagename.php",
			data:"tagID="+editID,
			success:function(editresult)
			{
				$(".editpage-name").html(editresult);
			}
		});
	});

//Click on Add tag open a dialog box, add more tag fields
	$(".admin-form>h4>span.btn-primary").on('click',function(e){
		e.preventDefault();
		$(".add-tag-block").css({"transform":"translate(-50%, 0%) scale(1)"});
		getPageID=$(this).attr("data-addtag");
	});
	
//Add more tag fields on add-more button
		var wrapper=$(".input-field-form");
		var Button=$(".add-more");
		var max_limit=15;
		var x=0;	
		
	$(".add-more").on('click',function(){
		if(x < max_limit)
		{
			x++;
			$(wrapper).append("<article><label for='tag'>tag name</label> <input type='text' name='tag[]' ><button type='button' class='btn btn-danger remove'>remove</button></article>");			
			//alert(x);
		}
		else
		{
			alert("Access Denied");
		}
	});
	$(wrapper).on('click','.remove',function(){
		//e.preventDefault();		
		$(this).parent('article').remove();
		x--;
	});

//Click on select all check box
	$("#checkall").on('click',function(){
	//e.preventDefault();
		$(".checkitem").prop('checked', $(this).prop('checked'));
	});

//Click on Individual check box for edit tag 
	$(".checkitem").on('click',function(e){		
		//$(".edit-text-type").css({"transform":"translate(-50%, 0%) scale(1)","top":"0"});
		var CheckboxID=$(this).attr("data-checkbox");
		$(".checkitem").removeClass('active');
		$(this).addClass('active');
		$(".checkitem").not('.active').prop('disabled',false);
		$(".checkitem").not('.active').prop('checked',false);
		$(".edit-text-type").remove();
		
			if($(".checkitem").find(".active"))
			{
				$(this).prop('disabled',true);
				$(this).prop('checked',true);
				$(this).after("<div class='edit-text-type'></div>");
				$.ajax({
				method:"GET",
				url:"AjaxeditTagname.php",
				data:"TextID="+CheckboxID,
				success:function(textID)
				{
					$(".edit-text-type").html(textID);
				}
				});
			}			
	});
	
//create DB table name remove special character on change 
	$("#table_name").on("change",function(){
		var name=$(this).val();
		var name_without_space=$("#table_name").val();	
		
		name_without_space=name_without_space.trim();
		
		name_without_space= name_without_space.replace(/ +/g, "_");	
		var name_without_special_char=name_without_space.replace(/[^a-zA-Z 0-9]+/g, "_");
		
		$(this).val(name_without_special_char);
	});
	
	

//############## on click go span create DB table open a table field name dialog box
	$(".admin-form>form>.form-group>.row>[class*='col-']>span").on("click",function(e){
		e.preventDefault();
		
		$(".db_table_field").css({"transform":"translate(-50%, 0%) scale(1)","top":"0"});
		
	});

//########################## create_user ++++++++++++++++
	$("#create_user").on('click',function(e){
		$(".create_user").css({"transform":"translate(0%, 0%) scale(1)","top":"0"});
	});
	

//########################## Edit hotel information dialog box ###################//
	$(".DB-hotel-table>a#edit-hotel-detail").on('click',function(e){
		e.preventDefault();
		$(".edit-hotel-info").css({"transform":"translate(-50%, 0%) scale(1)","top":"0"});
	});	
	
//--############## Assign page name to accommodation page  Block #######################--//		
	$(".DB-hotel-table>a#accommodation").on('click',function(e){
		e.preventDefault();
		$(".assign-pagename-acc").css({"transform":"translate(0%, 0%) scale(1)","top":"0"});
	});	
	
//--############## Assign page name Hotel icon Block #######################--//	
	$(".assignpage>tbody").sortable({
		update:function(event, ui){
			$(this).children().each(function(index)
			{
				if($(this).attr("data-iconindex")!=(index+1))
				{
					$(this).attr("data-iconindex",(index+1)).addClass('index-changed');
				}
			});//end index function
			iconsortable();
		}//end update function		
	});
	function iconsortable(){
		var iconsortabled=[];
		$(".index-changed").each(function(){
			iconsortabled.push([$(this).attr('data-iconID'), $(this).attr('data-iconindex')]);
			$(this).removeClass("index-changed");
		});
		$.ajax({
			url:"Ajax-icon-sortable.php",
			method:"POST",
			dataType:"text",
			data:{iconupdated:1, iconID:iconsortabled},
			success:function(iconResult){
				$(".icon__result").html(iconResult);
			}
		});
	}//end function iconsortable


//########## Change Gallery Order ===============//
	$(".gallery-table>tbody.gallery_row").sortable({
		update:function(event, ui){
		$(this).children().each(function(index__order){
			if($(this).attr("data-galleryindex")!=(index__order+1))
			{
				$(this).attr("data-galleryindex", index__order+1).addClass("gallery_order");
			}
		});
		gallery_sort();
		}
	});
	
	function gallery_sort()
	{
		let gallery_array=[];
		
		$(".gallery_order").each(function(){
			gallery_array.push([$(this).attr("data-galleryid"), $(this).attr("data-galleryindex")]);
			$(this).removeClass("gallery_order");
		});
		$.ajax({
			url:"gallery-images-section.php",
			method:"POST",
			data:{gallery_update:1, gallery_data:gallery_array},
			success:function(gallery_fun)
			{
				$(".gallery_order_block").html(gallery_fun);
			}			
		});
	}
	
//--############## Hotel facility Icon page  Block #######################--//		
	$(".DB-hotel-table>#hotel-facility>span").on('click',function(e){
		e.preventDefault();
		$(".hotel-facility-icon").css({"transform":"translate(0%, 0%) scale(1)","top":"0"});
	});	
	
//--############## Change the page order #######################--//		
	$(".DB-panel>a#change-order").on('click',function(e){
		e.preventDefault();
		$(".change-page-order").css({"transform":"translate(0%, 0%) scale(1)","top":"0"});
	});	
	
	$(".table tbody.row_order").sortable({
		update:function(event, ui){
			$(this).children().each(function(index){
				if($(this).attr('data-order')!=(index+1))
				{
					$(this).attr('data-order', (index+1)).addClass('order_changed');
				}
			});
			
			saveOrderPosition();
		}// end update function		
	});
	function saveOrderPosition()
	{
		orderArray=[];
		$(".order_changed").each(function(){
			orderArray.push([$(this).attr("data-indexID"), $(this).attr("data-order")]);
			$(this).removeClass('order_changed');
		});
		$.ajax({
			url:"Ajax-page-order-change.php",
			method:"POST",
			data:{update: 1, order_position:orderArray},
			success:function(order_result)
			{
				$(".orderResult").html(order_result);
				$(".change-page-order").css({"transform": "translate(0%, 0%) scale(1)", "top": "0px"});				
			}
		});
	}
	
//--------------------------- Delete images on click-------------//
	$(".remove_img").on('click',function(e){
		e.preventDefault();
		
		var delID=$(this).attr("data-del");
		//alert(delID);
		
		if(confirm('Are you sure to remove this record ?'))
		{
			$.ajax({
				method:"GET",
				url:"AjaxDelImage.php",
				data:"galleryID="+delID,
				success:function(result){
					$(".message_box").html(result);
				},
				error:function(){
					alert('Fail to get');
				}
			});
		}
	});
//---------- Delete All image-------------//

	$("#selectall").on('click',function(){
		//e.preventDefault();
		$(".child_select").prop("checked",this.checked);
		
		if(this.checked)
		{
			$("#delall").prop("disabled",false);
		}
		else
		{
			$("#delall").prop("disabled",true);
		}	
	});
	$(".child_select").on("click",function(){
		//e.preventDefault();
		var chkLen=$(".child_select:checked").length;
		var UnchkLen=$(".child_select").length;
		if(chkLen==UnchkLen)
		{
			$("#selectall").prop("checked",true);
		}
		else
		{
			$("#selectall").prop("checked",false);
		}
	});
	
	$("#delall").on('click',function(e){
		var delallArrayID=new Array();
		$("input:checkbox[name=checkall]:checked").each(function()		
		{
			delallArrayID.push($(this).val());		
			
		});
		if(confirm('Are you sure to remove All records ?'))
		{
			$.ajax({
				method:"GET",
				url:"AjaxDelAllImage.php",
				data:"galleryID="+delallArrayID,
				success:function(result){
					$(".message_box").html(result);
				},
				error:function(){
					alert('Fail to get');
				}
			});
		}
	});
	
//===================== Select all page name and del in one click ============//
	$("#checkall_page").on("click",function(){
		//
		if($(this).prop("checked")==true)
		{
			$("tbody.row_order>tr>td>input[type='checkbox']").prop("checked",true);
			$("#delselected_page").fadeIn(1000);
		}
		else
		{
			$("tbody.row_order>tr>td>input[type='checkbox']").prop("checked",false);
			
			$("#delselected_page").fadeOut(1000);			
		}
	});
	
	
	$("#delselected_page").on("click",function(){
		var checkboxArray=[];
		
		$("tbody.row_order>tr>td>input[type='checkbox']:checked").each(function(){
			checkboxArray.push($(this).attr("data-checked-id"));			
		});
		$.ajax({
			url:"Ajax-del-allpage.php",
			method:"POST",
			data:{checking:1, pageIDs:checkboxArray},
			success:function(delAllpage){
				$(".delall__page").html(delAllpage);
				
			}
		});
	});
	
//---------------- Active or Deactive Image for display function -------------//
	$(".gallery-table>tbody>tr>td>button").on('click',function(e){
		e.preventDefault();		
		var getImgID=$(this).attr("id");
		
		var getImgStatus=$(this).attr("data-active");
		
		//alert(getImgID+"-----"+getImgStatus);
		if(confirm('Are you sure to update this record ?'))
		{
			$.ajax({
				method:'GET',
				url:'AjaxActiveDeactiveImage.php',
				data:{ID:getImgID, flag:getImgStatus},
				success:function(imgactive){
					$(".imgactivated").html(imgactive);
				},
				error:function()
				{
					alert('Fail to update');
				}
			});
		}
	});

//---------------- Active or Deactive Image for display function -------------//
	$(".gallery-table>tbody>tr>td.change__order>input").on('change',function(e){
		e.preventDefault();
		var getOrderID=$(this).attr('id');
		var getInputValue=$(this).val();
		if(getInputValue!='')
		{
			if(confirm('Are you sure to update this image order ?'))
			{
				$.ajax({
					method:'GET',
					url:'AjaxUpdateImageOrder.php',
					data:{ID:getOrderID, values:getInputValue},
					success:function(imageorder){
						$(".img-order").html(imageorder);
					},
					error:function()
					{
						alert('Fail to update');
					}
				});
			}
		}
	});
	
//---------################# add-more-icon #######################-------------//
		var icon_wrap=$(".facility-icon");
		var total_icon=15;
		var y=0;
		
		$(".add-more-icon").on('click',function(){
			if(y < total_icon)
				{
				//e.preventDefault();		
					y++;
					$(icon_wrap).append("<article><label for='tag'>Icon Name</label><input type='text' name='icon_name[]' ><input type='file' name='icon_img[]' ><button type='button' class='btn btn-danger remove-icon'>remove field</button></article>");
				}
				else
				{
					alert("No more field you can ADD"); 
				}	
			});
		
			$(icon_wrap).on('click','.remove-icon',function(){		
			//e.preventDefault();
			$(this).parent("article").remove();
			y--;
			//alert('h');
		});
//-------- Image previews on change -------------//
	$("#header_logo").on("change",function(e){
		e.preventDefault();
		var output=document.getElementById("img-prv");
		$(output).append("<img src='"+URL.createObjectURL(event.target.files[0])+"' />");
		//console.log(src);
	});
	
//-############ add image descriptions ############---------//
	$(".save-desc").on("click",function(e){
		e.preventDefault();
		//var elm=$(this);
		var get_galID=$(this).attr("data-save-desc");
		var desc_value=$("#desc_"+get_galID).val();
		
		$.ajax({
			
			method:'GET',
			url:'AjaxUpdateDescription.php',
			data:{descID:get_galID, descValue:desc_value},
			success:function(descResult){
				$(".desc-update"+get_galID).html(descResult);
				$(".message-flash").fadeOut(3000);
			},
			error:function()
			{
				alert('Fail to update');
			}
		});
	});

//=======################## Change and replace image if exist ###################======================//
	$(".gallery__img>span.replace__img").on("click",function(){
	
		
			$('html, body').scrollTop(0);
		
		
		$(".replace__img__outer__wrap").fadeIn('slow');
		var imageID=$(this).attr("data-imgChange");
		
		$.ajax({
			method:"GET",
			cache: false,
			url:"AjaxReplaceImage.php",
			data:"gallery_ID="+imageID,
			
			success:function(replaceImg){
				$(".upload-form").html(replaceImg);
			},
			error:function()
			{
				alert('Fail to update');
			}
		});
		
	});
	
	$(".replace__img__wrap>span").on("click",function(){
		$(".replace__img__outer__wrap").fadeOut('slow');
	});
	
//===================== image load processbar ==============//
	$("#submit").on("click",function(e){
		e.preventDefault();
		var upload_filesname=$("#choose_img").val();
		var currentPaageName=$("#Page_type").val();
		var current_Page_ID=$("#current_Page_ID").val();
		
		var porgress_width=$(".upload-progress").css("width","0%");
		
		if(upload_filesname=='')
		{
			alert("Select image");
			return;
		}
		$(".progress-status").text("Uploading...");
		var getFromData=new FormData();
		
		var total_img=$("#choose_img").get(0).files;
		for(let index=0; index<total_img.length; index++)
		{
			getFromData.append("choose_img[]",total_img[index]);
		}
	
	getFromData.append("current_pagID",current_Page_ID);
	getFromData.append("pagetype",currentPaageName);
	
	//================== Progress loading bar =================//
		 $.ajax({
			url:"AjaxUploadImagebar.php",
			method:"POST",
			data:getFromData,
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
	});


//-############ Remove  Assign Facility icon ############---------//
	$(".icon-list>cite").on("click",function(e){
		e.preventDefault();		
		var icon_ID=$(this).attr("data-unchecked");
		var active_pageID=$("#pageisset_id_"+icon_ID).val();
		
		$.ajax({
			method:"GET",
			url:"Ajax-remove-icon.php",
			data:{iconID:icon_ID, currentpageID:active_pageID},
			success:function(removeIcon){
				$(".desc-update"+icon_ID).html(removeIcon);
				$(".message-flash").fadeOut(3000);
			},
			error: function(){
				alert("Error:");
			}
		});		
	});
	
//-############ Add Alternate Name of Facility icon ############---------//
		$(".icon_alt_name").on("click",function(e){
			e.preventDefault();
			
			var alt_name_value=$(this).attr("data-icon-altname");
			var alt_textname=$("#textname-"+alt_name_value).val();
			//alert(alt_textname);
			
		$.ajax({
			method:"GET",
			url:"Ajax-assign-icon-alt-name-update.php",
			data:{iconID:alt_name_value, altTextValue:alt_textname},
			success:function(IconAltname){
				$(".desc-update"+alt_name_value).html(IconAltname);
				$(".message-flash").fadeOut(3000);
			},
			error: function(){
				alert("Error:");
			}
			//alert(alt_name_value);
		});
		});
	
//-############ Change order of Facility icon ############---------//
	
	$(".icon__order>input[type='text']").on("change",function(){
		
		var icon_orderID=$(this).attr("data-iconorder");
		var icon_value=$(this).val();
		
		//console.log(icon_value);
		$.ajax({
			method:"GET",
			url:"Ajax-iconorder-change.php",
			data:{facility_iconID:icon_orderID, facility_iconvalue:icon_value},
			success:function(iconorder){
				$("#result"+icon_orderID).html(iconorder);
				$(".message-flash").fadeOut(3000);
			},
			error: function(){
				alert("Error:");
			}
			
		});		
	});
	
/*====================== Loging Create User Block =======================*/
	$("span.i_toggle").on("click",function(){
		
			var input=$($(this).attr("data-toggle"));
			//console.log("Input"+input);
			
			if(input.attr("type")=="password")
			{
				input.attr("type","text");
			}
			else
			{
				input.attr("type","password");
			}
		
	});
	
/*============= Hide/Show login panel =====================*/
	$("#login__details").on({
		"click":function(e){
			e.preventDefault();
			$(".total_loginuser").slideToggle('slow');
		}
	});
	
/*================= Edit Login User ===================*/
	$(".total_loginuser>table tr.active_user>td.edit_user>span").on({
		"click":function(){
			var edituser=$($(this).attr("data-edit"));
			//var getattr=$(this).attr('data-edit');
			//console.log(getattr);
			
			if(edituser.attr("disabled")=="disabled")
			{
				$(".total_loginuser>table tr.active_user>td>input").attr("disabled","diabled");
				$(".total_loginuser>table tr.active_user>td>button").attr("disabled","diabled");
				edituser.removeAttr("disabled");
			}
			
			else
			{
				edituser.attr("disabled","disabled");
			}
			
		}
	});
	
/*====================== Edit user name && Password ============*/
	$(".total_loginuser>table tr.active_user>td>button.btn-primary").on("click",function(){
		
		var submitedID=$(this).attr("data-sbumitid");
		var user__name=$("#exist_user_"+submitedID).val();
		var pass__name=$("#exist_password_"+submitedID).val();
		
		var confirm_box=confirm("Are you sure you want to Update this?");
		if(confirm_box)
		{
			$.ajax({
				method:"GET",
				url:"AjaxloginUserEdit.php",
				data:{loginUserId:submitedID, userValue:user__name, userPassword:pass__name},
				success:function(user_result)
				{
					$(".user_updated").html(user_result);
				}
				
			});
		}
		else
		{
			alert("Operation Fail!!!!");
		}
	});
	
	
/*====================== Delete Registred user name && Password ============*/
	$(".total_loginuser>table tr.active_user>td.delete_user>span").on("click",function(){
		
		var User_del_ID=$(this).attr("data-deluser");
		//console.log(User_del_ID);
	var confirm_box=confirm("Are you sure you want to Delete this?");
		if(confirm_box)
		{
			$.ajax({
				method:"GET",
				url:"AjaxdelloginUser.php",
				data:"userid="+User_del_ID,
				success:function(user_result)
				{
					$(".user_updated").html(user_result);
				}
				
			});
		}
		else
		{
			alert("Operation Fail!!!!");
		} 
	});
	
//================ Delete Facility icons ====================//
	$(".icon_del").on("click",function(){
		let iconID=$(this).attr("data-delicon");
		let icon_imgname=$(this).attr("data-iconimg-name");
		
		var confirm_boxicon=confirm("Are you sure you want to Delete this?");
		if(confirm_boxicon)
		{
			$.ajax({
				method:"POST",
				url:"Ajax-del-facility-icons.php",
				data:{iconupdate:1, iconsID:iconID, iconimg:icon_imgname},
				success:function(iconDel){
					$(".icondel_"+iconID).html(iconDel);
					
				}
			});
		}
	});
	
//================= Privilege Page ===================//
	$(".privilege_btn").on("click",function(){
		$(".privilege_block").slideToggle("solow");
	});

	$(".privilege_block .form-group>input[type='submit']").attr("disabled","disabled");

	$(".privilege_block .form-group>.form-check>label>input[type='checkbox'], .privilege_block .form-group>.form-check>label+i>input[type='checkbox']").on("click",function(){

		$(".privilege_block .form-group>input[type='submit']").removeAttr("disabled");
		if($(this)=='')
		{
			$(".privilege_block .form-group>input[type='submit']").attr("disabled","disabled");
		}
	});

	$(".page_facility_btn,.right-absolute>.common-form-close").on("click",function(){
		$(".right-absolute").slideToggle("solow");
	});
	
//============== delete_tags ==================
	$(".delete_tags").on("click",function(){
		let tagID=$(this).attr("data-tagid");
		
		let confrm_box=confirm("Are you sure you want to Delete this?");
		if(confrm_box)
		{
			$.ajax({
				method:"GET",
				url:"delet-tagAjax.php",
				data:{tag_delid:tagID},
				success:function(delTag){
					$("#del_tag_rusult_"+tagID).html(delTag);
					
				}
			});
		}
	});
});