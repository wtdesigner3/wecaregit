<?php
require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_bottomsections`");
$conrec=mysqli_fetch_array($condata);
if(isset($_POST['update']))
{
$title = mysqli_real_escape_string($conn,$_POST['title']); 
$des = mysqli_real_escape_string($conn,$_POST['des']);
$alt = mysqli_real_escape_string($conn,$_POST['alt']); 

 if(!empty($_FILES["bimage"]["name"])) { 
  
  $bimage=$_FILES['bimage']['name'];
  $bimage=time()."_".$bimage; 
  move_uploaded_file($_FILES['bimage']['tmp_name'],"../uploads/home/".$bimage);
  }else{
 $bimage = $conrec['image'];
}

 
  $query=mysqli_query($conn,"UPDATE `tbl_bottomsections` SET `title`='$title',`alt`='$alt',`des`='$des',`image`='$bimage'");
  if($query)
  {
  $_SESSION['success']="Data Updated Successfull";
  header("refresh: 3;");
  }
  else
  {
  $_SESSION['error']="Something Error";
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
        <li class="breadcrumb-item active">Manage Home Bottom Section</li>
      </ol>
      <!-- begin page-header -->
      <h1 class="page-header">Manage Home Bottom Section</h1>
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
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-refresh"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Manage Home Bottom Section</h4>
            </div>
            <!-- begin panel-body -->
            <div class="panel-body">                 
            <form role="form" method="POST"  enctype="multipart/form-data"> 
              
              <div class="box-body">
                <div class="form-group">
                  <label for="heading">Heading Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['title']; ?>">
                </div>

                <div class="form-group">
                <label for="heading">Description </label>
                <textarea name="des" class="form-control" id="heading" placeholder="Enter Title" rows="3"><?= $conrec['des']; ?></textarea>
                </div> 
                
                             
                <div class="form-group">
                  <label for="exampleInputPassword1">Background Image</label>
                  <input type="file"  name="bimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image must be 1920 × 1080 px & jpg format</p>
                  <img src="../uploads/home/<?= $conrec['image']; ?>" style="width:20%;" /> 
                 </div>
                <div class="form-group">
                  <label for="heading">Alt</label>
                  <input type="text"  name="alt" class="form-control" placeholder="Enter Alt" value="<?= $conrec['alt']; ?>">
                </div>
                  
               </div>
              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
               <!--  <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" />  -->
              </div>
            </form>
            </div>
            <!-- end panel-body -->
          </div>
          <!-- end panel -->
        </div>
        <!-- end col-10 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end #content -->
    
    
    
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
CKEDITOR.replace('editor1', {
 filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});

CKEDITOR.replace('editor2', {
 filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});

CKEDITOR.replace('editor3', {
 filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});

CKEDITOR.replace('editor4', {
 filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
//============//
$(function () {
$("#btnPassport").click(function () {
  if ($(this).val() == "Use Seo tools") {
    $("#dvPassport").show();
    $(this).val("Close Seo tools");
  } else {
    $("#dvPassport").hide();
    $(this).val("Use Seo tools");
  }
});
});
</script>
</body>
</html>
