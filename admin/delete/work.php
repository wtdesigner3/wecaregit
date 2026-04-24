<?php
require('../includes/function.php');
$id=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_work` WHERE `id`='$id'");
if($data==true)
{
	$_SESSION['warning']="Work Deleted successfully";
	header("location:../manage-work.php");
}
?>