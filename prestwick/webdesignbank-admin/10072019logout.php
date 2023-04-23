<?php
session_start();
if(session_destroy())
{
	header("Location:10072019login.php");
	unset($_SESSION['user']);
}

?>