<?php

require('inc/function.php');
header("Location: " . BASE_URL . "404");
exit;
// $bname = $_GET["url"];
// $pdetaildata = mysqli_query($conn, "SELECT * FROM `tbl_brand` WHERE `url`='" . $bname . "'");
// $pdetailrec = mysqli_fetch_array($pdetaildata);
// $id = $pdetailrec["id"];


// $pdetaildata1 = mysqli_query($conn, "SELECT * FROM `tbl_brandpage` WHERE `id`='" . $id . "'");
// $pdetailrec1 = mysqli_fetch_array($pdetaildata1);

?>


<?php require('inc/function.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="<?= $pdetailrec['metadesc'] ?>" />
	<meta name="keywords" content="<?= $pdetailrec['keyword'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<title><?php if ($pdetailrec['metatag'] == '') { ?><?= $pdetailrec['heading'] ?>
		<?php } else { ?>	<?= $pdetailrec['metatag'] ?> <?php } ?> || <?= SITE_NAME ?></title>

	<?php include 'inc/head.php'; ?>
	<?= $pdetailrec['head_detail'] ?>
	<style>
		.icon-sm .sbox-3-icon img {
			left: 0;
		}

		.vdo-box {
			background-color: #fff;
		}
	</style>


	<style>


	</style>
</head>

