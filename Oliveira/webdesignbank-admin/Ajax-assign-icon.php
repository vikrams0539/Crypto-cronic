<?php
include('php-function/function.php');
include('10072019check-login.php');

$sessionIcon=$_SESSION['iconID'];
$Current_PageID=$_SESSION['current_pageID'];
//print_r($sessionIcon);

foreach($sessionIcon as $icon_value)
{
	$checkbox_value="icon_".$icon_value;
	$checkbox_post=$_POST[$checkbox_value];
	
	$pageisset_id="pageisset_id_".$icon_value;
	$pageisset_id_post=$_POST[$pageisset_id];
	
	if(!empty($checkbox_post))
	{
	$icon_sel=$fun_obj->commonSelect_table("cms_hotel_facility_icons","hotel_facility_id^facility_name^facility_img^facility_page_id","WHERE hotel_facility_id='$checkbox_post'");
	$icon_fetch=mysqli_fetch_array($icon_sel);
				
			
				$facility_pageID=explode(",",$icon_fetch['facility_page_id']);
				if(empty($icon_fetch['facility_page_id']))
				{
					$pageArryID=$pageisset_id_post;
				}
				
				else if(array_search($pageisset_id_post,$facility_pageID))
				{
					$pageArryID=$icon_fetch['facility_page_id'];
					//echo"<br>exist";
				}
				else
				{
					$pageArryID=$icon_fetch['facility_page_id'].",".$pageisset_id_post;
					//echo"<br>Not exist";
				}
				//echo $pageArryID."<br>";
			$update_icon=$fun_obj->common_update("cms_hotel_facility_icons",array("facility_page_id"=>$pageArryID),"WHERE hotel_facility_id='$checkbox_post'");
			
	}
}

if($update_icon)
{
	echo"<script>window.location.href='index.php?pageID=$Current_PageID';</script>";
}
else
{
echo"<script>window.location.href='index.php?pageID=$Current_PageID';</script>";
}
?>