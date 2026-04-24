<?php
require('../includes/function.php');
$b=$_REQUEST['bid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_clients` WHERE `bnr_id`='$b'");
if($data==true)
{
	$_SESSION['success']="Client Deleted Successfully";
	header("location:../manage-clients.php");
}
?>