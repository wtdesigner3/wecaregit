<?php
require('checksession.php');
include 'includes/function.php';     
?>

<?php
ob_start();
$res_name="Training Edit";
@extract($_REQUEST);
if(isset($_GET['eid'])!=''){ $eid=$_GET['eid']; }
if(isset($_POST['submit']))
{
$date1 = date('Y-m-d');
 $sqlqry=mysqli_query($conn,"UPDATE `comments` SET `reply`='$reply',`date1`='$date1' WHERE id='$eid'");
	
	if($sqlqry==true)
	{
		$msg=" Updated Successfully";	
	}
}
$QRY=mysqli_query($conn,"select * from `comments` where id='$eid'");
$web=mysqli_fetch_array($QRY);


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
				<li class="breadcrumb-item"><a href="javascript:;">Reply</a></li>
				<li class="breadcrumb-item active">Reply</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Reply<small>...</small></h1>
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
							<h4 class="panel-title">Reply</h4>
						</div>
						<!-- end panel-heading -->
						 <?php if(@$erromsg!=''){ ?>
                               <!-- Alert-->
                               <div class="msg" style="padding:5px 10px 0 10px;">
                                <div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $erromsg;?>
                                    </div>
                                </div>
                                <?php  } if(@$msg!=''){?>
                               <div class="msg" style="padding:5px 10px 0 10px;">
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!</b> <?php echo $msg;?>
                                    </div>
                                </div>
                                <?php } ?>
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea  name="message" class="textarea form-control"   rows="12"><?php echo $web['message']; ?></textarea>
                </div>
                
                 <div class="form-group">
                  <label>Reply</label>
                  <textarea  name="reply" class="textarea form-control" placeholder="Enter text ..." rows="12"></textarea>
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
	
<?php require("includes/footer-data.php"); ?>
<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
	<script>

		$(document).ready(function () {

			$('select').selectpicker();

		});
	</script>
    	
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
