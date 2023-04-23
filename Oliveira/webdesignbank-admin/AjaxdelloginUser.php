<?php
include('php-function/function.php');
include('10072019check-login.php');
include('req-admin/variable-admin.php');

$userid=$_GET['userid'];


$del_user=$fun_obj->commnon_del("cms_admin","WHERE admin_id='$userid'");

if($del_user)
{
	echo"<p class='message-flash' style='
    font-weight: 400;
    text-transform: capitalize;
    background: #94040a;
    color: #f1f1f1!important;
    font-size: 1.2rem;'>User Deleted successfully !!!!!</p>";
	echo"<meta http-equiv='refresh' content='1; url='".$_SERVER['REQUEST_URI']."''>";
} 
else
{
	echo"<script>alert('Operation Fail');</script>";
}
?>