<body>

	<!-- PRELOADER SPINNER
		============================================= -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="loader-inner"></div>
		</div>
	</div>


	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">




		<!-- HEADER
			============================================= -->

		<?php include 'inc/header.php'; ?>

		<!-- END HEADER -->

		<div id="breadcrumb" class="division">
			<div class="container">

				<div class="row">
					<div class="col">
						<div class=" breadcrumb-holder">

							<!-- Breadcrumb Nav -->
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
									<li class="breadcrumb-item"><a href="javascript:void(0)">Brands</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?= $pdetailrec['heading'] ?>
									</li>
								</ol>
							</nav>

							<!-- Title -->


						</div>
					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</div>

		<section id="tabs-2" class="pt-30 pb-20 tabs-section division">
			<div class="container">
				<div class="row text-align-justify">

					<!-- TABS CONTENT -->
					<div class="col-lg-12">
						<div class="tab-content" id="pills-tabContent">


							<!-- TAB-1 CONTENT -->
							<div class="tab-pane fade show active" id="tab-11" role="tabpanel"
								aria-labelledby="tab11-list">
								<!-- Title -->


								<!-- Text -->
								<h4 class="font24 steelblue-color"><?= $pdetailrec['heading'] ?></h4>

								<!-- Image -->
								<div class="tab-img">
									<img loading="lazy" class="img-fluid"
										src="<?= BASE_URL; ?>uploads/brand/<?= $pdetailrec['main_image']; ?>"
										alt="<?= $pdetailrec['alt3']; ?>" class="img-fluid">
								</div>

								<!-- Text -->
								<p><?= $pdetailrec['des']; ?></p>
							</div> <!-- END TAB-1 CONTENT -->



						</div> <!-- END TABS CONTENT -->


					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</section>



		<?php

		$brandServices = mysqli_query($conn, "SELECT * FROM `tbl_brand_services` where status='1' and c_id='$id' order by sort asc");
		if (mysqli_num_rows($brandServices) > 0) {
			?>
			<div id="statistic-2" class="bg-scroll statistic-section division">
				<div class="container white-color">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">

							<?php
							$brandsExtraText = mysqli_query($conn, "SELECT * FROM `tbl_brandhead`");
							$extraBrand = mysqli_fetch_assoc($brandsExtraText);
							?>

							<!-- Title 	-->
							<h3 class="font24 txtHeading"><?= $extraBrand['title']; ?></h3>

							<!-- Text -->
							<p><?= $extraBrand['subtitle']; ?></p>
						</div>
					</div>


					<!--1-->
					<div class="partner-holder-service owl-carousel owl-theme ">
						<?php
						while ($brandServ = mysqli_fetch_assoc($brandServices)) {
							?>
							<div class="item white-dots-card hover-effect eqheight ">
								<div class="icon">
									<div class="icon-default">
										<img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $brandServ['image2']; ?>"
											alt="<?= $brandServ['alt2']; ?>" width="100" height="100">
									</div>
									<div class="icon-hover">
										<img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $brandServ['image']; ?>"
											alt="<?= $brandServ['alt']; ?>" width="100" height="100">
									</div>
								</div>
								<div class="card-caption text-center">
									<div class="title font700"><a href="javascript:void(0);"
											tabindex="0"><?= $brandServ['title']; ?></a></div>
								</div>
							</div>
						<?php } ?>
					</div>

					<!-- End row -->
				</div> <!-- End container -->
			</div>
			<?php
		}

		?>




		<?php

		$brandQuality = mysqli_query($conn, "SELECT * FROM `tbl_brand_quality` where status='1' and c_id='$id' order by sort asc");
		if (mysqli_num_rows($brandQuality) > 0) {
			?>
			<section id="doctors-1" class="wide-60 doctors-section division press-release">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">
							<?php
							$qualityExtraText = mysqli_query($conn, "SELECT * FROM `tbl_quantityhead`");
							$extraQuantity = mysqli_fetch_assoc($qualityExtraText);
							?>
							<!-- Title 	-->
							<h3 class="font24 steelblue-color"><?= $extraQuantity['title']; ?></h3>

							<!-- Text -->
							<p><?= $extraQuantity['subtitle']; ?></p>


							<div class="row mt-25 d-none">
								<?php
								$brandQuality = mysqli_query($conn, "SELECT * FROM `tbl_brand_quality` where status='1' and c_id='$id' order by sort asc");
								while ($quality = mysqli_fetch_assoc($brandQuality)) {
									?>
									<div class="col-md-6">
										<div>
											<button type="submit" name="submit"
												class="btn btn-blue btn-block blue-hover submit"><?= $quality['title']; ?></button>
										</div>
										<div>
											<img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $quality['image']; ?>"
												class="img-fluid" alt="<?= $quality['alt']; ?>" />
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div> <!-- END SECTION TITLE -->

					<!-- End container -->
				</div>
			</section>
			<?php
		}

		?>



		<?php

		$brandBenifits = mysqli_query($conn, "SELECT * FROM `tbl_brand_benifits` where status='1' and c_id='$id' order by sort asc");
		if (mysqli_num_rows($brandBenifits) > 0) {
			?>
			<div id="statistic-2" class="bg-scroll statistic-section division">
				<div class="container white-color">

					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">
							<?php
							$bet = mysqli_query($conn, "SELECT * FROM `tbl_benifitshead`");
							$eb = mysqli_fetch_assoc($bet);
							?>
							<!-- Title 	-->
							<h3 class="font24 txtHeading"><?= $eb['title']; ?></h3>

							<!-- Text -->
							<p><?= $eb['subtitle']; ?></p>
						</div>
					</div>



					<!--1-->
					<div class="partner-holder-service owl-carousel owl-theme ">
						<?php
						while ($benifits = mysqli_fetch_assoc($brandBenifits)) {
							?>
							<div class="item white-dots-card hover-effect eqheight ">
								<div class="icon">
									<div class="icon-default">
										<img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $benifits['image2']; ?>"
											alt="<?= $benifits['alt2']; ?>" width="100" height="100">
									</div>
									<div class="icon-hover">
										<img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $benifits['image']; ?>"
											alt="<?= $benifits['alt']; ?>" width="100" height="100">
									</div>
								</div>
								<div class="card-caption text-center">
									<div class="title font700"><a href="javascript:void(0);"
											tabindex="0"><?= $benifits['title']; ?></a></div>
								</div>
							</div>
						<?php } ?>
					</div>


				</div> <!-- End container -->
			</div>

			<?php
		}

		?>


		<?php
		$howItWorks = mysqli_query($conn, "SELECT * FROM `tbl_brand_works` where status='1' and brand_id='$id' order by sort asc");
		if (mysqli_num_rows($howItWorks) > 0) {
			?>
			<!-- How It Works -->
			<div class="wide-60 doctors-section division press-release d-none">
				<div class="container">

					<div class="row">
						<div class="col-lg-12 section-title">
							<?php
							$worksExtraText = mysqli_query($conn, "SELECT * FROM `tbl_workshead`");
							$extraWorks = mysqli_fetch_assoc($worksExtraText);
							?>
							<!-- Title 	-->
							<h3 class="font24 steelblue-color"><?= $extraWorks['title']; ?></h3>

							<!-- Text -->
							<p><?= $extraWorks['subtitle']; ?></p>
						</div>
					</div>

					<div class="row">


						<div class="col-md-12 col-lg-12 col-12 p-0">
							<ul class="brand-timeline">
								<?php


								while ($work = mysqli_fetch_assoc($howItWorks)) {
									?>
									<li style="--accent-color:#137a95">
										<div class="date"><?= $work['title']; ?></div>
										<div class="descr"><?= $work['subtitle']; ?></div>
									</li>
									<?php
								}

								?>
							</ul>
						</div>

					</div><!-- End row -->
				</div> <!-- End container -->
			</div>


			<?php

		}

		?>












		<?php

		$patientSpeaks = mysqli_query($conn, "SELECT * FROM `tbl_project_videos` where status='1' and c_id='$id' order by sort asc");
		if (mysqli_num_rows($patientSpeaks) > 0) {
			?>
			<section id="services-3" class="bg-lightgrey wide-60 services-section division d-none">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">
							<?php
							$speaksExtraText = mysqli_query($conn, "SELECT * FROM `tbl_speakhead`");
							$speakWorks = mysqli_fetch_assoc($speaksExtraText);
							?>
							<!-- Title 	-->
							<h3 class="font24 steelblue-color"><?= $speakWorks['title']; ?></h3>

							<!-- Text -->
							<p><?= $speakWorks['subtitle']; ?></p>

						</div>
					</div>


					<!-- SERVICES CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme services-holders">

								<?php

								while ($videos = mysqli_fetch_assoc($patientSpeaks)) {
									?>
									<div class="items vdo-box icon-sm p-2">
										<div>
											<iframe height="300" src="<?= $videos['url']; ?>" style="width:100%"
												title="YouTube video player" frameborder="0"
												allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
												allowfullscreen></iframe>
										</div>
									</div>
									<?php
								}

								?>
							</div>
						</div>
					</div> <!-- END SERVICES CONTENT -->


				</div> <!-- End container -->
			</section>
			<?php
		}

		?>








		<!-- END SERVICES-3 -->

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