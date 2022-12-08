<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess2'])) {
		echo "<script>window.open('../','_self');</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="robots" content="" />

		<meta name="description" content="" />

		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta name="format-detection" content="telephone=no">

		<link rel="icon" href="../assets/images/icon.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png" />

		<title>Brgy. Victoria Reyes</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dashboard.css">

		<style type="text/css">
			.btn.dropdown-toggle.btn-default:hover {
				color: #000!important;
			}

			.btn.dropdown-toggle.btn-default:focus {
				color: #000!important;
			}
			.widget-card .icon {
				position: absolute;
				top: auto;
				bottom: -20px;
				right: 5px;
				z-index: 0;
				font-size: 65px;
				color: rgba(0, 0, 0, 0.15);
			}
			tbody tr:hover {
				background-color: #d4d4d4;
			}

			::-webkit-scrollbar {
				width: 5px;
			}

			::-webkit-scrollbar-track {
				width: 5px;
				background: #f5f5f5;
			}

			::-webkit-scrollbar-thumb {
				width: 1em;
				background-color: #ddd;
				outline: 1px solid slategrey;
				border-radius: 1rem;
			}

			.text-small {
				font-size: 0.9rem;
			}

			.messages-box, .chat-box {
				height: 600px;
				overflow-y: scroll;
			}

			.rounded-lg {
				border-radius: 0.5rem;
			}

			input::placeholder {
				font-size: 0.9rem;
				color: #999;
			}

			.btn.btn-link:hover {
				background-color: #267621;
			}
		</style>
	</head>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #F3F3F3;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				<?php include 'sidebar.php'; ?>
				<nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>
						<li style="margin-top: 0px;">
							<a href="homepage" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-home"></i></span>
								<span class="ttr-label">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="clearance" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-agenda"></i></span>
								<span class="ttr-label">Request Services</span>
							</a>
						</li>
			            <li class="show">
							<a href="messages" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-envelope"></i></span>
								<span class="ttr-label">Messages</span>
							</a>
						</li>
						<li class="ttr-seperate"></li>
					</ul>
				</nav>
			</div>
		</div>
		<main class="ttr-wrapper">
			<div class="container-fluid">
				<!-- <div class="db-breadcrumb">
					<h4 class="breadcrumb-title">My Messages</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-envelope"></i>Messages</li>
					</ul>
				</div>   -->
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="px-3">
								<div class="row rounded-lg overflow-hidden shadow">
									<div class="col-3 px-0">
										<div class="bg-white">
											<div class="bg-gray px-4 py-2 bg-light">
												<p class="h5 mb-0 py-1">My Messages</p>
											</div>
											<div class="messages-box">
												<div class="list-group rounded-0" id="notif_box">
												</div>
											</div>
										</div>
									</div>

									<div class="col-9 px-0">
										<div class="px-4 py-5 chat-box bg-white" id="chat-box-p" style="padding-top: 24px!important; padding-bottom: 24px!important;">
											<div id="chat-box">

											</div>
										</div>

										<form method="POST" class="bg-light">
											<div class="input-group">
												<input type="text" name="message" id="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
												<div class="input-group-append">
													<button id="button-addon2" type="submit" class="btn btn-link" name="send_message"><i class="fa fa-paper-plane"></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<div class="ttr-overlay"></div>

		<script src="../dashboard/assets/js/jquery.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="../dashboard/assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="../dashboard/assets/vendors/counter/waypoints-min.js"></script>
		<script src="../dashboard/assets/vendors/counter/counterup.min.js"></script>
		<script src="../dashboard/assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="../dashboard/assets/vendors/masonry/masonry.js"></script>
		<script src="../dashboard/assets/vendors/masonry/filter.js"></script>
		<script src="../dashboard/assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src='../dashboard/assets/vendors/scroll/scrollbar.min.js'></script>
		<script src="../dashboard/assets/js/functions.js"></script>
		<script src="../dashboard/assets/vendors/chart/chart.min.js"></script>
		<script src="../dashboard/assets/js/admin.js"></script>
		<script src='../dashboard/assets/vendors/calendar/moment.min.js'></script>   
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>
		<input type="hidden" id="temp" data-id="1">
		<script type="text/javascript">
			function fetchNotifs() {
				$.ajax({   
					type: 'GET',
					url: 'messages-library/fetch_notifs.php',       
					dataType: 'html',              
					success: function(response){                    
						$("#notif_box").html(response);        
					}
				});
			}

			function fetchMessages() {
				var fetch_id = $('#temp').data('id'); 

				$.ajax({   
					type: 'POST',
					url: 'messages-library/fetch_messages.php',       
					data: { fetch_id : fetch_id },      
					dataType: 'html',              
					success: function(response){                    
						$("#chat-box").html(response);  
						updateReadStatus();
					}
				});
			}

			function updateReadStatus() {
				var fetch_id = $('#temp').data('id'); 

				$.ajax({   
					type: 'POST',
					url: 'messages-library/update_status.php',       
					data: { fetch_id : fetch_id },                  
					success: function(data){                    
    
					}
				});
			}
			
			$(document).ready(function() {
				fetchNotifs();
				fetchMessages();
				updateReadStatus();

				setTimeout(function(){ $('#chat-box-p').scrollTop($('#chat-box-p')[0].scrollHeight); }, 500); 

				setInterval( function() { 
					fetchNotifs();
					fetchMessages();
				}, 1000);

				$(document).on('click', 'button[name="send_message"]', function(e) {
					var fetch_id = $('#temp').data('id'); 
					var message = $('#message').val();
					
					if (!message.trim()) {} 

					else {
						$.ajax({
							url:'messages-library/insert_message.php',
							method:'POST',
							data: {
								fetch_id : fetch_id,
								message: message
							},
							success:function(data){
								$('#message').val('');
							}
						});

						fetchMessages();
						fetchNotifs();
					}

					e.preventDefault();
				});
				// setInterval(function(){
				// 	$("#chat-box-p").load(location.href + " #chat-box");
				// }, 1000);
			});
		</script>
	</body>

</html>