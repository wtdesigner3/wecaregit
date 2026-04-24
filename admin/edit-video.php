<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('checksession.php');
include 'includes/function.php';     

$b=$_REQUEST['cid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_video` where `id`='$b'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $url = mysqli_real_escape_string($conn,$_POST['url']); 
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  $sort = mysqli_real_escape_string($conn,$_POST['sort']); 

  
       $query=mysqli_query($conn,"UPDATE `tbl_video` SET `brand_id`='$category',`url`='$url',`sort`='$sort',`status`='$status' WHERE `id`='$b'");
  
      if($query==true)
    {
    $_SESSION['success']="Video Updated successfully";
    header("refresh:3;url=manage-video.php"); 
    }
    else 
    {
    // Message for unsuccessfull insertion
    $_SESSION['success']="Something went wrong. Please try again";
    header("refresh:3;url=manage-video.php"); 
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
				<li class="breadcrumb-item"><a href="javascript:;">Video Management</a></li>
				<li class="breadcrumb-item active">Edit Video</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Video<small>...</small></h1>
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
							<h4 class="panel-title">Edit Video</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
                <div class="form-group">
                    <label for="heading">Select Category</label>
                    <select name="category" class="form-control" onchange="updateCategory(this.value)" required>
                        <option>Select Category</option>
                        <?php
                        $cdata = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE  `status`='1' ");
                        while ($crec = mysqli_fetch_array($cdata)) 
                        {
                          if($brec["brand_id"]==$crec["id"])
                          {
                            ?>
                              <option value="<?= $crec['id']; ?>" selected><?= $crec['heading']; ?></option>
                          <?php
                          }
                          else
                          {
                              ?>
                              <option value="<?= $crec['id']; ?>"><?= $crec['heading']; ?></option>
                            <?php
                          }
                        }
                        ?>
                    </select>
                </div>
                        
                <div class="form-group">
                  <label for="heading">Video URL</label>
                  <input type="text"  name="url" class="form-control" id="heading" value="<?= $brec['url']; ?>">
                  <iframe width="220" height="115" src="<?= $brec['url']; ?>"></iframe>
                </div>
                
                <div class="form-group">
                  <label for="sort">Position</label>
                  <input type="text"  name="sort" class="form-control" id="sort" placeholder="0-9" value="<?= $brec['sort']; ?>">
                </div>
            
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['status']=='0'){ echo 'checked';}?>>
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
