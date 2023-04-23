<?php
session_start();
//include('php-function/function.php');

$session_user=$_SESSION['session_user'];
$userfun=$fun_obj->userType($session_user);
foreach($userfun as $usertype)
{
	//$usertype['type'];
}
if(!isset($_SESSION['session_user']))
{
	header("Location:10072019login.php");
	unset($_SESSION['user']);
}

?>