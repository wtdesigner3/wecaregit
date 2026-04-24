<?php
require('../includes/function.php');
$id=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_extra` WHERE `id`='$id'");
if($data==true)
{
	$_SESSION['warning']="Data Deleted successfully";
	header("location:../manage-extra.php");
}
?>