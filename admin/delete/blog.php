<?php
require('../includes/function.php');
$id=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_blog` WHERE `id`='$id'");
if($data==true)
{
	$_SESSION['warning']="Blog Deleted successfully";
	header("location:../manage-blog.php");
}
?>