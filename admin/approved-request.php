<?php
    ini_set('display_errors', 1);
	use setasign\Fpdi\Fpdi;
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');
	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}
	
	if(isset($_POST["brgy_clearance"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../assets/pdf/clearance.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("BARANGAY SALVACION 1ST");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetXY(76, 101.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(121, 101.5);
		$pdf->Write(0, $_POST['age']);

		$pdf->SetXY(144.3, 101.5);
		$pdf->Write(0, "FILIPINO");

		$pdf->SetXY(80, 106.5);
		$pdf->Write(0, strtoupper($_POST['address']));

		$pdf->SetXY(103, 131.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(58.5, 146.5);
		$pdf->Write(0, $_POST['day']);

		$pdf->SetXY(84.3, 146.5);
		$pdf->Write(0, strtoupper($_POST['month']));

		$pdf->SetXY(116.3, 146.7);
		$pdf->Write(0, "2");

		ob_end_clean();
		$pdf->Output('I', 'BARANGAY SALVACION 1ST.pdf');
	}

	if(isset($_POST["residency"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../assets/pdf/residency.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("BARANGAY SALVACION 1ST");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetXY(65, 116.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(109, 116.5);
		$pdf->Write(0, $_POST['age']);

		$pdf->SetXY(134, 116.5);
		$pdf->Write(0, "FILIPINO");

		$pdf->SetXY(114.5, 153.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(49, 170);
		$pdf->Write(0, $_POST['day']);

		$pdf->SetXY(73, 170);
		$pdf->Write(0, strtoupper($_POST['month']));

		$pdf->SetXY(101.5, 170);
		$pdf->Write(0, "2022");

		$pdf->SetXY(65, 116.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(53.4, 121.7);
		$pdf->Write(0, strtoupper($_POST['address']));

		$pdf->SetXY(136, 121.7);
		$pdf->Write(0, strtoupper($_POST['resident_since']));


		ob_end_clean();
		$pdf->Output('I', 'BARANGAY SALVACION 1ST.pdf');
	}

	if(isset($_POST["indigency"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../assets/pdf/indigency.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("BARANGAY SALVACION 1ST");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->SetTextColor(0, 0, 0);

		// $pdf->SetXY(145, 70);
		// $pdf->Write(0, strtoupper($_POST['idnumber']));

		$pdf->SetXY(82, 116.5);
		$pdf->Write(0, strtoupper($_POST['name']));

		$pdf->SetXY(132.5, 116.5);
		$pdf->Write(0, $_POST['age']);

		$pdf->SetXY(72, 122);
		$pdf->Write(0, strtoupper($_POST['address']));


		$pdf->SetXY(55, 159.4);
		$pdf->Write(0, $_POST['day']);

		$pdf->SetXY(79, 159.4);
		$pdf->Write(0, strtoupper($_POST['month']));

		$pdf->SetXY(106.5, 159.4);
		$pdf->Write(0, "2022");


		ob_end_clean();
		$pdf->Output('I', 'BARANGAY SALVACION 1ST.pdf');
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
		</style>
	</head>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #FCFCFC;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				
				<?php 
			
				include 'sidebar.php';
				
				$page = 'request';
				$secondnav = 'approved';

				include 'nav.php'; 

				?>

			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FCFCFC;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Monitoring of Request</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-server"></i>Approved Request</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<!-- <div align="right">
									<a href="monitoring-of-request" class="btn green radius-xl" style="float: right;background-color: #267621;"><i class="ti-server"></i><span>&nbsp;PENDING REQUEST</span></a><br>
								</div> -->
						<div style="padding: 25px;"></div>
						<div class="table-responsive">
							<table id="table" class="table hover" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Request Type</th>
										<th>Purpose</th>
										<th>Date Approved</th>
										<th>Pickup Date</th>
										<th width="80">Status</th>
										<th width="80">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php

										$rows = $model->fetchRequestsHistory(1);

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

												$name = trim($row['fname']).' '.trim($row['lname']);
												
												if ($row['status2'] == "Processing") {
												    $status2 = "warning";
												}
												else { 
												    $status2 = "success";
												}

												$address = substr($row['address3'], -1);

												$date_pickup = ''.date('jS', strtotime($row['date_pickup'])).' day of '.date('F Y', strtotime($row['date_pickup'])).'';

												$day = date('jS', strtotime($row['date_pickup']));
												$month = date('F', strtotime($row['date_pickup']));




												$idnumber = '2022'.$row['request_id'].'';

												$bdt = date('Y', strtotime($row['birth_date']));
												$dttt = date("Y");
												$age = $dttt - $bdt;

									?>
									<tr>
										<td><a href="residents-profile?id=<?php echo $row['resident_id']; ?>" style="color: black;"><?php echo $name; ?></a></td>
										<td><?php echo $type; ?></td>
										<td><?php echo $row['purpose']; ?></td>
										<td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($row['date_issued'])); ?></td>
										<td>
											<?php echo date('M. d, Y', strtotime($row['date_pickup'])); ?>
										</td>
										<td>
											<center><span class="badge badge-<?php echo $status2; ?>"><a href="" style="font-size: 14px;color: white;" data-toggle="modal" data-target="#status-<?php echo $row['id']; ?>"><?php echo $row['status2']; ?></a></span></center> 
										</td>
										<td>
											<center>
												<?php
												if ($row['status'] == 1) {
													if ($row['request_type'] == 1){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $address; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="day" value="<?php echo $day; ?>">
													<input type="hidden" name="month" value="<?php echo $month; ?>">
													<input type="hidden" name="age" value="<?php echo $age; ?>">
													<input type="hidden" name="idnumber" value="<?php echo $idnumber; ?>">

													<button type="submit" name="brgy_clearance" class="btn btn-block green radius-xl" style="float: right;">PRINT</button><br><br>
												</form>
												<?php	
													}
													else if ($row['request_type'] == 2){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $address; ?>">
													<input type="hidden" name="resident_since" value="<?php echo $row['resident_since']; ?>">
													<input type="hidden" name="day" value="<?php echo $day; ?>">
													<input type="hidden" name="month" value="<?php echo $month; ?>">
													<input type="hidden" name="age" value="<?php echo $age; ?>">
													<input type="hidden" name="idnumber" value="<?php echo $idnumber; ?>">

													<button type="submit" name="residency" class="btn btn-block green radius-xl" style="float: right;">PRINT</button><br><br>
												</form>
												<?php
													}
													else if ($row['request_type'] == 3){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $address; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="date_pickup" value="<?php echo $date_pickup; ?>">
													<input type="hidden" name="age" value="<?php echo $age; ?>">
													<input type="hidden" name="idnumber" value="<?php echo $idnumber; ?>">
													<input type="hidden" name="day" value="<?php echo $day; ?>">
													<input type="hidden" name="month" value="<?php echo $month; ?>">

													<button type="submit" name="indigency" class="btn btn-block green radius-xl" style="float: right;">PRINT</button><br><br>
												</form>
												<?php
													}
													else {
														echo "<span style='color: red;'><b>ERROR</b></span>";
													}
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
									<div id="status-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
										<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Update Request Status</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<input class="form-control" type="hidden" name="approve_id" value="<?php echo $row['id']; ?>">
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
															<div class="form-group col-12">
																<label class="col-form-label">Pickup Date</label>
																<input class="form-control" type="text" value="<?php echo date('M. d, Y', strtotime($row['date_pickup'])); ?>" readonly>
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Status</label>
																<select class="form-control" name="status2">
																	<option value="Processing"<?php if ($row['status2'] == "Processing") { echo "selected"; } else {} ?>>Processing</option>
																	<option value="For Pick Up"<?php if ($row['status2'] == "For Pick Up") { echo "selected"; } else {} ?>>For Pick Up</option>
																	<option value="Picked Up"<?php if ($row['status2'] == "Picked Up") { echo "selected"; } else {} ?>>Picked Up</option>
																</select>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<input type="submit" class="btn green radius-xl outline" name="status" value="Update Status">
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<?php

										}
									}

									if (isset($_POST['status'])) {
										$model->changeRequestStatus($_POST['status2'], $_POST['approve_id']);
										echo "<script>window.open('approved-request', '_self');</script>";
									}

									?>
								</tbody>
							</table>
						</div>
						<hr>
								<!-- <div align="right">
									<a href="monitoring-of-request" class="btn green radius-xl" style="float: right;background-color: #267621;"><i class="ti-server"></i><span>&nbsp;PENDING REQUEST</span></a><br>
								</div> -->
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
				$('#table').DataTable();
			});
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>