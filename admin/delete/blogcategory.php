<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_blogcategory` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['error']="Blog Category Deleted successfully";
	header("location:../manage-blogcategory.php");
}
?>