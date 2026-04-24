<?php
require('../includes/function.php');
$b=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_newsletter` WHERE `nl_id`='$b'");
if($data==true)
{
	$_SESSION['success']="Data Deleted Successfully.";
	header("Location: ../manage-newsletter.php");
}
?>