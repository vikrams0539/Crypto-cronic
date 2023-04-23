<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$duplicatepage_id= $_GET['dataID'];

$copied_pageIDArray='';
$copied_pagenameArray='';

if($duplicatepage_id!='')
{
	echo"<label for='page_paste_to' class='label-control'>select page paste to</label>
			<select name='page_paste_to' id='page_paste_to' class='form-control' required='required'>
			<option value=''>--select--</option>";
								
	$copied_select=$fun_obj->commonSelect_table("cms_pages",'page_name^page_ID',"WHERE page_ID!='$duplicatepage_id'");
	while($copied_run=mysqli_fetch_array($copied_select))
	{
		$copied_pageID=$copied_run['page_ID'];
		$copied_pagename=$copied_run['page_name'];
		
		//$copied_pageIDArray[]=$copied_run['page_ID'];
		//$copied_pagenameArray[]=$copied_run['page_name'];
		
		echo"<option value='$copied_pageID'>$copied_pagename</option>";
	}
	echo"</select>";
	
	/* echo"<ul class='row duplicated_page_fied'>
	<h4 class='col-12'>Selected Page Fields</h4>";
	$sel_copy_from_tbl=$fun_obj->commonSelect_table("cms_text",'text_ID^page_ID^text_type^text^text_order^flag',"WHERE page_ID='$duplicatepage_id'");
		while($run_copied_from_tbl=mysqli_fetch_array($sel_copy_from_tbl))
		{
			$list_ID=$run_copied_from_tbl['text_ID'];
			$list_type=$run_copied_from_tbl['text_type'];
			$list=$run_copied_from_tbl['text'];
			$list_order=$run_copied_from_tbl['text_order'];
			$list_flag=$run_copied_from_tbl['flag'];
			
		echo"<li class=''><input type='checkbox' value='$list_ID' name='checkBox_value_$list_ID' checked='checked'><label><label>$list_type</label></li>";
		}
echo"</ul>"; */
}

?>