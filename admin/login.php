<?php
@session_start();
$Get = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

if(@$_SESSION['admin_session'] == '$Get'.session_id())
{
    header("location:index.php");
}

require('includes/function.php');
if(isset($_POST['login']))
{
  $msg="";
  $email = mysqli_real_escape_string($conn,$_POST['username']); 
  $pass = mysqli_real_escape_string($conn,$_POST['password']); 
  $pass = md5($pass);
  $data=mysqli_query($conn,"SELECT * FROM `tbl_admin` WHERE `username`='$email' && `password`='$pass'");
  $rec=mysqli_num_rows($data);
  if($rec==true)
  {
    $_SESSION['admin_session']="$Get".session_id();
    $_SESSION['admin_email']=$email;
	$_SESSION['success']="You Are Successfully login";
    header('location:index.php');
  }
  else
  {
	$_SESSION['error']="Invalid Username or Password.";    
  }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Adminpanel | Signin</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet" />
	<link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="assets/css/default/style.min.css" rel="stylesheet" />
	<link href="assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<script src="assets/plugins/pace/pace.min.js"></script>
    <link rel="shortcut icon" href="../uploads/fevicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/toaster/toaster.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/toaster/toaster.css"> 
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login bg-black animated fadeInDown">
			<!-- begin brand -->
			<div class="login-header">
				<div class="brand" style="font-size: 18px;">
				    <?php
				    
				    $tmkads = mysqli_fetch_assoc(mysqli_query($conn,"SELECT pro_logo FROM `tbl_profile`"));
				    ?>
                    <img src="<?= SITE_URL ?>uploads/<?= $tmkads['pro_logo']; ?>" style="width:150px;" />
				</div>
				<div class="icon">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			 <!-- begin login-content -->
			  <div class="login-content" style="background-color: white;">
                   
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="margin-bottom-0">
					<div class="form-group m-b-20">
						<input type="text" class="form-control form-control-lg inverse-mode" name="username" placeholder="Username" required />
					</div>
                    
					<div class="form-group m-b-20">
						<input type="password" class="form-control form-control-lg inverse-mode" name="password" placeholder="Password" required />
					</div>
					
					<div class="login-buttons">
						<button type="submit" name="login" class="btn btn-success btn-block btn-lg">Sign me in</button>
					</div>
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end login -->
	</div>
	<!-- ================== BEGIN BASE JS ================== -->
	<?php require('includes/footer.php'); ?>
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
    
   
</body>
</html>
