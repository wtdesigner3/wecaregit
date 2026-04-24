<?php
require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_homebottombnr`");
$conrec=mysqli_fetch_array($condata);
if(isset($_POST['update']))
{
$title = mysqli_real_escape_string($conn,$_POST['title']);    
$des = mysqli_real_escape_string($conn,$_POST['des']);
$title2 = mysqli_real_escape_string($conn,$_POST['title2']);    
$des2 = mysqli_real_escape_string($conn,$_POST['des2']);



//======================================//    
  $aimage=$_FILES['aimage']['name'];
  $aimage=time()."_".$aimage; 
  $fileinfo = @getimagesize($_FILES["aimage"]["tmp_name"]);
  if($fileinfo!='')
  {
  move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/icons/".$aimage);
  }
  else
  { 
  $aimage = $conrec['image'];
  }
  
  $bimage=$_FILES['bimage']['name'];
  $bimage=time()."_".$bimage; 
  $fileinfo2 = @getimagesize($_FILES["bimage"]["tmp_name"]);
  if($fileinfo2!='')
  {
  move_uploaded_file($_FILES['bimage']['tmp_name'],"../uploads/icons/".$bimage);
  }
  else
  { 
  $bimage = $conrec['image2'];
  }

  $query=mysqli_query($conn,"UPDATE `tbl_homebottombnr` SET `title`='$title',`image`='$aimage',`des`='$des',`title2`='$title2',`image2`='$bimage',`des2`='$des2' ");
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
				<li class="breadcrumb-item active">Manage Home Banner</li>
			</ol>
			<!-- begin page-header -->
			<h1 class="page-header">Manage Home Banner</h1>
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
							<h4 class="panel-title">Manage Home Banner</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">                 
		<form role="form" method="POST"  enctype="multipart/form-data">

      
        <div class="col-lg-12 text-center"><strong><font color="#000">Home page Banner Content</font></strong></div>
              <div class="box-body">
                <div class="form-group">
                  <label for="heading">First Banner Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['title']; ?>">
                </div>  
                
              <div class="row">    
                  <div class="form-group col-9">
                    <label>Description</label>
                    <textarea  name="des" id="editor1" class="form-control" placeholder="Enter text ..." rows="12"><?= $conrec['des']; ?></textarea>
                  </div>
                  <div class="col-3"> 
                  <div class="form-group">
                  <label>Image </label>
                  <input type="file"  name="aimage">
                </div><br>
                           
                    <img src="../uploads/icons/<?= $conrec['image']; ?>" style="width: 80%; margin-top: 25px;" /> 
                   <!--  <div style="background: lightgrey; margin-top: 10px;">
                    <div class="form-group">
                     <label for="heading">Alt Tag</label>
                     <input type="text"  name="alttag1" class="form-control" id="heading" placeholder="Enter Alt Tag" value="<?= $conrec['abt_alttag1']; ?>">
                    </div></div> -->
                          
                  </div>
              </div>
              
               <div class="form-group">
                  <label for="heading">Second Banner Title</label>
                  <input type="text"  name="title2" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['title2']; ?>">
                </div>  
                
              <div class="row">    
                  <div class="form-group col-9">
                    <label>Description</label>
                    <textarea  name="des2" id="editor2" class="form-control" placeholder="Enter text ..." rows="12"><?= $conrec['des2']; ?></textarea>
                  </div>
                  <div class="col-3"> 
                  <div class="form-group">
                  <label>Image </label>
                  <input type="file"  name="bimage">
                </div><br>
                           
                    <img src="../uploads/icons/<?= $conrec['image2']; ?>" style="width: 80%; margin-top: 25px;" /> 
                   <!--  <div style="background: lightgrey; margin-top: 10px;">
                    <div class="form-group">
                     <label for="heading">Alt Tag</label>
                     <input type="text"  name="alttag1" class="form-control" id="heading" placeholder="Enter Alt Tag" value="<?= $conrec['abt_alttag1']; ?>">
                    </div></div> -->
                          
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
