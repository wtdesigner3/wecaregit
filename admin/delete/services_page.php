<?php
require('../includes/function.php');
$id=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_servicespage` WHERE `id`='$id'");
if($data==true)
{
	$_SESSION['warning']="Data Deleted successfully";
	header("location:../manage-servicespage.php");
}
?>