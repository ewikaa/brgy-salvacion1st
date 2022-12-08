<?php
	
	session_start();

	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
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

		<link rel="icon" href="../assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/<?php echo $web_icon; ?>.png" />

		<title><?php echo $web_name; ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dataTables.bootstrap4.min.css">
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
	<body class="ttr-opened-sidebar ttr-pinned-sidebar"  style="background-color: #FCFCFC!important;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				
				<?php 
			
				include 'sidebar.php';
				
				$page = 'dashboard';


				include 'nav.php'; 

				?>

			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FCFCFC;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Dashboard</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="fa fa-home"></i>Home</li>
					</ul>
				</div> 
				
				<div class="row">
					<div class="col-md-3">
						<a href="inquiries"><div class="widget-card widget-bg2" style="background-image: linear-gradient(to right, #ffb822, #fac34d, #fcd174, #fad88e);">
							<div class="icon">
								<i class="ti-time"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									<?php echo date('F j, Y'); ?>
								</h3>
								<span class="wc-des">
									<?php echo date('g:i A'); ?> | <?php echo date('l'); ?>
								</span>
							</div>				      
						</div></a>
					</div>
					<div class="col-md-3">
						<a href="blotters"><div class="widget-card widget-bg3" style="background-image: linear-gradient(to right, #13bed4, #00c5dc, #00c5dc, #95dde6);">		
							<div class="icon">
								<i class="ti-harddrives"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Blotters
								</h3>
								<span class="wc-des">
									<?php echo $web_name; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $tot_blot; ?></span>
								</span>		
							</div>				      
						</div></a>
					</div>
					<div class="col-md-3">
						<a href="monitoring-of-request"><div class="widget-card widget-bg2" style="background-image: linear-gradient(to right, #f52a4c, #f0526d, #f0526d, #f5677f);">	
							<div class="icon">
								<i class="ti-agenda"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Requested Documents
								</h3>
								<span class="wc-des">
									<?php echo $web_name; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $cpending; ?></span>
								</span>		
							</div>				      
						</div></a>
					</div>
					<div class="col-md-3">
						<a href="residents"><div class="widget-card widget-bg4" style="background-image: linear-gradient(to right, #16b595, #34bfa3, #4dc9b0, #63d4bd);">	
							<div class="icon">
								<i class="ti-user"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									Total Residents
								</h3>
								<span class="wc-des">
									<?php echo $web_name; ?>
								</span>
								<span class="wc-stats">
									<span class="counter"><?php echo $not_verified; ?></span>
								</span>		
							</div>				      
						</div></a>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-lg-6 m-b30">
						<div class="heading-bx left">
							<h2 class="m-b10 title-head">Pending <span>Requests</span></h2>
						</div>
						<div class="table-responsive">
							<table id="table2" class="table hover" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Request Type</th>
										<th>Date Request</th>
										<th width="50">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php

										$rows = $model->fetchRequests();

										if (!empty($rows)) {
											foreach ($rows as $row) {
												switch ($row['request_type']) {
													case 1:
														$type = 'Brgy. Clearance';
														break;
													case 2:
														$type = 'Certif. of Residency';
														break;
													case 3:
														$type = 'Certif. of Indigency';
														break;
													default:
														$type = 'N/A';
														break;
												}

												$name = trim($row['fname']).' '.trim($row['mname']).' '.trim($row['lname']);
									?>
									<tr>
										<td><a href="residents-profile?id=<?php echo $row['resident_id']; ?>" style="color: black;"><?php echo $name; ?></a></td>
										<td><?php echo $type; ?></td>
										<td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($row['date_issued'])); ?></td>
										<td>
											<center>
												<a href="" class="btn blue" style="width: 50px; height: 37px;" data-toggle="modal" data-target="#approve-<?php echo $row['id']; ?>">
													<div data-toggle="tooltip" title="View Details">
														<i class="ti-search" style="font-size: 12px;"></i>
													</div>
												</a>&nbsp;
<!-- 												<a href="" class="btn red" style="width: 50px; height: 37px;" data-toggle="modal" data-target="#decline-<?php echo $row['id']; ?>">
													<div data-toggle="tooltip" title="Decline">
														<i class="ti-archive" style="font-size: 12px;"></i>
													</div>
												</a> -->
											</center>
										</td>
									</tr>
									<div id="approve-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
										<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Request Details</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<input class="form-control" type="hidden" name="approve_id" value="<?php echo $row['id']; ?>">
															<div class="form-group col-12">
																<label class="col-form-label">Name</label>
																<br><?php echo $name; ?>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Request Type</label>
																<br><?php echo $type; ?><br>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Purpose</label>
																<br><?php echo $row['purpose']; ?>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Date Request</label>
																<br><?php echo date('M. d, Y g:i A', strtotime($row['date_issued'])); ?>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<!-- <input type="submit" class="btn green radius-xl outline" name="approve" value="Approve"> -->
														<a href="monitoring-of-request" class="btn green radius-xl outline">Go to Pending Requests</a>
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div id="decline-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
										<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Decline Request</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<input class="form-control" type="hidden" name="decline_id" value="<?php echo $row['id']; ?>">
															<div class="form-group col-12">
																<label class="col-form-label">Request Type</label>
																<input class="form-control" type="text" value="<?php echo $type; ?>" readonly>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Purpose</label>
																<input class="form-control" type="text" value="<?php echo $row['purpose']; ?>" readonly>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Date Request</label>
																<input class="form-control" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($row['date_issued'])); ?>" readonly>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<input type="submit" class="btn red radius-xl outline" name="decline" value="Decline">
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<?php

											}
										}
										else {
											echo "<script>$('#table2').after('<center><span>NO PENDING REQUESTS</span></center>');</script>";
										}	

										if (isset($_POST['approve'])) {
											$model->updateRequestStatus(1, $_POST['approve_id']);

											echo "<script>window.open('monitoring-of-request', '_self');</script>";
										}

										if (isset($_POST['decline'])) {
											$model->updateRequestStatus(3, $_POST['decline_id']);

											echo "<script>window.open('monitoring-of-request', '_self');</script>";
										}

									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6 m-b30">
						<div class="heading-bx left">
							<h2 class="m-b10 title-head">Brgy. <span>Calendar</span></h2>
						</div>
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
		<script src='../dashboard/assets/vendors/calendar/fullcalendar.js'></script>
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>

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
<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>