<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_whychoose`");
$conrec=mysqli_fetch_array($condata);
if(isset($_POST['update']))
{
$title = mysqli_real_escape_string($conn,$_POST['title']); 
$alt = mysqli_real_escape_string($conn,$_POST['alt']); 
$subtitle = mysqli_real_escape_string($conn,$_POST['subtitle']); 

  $gimage=$_FILES['gimage']['name'];
  
//   $fileinfo5 = @getimagesize($_FILES["gimage"]["tmp_name"]);
  if($gimage!='')
  {
      $gimage=time()."_".$gimage; 
  move_uploaded_file($_FILES['gimage']['tmp_name'],"../uploads/icons/".$gimage);
  }
  else
  { 
  $gimage = $conrec['img7'];
  }
  //======================================//

  $query=mysqli_query($conn,"UPDATE `tbl_whychoose` SET `title`='$title',`alt`='$alt',`subtitle`='$subtitle',`img7`='$gimage'");
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
        <li class="breadcrumb-item active">Manage Home Why Us</li>
      </ol>
      <!-- begin page-header -->
      <h1 class="page-header">Manage Home Why Us</h1>
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
              <h4 class="panel-title">Manage Home Why Us</h4>
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
                <label for="heading">Heading SubTitle</label>
                <input type="text"  name="subtitle" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['subtitle']; ?>">
                </div> 
                  
                </div>
                
                <div class="row">    
                  <div class="col-12"> 
                   <div class="form-group">
                      <label>Image </label>
                      <input type="file"  name="gimage">
                       <p>Icon size should be 2121px X 1414 px and jpg format</p>
                      <img src="../uploads/icons/<?= $conrec['img7']; ?>" style="width:20%;" /> 
                   </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="heading">Alt</label>
                  <input type="text"  name="alt" class="form-control" id="heading" placeholder="Enter Alt" value="<?= $conrec['alt']; ?>">
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
