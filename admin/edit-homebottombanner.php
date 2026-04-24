<?php
require('checksession.php'); 
include 'includes/function.php';
include 'includes/imgclass.php';    
$b=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_bottombanner` where `bnr_id`='$b'");
$brec=mysqli_fetch_array($bdata);
$uploadPath = "../uploads/page/"; 
if(isset($_POST['update']))
{
   $name = mysqli_real_escape_string($conn,$_POST['title']);
   $subtitle = mysqli_real_escape_string($conn,$_POST['sub']);
   $detail = mysqli_real_escape_string($conn,$_POST['des']);   
   $link = mysqli_real_escape_string($conn,$_POST['link']);
   $alt = mysqli_real_escape_string($conn,$_POST['alt']); 
   $old = mysqli_real_escape_string($conn,$_POST['oldimg']); 
   $bimages = basename($_FILES["bimage"]["name"]);
   $bimage=time()."_".$bimages; 
   $imageUploadPath = $uploadPath . $bimage; 
   $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
            // Image temp source 
            $imageTemp = $_FILES["bimage"]["tmp_name"];
			if($imageTemp!=''){ 
             // Compress size and upload image
			@unlink("../uploads/page/".$old);  
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 			
            }
            else
            {
	        $bimage=$brec['bnr_image'];
            }
   $query=mysqli_query($conn,"UPDATE `tbl_bottombanner` SET `bnr_title`='$name', `bnr_subtitle`='$subtitle', `bnr_des`='$detail', `bnr_link`='$link', `bnr_image`='$bimage', `bnr_alt`='$alt' WHERE `bnr_id`='$b'");
   if($query==true)
      {
	  $_SESSION['success']="Home Bottom Banner Updated Successfully";	
	  header("refresh:3;url=manage-homebottombanner.php");
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
				<li class="breadcrumb-item"><a href="javascript:;">Home Bottom Banner Management</a></li>
				<li class="breadcrumb-item active">Edit Home Bottom Banner</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Managed Home Bottom Banner </h1>
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
							<h4 class="panel-title"> Edit Home Bottom Banner</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">
			<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="banner">Bottom Banner Title</label>
                  <input type="text" name="title" class="form-control" id="banner" value="<?= $brec['bnr_title']; ?>">
                </div>

                <div class="form-group">
                  <label for="banner">Bottom Banner SubTitle</label>
                  <input type="text" name="sub" class="form-control" id="banner" value="<?= $brec['bnr_subtitle']; ?>">
                </div>

                <div class="form-group">
                  <label for="banner">Short Description</label>
                  <input type="text" name="des" class="form-control" id="banner" value="<?= $brec['bnr_des']; ?>">
                </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Bottom Banner Redirect Link</label>
                  <input type="text" name="link" class="form-control" id="bannerlink" value="<?= $brec['bnr_link']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Bottom Banner Image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <input type="hidden" name="oldimg"  value="<?= $brec['bnr_image']; ?>">
                   <img src="../uploads/page/<?= $brec['bnr_image']; ?>" style="width:20%;">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputalt">Bottom Banner Alt</label>
                  <input type="text" name="alt" class="form-control" id="exampleInputalt" value="<?= $brec['bnr_alt']; ?>">
                </div>
                
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
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
