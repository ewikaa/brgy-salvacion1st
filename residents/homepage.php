<?php
	
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

		<title><?php echo $web_name; ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dashboard.css">
	</head>
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
		.col-xs-5ths,
		.col-sm-5ths,
		.col-md-5ths,
		.col-lg-5ths {
				position: relative;
				min-height: 1px;
				padding-right: 15px;
				padding-left: 15px;
		}

		.col-xs-5ths {
				width: 20%;
				float: left;
		}

		@media (min-width: 768px) {
				.col-sm-5ths {
						width: 20%;
						float: left;
				}
		}

		@media (min-width: 992px) {
				.col-md-5ths {
						width: 20%;
						float: left;
				}
		}

		@media (min-width: 1200px) {
				.col-lg-5ths {
						width: 20%;
						float: left;
				}
		}
	</style>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #F3F3F3;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				<?php 
			
				include 'sidebar.php';
				
				$page = 'dashboard';
				$secondnav = '';

				include 'nav.php'; 

				?>

				<!-- <nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>
						<li class="show" style="margin-top: 0px;">
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
			            <li>
							<a href="messages" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-envelope"></i></span>
								<span class="ttr-label">Messages</span>
							</a>
						</li>
						<li class="ttr-seperate"></li>
					</ul>
				</nav> -->
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Dashboard</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="fa fa-home"></i>Home</li>
					</ul>
				</div> 
				<?php 

				if (555 == $r_id) {
					$model->verifyResidentAccount($r_id);
					$email_verif = 1;
				}
				else {
					$model->verifyResidentAccount($r_id);
					$email_verif = 1;
				}
				?>
				<?php include 'widget.php'; ?>

				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<style type="text/css">
				.chart {
					width: 100%; 
					min-height: 500px;
				}
				.rowy {
					margin:0 !important;
				}
				</style>
				<div class="row">
					<div class="col-lg-5 m-b30">

								<div class="row">
									<div class="col-lg-12">
										<div class="new-user-list">
											<div class="heading-bx left">
												<h2 class="m-b10 title-head"><?php echo $r_fname; ?> <?php echo $r_lname; ?><br><small style="font-size: 18px;"><?php echo $r_id_number; ?></small> </h2>
											</div>

											<h6>Barangay Salvacion 1st - Resident</h6>
											<h6><?php echo $r_id_number; ?></h6>
											<h6><?php echo $r_contact; ?></h6>
											<h6><?php echo $r_occupation; ?></h6>
											<h6>Resident since <?php echo $r_resident_since; ?></h6>
											<?php 
							                if ($email_verif == 0 || $email_verif == "") {
					                        ?>
					                        <h6 style="color: green;">VERIFIED</h6>
					                        <?php }
							                else {
					                        ?> 
					                        <h6 style="color: green;">VERIFIED</h6>
					                        <?php 
							                }
					                        ?> 
										</div>
										<hr>
										<a href="update-profile" class="btn green radius-xl"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;UPDATE MY PROFILE</span></a>&nbsp;&nbsp;
										<a href="change-password" class="btn blue radius-xl"><i class="ti-lock"></i><span>&nbsp;&nbsp;UPDATE PASSWORD</span></a>
									</div>
								</div>

					</div>
					<div class="col-lg-7 m-b30">
						<div class="widget-inner">
							<?php

								$st = 1;
								$rs = $model->displayAllAnnouncements($st);

								if (!empty($rs)) {
									foreach ($rs as $r) {

							?>
							<p id="<?php echo $r['id']; ?>" style="display: none;"><?php echo htmlspecialchars($r['details']); ?></p>
							<?php
									}
								}

							?> 
							<div id="calendar"></div>
							<div id="event-modal" class="modal fade" role="dialog">
								<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="modal-title"></h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="form-group col-12">
														<center>
															<img id="event-image" style="width: 500px; height: 300px; object-fit: cover;">
														</center>
													</div>
													<div class="form-group col-12">
														<label class="col-form-label">Title</label>
														<p class="form-control" id="event-title"></p>
													</div>
													<div class="form-group col-12">
														<label class="col-form-label">Details</label>
														<p class="form-control" style="height: inherit!important;" id="event-details"></p>
													</div>
													<div class="form-group col-12">
														<label class="col-form-label">Date</label>
														<p class="form-control" id="event-time"></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
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
		<script src='../dashboard/assets/vendors/calendar/fullcalendar.js'></script>

		<script type="text/javascript">
			function blockSpecialChar(evt) { 
				var charCode = (evt.which) ? evt.which : window.event.keyCode; 
				if (charCode <= 13) { 
					return true; 
				} 
				
				else { 
					var keyChar = String.fromCharCode(charCode); 
					var re = /^[A-Za-z. ]+$/ 
					return re.test(keyChar); 
				} 
			}
		</script>
		<script>
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				// right: 'month'
			},

			// customize the button names,
			// otherwise they'd all just say "list"
			// views: {
			//   listDay: { buttonText: 'list day' },
			//   listWeek: { buttonText: 'list week' }
			// },

			defaultView: 'month',
			defaultDate: '<?php echo date('Y-m-d') ?>',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				<?php

					$status = 1;
					$rows = $model->displayAllAnnouncements($status);
					if (!empty($rows)) {
						foreach ($rows as $row) {

				?>
				{
					event_id: '<?php echo $row['id']; ?>',
					image: '../assets/images/announcement/<?php echo $row['image_unique']; ?>.jpg',
					title: '<?php if ($row['category'] == 1) { echo 'Program'; } elseif ($row['category'] == 0) { echo 'Announcement'; } elseif ($row['category'] == 2) { echo 'Guidelines'; } elseif ($row['category'] == 3) { echo 'Service'; }?>: <?php echo $row['title']; ?>',
					details: $('#<?php echo $row['id']; ?>').text(),
					date: '<?php echo date('F j, Y', strtotime($row['date'])); ?>',
					start: '<?php echo date('Y-m-d', strtotime($row['date'])); ?>',
				},
				<?php
						}
					}

				?> 
			],
			eventClick: function(event, jsEvent, view) {
				$('#modal-title').html('<img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;' + event.title);
				$('#event-image').attr('src', event.image);
				$('#event-title').html(event.title);
				$('#event-details').html(event.details);
				$('#event-time').html(event.date); 
				$('#event-modal').modal();
			},
		});

	});

</script>
	</body>

</html>