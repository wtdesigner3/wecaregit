<?php
require('../includes/function.php');
$id=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_testimonial` WHERE `id`='$id'");
if($data==true)
{
	$_SESSION['warning']="recode_string(request, string) Deleted successfully";
	header("location:../manage-testimonial.php");
}
?>