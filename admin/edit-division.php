<?php
require('checksession.php');
include 'includes/function.php';     

$id=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_division` where `id`='$id'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{
  $phpdate = date("Y/m/d");
  $title = mysqli_real_escape_string($conn,$_POST['title']);
	$cname = mysqli_real_escape_string($conn,$_POST['cname']);	
	$loc = mysqli_real_escape_string($conn,$_POST['loc']);
	$exp = mysqli_real_escape_string($conn,$_POST['exp']);
	$work = mysqli_real_escape_string($conn,$_POST['work']);
	$emp = mysqli_real_escape_string($conn,$_POST['emp']);
	$sal = mysqli_real_escape_string($conn,$_POST['sal']);
	$pgurl = mysqli_real_escape_string($conn,$_POST['pgurl']);
	$rewriteurl = str_replace(array( '\'', '"', '&', '$', '@', '#', '--', '/', '_', '?', ' ', ',', ';', '<', '>' ), '-', $pgurl);
  $newurl = strtolower($rewriteurl);
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);
  $des = mysqli_real_escape_string($conn,$_POST['des']);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);		
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);	
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']);	
	$position = mysqli_real_escape_string($conn,$_POST['position']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']); 
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']); 
  $old2 = mysqli_real_escape_string($conn,$_POST['oldimg2']);
  $alt1 = mysqli_real_escape_string($conn,$_POST['alt1']); 
  $alt2 = mysqli_real_escape_string($conn,$_POST['alt2']);
  $bimage=$_FILES['bimage']['name'];
  
   if($bimage!=''){
   $bimage=time()."_".$bimage;
//   $fileinfo = @getimagesize($_FILES["bimage"]["tmp_name"]);
   @unlink("../uploads/division/".$old); 
   move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/division/".$bimage);
   } else {
   $bimage = $brec['image'];
   }


  $cimage=$_FILES['cimage']['name'];
  
//   $fileinfo = @getimagesize($_FILES["cimage"]["tmp_name"]);
   if($cimage!=''){
       $cimage=time()."_".$cimage;
   @unlink("../uploads/division/".$old2); 
   move_uploaded_file($_FILES["cimage"]["tmp_name"], "../uploads/division/".$cimage);
   } else {
   $cimage = $brec['imghover'];
   }
  $query=mysqli_query($conn,"UPDATE `tbl_division` SET `alt1`='$alt1',`alt2`='$alt2',`title`='$title',`cname`='$cname',`loc`='$loc',`exp`='$exp',`work`='$work',`emp`='$emp',`sal`='$sal',`url`='0',`image`='$bimage',`imghover`='$cimage',`shortdes`='$desc',`des`='$des',`metatag`='$metatag',`keyword`='$keyword',`metadesc`='$metadesc',`sort`='$position',`status`='$status',`date`='$phpdate' WHERE `id`='$id'");
 if($query==true)
  {
	$_SESSION['success']="Data Updated successfully";
	header("refresh:3;url=manage-division.php");  
	}
	else 
	{
	// Message for unsuccessfull insertion
	$_SESSION['success']="Something went wrong. Please try again";
	header("refresh:3;url=manage-division.php");  	
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
				<li class="breadcrumb-item"><a href="javascript:;">Career Management</a></li>
				<li class="breadcrumb-item active">Edit Career</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Career</h1>
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
							<h4 class="panel-title">Edit Career</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						  <div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="one">Career Title</label>
                  <input type="text"  name="title" class="form-control" id="one" value="<?= $brec['title']; ?>">
                </div>
             
                 <!-- <div class="form-group">
                  <label for="two">Career Url</label>
                  <input type="text"  name="pgurl"  value="<?= $brec['url']; ?>" class="form-control" id="two">
                </div> -->
                
                <div class="form-group">
                  <label for="dd">Company Name</label>
                  <input type="text"  name="cname" class="form-control" id="dd" value="<?= $brec['cname']; ?>">
                </div>

                <div class="form-group">
                  <label for="dd">Job Location</label>
                  <input type="text"  name="loc" class="form-control" id="dd" value="<?= $brec['loc']; ?>">
                </div>

				<div class="form-group">
                  <label for="dd">Job Experience</label>
                  <input type="text"  name="exp" class="form-control" id="dd" value="<?= $brec['exp']; ?>">
                </div>

				<div class="form-group">
                  <label for="dd">Job Work Level</label>
                  <input type="text"  name="work" class="form-control" id="dd" value="<?= $brec['work']; ?>">
                </div>

				<div class="form-group">
                  <label for="dd">Employee Type</label>
                  <input type="text"  name="emp" class="form-control" id="dd" value="<?= $brec['emp']; ?>">
                </div>

				<div class="form-group">
                  <label for="dd">Offer Salary</label>
                  <input type="text"  name="sal" class="form-control" id="dd" value="<?= $brec['sal']; ?>">
                </div>

                 <div class="form-group">
                  <label for="bannerlink">Career Background Image</label>
                  <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg"  value="<?= $brec['image']; ?>">
                  <img src="../uploads/division/<?= $brec['image']; ?>" width="100" height="40">
                  <p class="help-block">Image dimension must be 1360 X 600 & must be jpg format</p>
                </div>
                <div class="form-group">
                  <label for="dd">Alt</label>
                  <input type="text"  name="alt1" class="form-control" id="dd" value="<?= $brec['alt1']; ?>">
                </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Company Logo</label>
                  <input type="file"  name="cimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg2"  value="<?= $brec['imghover']; ?>">
                  <img src="../uploads/division/<?= $brec['imghover']; ?>" width="100" height="40">
                  <p class="help-block">Image dimension must be 1360 X 600 & must be jpg format</p>
                </div>
                
                <div class="form-group">
                  <label for="dd">Alt</label>
                  <input type="text"  name="alt2" class="form-control" id="dd" value="<?= $brec['alt2']; ?>">
                </div>

                <div class="form-group">
                  <label for="dd">Short Description</label>
                  <input type="text"  name="desc" class="form-control" id="dd" value="<?= $brec['shortdes']; ?>">
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea  name="des" class="editor1 form-control" id="editor1" placeholder="Enter text ..." rows="12"><?= $brec['des']; ?></textarea>
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Sort Number</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                </div>

                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
                </div>
                
                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
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
                  <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['metadesc']; ?></textarea>
                 </div>
                 </div> <br/>
              
              </div>
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
