				<div class="ttr-sidebar-logo" style="background-image: url('../assets/images/background.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
					<div class="ttr-sidebar-toggle-button">
						<i class="ti-arrow-left"></i>
					</div>
					<div style="padding-left: 12px; padding-top: 12px;">
						<div class="image">
							<img src="../assets/images/profile-pictures/<?php echo $photo; ?>.jpg" style="height: 45px; width: 45px;border-radius: 50%;background-size: cover;" alt="User">
						</div>
						<div style="height: 8px;">
						</div>
						<div class="info-container">
							<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?php echo $r_fname; ?> <?php echo $r_lname; ?></b></div>
							<div class="email" style="color: white; font-size: 12px;"><?php echo $r_email; ?></div>
						</div>
					</div>
				</div>