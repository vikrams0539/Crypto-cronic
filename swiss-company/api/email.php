<?php
header('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
session_start();


$U_name = $_POST['name'];
$U_email = $_POST['phone_no'];
$U_pass = $_POST['email'];
$U_phone = $_POST['password'];
if($U_name != "" && $U_email != "" && $U_pass != "" && $U_phone != ""){
    
}

?>