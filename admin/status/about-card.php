<?php
$qs = $_REQUEST['bid'];
include('../includes/function.php');
$data = mysqli_query($conn, "select * from `tbl_about_card` where `id`='$qs'");
$rec = mysqli_fetch_array($data);
if ($rec['status'] == 0) {
    mysqli_query($conn, "UPDATE `tbl_about_card` SET `status`='1' where `id`='$qs'");
} else {
    mysqli_query($conn, "UPDATE `tbl_about_card` SET `status`='0' where `id`='$qs'");
}
?>