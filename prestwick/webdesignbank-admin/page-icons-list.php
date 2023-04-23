<?php  if(isset($_GET['pageID']) && $usertype['type']=='admin'){?>
                <div class="right-absolute">
				<div class='common-form-close'><span>X</span></div>
                	<h4>facility list</h4>
                    <form method="post" action="Ajax-assign-icon.php" class="form-facility">
                    <div class="save_icon_btn"><input type="submit" name="add-icon-update" value="save"></div>
                    <?php
						$icon_lists=$fun_obj->commonSelect_table("cms_hotel_facility_icons","hotel_facility_id^facility_name^facility_page_id^facility_img^flag","");
						
						while($run_icon_lists=mysqli_fetch_array($icon_lists))
						{
							$icon_IDArray[]=$run_icon_lists['hotel_facility_id'];
							$icon_ID=$run_icon_lists['hotel_facility_id'];
							$icon_name=$run_icon_lists['facility_name'];
							$icon_img=$run_icon_lists['facility_img'];
							//echo"<br>".$run_icon_lists['facility_page_id'];
							
							$facility_list_pageID=explode(",",$run_icon_lists['facility_page_id']);
							//print_r($facility_list_pageID);
							
							if(in_array($_GET['pageID'],$facility_list_pageID))
							{
								$Disabled="disabled";
								$Checked="checked";
								$a="<cite id='remove_$icon_ID' data-unchecked='$icon_ID' title='Remove'><i class='fa fa-trash' aria-hidden='true'></i></cite>";
							}
							else
							{
								$Disabled="";
								$Checked="";
								
								$a="";
							}
							
							echo"<div class='icon-list'>
									$a
								<input type='checkbox' name='icon_$icon_ID' value='$icon_ID' $Checked $Disabled />
								<input type='hidden' id='pageisset_id_$icon_ID' name='pageisset_id_$icon_ID' value='".$_GET['pageID']."'>
								<span><img src='".$website_domain."images/facility-img-icons/".$icon_img."' alt='$icon_name' /></span><label for='$icon_name'>$icon_name</label></div>
								<div class='desc-update$icon_ID'></div>	";
						}
						$_SESSION['iconID']=$icon_IDArray;
						$_SESSION['current_pageID']=$_GET['pageID'];
					?>
                    
                   <div class="save_icon_btn"><input type="submit" name="add-icon-update" value="save"></div>
                    </form>
                </div><!--end right-absolute-->
                <?php } ?>