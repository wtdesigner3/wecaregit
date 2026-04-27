<?php require('inc/function.php'); ?>
<?php
$conqry = mysqli_query($conn, "SELECT * FROM `tbl_profile`");
$proinfo = mysqli_fetch_array($conqry);
?>
<!--<link rel="shortcut icon" href="<?= BASE_URL ?>uploads/<?= $proinfo['pro_favicon']; ?>" type="image/x-icon">-->
<!--<link rel="shortcut icon" href="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_favicon']; ?>">-->

<link href="<?= BASE_URL ?>uploads/fevicon.png" rel="shortcut icon" type="image/x-icon">
<link href="<?= BASE_URL ?>uploads/fevicon.jpg" rel="shortcut icon" type="image/x-icon">


<!--FAVICON AND TOUCH ICONS  -->
<!--	 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">-->
<!--	<link rel="icon" href="images/favicon.ico" type="image/x-icon">-->
<!--	<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">-->
<!--	<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">-->
<!--	<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">-->
<!--<link rel="apple-touch-icon" href="images/apple-touch-icon.png"> -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

<!-- BOOTSTRAP CSS -->
<link href="<?php echo BASE_URL; ?>css/bootstrap.min.css" rel="stylesheet">

<!-- FONT ICONS -->
<!--<script src="https://kit.fontawesome.com/49c8815394.js" crossorigin="anonymous"></script>	-->
<!--<link rel="stylesheet" href="https://kit.fontawesome.com/49c8815394.css" crossorigin="anonymous">-->

<link href="<?php echo BASE_URL; ?>css/flaticon.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- PLUGINS STYLESHEET -->
<link href="<?php echo BASE_URL; ?>css/menu.css" rel="stylesheet">
<link id="effect" href="<?php echo BASE_URL; ?>css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>css/magnific-popup.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>css/owl.theme.default.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>css/animate.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>css/jquery.datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>toaster/toaster.css">
<link rel="shortcut icon" href="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_favicon']; ?>">

<!-- TEMPLATE CSS -->
<link href="<?php echo BASE_URL; ?>css/style.css" rel="stylesheet">

<!-- RESPONSIVE CSS -->
<link href="<?php echo BASE_URL; ?>css/responsive.css" rel="stylesheet">

<!-- INTERNAL PAGES CSS -->
<link href="<?php echo BASE_URL; ?>css/internal-pages.css" rel="stylesheet">



<?php
// Clean URL for canonical (removes query strings and handles non-www)
$canonical_path = explode('?', $_SERVER['REQUEST_URI'])[0];
// Remove /index.php if present at the end
if (basename($canonical_path) == "index.php") {
	$canonical_path = dirname($canonical_path);
}
$canonical_url = rtrim(BASE_URL, '/') . '/' . ltrim($canonical_path, '/');
// Ensure no double slashes or trailing slash issues for home
$canonical_url = rtrim($canonical_url, '/');
if ($canonical_path == "/" || $canonical_path == "") {
	$canonical_url = rtrim(BASE_URL, '/');
}
?>
<link rel="canonical" href="<?= $canonical_url ?>">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
		w[l] = w[l] || []; w[l].push({
			'gtm.start':
				new Date().getTime(), event: 'gtm.js'
		}); var f = d.getElementsByTagName(s)[0],
			j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-M967ZRN');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M967ZRN" height="0" width="0"
		style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<meta name="google-site-verification" content="AI2zzZQoVRf4TOLbMR_X0FjRuyqBO6BIj7Z6Q7SUJmg" />
<meta name="google-site-verification" content="NE3rt9pUVajPqa0gJS0o3jJr-UblHdN6ovNRTfMjG4g" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RXF235QPM1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() { dataLayer.push(arguments); }
	gtag('js', new Date());

	gtag('config', 'G-RXF235QPM1');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RDLHPBP296"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() { dataLayer.push(arguments); }
	gtag('js', new Date());

	gtag('config', 'G-RDLHPBP296');
</script>