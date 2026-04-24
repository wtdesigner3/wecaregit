<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_brand_services` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Deleted successfully";
	header("location:../manage-brand-services.php");
}
?>