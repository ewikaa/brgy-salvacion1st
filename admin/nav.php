				<style type="text/css">
					.show2 {
						background-color: <?php echo $secondary_color; ?>!important;
						color: white;
					}
					.txtclr {
						color: <?php echo $secondary_color; ?>!important;
					}
				</style>
				<nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>

						<li class="" style="margin-top: 0px;">
							<a href="index" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">Dashboard</span>
							</a>
						</li>

						<li>
							<a href="residents" class="ttr-material-button <?php echo ($page == 'residents') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-user <?php echo ($page == 'residents') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'residents') ? "show2" : ""; ?>">Residents</span>
							</a>
						</li>

						<li>
							<a href="officials" class="ttr-material-button <?php echo ($page == 'officials') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-user <?php echo ($page == 'officials') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'officials') ? "show2" : ""; ?>">Brgy. Officials</span>
							</a>
						</li>

						<li>
							<a href="issuance" class="ttr-material-button <?php echo ($page == 'issuance') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-book <?php echo ($page == 'issuance') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'issuance') ? "show2" : ""; ?>">Documents</span>
							</a>
						</li>

						<li>
							<a href="blotters" class="ttr-material-button <?php echo ($page == 'blotters') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-agenda <?php echo ($page == 'blotters') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'blotters') ? "show2" : ""; ?>">Blotters</span>
							</a>
						</li>

						<li>
							<a href="announcement" class="ttr-material-button <?php echo ($page == 'announcement') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-announcement <?php echo ($page == 'announcement') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'announcement') ? "show2" : ""; ?>">Announcements</span>
							</a>
						</li>
						
						<li>
							<a href="content-management" class="ttr-material-button <?php echo ($page == 'content') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-harddrives <?php echo ($page == 'content') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'content') ? "show2" : ""; ?>">Content Management</span>
							</a>
						</li>

			            <li class="<?php echo ($page == 'request') ? "show" : ""; ?>">
							<a href="#" class="ttr-material-button <?php echo ($page == 'request') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-server <?php echo ($page == 'request') ? "show2" : ""; ?>"></i></span>
			                	<span class="ttr-label <?php echo ($page == 'request') ? "show2" : ""; ?>">Monitoring of Request</span>
			                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down <?php echo ($page == 'request') ? "show2" : ""; ?>"></i></span>
			                </a>
			                <ul>
			                    <li>
			                		<a href="walk-in-request" class="ttr-material-button"><span class="ttr-label <?php echo ($secondnav == 'walk-in') ? "txtclr" : ""; ?>">Walk-In Request</span></a>
			                	</li>
			                	<li>
			                		<a href="monitoring-of-request" class="ttr-material-button"><span class="ttr-label <?php echo ($secondnav == 'pending') ? "txtclr" : ""; ?>">Pending Request (<?php echo $cpending; ?>)</span></a>
			                	</li>
			                	<li>
			                		<a href="approved-request" class="ttr-material-button"><span class="ttr-label <?php echo ($secondnav == 'approved') ? "txtclr" : ""; ?>">Approved Request (<?php echo $capproved; ?>)</span></a>
			                	</li>
			                	<li>
			                		<a href="declined-request" class="ttr-material-button"><span class="ttr-label <?php echo ($secondnav == 'declined') ? "txtclr" : ""; ?>">Declined Request (<?php echo $cdeclined; ?>)</span></a>
			                	</li>
			                </ul>
			            </li>

			            <!-- <li>
							<a href="reports" class="ttr-material-button <?php echo ($page == 'reports') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-stats-up <?php echo ($page == 'reports') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'reports') ? "show2" : ""; ?>">Reports</span>
							</a>
						</li> -->



						<li class="ttr-seperate"></li>
						<br><br><br><br>
					</ul>
				</nav>

















			<!-- 	<nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>




						<li>
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives"></i></span>
			                	<span class="ttr-label">Content Management</span>
			                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
			                </a>
			                <ul>
			                	<li>
			                		<a href="content-management" class="ttr-material-button"><span class="ttr-label">Story, Logo, Vision, Mission</span></a>
			                	</li>
			                	<li>
			                		<a href="org-structure" class="ttr-material-button"><span class="ttr-label">Org. Structure</span></a>
			                	</li>
			                	<li>
			                		<a href="guidelines" class="ttr-material-button"><span class="ttr-label">Guidelines</span></a>
			                	</li>
			                	<li>
			                		<a href="instructions" class="ttr-material-button"><span class="ttr-label">Services</span></a>
			                	</li>
			                	<li>
			                		<a href="contact" class="ttr-material-button"><span class="ttr-label">Contacts</span></a>
			                	</li>
			                </ul>
			            </li>


						<li>
							<a href="settings" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-settings"></i></span>
								<span class="ttr-label">Settings</span>
							</a>
						</li>
						<li class="ttr-seperate"></li>
					</ul>
				</nav> -->