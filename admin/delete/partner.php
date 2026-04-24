<?php
require('../includes/function.php');
$b=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_partner` WHERE `p_id`='$b'");
if($data==true)
{
	$_SESSION['success']="Partner Deleted Successfully.";
	header("Location: ../manage-partner.php");
}
?>