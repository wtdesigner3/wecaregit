<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$data=mysqli_query($conn,"DELETE FROM `tbl_bottom_extra` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Deleted successfully";
	header("location:../manage-bottomExtra.php");
}
?>