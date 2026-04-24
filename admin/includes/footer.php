    <!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/default.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/js/demo/table-manage-responsive.demo.min.js"></script>
    <script type="text/javascript">
	    <?php if(isset($_SESSION['success'])){ ?>
		  $.toast({
				text: '<?php echo $_SESSION['success']; ?>',
				heading: 'Success',
				showHideTransition: 'slide',
				icon: 'success'
			});
		<?php } unset($_SESSION['success']); ?>	
		<?php if(isset($_SESSION['error'])) { ?>	
			  $.toast({
					text: '<?php echo $_SESSION['error']; ?>',
					heading: 'Ooh Snapp..',
					showHideTransition: 'slide',
					icon: 'error'
				});
		<?php } unset($_SESSION['error']); ?>	
 </script>
 <script>
$(document).ready(function () {
    $('.nav li').click(function(e) {

        $('.nav li').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        //e.preventDefault();
    });
});
 </script>
 
 <script>
 if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
 </script>