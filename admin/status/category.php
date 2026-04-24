<?php
$qs=$_REQUEST['id'];
include('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_category` where `c_id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['c_status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_category` SET `c_status`='1' where `c_id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_category` SET `c_status`='0' where `c_id`='$qs'");
}
?>

