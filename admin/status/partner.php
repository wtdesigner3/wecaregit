<?php
$qs=$_REQUEST['id'];
include('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_partner` where `p_id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['p_status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_partner` SET `p_status`='1' where `p_id`='$qs'");
	$_SESSION['success']="Data Published Successfully";	
  	header("Location: ../manage-partner.php");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_partner` SET `p_status`='0' where `p_id`='$qs'");
	$_SESSION['success']="Data Un-Published Successfully";	
  	header("Location: ../manage-partner.php");
}
?>

