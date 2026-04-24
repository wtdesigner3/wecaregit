<?php
require('../includes/function.php');
$b=$_REQUEST['id'];
$data=mysqli_query($conn,"DELETE FROM `tbl_subcategory` WHERE `sc_id`='$b'");
if($data==true)
{
$_SESSION['warning']="Submenu Deleted successfully";
header("location:../manage-subcategory.php");
}
?>