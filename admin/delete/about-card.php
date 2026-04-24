<?php
require('../../inc/function.php');
$b = $_REQUEST['bid'];

$banner = mysqli_query($conn, "select * from tbl_about_card where id='$b'");
$bannerData = mysqli_fetch_assoc($banner);
@unlink("../../uploads/about-card/" . $bannerData["image"]);

$data = mysqli_query($conn, "DELETE FROM `tbl_about_card` WHERE `id`='$b'");
if ($data == true) {
    $_SESSION['warning'] = "About Card Deleted successfully";
    header("location:../manage-about-card.php");
}
?>