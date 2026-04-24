<?php
$qs=$_REQUEST['id'];
require('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_project_videos` where `id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_project_videos` SET `status`='1' where `id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_project_videos` SET `status`='0' where `id`='$qs'");
}
//header("location:../view_product.php")
?>