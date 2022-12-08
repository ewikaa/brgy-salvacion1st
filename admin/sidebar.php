				<?php
				

			  	$rows = $model->count_Blotters();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$tot_blot = $row['tot_blot'];
					}
			  	}

			  	$rows = $model->count_Residents();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$verified = $row['verified'];
						$not_verified = $row['not_verified'];
						$pending = $row['pending'];
					}
			  	}

			  	$rows = $model->count_requests();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$capproved = $row['capproved'];
						$cdeclined = $row['cdeclined'];
						$cpending = $row['cpending'];
					}
			  	}

			  	?>


				<div class="ttr-sidebar-logo" style="background-image: url('../assets/images/background.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
					<div class="ttr-sidebar-toggle-button">
						<i class="ti-arrow-left"></i>
					</div>
					<div style="padding-left: 12px; padding-top: 12px;">
						<br><br>
						<!-- <div class="image">
							<img src="../assets/images/<?php echo  $web_icon; ?>.png" style="width: 48px; height: 48px; border-radius: 50%;" alt="User">
						</div> -->
						<div style="height: 8px;">
						</div>
						<div class="info-container">
							<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b>Brgy Administrator</b></div>
							<div class="email" style="color: white; font-size: 12px;"><?php echo $unm; ?></div>
						</div>
					</div>
				</div>