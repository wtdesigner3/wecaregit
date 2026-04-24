<?php
require('checksession.php'); 
include 'includes/function.php';
//include 'includes/imgclass.php';    
$b=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_partner` where `p_id`='$b'");
$brec=mysqli_fetch_array($bdata);
//$uploadPath = "../uploads/partner/"; 
if(isset($_POST['update']))
{
  $name = mysqli_real_escape_string($conn,$_POST['title']); 
  $sort = mysqli_real_escape_string($conn,$_POST['position']);
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  
  $alt = mysqli_real_escape_string($conn,$_POST['alt']); 
  
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']); 
  $bimages = basename($_FILES["bimage"]["name"]);
  $bimage=time()."_".$bimages; 
    
  

  if($bimages!=''){  
    move_uploaded_file($_FILES['bimage']['tmp_name'],"../uploads/client/".$bimage);
    $query=mysqli_query($conn,"UPDATE `tbl_partner` SET `p_title`='$name', `p_sort`='$sort',`alt`='$alt', `p_image`='$bimage', `p_status`='$status' WHERE `p_id`='$b'");		
  }
  else
  {
    $query=mysqli_query($conn,"UPDATE `tbl_partner` SET `p_title`='$name', `p_sort`='$sort',`alt`='$alt', `p_status`='$status' WHERE `p_id`='$b'");
  }
  if($query==true)
  {
  $_SESSION['success']="Partner Updated Successfully";	
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
				<li class="breadcrumb-item active">Edit Partner</li>
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
							<h4 class="panel-title"> Edit Partner</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">
			<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="banner">Title</label>
                  <input type="text" name="title" class="form-control" id="banner" value="<?= $brec['p_title']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Project Overview Image</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <input type="hidden" name="oldimg"  value="<?= $brec['p_image']; ?>">
                   <p class="help-block">Image dimension must be 525px X 230px & must be jpg format</p>
                   <img src="../uploads/client/<?= $brec['p_image'];?>" style="width:20%;">
                </div>
                
                <div class="form-group">
                  <label for="banner">Alt</label>
                  <input type="text" name="alt" class="form-control" value="<?= $brec['alt']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Position</label>
                  <input type="number" name="position" class="form-control" value="<?= $brec['p_sort']; ?>">
                </div>
                
                
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['p_status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['p_status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
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
