<?php
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
		$pdf->SetTitle("BRGY. VICTORIA REYES");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(118, 87);
		$pdf->Write(0, $_POST['name']);
		$pdf->SetXY(132, 97);
		$pdf->Write(0, $_POST['address']);
		$pdf->SetXY(153, 97);
		$pdf->Write(0, $_POST['address2']);
		$pdf->SetXY(118, 122);
		$pdf->Write(0, $_POST['purpose']);
		$pdf->SetXY(118, 138);
		$pdf->Write(0, date('M. d, Y', strtotime($_POST['date_issued'])));
		ob_end_clean();
		$pdf->Output('I', 'Brgy Victoria Reyes.pdf');
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

	if(isset($_POST["indigency"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../assets/pdf/indigency.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("BRGY. VICTORIA REYES");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(73, 98);
		$pdf->Write(0, date('M. d, Y', strtotime($_POST['date_issued'])));
		$pdf->SetXY(107, 133);
		$pdf->Write(0, $_POST['name']);
		$pdf->SetXY(177, 133);
		$pdf->Write(0, strtolower($_POST['civil_status']));
		$pdf->SetXY(156, 138);
		$pdf->Write(0, $_POST['address']);
		$pdf->SetXY(169, 138);
		$pdf->Write(0, $_POST['address2']);
		$pdf->SetXY(168, 143);
		$pdf->Write(0, $_POST['resident_since']);
		$pdf->SetXY(91, 153);
		$pdf->Write(0, date('j', strtotime($_POST['date_issued'])));
		$pdf->SetXY(107, 153);
		$pdf->Write(0, date('F Y', strtotime($_POST['date_issued'])));
		$pdf->SetXY(91, 158);
		$pdf->Write(0, $_POST['purpose']);
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
				$secondnav = 'declined';

				include 'nav.php'; 

				?>

			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FCFCFC;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Monitoring of Request</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-server"></i>Declined Request</li>
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
										<th width="80">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php

										$rows = $model->fetchRequestsHistory(3);

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
										<td><?php echo $row['purpose']; ?></td>
										<td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($row['date_issued'])); ?></td>
										<td>
											<center>
												<?php
												if ($row['status'] == 1) {
													if ($row['request_type'] == 1){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $row['address']; ?>">
													<input type="hidden" name="address2" value="<?php echo $row['address2']; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="date_issued" value="<?php echo $row['date_issued']; ?>">
													<button type="submit" name="brgy_clearance" class="btn btn-block green radius-xl" style="float: right;">PRINT</button><br><br>
												</form>
												<?php	
													}
													else if ($row['request_type'] == 2){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $row['address']; ?>">
													<input type="hidden" name="address2" value="<?php echo $row['address2']; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="resident_since" value="<?php echo $row['resident_since']; ?>">
													<input type="hidden" name="date_issued" value="<?php echo $row['date_issued']; ?>">
													<button type="submit" name="residency" class="btn btn-block green radius-xl" style="float: right;">PRINT</button><br><br>
												</form>
												<?php
													}
													else if ($row['request_type'] == 3){
												?>
												<form method="POST" target="_blank">
													<input type="hidden" name="name" value="<?php echo $name; ?>">
													<input type="hidden" name="address" value="<?php echo $row['address']; ?>">
													<input type="hidden" name="address2" value="<?php echo $row['address2']; ?>">
													<input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
													<input type="hidden" name="resident_since" value="<?php echo $row['resident_since']; ?>">
													<input type="hidden" name="civil_status" value="<?php echo $row['civil_status']; ?>">
													<input type="hidden" name="date_issued" value="<?php echo $row['date_issued']; ?>">
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
													<center><span class="badge badge-danger"><a href="" style="font-size: 14px;color: white;">CANCELLED</a></span></center> 
												<?php
												}
												else {
												?>
												<center><span class="badge badge-danger"><a href="" style="font-size: 14px;color: white;">DECLINED</a></span></center> 
												<?php
												}
												?>
											</center>
										</td>
									</tr>
									<?php

										}
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