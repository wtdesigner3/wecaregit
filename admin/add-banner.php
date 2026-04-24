<?php

require('checksession.php'); 
require('includes/function.php');
if(isset($_POST['submit'])){
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $boldtitle = mysqli_real_escape_string($conn,$_POST['boldtitle']);
  $subtitle = mysqli_real_escape_string($conn,$_POST['subtitle']);
  $des = mysqli_real_escape_string($conn,$_POST['des']);
  $link = mysqli_real_escape_string($conn,$_POST['link']);  
  $link2 = mysqli_real_escape_string($conn,$_POST['link2']); 
  $position = mysqli_real_escape_string($conn,$_POST['position']);
  // $alt = mysqli_real_escape_string($conn,$_POST['alt']); 
  $align = mysqli_real_escape_string($conn,$_POST['align']); 
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  //=====banner===//
  $bimages=$_FILES['bimage']['name'];
  $unq= rand(1111, 9999); 
  $bimage=$unq."_".$bimages;
  if($bimages!=''){
  move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/banner/".$bimage);
  //====end===//

  $query=mysqli_query($conn,"INSERT INTO `tbl_banner`(`bnr_title`,`bnr_boldtitle`,`bnr_subtitle`, `bnr_sort`, `bnr_link`,`bnr_link2`, `bnr_alt`, `bnr_des`, `bnr_image`,`bnr_align`, `bnr_status`) 
    VALUES ('$title','$boldtitle','$subtitle','$position','$link','$link2','','$des','$bimage','$align','$status')");
   }else{
    $_SESSION['error']="Image Required";
  }
    if($query==true)
    {
    $_SESSION['success']="Banner inserted successfully";
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
                  <input type="text" name="subtitle" class="form-control" id="banner" placeholder="Enter Banner Subtitle">
                </div>
                  
                <div class="form-group d-none">
                  <label for="banner">Banner Bold Title</label>
                  <input type="text" name="boldtitle" class="form-control" id="banner" placeholder="Enter Banner Title">
                </div>

                <div class="form-group">
                  <label for="banner">Banner Title</label>
                  <input type="text" name="title" class="form-control" id="banner" placeholder="Enter Banner Title">
                </div>
                
                <div class="form-group d-none">
                 <label for="banner">Description</label>
                <input type="text" name="des" class="form-control" id="banner" placeholder="Enter Banner Description">
                </div>
                
                <!-- <div class="form-group">-->
                <!--  <label for="exampleInputalt">Banner Alt</label>-->
                <!--  <input type="text" name="alt"  placeholder="Banner Alt" class="form-control" id="exampleInputalt">-->
                <!--</div>-->
                
                 <div class="form-group d-none">
                  <label for="bannerlink">Banner Link-1</label>
                  <input type="text"  name="link"  placeholder="Re-direct Link" class="form-control" id="bannerlink">
                </div>

                <div class="form-group d-none">
                  <label for="bannerlink">Banner Link-2</label>
                  <input type="text"  name="link2"  placeholder="Re-direct Link" class="form-control" id="bannerlink">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Banner position</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be (1920px X 800px) & must be jpg format</p>
                </div>

                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios33" name="align" >
                <label for="optionsRadios33">Left Image</label>
                <input type="radio" value="0" id="optionsRadios44" name="align" checked>
                <label for="optionsRadios44">Right Image</label>
                </div>

                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
