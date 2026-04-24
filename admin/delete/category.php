<?php
require('../includes/function.php');
$b=$_REQUEST['id'];
$data=mysqli_query($conn,"DELETE FROM `tbl_category` WHERE `c_id`='$b'");
if($data==true)
{
	$_SESSION['error']="Category Deleted successfully";
	header("location:../manage-category.php");
}
?>