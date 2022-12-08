	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<div class="ttr-logo-box">
				<div>
					<a href="index" class="ttr-logo">
						<img alt="" class="ttr-logo-mobile" src="../assets/images/logo-white2.png" style="width: 230px; height: 36px;">
						<img alt="" class="ttr-logo-desktop" src="../assets/images/logo-white2.png" style="width: 230px; height: 36px;">
					</a>
				</div>
			</div>
			<div class="ttr-header-menu">
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<ul class="ttr-header-navigation">
<!-- 					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><i class="fa fa-cog fa-spin" style="font-size: 32px;"></i></span></a>
						
						<div class="ttr-header-submenu">
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">9 New</span>
								<span class="ttr-notify-text">User Notifications</span>
							</div>
							<ul>
								<li><a href="index">My profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</li> -->

					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><img src="../assets/images/<?php echo  $web_icon; ?>.png" style="height: 45px; width: 45px;border-radius: 50%;"></a>
						<div class="ttr-header-submenu noti-menu">
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top"><?php echo $nm; ?></span>
								<span class="ttr-notify-text">Barangay Salvacion 1st</span>
							</div>
							<div class="noti-box-list">
								<ul>
									<a href="settings" style="text-decoration: none;color: black;"><li>
										
										<span class="notification-icon dashbg-green">
											<i class="fa fa-user" style="font-size: 18px;"></i>
										</span>
										<span style="font-size: 22px;" style="color: black!important;">
											My Profile
										</span>
									</li></a><hr>
									<a href="index" style="text-decoration: none;color: black;"><li>
										
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-calendar" style="font-size: 18px;"></i>
										</span>
										<span style="font-size: 22px;" style="color: black!important;">
											Calendar
										</span>
									</li></a><hr>
									<a href="logout" style="text-decoration: none;color: black;"><li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-sign-out" style="font-size: 18px;"></i>
										</span>
										<span style="font-size: 22px;" style="color: black!important;">
											Logout
										</span>
									</li></a>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>