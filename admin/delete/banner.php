<?php
require('../includes/function.php');
$b=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_banner` WHERE `bnr_id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Banner Deleted successfully";
	header("location:../manage-banner.php");
}
?>