<?php
$qs=$_REQUEST['id'];
include('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_teams` where `d_id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['d_status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_teams` SET `d_status`='1' where `d_id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_teams` SET `d_status`='0' where `d_id`='$qs'");
}
header("location:../manage-teams.php")
?>