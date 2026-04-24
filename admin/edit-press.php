<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);
require('checksession.php');
include 'includes/function.php';     

$b=$_REQUEST['cid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_press` where `id`='$b'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{
  $title = mysqli_real_escape_string($conn,$_POST['title']);	
  
  $des = mysqli_real_escape_string($conn,$_POST['des']);
  $url = mysqli_real_escape_string($conn,$_POST['url']);
  $video = mysqli_real_escape_string($conn,$_POST['video']);
 
  $sort = mysqli_real_escape_string($conn,$_POST['sort']);
  $status = mysqli_real_escape_string($conn,$_POST['status']);	 
  $alt = mysqli_real_escape_string($conn,$_POST['alt']);	 
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']);  
  $bimages=$_FILES['bimage']['name'];
   if($bimages!=''){
        $bimage=time()."_".$bimages;
        @unlink("../uploads/team/".$old);
      move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/team/".$bimage);
  }
   else
  {
   $bimage=$brec['image'];
  }
    $query=mysqli_query($conn,"UPDATE `tbl_press` SET `title`='$title', `url`='$url',`alt`='$alt', `des`='$des', `image`='$bimage', `sort`='$sort', `status`='$status',`video`='$video' WHERE `id`='$b'");
    if($query==true)
        {
        $_SESSION['success']="Data Updated Successfully";
		header("refresh:3;url=manage-press.php");
        }
        else 
        {
        $_SESSION['error']="Something went wrong. Please try again";
		header("refresh:3;url=manage-press.php");
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
				<li class="breadcrumb-item"><a href="javascript:;">Press Management</a></li>
				<li class="breadcrumb-item active">Edit Press</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Press</h1>
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
							<h4 class="panel-title">Edit Press</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
            
                <div class="form-group">
                  <label for="one">Title</label>
                  <input type="text"  name="title" class="form-control" id="one" value="<?= $brec['title']; ?>">
                 
                </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Url</label>
                  <input type="text"  name="url"  value="<?= $brec['url']; ?>" class="form-control" id="two">
                </div>
                
                <div class="form-group">
                  <label for="bannerlink">Description</label>
                  <input type="text"  name="des"  value="<?= $brec['des']; ?>" class="form-control" id="bannerlink">
                 </div>
                 
                
                <div class="form-group">
                  <label for="bannerlink">Image File</label> <code>Image size should be 700px X 800px in jpg or png </code>
                  <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg"  value="<?= $brec['image']; ?>">
                  <img src="../uploads/team/<?= $brec['image']; ?>" width="100" height="40">
                 
                </div>
                
                <div class="form-group">
                  <label for="alt">Alt</label>
                  <input type="text"  name="alt" class="form-control" id="alt" value="<?= $brec['alt']; ?>">
                 
                </div>
                
                                
                <div class="form-group">
                  <label for="bannerlink">Video Url</label>
                  <input type="text"  name="video"  value="<?= $brec['video']; ?>" class="form-control" id="bannerlink">
                 </div>
                
               <div class="form-group">
                  <label for="bannerlink">Sort By</label>
                  <input type="number"  name="sort" value="<?= $brec['sort']; ?>" class="form-control" id="bannerlink">
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
                  <input type="text" name="metatag" id="metatag" value="<?= $brec['d_metatag']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" class="form-control" ><?= $brec['d_keyword']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['d_metadesc']; ?></textarea>
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
			CKEDITOR.replace('editor1');
		});
// Copy url
// 		window.onload = function() {
//     var src = document.getElementById("one"),
//         dst = document.getElementById("two");
//     src.addEventListener('input', function() {
//         dst.value = src.value;
//     });
// };
	</script>
<!------------------------>

<!------------------------------>    
    
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
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
