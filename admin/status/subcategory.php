<?php
$qs=$_REQUEST['id'];
include('../includes/function.php');
$data=mysqli_query($conn,"select * from `tbl_subcategory` where `sc_id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['sc_status']==0)
{
	mysqli_query($conn,"UPDATE `tbl_subcategory` SET `sc_status`='1' where `sc_id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `tbl_subcategory` SET `sc_status`='0' where `sc_id`='$qs'");
}
?>

