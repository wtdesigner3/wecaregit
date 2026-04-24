<?php
require('checksession.php'); 
require('includes/function.php'); 
if(isset($_POST['submit'])){
  
    $title = mysqli_real_escape_string($conn,$_POST['title']); 
	$position = mysqli_real_escape_string($conn,$_POST['position']);
	$status = mysqli_real_escape_string($conn,$_POST['status']); 
	 $alt = mysqli_real_escape_string($conn,$_POST['alt']); 
	$bimages = basename($_FILES["bimage"]["name"]);
	$bimage=time()."_".$bimages; 
    
	move_uploaded_file($_FILES['bimage']['tmp_name'],"../uploads/client/".$bimage);

	$query=mysqli_query($conn,"INSERT INTO `tbl_partner`(`p_title`,`alt`, `p_sort`, `p_image`, `p_status`) VALUES ('$title','$alt','$position','$bimage','$status')");
		if($query==true)
		{
		$_SESSION['success']="Partner inserted successfully";
		header("refresh:3;url=manage-partner.php");
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
				<li class="breadcrumb-item active">Add Partner</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Partner</h1>
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
							<h4 class="panel-title">Add Partner</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">
			<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="banner">Title</label>
                  <input type="text" name="title" class="form-control" id="banner" placeholder="Enter Project Title">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 525px X 230px & png & jpg format.</p>
                </div>
                <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt" class="form-control" placeholder="Enter Alt">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Position</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
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
