<form class="form-horizontal" action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
	<div class="form-group">
			<?php
			$permision_sel=$fun_obj->commonSelect_table("cms_privileges","privilege_id^page_id^permission_name^permission_status^page_client_acess","");
			
			
			while($permision_run=mysqli_fetch_array($permision_sel))
			{
				$permision_id=$permision_run['privilege_id'];
				$permision_name=$permision_run['permission_name'];
				$permision_page_id=$permision_run['page_id'];
				$permission_status=$permision_run['permission_status'];
				$page_client_acess=$permision_run['page_client_acess'];

				$id_exp_arry=explode(",",$permision_page_id); //======== Page id convert string in to array 
				$client_acess_explode=explode(",",$page_client_acess); //=== get client page access status explode the id's

				if(in_array($_GET['pageID'], $id_exp_arry) && $permission_status==1) //=== This is Checkbox fields
				{
					$status="checked";
				}
				else
				{
					$status="unchecked";
				}
				if(in_array($_GET['pageID'], $client_acess_explode) && $permission_status==1) //== This is for Second Checkbox btn
				{
					$radio_btn_y="checked";
				}
				else
				{
					$radio_btn_y="unchecked";
				}


				$checkbox_name="pervilige_status_$permision_id";
				
			?>
		<div class="form-check">
			<label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="<?=$checkbox_name;?>" value="1" <?=$status;?> />
				<span><?=$permision_name;?></span>
			<input type="hidden" name="privilege_id_<?=$permision_id;?>" value="<?=$permision_id;?>">
			</label>
			<i><span>client access</span>&nbsp;<input type="checkbox" value="<?=$_GET['pageID'];?>" name="client_access_<?=$permision_id?>" <?=$radio_btn_y;?> value="" />Yes/No</i>			
		</div>
		<?php 
		$permision_id_Array[]=$permision_id;
			}
		?>
		<input type="submit" class="btn-sm" name="set_privilege"  value="save">
	</div>
</form>
<?php
if(isset($_POST['set_privilege']))
{	
	foreach($permision_id_Array as $keys)
	{
		$post_value="pervilige_status_$keys";
		$privilege_id_hide="privilege_id_$keys";
		$client_access_value="client_access_$keys";

		$privilege_name_post=$_POST[$post_value];
		$id_isset=$_POST[$privilege_id_hide];
		$client_access_post=$_POST[$client_access_value];
		
		
// ===================================== Select page id if already Exist 
		$sel_premission=$fun_obj->commonSelect_table("cms_privileges","privilege_id^page_id^permission_name^permission_status^page_client_acess^page_client_acess", "WHERE privilege_id='$id_isset'");

		$fetch_permission=mysqli_fetch_array($sel_premission);
		$permission_pageID=$fetch_permission['page_id'];
		$page_permission_status=$fetch_permission['permission_status'];
		$page_client_acess_exist=$fetch_permission['page_client_acess'];

		$explode_id=explode(",",$fetch_permission['page_id']);
		if($permission_pageID!='')
		{
			$permission_pageID=$permission_pageID.","; //========== Add comma after the new insert id
		}

	if(isset($privilege_name_post)) //============= if field is filled
	{
		// $privilege_name_post=1;	

		if(!in_array($_GET['pageID'], $explode_id)) //======== avoid to insert duplicate entery of page id
		{
			$page_keyID=$permission_pageID.$_GET['pageID'];
		}

		else
		{
			$page_keyID=$fetch_permission['page_id']; //============= fix this to aviod the empty enter when page id 
														//=========== already exist
		}
	}
	else
	{
		if (($key = array_search($_GET['pageID'],$explode_id)) !== false) 
		//======= this will find if page id exist, then create new list exclude the deleted page id
		{
			unset($explode_id[$key]);
    		$implode_id=implode(",",$explode_id);
    		$page_keyID=$implode_id;
		}		
		
		else
		{
			$page_keyID=$fetch_permission['page_id']; //======== add existing page id's when the field is empty
		}
	}
//============= Check Box query end
	$client_access_explode=explode(",",$fetch_permission['page_client_acess']);

	if($page_client_acess_exist!='')
	{
		echo $page_client_acess_exist=$page_client_acess_exist.",";
	}

	if(isset($client_access_post))
	{	
		if(!in_array($_GET['pageID'], $client_access_explode)) //======== avoid to insert duplicate entery of page id
		{
			$client_access_id=$page_client_acess_exist.$_GET['pageID'];
		}
		else
		{
			$client_access_id=$fetch_permission['page_client_acess'];
		}
	}
	else
	{
		if (($key2 = array_search($_GET['pageID'],$client_access_explode)) !== false) 
		//======= this will find if page id exist, then create new list exclude the deleted page id
		{
			unset($client_access_explode[$key2]);
    		$implode_id2=implode(",",$client_access_explode);
    		$client_access_id=$implode_id2;
		}		
		
		else
		{
			$client_access_id=$fetch_permission['page_client_acess']; //======== add existing page id's when the field is empty
		}
		
	}
	echo"<br>".$client_access_id;
	//=============== End Radio button block

	$privilege_update=$fun_obj->common_update("cms_privileges", array("permission_status"=>1,"page_id"=>$page_keyID,"page_client_acess"=>$client_access_id), "WHERE privilege_id='$id_isset'");
	
	
			
		
	} //============ End Foreach loop 
		if($privilege_update)
			{
				echo"<meta http-equiv='refresh' content='1; url='".$_SERVER['PHP_SELF']."'>";
			}
}

?>