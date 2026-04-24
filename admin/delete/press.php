<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_press` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Data Deleted successfully";
	header("location:../manage-press.php");
}
?>