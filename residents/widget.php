<!--  

			<div class="row">
            <?php 


							if ($email_verif == 0 || $email_verif == "") {
							   
					?> 

					<style type="text/css">
					.alert-box {
					    color:#555;
					    border-radius:10px;
					    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
					    padding:10px 10px 10px 36px;
					    margin:10px;
					}
					.alert-box span {
					    font-weight:bold;
					    text-transform:uppercase;
					}
					.error {
					    background:#ffecec url('../assets/images/error.png') no-repeat 10px 50%;
					    background-size: 20px 20px;
					    border:1px solid #f5aca6;
					}
					</style>
					<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12">
						<div class="alert-box error"><span>REMINDER: </span>Your account is not verified yet. Click <a href="verify" style="color: black;">here to confirm your email address.</a> </div>
					</div>
					<br><br><br>
					<?php
					echo "<script>window.open('verify','_self');</script>";
							}
						else {

						}


					?>
			</div> -->