<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_why_us` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Deleted successfully";
	header("location:../manage-why-us.php");
}
?>