<?php
require('../includes/function.php');
$b=$_REQUEST['cid'];
$data=mysqli_query($conn,"DELETE FROM `tbl_project_videos` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Patients Speaks Deleted successfully";
	header("location:../manage-patients_speaks.php");
}
?>