<?php
require('checksession.php');
include 'includes/function.php';  

if(isset($_POST['submit']))
{  
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$pgurl = mysqli_real_escape_string($conn,$_POST['pgurl']);
	$rewriteurl = str_replace(array( '\'', '"', '&', '$', '@', '#', '--', '/', '_', '?', ' ', ',', ';', '<', '>' ), '-', $pgurl);
    $newurl = strtolower($rewriteurl);
	$profession = mysqli_real_escape_string($conn,$_POST['profession']);
	$des = mysqli_real_escape_string($conn,$_POST['des']);
	$experience = mysqli_real_escape_string($conn,$_POST['experience']);
	$facebook = mysqli_real_escape_string($conn,$_POST['facebook']);	
	$instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
	$twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
	$linkedin = mysqli_real_escape_string($conn,$_POST['linkedin']);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);	
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);	
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']);	
	$sort = mysqli_real_escape_string($conn,$_POST['sort']);
	$status = mysqli_real_escape_string($conn,$_POST['status']);	
	  $alt = mysqli_real_escape_string($conn,$_POST['alt']);
	$bimage=$_FILES['bimage']['name'];
	$bimage=time()."_".$bimage;
		move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/team/".$bimage);
		$query=mysqli_query($conn,"INSERT INTO `tbl_teams`(`d_name`, `alt`,`d_url`, `d_profession`, `d_des`, `d_experience`, `d_facebook`, `d_instagram`, `d_twitter`,`d_linked`, `d_image`,`d_metatag`, `d_keyword`, `d_metadesc`, `d_sort`, `d_status`) VALUES ('$name','$alt','$newurl','$profession','$des','$experience', '0','0','0','0','$bimage','$metatag','$keyword','$metadesc','$sort','$status')");
		if($query==true)
		{
		$_SESSION['success']="New Team Added Successfully";
		header("refresh:3;url=manage-team.php");	
		}
		else 
		{
		$_SESSION['error']="Something went wrong. Please try again";
		header("refresh:3;url=add-team.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Team Management</a></li>
				<li class="breadcrumb-item active">Add Team</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Team</h1>
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
							<h4 class="panel-title">Add Team</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" action="" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
            
              
                 <div class="form-group">
                   <label for="one">Name</label>
                   <input type="text"  name="name" class="form-control" id="one" placeholder="Enter Name">
                    <input type="hidden"  name="pgurl"  placeholder="pages.php" class="form-control" id="two">
                 </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Professional</label>
                  <input type="text"  name="profession"  placeholder="Enter Profession" class="form-control" id="bannerlink">
                 </div>
                 
                 <div class="form-group">
                  <label for="bannerlink">Experience</label>
                  <input type="text"  name="experience"  placeholder="Enter Experience" class="form-control" id="bannerlink">
                 </div>
                 
                  <div class="form-group">
                  <label>About Person</label>
                  <textarea  name="des" class="editor1 form-control" id="editor1" placeholder="Enter text ..." rows="12"></textarea>
                </div>
                
                 <!-- <div class="form-group">
                  <label for="bannerlink">Facebook</label>
                  <input type="text"  name="facebook"  placeholder="Enter facebook" class="form-control" id="bannerlink">
                 </div>
                 
                 <div class="form-group">
                  <label for="bannerlink">Instagram</label>
                  <input type="text"  name="instagram"  placeholder="Enter Instagram" class="form-control" id="bannerlink">
                 </div>
                 
                 <div class="form-group">
                  <label for="bannerlink">Twitter</label>
                  <input type="text"  name="twitter"  placeholder="Enter Twitter" class="form-control" id="bannerlink">
                 </div>

                 <div class="form-group">
                  <label for="bannerlink">LinkedIn</label>
                  <input type="text"  name="linkedin"  placeholder="Enter LinkedIn" class="form-control" id="bannerlink">
                 </div> -->
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Team Profile Image</label><code>Iamge size should be 700px X 800px in jpg or png </code>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                 </div>
                 <div class="form-group">
                  <label for="bannerlink">Alt</label>
                  <input type="text"  name="alt"  placeholder="Enter Alt" class="form-control" id="bannerlink">
                 </div>
                
                
                <div class="form-group">
                  <label for="bannerlink">Sort By</label>
                  <input type="number"  name="sort" placeholder="Sort by" class="form-control" id="bannerlink">
                 </div>
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
                </div>
                
                 <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                 </div>
                 </div> <br/>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
	
	<!------------------>
window.onload = function() {
    var src = document.getElementById("one"),
        dst = document.getElementById("two");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
};
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
