<?php
require('checksession.php');
require('includes/function.php');
$b=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_banner` where `bnr_id`='".$b."'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update'])){
$title = mysqli_real_escape_string($conn,$_POST['title']);
$boldtitle = mysqli_real_escape_string($conn,$_POST['boldtitle']);
$subtitle = mysqli_real_escape_string($conn,$_POST['subtitle']);
$des = mysqli_real_escape_string($conn,$_POST['des']);
$link = mysqli_real_escape_string($conn,$_POST['link']);  
$link2 = mysqli_real_escape_string($conn,$_POST['link2']); 
$position = mysqli_real_escape_string($conn,$_POST['position']);
$alt = mysqli_real_escape_string($conn,$_POST['alt']);
$align = mysqli_real_escape_string($conn,$_POST['align']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
//=====banner===//
$bimages=$_FILES['bimage']['name'];
    $unq= rand(1111, 9999);
$bimage=$unq."_".$bimages;
if($bimages!=''){
move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/banner/".$bimage);
}else{
 $bimage= $brec['bnr_image'];
}
//====end===//
$query=mysqli_query($conn,"UPDATE`tbl_banner` SET `bnr_title`= '$title',`bnr_boldtitle`= '$boldtitle', `bnr_subtitle`='$subtitle', `bnr_sort`='$position', `bnr_link`='$link',`bnr_link2`='$link2', `bnr_alt`='0', `bnr_des`='$des', `bnr_image`='$bimage',`bnr_align`='$align',`bnr_status`='$status' WHERE `bnr_id`='".$b."'");
if($query==true)
{
$_SESSION['success']="Banner updated successfully";
header("refresh:3;url=manage-banner.php");
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
<!-- begin #page-container -->
<?php require("includes/header.php"); ?>
<!-- begin #sidebar -->
<?php require("includes/left.php"); ?>
<!-- begin #content -->
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item active">Add Banner</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Banner</h1>
<!-- begin row -->
<div class="row">
<!-- begin col-10 -->
<div class="col-lg-12">
<!-- begin panel -->
<div class="panel panel-inverse">
<!-- begin panel-heading -->
<div class="panel-heading">
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
</div>
<h4 class="panel-title">Add Banner</h4>
</div>
<!-- begin panel-body -->
<div class="panel-body">
<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                  <label for="banner">Banner Subtitle</label>
                  <input type="text" name="subtitle" class="form-control" id="banner" placeholder="Enter Banner Subtitle" value="<?= $brec['bnr_subtitle'];?>">
                </div>
                
                <div class="form-group d-none">
                  <label for="banner">Banner Bold Title</label>
                  <input type="text" name="boldtitle" class="form-control" id="banner" placeholder="Enter Banner Title" value="<?= $brec['bnr_boldtitle'];?>">
                </div>

                <div class="form-group">
                  <label for="banner">Banner Title</label>
                  <input type="text" name="title" class="form-control" id="banner" placeholder="Enter Banner Title" value="<?= $brec['bnr_title'];?>">
                </div>
               
                <div class="form-group d-none">
                <label for="banner">Description</label>
                <input type="text" name="des" class="form-control" id="banner" placeholder="Enter Banner Description" value="<?= $brec['bnr_des'];?>">
                </div>
               
                <!-- <div class="form-group">-->
                <!--  <label for="exampleInputalt">Banner Alt</label>-->
                <!--  <input type="text" name="alt"  placeholder="Banner Alt" class="form-control" id="exampleInputalt" value="<?= $brec['bnr_alt'];?>">-->
                <!--</div>-->
               
                 <div class="form-group d-none">
                  <label for="bannerlink">Banner Link-1</label>
                  <input type="text"  name="link"  placeholder="Re-direct Link" class="form-control" id="bannerlink" value="<?= $brec['bnr_link'];?>">
                </div>

                <div class="form-group d-none">
                  <label for="bannerlink">Banner Link-2</label>
                  <input type="text"  name="link2"  placeholder="Re-direct Link" class="form-control" id="bannerlink" value="<?= $brec['bnr_link2'];?>">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Banner position</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10" value="<?= $brec['bnr_sort'];?>">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputFile">Background image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be (1920px X 800px) & must be jpg format</p>
                  <img src="../uploads/banner/<?= $brec['bnr_image']; ?>" style="width:20%;">
                </div>

                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios33" name="align" <?php if($brec['bnr_align']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios33">Left Image</label>
                
                <input type="radio" value="0" id="optionsRadios44" name="align" <?php if($brec['bnr_align']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios44">Right Image</label>
                </div>
               
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['bnr_status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['bnr_status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
                </div>
             
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->
<?php require("includes/footer.php"); ?>  
<script>
$(document).ready(function() {
App.init();
});
</script>
</body>
</html>