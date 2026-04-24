<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];
?>
<div id="sidebar" class="sidebar" style="background: #ffffff;">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="../uploads/<?= $adminrec['image']; ?>" alt="<?= $adminrec['name']; ?>" />
					</div>
					<div class="info" style="font-size: 13px;">
						<b class="caret pull-right"></b>
						<?= $adminrec['name']; ?>
						<small><?= $adminrec['email']; ?></small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="manage-profile.php"><i class="fa fa-cog"></i> Profile Setting</a></li>
					<li><a href="manage-contact.php"><i class="fa fa-pencil"></i> Contact Setting</a></li>
					<li><a href="includes/logout.php"
							onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }"><i
								class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="has-sub <?php if ($first_part == "index.php" || $first_part == "") {
				echo "active";
			} ?>">
				<a href="index.php">
					<b class="caret"></b>
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<li class="has-sub <?php if ($first_part == "add-banner.php" || $first_part == "manage-banner.php" || $first_part == "edit-banner.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-image"></i>
					<span>Banner Management </span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-banner.php">Add New Banner</a></li>
					<li><a href="manage-banner.php">Banner Management</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-home-extra.php" || $first_part == "edit-about-card.php" || $first_part == "add-about-card.php" || $first_part == "manage-about-card.php" || $first_part == "manage-homeproductbanner.php" || $first_part == "manage-achievements.php" || $first_part == "add-homeproductbanner.php" || $first_part == "edit-homeproductbanner.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-trophy"></i>
					<span>HomePage Manage..</span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-homeabt.php">Home About Us</a></li>
					<li><a href="manage-about-card.php">About Cards</a></li>
					<li><a href="manage-achievements.php">Achievements</a></li>
					<!--<li><a href="manage-homebanner.php">Home why Choose Us</a></li>-->
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<span>Home why Choose Us</span>
						</a>
						<ul class="sub-menu">
							<li><a href="manage-homebanner.php">Home why Choose Us</a></li>
							<li><a href="manage-homebannerExtra.php">why Choose Us Extra</a></li>
						</ul>
					</li>
					<!-- <li><a href="manage-homebottombanner.php">Home Bottom Banner</a></li> -->

					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<span>Home Bottom Section</span>
						</a>
						<ul class="sub-menu">
							<li><a href="manage-bottomsections.php">Home Bottom Section</a></li>
							<li><a href="manage-bottomExtra.php">Home Bottom Extra</a></li>
						</ul>
					</li>
					<li><a href="view-policy.php">Privacy Policy</a></li>
					<li><a href="view-tc.php">Terms & Condition</a></li>
					<li><a href="manage-home-extra.php">Home Content Extra</a></li>
				</ul>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-brand.php" || $first_part == "add-brand.php" || $first_part == "edit-brand.php" || $first_part == "manage-brand-services.php" || $first_part == "add-brand-services.php" || $first_part == "edit-brand-services.php" || $first_part == "manage-brand-quality.php" || $first_part == "add-brand-quality.php" || $first_part == "edit-brand-quality.php" || $first_part == "manage-brand-benifits.php" || $first_part == "add-brand-benifits.php" || $first_part == "edit-brand-benifits.php" || $first_part == "manage-brand-how-works.php" || $first_part == "add-brand-how-works.php" || $first_part == "edit-brand-how-works.php" || $first_part == "manage-patients_speaks.php" || $first_part == "add-patients_speaks.php" || $first_part == "edit-patients_speaks.php" || $first_part == "manage-brandhead.php" || $first_part == "manage-servicehead.php" || $first_part == "manage-quantityhead.php" || $first_part == "manage-benifitshead.php" || $first_part == "manage-workshead.php" || $first_part == "manage-speakhead.php" || $first_part == "manage-care-areas-head.php" || $first_part == "edit-care-areas.php" || $first_part == "add-care-areas.php" || $first_part == "manage-care-areas.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-user"></i>
					<span>Brand Management </span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-brand.php">Manage Brands</a></li>
					<li><a href="manage-brand-services.php">Manage Services</a></li>
					<li><a href="manage-brand-quality.php">Manage Quality</a></li>
					<li><a href="manage-brand-benifits.php">Manage Benifits</a></li>
					<li><a href="manage-patients_speaks.php">Patients Speaks</a></li>
					<!-- <li><a href="manage-brandhead.php">Brand Content</a></li> -->
					<li class="has-sub <?php if ($first_part == "manage-brandhead.php" || $first_part == "manage-servicehead.php" || $first_part == "manage-quantityhead.php" || $first_part == "manage-benifitshead.php" || $first_part == "manage-workshead.php" || $first_part == "manage-speakhead.php" || $first_part == "manage-care-areas-head.php") {
						echo "active";
					} ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<span>Brand Extra Text </span>
						</a>
						<ul class="sub-menu">
							<li><a href="manage-brandhead.php">Services Content</a></li>
							<!-- <li><a href="manage-servicehead.php">Services Content</a></li> -->
							<li><a href="manage-quantityhead.php">Quantity Content</a></li>
							<li><a href="manage-benifitshead.php">Benifits Content</a></li>
							<li><a href="manage-speakhead.php">Patient Speak Content</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-services.php" || $first_part == "add-services.php" || $first_part == "edit-services.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-user"></i>
					<span>Services Management </span>
				</a>
				<ul class="sub-menu">
					<!-- <li><a href="manage-extra-content.php">Service Extra Content</a></li> -->
					<!-- <li><a href="manage-extra.php">Extra Management</a></li> -->
					<!--<li><a href="manage-servicescategory.php">Add Services Category</a></li>-->
					<!-- <li><a href="add-services.php">Add Services</a></li> -->
					<li><a href="manage-services.php">Manage Services</a></li>
					<!--<li><a href="manage-servicespage.php">Services Header Page</a></li>-->
					 <li><a href="manage-serviceshead.php">Services Content</a></li> 
					<!-- <li><a href="manage-care-areas-head.php">Care Areas</a></li> -->
					<!-- <li><a href="manage-care-areas.php">Manage Care Areas</a></li> -->
					<!-- <li><a href="manage-workshead.php">How It Works Content</a></li> -->
					<!-- <li><a href="manage-brand-how-works.php">How It Works</a></li> -->
					<!-- <li><a href="manage-why-us-content.php">Why Us Content</a></li> -->
					<!-- <li><a href="manage-why-us.php">Why Us</a></li> -->
					<!-- <li><a href="manage-video-content.php">Video Content</a></li> -->
					<!-- <li><a href="manage-video.php">Video Management</a></li> -->
				</ul>
			</li>


			<li class="has-sub d-none <?php if ($first_part == "add-division.php" || $first_part == "manage-division.php" || $first_part == "edit-division.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-at" aria-hidden="true"></i>
					<span>Career Management</span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-division.php">Add New Job</a></li>
					<li><a href="manage-division.php">Career Management</a></li>
					<li><a href="manage-careerpage.php">Career Header Page</a></li>

				</ul>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-press.php" || $first_part == "add-press.php" || $first_part == "manage-pressheadpage.php" || $first_part == "edit-press.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Press Management</span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-press.php">Add Press Release</a></li>
					<li><a href="manage-press.php">Manage Press Release</a></li>
					<li><a href="manage-pressheadpage.php">Manage Press Release</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-about.php" || $first_part == "manage-directors.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>About Managem..</span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-about.php">Manage About</a></li>
					<li><a href="manage-directors.php">Manage Director</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-testimonial.php" || $first_part == "add-testimonial.php" || $first_part == "edit-testimonial.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>Testimonial Managem..</span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-testimonial.php">Add Testimonial</a></li>
					<li><a href="manage-testimonial.php">Manage Testimonial</a></li>
					<li><a href="manage-testipage.php">Testimonial Content</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-team.php" || $first_part == "manage-team.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Our Team Management</span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-team.php">Add Our Team</a></li>
					<li><a href="manage-team.php">Manage Our Team</a></li>
					<li><a href="manage-teampage.php">Manage Team Page</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-partner.php" || $first_part == "add-partner.php" || $first_part == "edit-partner.php") {
				echo "active";
			} ?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-picture-o"></i>
					<span>Partner Management</span>
				</a>
				<ul class="sub-menu">
					<li><a href="add-partner.php">Add Partner</a></li>
					<li><a href="manage-partner.php">Edit / View Partner</a></li>
					<li><a href="manage-partnpage.php">Manage Partner Page</a></li>
				</ul>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-blogs.php" || $first_part == "add-blogs.php" || $first_part == "edit-blogs.php") {
				echo "active";
			} ?>">
				<a href="manage-blogs.php">
					<b class="caret"></b>
					<i class="fa fa-plus-square"></i>
					<span>Blogs Management</span>
				</a>
			</li>


			<li class="has-sub d-none <?php if ($first_part == "manage-newsletter.php") {
				echo "active";
			} ?>">
				<a href="manage-newsletter.php">
					<b class="caret"></b>
					<i class="fa fa-plus-square"></i>
					<span>NewsLetter Manage..</span>
				</a>
			</li>

			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
						class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg" style="background: #ffffff;"></div>