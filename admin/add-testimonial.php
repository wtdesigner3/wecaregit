<?php
require('checksession.php');
include 'includes/function.php';  

if(isset($_POST['submit']))
{  
    $phpdate = date("Y/m/d");
	$name = mysqli_real_escape_string($conn,$_POST['name']);	
	$profession = mysqli_real_escape_string($conn,$_POST['profession']);	
	$description = mysqli_real_escape_string($conn,$_POST['description']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']);	
	$alt = mysqli_real_escape_string($conn,$_POST['alt']); 
	$bimage=$_FILES['bimage']['name'];
	$bimage=time()."_".$bimage;
	
		move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/testimonial/".$bimage);
		$query=mysqli_query($conn,"INSERT INTO `tbl_testimonial`(`name`, `profession`, `image`,`alt`, `detail`, `date`, `status`) VALUES ('$name','$profession','$bimage','$alt','$description','$phpdate','$status')");
		if($query==true)
		{
		$_SESSION['success']="Testimonial inserted successfully";
		header("refresh:3;url=manage-testimonial.php");	
		}
		else 
		{
		// Message for unsuccessfull insertion
		$_SESSION['success']="Something went wrong. Please try again";
		header("refresh:3;url=manage-testimonial.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Testimonial Management</a></li>
				<li class="breadcrumb-item active">Add Testimonial</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Testimonial <small>...</small></h1>
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
							<h4 class="panel-title">Add Testimonial</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" action="" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
            
              
                <div class="form-group">
                  <label for="heading">Name</label>
                  <input type="text"  name="name" class="form-control" id="heading" placeholder="Enter Name">
                </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Place</label>
                  <input type="text"  name="profession"  placeholder="Enter Place" class="form-control" id="bannerlink">
                 
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Image File</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image dimension must be 40 X 40 & must be jpg format</p>
                </div>
                
                <div class="form-group">
                  <label for="heading">Alt</label>
                  <input type="text"  name="alt" class="form-control" placeholder="Enter Alt">
                </div>
                
                
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea  name="description" class="textarea form-control" id="wysihtml5" placeholder="Enter text ..." rows="12"></textarea>
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
		FormWysihtml5.init();
	});
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
</body>
</html>
