<?php
require('checksession.php');
include 'includes/function.php';     
if(isset($_POST['submit']))
{  
    $phpdate = date("Y/m/d");
	$category = mysqli_real_escape_string($conn,$_POST['category_id']);
	$heading = mysqli_real_escape_string($conn,$_POST['heading']);
	$link = mysqli_real_escape_string($conn,$_POST['link']);
	$pgurl = mysqli_real_escape_string($conn,$_POST['pgurl']);
	$rewriteurl = str_replace(array( '\'', '"', '&', '$', '@', '#', '--', '---', '(', ')', '[', ']', '.', '/', '_', '?', ' ', ',', ';', '<', '>' ), '-', $pgurl);
    $newurl = strtolower($rewriteurl);
	$des = mysqli_real_escape_string($conn,$_POST['des']);
	$shortdes = mysqli_real_escape_string($conn,$_POST['shortdes']);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);		
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);	
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']);	
	$head_detail = mysqli_real_escape_string($conn,$_POST['head_detail']);	
	$position = mysqli_real_escape_string($conn,$_POST['position']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']);
	$alt1 = mysqli_real_escape_string($conn,$_POST['alt1']); 
    $alt2 = mysqli_real_escape_string($conn,$_POST['alt2']); 
    $halt = mysqli_real_escape_string($conn,$_POST['halt']); 
	$bimage=$_FILES['bimage']['name'];
	$bimage=time()."_".$bimage;
	move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/services/".$bimage);
	
	$cimage=$_FILES['cimage']['name'];
	$cimage=time()."_".$cimage;
	move_uploaded_file($_FILES["cimage"]["tmp_name"], "../uploads/services/".$cimage);
	
	$himage=$_FILES['himage']['name'];
	$himage=time()."_".$himage;
	move_uploaded_file($_FILES["himage"]["tmp_name"], "../uploads/services/".$himage);
	
	$dimage=$_FILES['dimage']['name'];
	$dimage=time()."_".$dimage;
	move_uploaded_file($_FILES["dimage"]["tmp_name"], "../uploads/services/".$dimage);
	
	
	
	
	$query=mysqli_query($conn,"INSERT INTO `tbl_services`(`category_id`,`heading`,`url`,`des`,`alt1`,`alt2`,`halt`,`shortdes`,`image`,`icon`,`hicon`,`breadcrumb`, `metatag`, `keyword`, `metadesc`, `sort`, `status`, `date`,`link`,`head_detail`) VALUES ('0','$heading','$newurl','$des','$alt1','$alt2','$halt','$shortdes','$bimage','$cimage','$himage','$dimage','$metatag','$keyword','$metadesc','$position','$status',' $phpdate','$link','$head_detail')");
		if($query==true)
		{
		$_SESSION['success']="Data Added successfully";
		header("refresh:3;url=manage-services.php");	
		}
		else 
		{
		$_SESSION['error']="Something went wrong. Please try again";
		header("refresh:3;url=add-services.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Services Management</a></li>
				<li class="breadcrumb-item active">Add Services</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Services</h1>
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
							<h4 class="panel-title">Add Services</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
               
               <div class="row" style="display:none;"> 
                <div class="form-group col-md-12">
                 <label for="heading">Services Category</label>
                  <select  class="form-control" name="category_id">
                     <option disabled>Select Services Category</option>
                           <?php
                            $cdata=mysqli_query($conn,"SELECT * FROM `tbl_servicescategory` WHERE  `status`='1' ");
                            while($crec=mysqli_fetch_array($cdata))
                            {
                           ?>    
                            <option value="<?= $crec['id']; ?>"><?= $crec['name']; ?></option>
                           <?php 
                           } 
                           ?>      
                  </select>
                </div>
               
               </div>
               
                 <div class="form-group">
                  <label for="one">Services Heading</label>
                  <input type="text"  name="heading" class="form-control" id="one" placeholder="Enter (Heading)">
                </div>
                
                 <div class="form-group">
                  <label for="two">Services Url</label>
                  <input type="text"  name="pgurl" id="two" placeholder="pages.php" class="form-control" >
                  <p class="help-block">same as Event title or Seo Title</p>
                </div>
                
                <div class="form-group d-none">
                  <label for="two">Services Link <code>If redirect This Page Put Link Here..</code></label>
                  <input type="text"  name="link" id="" placeholder="Enter Link" class="form-control" >
                </div>
                
                <div class="form-group">
                  <label for="dd">Short Description</label>
                  <input type="text"  name="shortdes" class="form-control" id="dd" placeholder="Enter Text">
                </div>
                
                <div class="form-group">
                <label>Description</label>
                <textarea  name="des" class="editor1 form-control" id="editor1" placeholder="Enter text ..." rows="12"></textarea>
              </div>
            
                
				 <div class="form-group">
                  <label for="exampleInputPassword1">HomePage Image File</label><code>Image Size should be 706px X 193px in png and White image</code>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                </div>
                
                <div class="form-group d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="alt1" class="form-control" placeholder="Enter Alt">
                </div>
                
                <div class="form-group  d-none">
                  <label for="exampleInputPassword1">Home Icon File</label><code>Icon Size should be 512px X 512px in png</code>
                  <input type="file" name="cimage" class="form-control" id="exampleInputPassword1" >
                </div>
                
                <div class="form-group  d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="alt2" class="form-control" placeholder="Enter Alt">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Header Icon File</label><code>Icon Size should be 512px X 512px in png</code>
                  <input type="file" name="himage" class="form-control" id="exampleInputPassword1" >
                </div>
                
                <div class="form-group d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="halt" class="form-control" placeholder="Enter Alt">
                </div>
                
                <div class="form-group  d-none">
                  <label for="exampleInputPassword1">Breadcrumb File</label><code>Image Size should be 1920px X 250px in png or jpg</code>
                  <input type="file" name="dimage" class="form-control" id="exampleInputPassword1" >
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
                  <textarea name="metadesc" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="head_detail">Head Detail</label>
                  <textarea name="head_detail" id="head_detail" placeholder="Head Detail" class="form-control" ></textarea>
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
initSample();
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
</script> 	
<script>
$(document).ready(function() {
App.init();

});
</script>


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

$("#btnPassport").click(function () {
  if ($(this).val() == "Use Seo tools") {
		$("#dvPassport").show();
		$(this).val("Close Seo tools");
	} else {
		$("#dvPassport").hide();
		$(this).val("Use Seo tools");
	}
});


    var src = document.getElementById("one"),
        dst = document.getElementById("two");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
</script>
</body>
</html>
