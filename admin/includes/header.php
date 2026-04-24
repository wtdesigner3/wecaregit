<?php 
  $email = $_SESSION['admin_email'];
  $query = mysqli_query($conn,"SELECT * FROM `tbl_admin` WHERE `username` = '$email'");
  $adminrec = mysqli_fetch_array($query);
?>
<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header" style=" background: #d9e0e7; ">
				<a href="index.php" class="navbar-brand" style="margin-right: 0px; font-size: 13px;"><img src="../uploads/logo.png" /></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
           
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<!--<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						
                        <li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						
						<li class="dropdown-footer text-center">
							<a href="manage-order.php">View more</a>
						</li>
					</ul>
				</li>-->
                
                <li><a href="includes/logout.php" class="f-s-14"><i class="fa fa-power-off" style="color: #085da8;"></i></a></li>
                
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../uploads/<?= $adminrec['image']; ?>" alt="<?= $adminrec['name'];?>" /> 
						<span class="d-none d-md-inline"><?= $adminrec['name'];?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="manage-profile.php" class="dropdown-item"><i class="fa fa-user"></i> Profile Setting</a>
						<a href="manage-contact.php" class="dropdown-item"><i class="fa fa-cog"></i> Contact Setting</a>
						<div class="dropdown-divider"></div>
						<a href="includes/logout.php" onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }" class="dropdown-item"><i class="fa fa-sign-out"></i> Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>