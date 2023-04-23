<?php
//include('../req/common-variables.php');
include('php-function/function.php');
include('req-admin/variable-admin.php');
include('10072019check-login.php');
include('req-admin/head-include-admin.php');
$page_ID=0;

$pdf_field_value=explode(",",$_POST['pdf_field_value']);
$pdfID=$_POST['pdfID'];

for($i=0; $i<count($pdfID); $i++)
{
	$pdf_update=$fun_obj->common_update("cms_blog",array("blog_status"=>$pdf_field_value[$i]),"WHERE blog_id='".$pdfID[$i]."'");
		if($pdf_update)
		{
			$mess_pdf="<div class='alert alert-success'><span class='close' data-dismiss='alert'>X</span><p>Update Successfully!!!!!!</p></div><meta http-equiv='refresh' content='3; url='".$_SERVER['PHP_SELF']."'>";
		}
		else
		{
			$mess_pdf="<div class='alert alert-danger'><span class='close' data-dismiss='alert'>X</span><p>Status Fail</p></div><meta http-equiv='refresh' content='3; url='".$_SERVER['PHP_SELF']."'>";
		}
}	
	
echo $mess_pdf;
?>