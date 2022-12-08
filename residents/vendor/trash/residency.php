<?php
	use setasign\Fpdi\Fpdi;
	
	ob_start(); 
	session_start();

	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess2'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	if(isset($_POST["residency"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../assets/pdf/residency.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("BRGY. VICTORIA REYES");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(84, 92);
		$pdf->Write(0, date('M. d, Y', strtotime($_POST['date_issued'])));
		$pdf->SetXY(112, 137);
		$pdf->Write(0, $_POST['name']);
		$pdf->SetXY(142, 142);
		$pdf->Write(0, $_POST['address']);
		$pdf->SetXY(155, 142);
		$pdf->Write(0, $_POST['address2']);
		$pdf->SetXY(136, 147);
		$pdf->Write(0, $_POST['resident_since']);
		$pdf->SetXY(93, 157);
		$pdf->Write(0, date('j', strtotime($_POST['date_issued'])));
		$pdf->SetXY(113, 157);
		$pdf->Write(0, date('F', strtotime($_POST['date_issued'])));
		ob_end_clean();
		$pdf->Output('I', 'Brgy Victoria Reyes.pdf');
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
	</head>
	<style type="text/css">
		.btn.dropdown-toggle.btn-default:hover {
			color: #000!important;
		}

		.btn.dropdown-toggle.btn-default:focus {
			color: #000!important;
		}

		tbody tr:hover {
			background-color: #d4d4d4;
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
	</style>
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
						<li class="show">
							<a href="residency" class="ttr-material-button">
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
				</nav>
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Services</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-agenda"></i>Certificate of Residency</li>
					</ul>
				</div> 
				
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
						<?php

							if (isset($_POST['post_msg'])) {
								$model->addRequest($_SESSION['sess2'], 2, $_POST['message']);

								setcookie('cancel_request_residency', time() + (60 * 5), time() + (60 * 5), "/");

								echo "<script>window.open('residency', '_self')</script>";
							}

						?>
									<form class="contact-bx dzForm" method="post">
										<div class="dzFormMsg"></div>
										<div class="heading-bx left">
											<h2 class="title-head">Request <span>Services</span></h2>
										</div>
										<div style="padding: 5px;"></div>
										<div class="row placeani" id="sent">
											<div class="col-lg-12">
												<select class="form-control" id="switch-page">
													<option value="1">Request of Barangay ID</option>
													<option value="2" selected>Request Certificate of Residency</option>
													<option value="3">Request Certificate of Indigency</option>
												</select>
											</div>
											<div class="col-lg-8">
												<br>
												<div class="form-group">
													<label>Name</label><div class="input-group">
														<?php echo $r_fname; ?> <?php echo $r_mname; ?> <?php echo $r_lname; ?>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<br>
												<div class="form-group">
													<label>Resident Since</label><div class="input-group">
														<?php echo $r_resident_since; ?>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Block</label><div class="input-group">
														<?php echo $r_address; ?>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Lot</label><div class="input-group">
														<?php echo $r_address2; ?>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Purpose</label><div class="input-group">
														<textarea name="message" rows="1" class="form-control" required minlength="5" maxlength="300" ></textarea>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Date Request</label><div class="input-group">
														<?php echo date("M. d, Y"); ?>
													</div>
												</div>
											</div>
										</form>
											<div class="col-lg-12">
												<div id="request_button">
													<?php
													$request_type = 2;
													$rows = $model->pendingRequestChecker($_SESSION['sess2'], $request_type);
													if (!empty($rows)) {
														foreach ($rows as $row) {
														}
													?>
													<center>
														<h3 style="color: green;">YOUR REQUEST IS PENDING</h3>
														<button type="button" data-toggle="modal" data-target="#view-cancel-<?php echo $row['id']; ?>" class="btn red radius-xl" style="width: 210px;height: 50px;display: flex;align-items: center;justify-content: center;" <?php if (!isset($_COOKIE['cancel_request_residency'])) { echo 'disabled'; } ?>><i class="ti-archive" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;CANCEL REQUEST</span></button>
													</center>
													<?php
														if (isset($_POST['cancel'])) {
															$model->updateRequestStatus(4, $_POST['cancel_hidden']);

															setcookie('cancel_request_residency', null, -1, '/'); 

															echo "<script>window.open('residency', '_self');</script>";
														}
													} else { ?>
													<center><button name="post_msg" type="submit" class="btn button-md button-block">Submit Request</button></center>
													<?php } ?>
												</div>
												<p id="timer" style="text-align: center;">
														<?php

															function formatSeconds($seconds) {
				  												$t = round($seconds);
				  												return sprintf('%02d:%02d', ($t/60%60), $t%60);
															}

															if (isset($_COOKIE['cancel_request_residency'])) { 
																$time_left = $_COOKIE['cancel_request_residency'] - time();
																echo formatSeconds($time_left);
															} 
														?>
													</p>
											</div>
											<div id="view-cancel-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
													<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Request Details</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="cancel_hidden" value="<?php echo $row['id']; ?>">
																<div class="row">
																	<div class="form-group col-12">
																		<label class="col-form-label">Name</label>
																		<input class="form-control" type="text" value="<?php echo $r_fname; ?> <?php echo $r_mname; ?> <?php echo $r_lname; ?>" readonly>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Blk</label>
																		<input class="form-control" type="text" value="<?php echo $r_address; ?>" readonly>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Lot</label>
																		<input class="form-control" type="text" value="<?php echo $r_address2; ?>" readonly>
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Purpose</label>
																		<input class="form-control" type="text" value="<?php echo $row['purpose']; ?>" readonly>
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Date Submitted</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d, Y', strtotime($row['date_issued'])); ?>" readonly>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="cancel" value="Cancel">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
													</form>
												</div>
											<div class="col-lg-12" align="center">
											<br>
											<label style="color: green;font-weight: 540;">
											</label>
											</div>
										</div>
									

					</div>
					<div class="col-lg-7 m-b30">
						<div class="heading-bx left">
							<h2 class="title-head">Certificate of Residency<span> Request History</span></h2>
						</div>
						<div class="table-responsive">
							<table id="table" class="table table-bordered hover" style="width:100%">
								<thead>
									<tr>
										<th width="50">Action</th>
										<th>Purpose</th>
										<th>Date Request</th>
										<th width="100">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$rows = $model->fetchRequestsHistory2($_SESSION['sess2'], $request_type);

										if (!empty($rows)) {
											foreach ($rows as $row) {
									?>
									<tr>
										<td><center><a href="" class="btn blue" style="width: 50px; height: 37px;" data-toggle="modal" data-target="#view-<?php echo $row['id']; ?>"><div data-toggle="tooltip" title="View Details"><i class="ti-search" style="font-size: 12px;"></i></div></a></center></td>
										<td><?php echo $row['purpose']; ?></td>
										<td style="font-size: 14px;"><?php echo date('M. d, Y', strtotime($row['date_issued'])); ?></td>
										<td>
											<center>
												<?php
												if ($row['status'] == 1) {

												?>
												<!-- <form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>">
													<input type="hidden" name="address" value="<?php echo $row['address']; ?>">
													<input type="hidden" name="address2" value="<?php echo $row['address2']; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="resident_since" value="<?php echo $row['resident_since']; ?>">
													<input type="hidden" name="date_issued" value="<?php echo $row['date_issued']; ?>">
													<button type="submit" name="residency" class="btn green radius-xl" style="float: right;">APPROVED</button><br><br>
												</form> -->
												<span style="color: green;"><b><?php echo $row['status2']; ?><br><?php echo date('M. d, Y', strtotime($row['date_pickup'])); ?></b></span>
												<?php
												}
												else if ($row['status'] == 2) {
												?>
													<span style="color: blue;"><b>PENDING</b></span>
												<?php
												}
												else if ($row['status'] == 4) {
												?>
													<span style="color: red;"><b>CANCELLED</b></span>
												<?php
												}
												else {
												?>
													<span style="color: red;"><b>DECLINED</b></span>
												<?php
												}
												?>
											</center>
										</td>
									</tr>
									<div id="view-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
										<form class="edit-profile m-b30" method="POST">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Request Details</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<input type="hidden" name="approve_hidden" value="<?php echo $id; ?>">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label">Name</label>
															<input class="form-control" type="text" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>" readonly>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Blk</label>
															<input class="form-control" type="text" value="<?php echo $row['address']; ?>" readonly>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Lot</label>
															<input class="form-control" type="text" value="<?php echo $row['address2']; ?>" readonly>
														</div>
														<div class="form-group col-12">
															<label class="col-form-label">Purpose</label>
															<input class="form-control" type="text" value="<?php echo $row['purpose']; ?>" readonly>
														</div>
														<div class="form-group col-12">
															<label class="col-form-label">Date Submitted</label>
															<input class="form-control" type="text" value="<?php echo date('M. d, Y', strtotime($row['date_issued'])); ?>" readonly>
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
									<?php

										}
									}
									?>
								</tbody>
							</table>
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
		<script type="text/javascript">
			$(document).ready(function() {
				$('#switch-page').change( function() {
					if ($(this).val() == 1) {
						window.open('clearance', '_self');
					}

					else if ($(this).val() == 2) {
						window.open('residency', '_self');
					}

					else if ($(this).val() == 3) {
						window.open('indigency', '_self');
					}
				});

				var timer = setInterval(function() {
					var timer_text = $('#timer').text();
					const timer_split = timer_text.split(':');
					var seconds = (timer_split[0] * 60) + timer_split[1];

					if (parseInt(seconds) > 0) {
						$('#timer').load(location.href + " #timer");
					}

					else {
						$('#timer').html('');
					}

					$('#request_button').load(location.href + " #request_button");
				}, 1000);
			});

			$(document).ready(function() {
				$('#table').DataTable();
			});
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
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
	</body>
</html>