<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$loginUserId=$_GET['loginUserId'];
$userValue=$_GET['userValue'];
$userPass=$_GET['userPassword'];


$update_user=$fun_obj->common_update("cms_admin",array("username"=>$userValue,"password"=>$userPass),$where="admin_id='$loginUserId'");

if($update_user)
{
	echo"<p class='message-flash' style='
    font-weight: 400;
    text-transform: capitalize;
    background: #94040a;
    color: #f1f1f1!important;
    font-size: 1.2rem;'>updated successfully !!!!!</p>";
	echo"<meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."''>";
} 
?>