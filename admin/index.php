<?php 
require('checksession.php'); 
require('includes/function.php');
//=============//
 $count2= mysqli_query($conn,"SELECT COUNT(id) FROM tbl_services");
 $countdata2=mysqli_fetch_assoc($count2);
 $count3= mysqli_query($conn,"SELECT COUNT(bnr_id) FROM tbl_banner");
 $countdata3=mysqli_fetch_assoc($count3);

?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<?php require('includes/header.php'); ?>
		<!-- begin #sidebar -->
		<?php require('includes/left.php'); ?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header mb-3">Dashboard</h1>
			<!-- end page-header -->
			<!-- begin daterange-filter -->
			<div class="d-sm-flex align-items-center mb-3">
				<a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
					<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i> 
					<span id="timestamp"></span>
				</a>
			</div>
			<!-- end daterange-filter -->
			<!-- end page-header -->
	
			<!-- begin row -->
				<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="widget widget-stats">
					  <div class="stats-icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
					  <div class="stats-info">
						<h4>TOTAL SERVICES</h4>
						<p><?= $countdata2['COUNT(id)']; ?></p>
					  </div>
					  <div class="stats-link"> <a href="manage-services.php">&nbsp; <i class="fa fa-cogs"></i> VIEW SERVICES LIST</a> </div>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="widget widget-stats">
					  <div class="stats-icon"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
					  <div class="stats-info">
						<h4>TOTAL BANNERS</h4>
						<p><?= $countdata3['COUNT(bnr_id)']; ?></p>
					  </div>
					  <div class="stats-link"> <a href="manage-banner.php">&nbsp; <i class="fa fa-file-image-o"></i> VIEW BANNER LIST</a></div>
					</div>
				</div>

                </div>

		</div>
		<!-- end #content -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<?php require('includes/footer.php'); ?>
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
    <script>	
		//---time-----//
		$(document).ready(function() {
			setInterval(timestamp, 1000);
		});
		function timestamp() {
			$.ajax({
			  url: 'includes/time.php',
			  success: function(data) {
		 	  $('#timestamp').html(data);
			  },
			});
		}
	</script>
</body>
</html>
