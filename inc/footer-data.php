<?php require_once('inc/function.php'); ?> 
<?php
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);
?> 
		<div class="s-soft">
			<?php if ($coninfo['con_facebook'] != '') { ?>
				<a href="<?= $coninfo['con_facebook']; ?>" class="s-item facebook" target="_blank">
				<span class="fa fa-facebook"></span>
				</a><?php } ?>
			<?php if ($coninfo['con_twitter'] != '') { ?>
				<a href="<?= $coninfo['con_twitter']; ?>" class="s-item twitter" target="_blank">
				<span class="fa fa-twitter"></span>
				</a><?php } ?>
			<?php if ($coninfo['con_whatsapp'] != '') { ?>
				<a href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&amp;text=Hello%20Please%20call%20me%20back%20to%20discuss%20more" class="s-item whatsapp" target="_blank">
				<span class="fa fa-whatsapp"></span>
				</a><?php } ?>
			<?php if ($coninfo['con_linkedin'] != '') { ?>
				<a href="<?= $coninfo['con_linkedin']; ?>" class="s-item linkedin" target="_blank">
				<span class="fa fa-linkedin"></span>
				</a><?php } ?>
			<?php if ($coninfo['con_instagram'] != '') { ?>	
				<a href="<?= $coninfo['con_instagram']; ?>" class="s-item instagram" target="_blank">
				<span class="fa fa-instagram"></span>
				</a><?php } ?>
			 
		</div>
		<a class="call_me" href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&amp;text=Hello%20Please%20call%20me%20back%20to%20discuss%20more" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>	
		<a class="call_me2" href="tel:<?= $coninfo['con_phone1']; ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
		
		<div class="btn-for-mobile">
		<div class="mobile-fixed-btn">
		  
					  <a class="mobile-w" href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&amp;text=Hello%20Please%20call%20me%20back%20to%20discuss%20more" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a>	
	
							<a class="mobile-call" href="tel:<?= $coninfo['con_whatsapp']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
			  
		</div>
		</div>
		<script src="<?php echo BASE_URL; ?>js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>	
		<script src="<?php echo BASE_URL; ?>js/modernizr.custom.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.easing.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.appear.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.stellar.min.js"></script>	
		<script src="<?php echo BASE_URL; ?>js/menu.js"></script>
		<script src="<?php echo BASE_URL; ?>js/sticky.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.scrollto.js"></script>
		<script src="<?php echo BASE_URL; ?>js/materialize.js"></script>	
		<script src="<?php echo BASE_URL; ?>js/owl.carousel.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.magnific-popup.min.js"></script>	
		<script src="<?php echo BASE_URL; ?>js/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/isotope.pkgd.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/hero-form.js"></script>
		<script src="<?php echo BASE_URL; ?>js/contact-form.js"></script>
		<script src="<?php echo BASE_URL; ?>js/comment-form.js"></script>
		<script src="<?php echo BASE_URL; ?>js/appointment-form.js"></script>
		<script src="<?php echo BASE_URL; ?>js/jquery.datetimepicker.full.js"></script>		
		<script src="<?php echo BASE_URL; ?>js/jquery.validate.min.js"></script>	
		<script src="<?php echo BASE_URL; ?>js/jquery.ajaxchimp.min.js"></script>
		<script src="<?php echo BASE_URL; ?>js/wow.js"></script>	
		<script type="text/javascript" src="<?php echo BASE_URL; ?>toaster/toaster.js"></script>
	
		<!-- Custom Script -->		
		<script src="<?php echo BASE_URL; ?>js/custom.js"></script>

		<script> 
			new WOW().init();
		</script>
		<script type="text/javascript">
		
// 			$(".view-desc").click(function(){
//   			$(".job-desc-container").css('right','0%'); 
//   			$(".tabs-section").css('opacity','40%');
//   			$(".division").css('opacity','40%');
//   			$(".header").css('opacity','40%');  
// 			});

// 			$(".job-close").click(function(){
// 			    alert();
//   		$(".job-desc-container").css('right','-100%!important');
// 			});
 
			
// 			$(".job-close").click(function(){
//   			$(".job-desc-container").css('right','-50%');
//   			$(".tabs-section").css('opacity','100%'); 
//   			$(".division").css('opacity','100%');
//   			$(".header").css('opacity','100%');
// 			});
 
		</script>
		
		<script type="text/javascript">
// $(".view-desc").click(function(){
// if ($(window).width() < 767) {
// $(".job-desc-container").css('width','100%'); 
// }
// });

// 	$(".job-close").click(function(){
// if ($(window).width() < 767) {
// $(".job-desc-container").css('right','-100%!important');
// }
// });
</script>
		<script type="text/javascript">
		 <?php if (isset($_SESSION['success'])) { ?>
			  $.toast({
					text: '<?php echo $_SESSION['success']; ?>',
					heading: 'Success',
					showHideTransition: 'slide',
					icon: 'success'
				});
	<?php }
		 unset($_SESSION['success']); ?> 
	
	
	<?php if (isset($_SESSION['error'])) { ?>	
			  $.toast({
					text: '<?php echo $_SESSION['error']; ?>',
					heading: 'Error',
					showHideTransition: 'slide',
					icon: 'error'
				});
	<?php }
	unset($_SESSION['error']); ?>   
	
 </script>
 <script>
	
$(window).scroll(function(){
	if ($(window).scrollTop() >= 50) {
		$('.header').addClass('fixed-header');
	  
	}
	else {
		$('.header').removeClass('fixed-header');
	
	}
});


</script>