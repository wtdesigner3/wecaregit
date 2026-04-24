<?php require('inc/function.php');

$vqry = mysqli_query($conn, "SELECT * FROM `tbl_policy` WHERE `abt_id`='1'");
$venfetch = mysqli_fetch_array($vqry);

?>
<!DOCTYPE html>
<html lang="en"> 

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Privacy Policy || <?= SITE_NAME ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?= $venfetch['head_detail'] ?>
	<!-- SITE TITLE -->
	<?php include 'inc/head.php'; ?>

</head>

<body>

	<!-- PRELOADER SPINNER
		============================================= -->
  <div id="loader-wrapper">
        <div id="loader"></div>
    </div>


	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">

		<!-- HEADER
			============================================= -->

		<?php include 'inc/header.php'; ?>

		<!-- END HEADER -->

		<div id="breadcrumb" class="division" style="background-image: url(<?= BASE_URL; ?>uploads/about/<?= $venfetch['image']; ?>);
  background-position: center center;">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class=" breadcrumb-holder">

							<!-- Breadcrumb Nav -->
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?= $venfetch['abt_title'] ?>
									</li>
								</ol>
							</nav>

							<!-- Title -->

						</div>
					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</div>



		<!-- INFO-1
			============================================= -->
		<section id="info-1" class="wide-60 info-section division">
			<div class="container">
				<h1 class="text-center mb-5 steelblue-color">Our Privacy Policy</h1>
				<div class="row">
					<div class="col-md-12">
						<div>
							<p><?= $venfetch['abt_details'] ?></p>
						</div>
					</div>
				</div>
			</div> <!-- End container -->
		</section> <!-- END INFO-1 -->


		<!-- FOOTER-2
			============================================= -->
		<?php include 'inc/footer.php' ?>

		<!-- END FOOTER-2 -->




	</div> <!-- END PAGE CONTENT -->





	<!-- EXTERNAL SCRIPTS
		============================================= -->
	<?php include 'inc/footer-data.php' ?>
</body>

</html>