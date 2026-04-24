<?php
$qs=$_REQUEST['id'];
include('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_division` where `id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_division` SET `status`='1' where `id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_division` SET `status`='0' where `id`='$qs'");
}
?>