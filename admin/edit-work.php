<?php
require('checksession.php');
include 'includes/function.php';     

$id=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_work` where `id`='$id'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{
  $phpdate = date("Y/m/d");
  $title = mysqli_real_escape_string($conn,$_POST['title']);  
  $pgurl = mysqli_real_escape_string($conn,$_POST['pgurl']);
  $rewriteurl = str_replace(array( '\'', '"', '&', '$', '@', '#', '--', '/', '_', '?', ' ', ',', ';', '<', '>' ), '-', $pgurl);
    $newurl = strtolower($rewriteurl);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $bed = mysqli_real_escape_string($conn,$_POST['bed']);
    $bath = mysqli_real_escape_string($conn,$_POST['bath']);
  $size = mysqli_real_escape_string($conn,$_POST['size']);
    $sort = mysqli_real_escape_string($conn,$_POST['sort']);
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']);  
  $bimage=$_FILES['bimage']['name'];
  $bimage=time()."_".$bimage;
  $fileinfo = @getimagesize($_FILES["bimage"]["tmp_name"]);
   if($fileinfo!=''){
   @unlink("../uploads/work/".$old); 
   move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/work/".$bimage);
   } else {
   $bimage = $brec['image'];
   }

  $query=mysqli_query($conn,"UPDATE `tbl_work` SET `title`='$title',`url`='$newurl',`price`='$price',`image`='$bimage',`bed`='$bed',`bath`='$bath',`size`='$size',`sort`='$sort',`status`='$status' WHERE `id`='$id'");
 if($query==true)
  {
	$_SESSION['success']="Work Updated successfully";
	header("refresh:3;url=manage-work.php");  
	}
	else 
	{
	// Message for unsuccessfull insertion
	$_SESSION['success']="Something went wrong. Please try again";
	header("refresh:3;url=manage-work.php");  	
	}
  } 
  ?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
	
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">work Management</a></li>
				<li class="breadcrumb-item active">Edit work</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Managed work</h1>
			<!-- end page-header -->
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
							<h4 class="panel-title">Edit work</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                
                 <div class="form-group">
                  <label for="one">work Title</label>
                  <input type="text"  name="title" class="form-control" id="one" value="<?= $brec['title']; ?>">
                </div>
             
                 <div class="form-group">
                  <label for="two">work Url</label>
                  <input type="text"  name="pgurl"  value="<?= $brec['url']; ?>" class="form-control" id="two">
                </div>

                 <div class="form-group">
                  <label for="bannerlink">work Image Front</label>
                  <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg"  value="<?= $brec['image']; ?>">
                  <img src="../uploads/work/<?= $brec['image']; ?>" width="100" height="40">
                  <p class="help-block">Image dimension must be 1360 X 600 & must be jpg format</p>
                </div>

                <div class="form-group">
                  <label for="one">Price</label>
                  <input type="text"  name="price" class="form-control" id="one" value="<?= $brec['price']; ?>">
                </div>

                <div class="form-group">
                  <label for="one">work Bed</label>
                  <input type="text"  name="bed" class="form-control" id="one" value="<?= $brec['bed']; ?>">
                </div>

                <div class="form-group">
                  <label for="one">work Bath</label>
                  <input type="text"  name="bath" class="form-control" id="one" value="<?= $brec['bath']; ?>">
                </div>

                <div class="form-group">
                  <label for="one">work Size</label>
                  <input type="text"  name="size" class="form-control" id="one" value="<?= $brec['size']; ?>">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Sort Number</label>
                  <input type="number" name="sort" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                </div>

                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
                </div>
                
               <!--  <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" value="<?= $brec['metatag']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" class="form-control" ><?= $brec['keyword']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['metadescription']; ?></textarea>
                 </div>
                 </div> <br/>
              
              </div> -->
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                <!-- <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" />  -->
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
			CKEDITOR.replace('editor1', {
filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
      CKEDITOR.replace('editor2', {
filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
		});

    window.onload = function() {
    var src = document.getElementById("one"),
        dst = document.getElementById("two");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
};
	</script>   
<script>
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
