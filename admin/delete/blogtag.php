<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_blogtag` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['error']="Blog Tag Deleted successfully";
	header("location:../manage-blogtag.php");
}
?>