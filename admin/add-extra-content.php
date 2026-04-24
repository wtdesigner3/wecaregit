<?php
require('checksession.php'); 
include 'includes/function.php'; 
if(isset($_POST['submit']))
{
       $category = mysqli_real_escape_string($conn, $_POST['category']);
$title = mysqli_real_escape_string($conn,$_POST['title']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
  $query = mysqli_query($conn, "INSERT INTO `tbl_extra_content` ( `brand_id`,`title`,`status`) VALUES ('$category','$title','$status')");

    if($query)
  {
  $_SESSION['success']="Data Updated Successfull";
  header("Refresh:2; url=manage-extra-content.php");
  }
  else
  {
  $_SESSION['error']="Something Error";
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
				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
				<li class="breadcrumb-item active">Manage Extra  Content</li>
			</ol>
			<!-- begin page-header -->
			<h1 class="page-header">Manage Extra  Content</h1>
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
							<h4 class="panel-title">Manage Extra  Content</h4>
						</div>
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
                                { ?>
                                     <option value="<?= $crec['id']; ?>"><?= $crec['heading']; ?></option>
                                    <?php
                                  }
                                ?>
                            </select>
                        </div>
                <div class="form-group">
                  <label for="heading"> Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Title">
                </div>  

              <div class="form-group">
                    <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                    <label for="optionsRadios3">Active</label>
                    <input type="radio" value="0" id="optionsRadios4" name="status">
                    <label for="optionsRadios4">Inactive</label>
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
});
</script>
</body>
</html>
