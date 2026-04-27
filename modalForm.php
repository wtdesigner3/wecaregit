<?php

require("inc/function.php");

$id = $_GET["id"];

$modalData = mysqli_query($conn, "SELECT * FROM `tbl_division` WHERE id='$id'");
$modalDetails = mysqli_fetch_assoc($modalData);

?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="modal fade popUp" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true"></div>
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Apply For <?php echo $modalDetails['title']; ?></h5>
			<button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-holder mb-40">
				<form name="contactForm" method="POST" action="<?= BASE_URL; ?>mail/carrierMail.php"
					enctype="multipart/form-data" class="row control-form" novalidate="novalidate">

					<!-- Contact Form Input -->
					<div id="input-name" class="col-md-6">
						<label class="f-14">Your Name*</label>
						<input type="text" name="name" class="form-control name" placeholder="Enter Your Name*"
							required>
						<input type="hidden" name="jobtitle" class="form-control name"
							value="<?php echo $modalDetails['title']; ?>">
						<input type="hidden" name="location" class="form-control name"
							value="<?php echo $modalDetails['loc']; ?>">
					</div>

					<div id="input-email" class="col-md-6">
						<label class="f-14">Your Email*</label>
						<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*"
							required>
					</div>

					<div id="input-phone" class="col-md-12">
						<label class="f-14">Your Phone*</label>
						<input type="tel" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*"
							required>
					</div>
					<div id="input-phone" class="col-md-12">
						<label class="f-14">Upload Your CV*</label>
						<input type="file" name="resume" class="form-control" required="">
					</div>

					<div id="input-message" class="col-md-12 input-message">
						<label class="f-14">Your Message Here</label>
						<textarea class="form-control message" name="message" rows="3" placeholder="Your Message ..."
							required></textarea>
					</div>

					<!-- Contact Form Button -->
					<div class="col-lg-12 mt-15 form-btn">
						<div class="g-recaptcha" data-sitekey="6LeCEcEeAAAAADL5Jhda5hT2jxv6BnMKhoxcmv6N"
							style="transform:scale(0.67);-webkit-transform:scale(0.75);transform-origin:0 0;-webkit-transform-origin:0 0;">
						</div>
						<button type="submit" name="submit" class="btn btn-blue blue-hover submit">Submit your
							CV</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>


<script>

	function closeModal() {

	}

</script>