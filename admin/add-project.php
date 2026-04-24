<?php
require('checksession.php');
include 'includes/function.php';     
if(isset($_POST['submit']))
{  
    $phpdate = date("Y/m/d");
	$category = mysqli_real_escape_string($conn,$_POST['category_id']);
	$name = mysqli_real_escape_string($conn,$_POST['name']);	
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);		
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);	
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']);	
	$position = mysqli_real_escape_string($conn,$_POST['position']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']);	
	$bimage=$_FILES['bimage']['name'];
	$bimage=time()."_".$bimage;
	move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/project/".$bimage);

	$query=mysqli_query($conn,"INSERT INTO `tbl_project`(`category_id`, `name`, `image`, `metatag`, `keyword`, `metadesc`, `sort`, `status`, `date`) VALUES ('$category','$name','$bimage','$metatag','$keyword','$metadesc','$position','$status',' $phpdate')");
		if($query==true)
		{
		$_SESSION['success']="Data Added Successfully";
		header("refresh:3;url=manage-project.php");	
		}
		else 
		{
		$_SESSION['error']="Something went wrong. Please try again";
		header("refresh:3;url=add-project.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Portfolio Management</a></li>
				<li class="breadcrumb-item active">Add Portfolio</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Portfolio</h1>
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
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-refresh"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Add Portfolio</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
               
               <div class="row"> 
                <div class="form-group col-md-12">
                 <label for="heading">Portfolio Category</label>
                  <select  class="form-control" name="category_id">
                     <option disabled>Select Portfolio Category</option>
                           <?php
                            $cdata=mysqli_query($conn,"SELECT * FROM `tbl_projectcategory` WHERE  `status`='1' ");
                            while($crec=mysqli_fetch_array($cdata))
                            {
                           ?>    
                            <option value="<?= $crec['id']; ?>"><?= $crec['name']; ?></option>
                           <?php 
                           } 
                           ?>      
                  </select>
                </div>
                 <div class="form-group col-md-6">
                  <label for="one">Title</label>
                  <input type="text"  name="name" class="form-control" id="one" placeholder="Enter Page Title(Heading)">
                </div>
               
               </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Portfolio Image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image dimension must be 1360 X 600 & must be jpg format</p>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Sort Number</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
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
                <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
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


<!------------------------------>
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
