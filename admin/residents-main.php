<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');
	
	if(isset($_POST["export-pdf"])) { 
		require_once('../tcpdf/tcpdf.php');  
		$obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
		$obj_pdf->SetCreator(PDF_CREATOR);  
		$obj_pdf->SetTitle("BRGY. CUYAB - RESIDENTS");   
		$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
		$obj_pdf->SetDefaultMonospacedFont('helvetica');  
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
		$obj_pdf->setPrintHeader(false);  
		$obj_pdf->setPrintFooter(false);  
		$obj_pdf->SetAutoPageBreak(TRUE, 10);  
		$obj_pdf->SetFont('helvetica', '', 12);  
		$obj_pdf->AddPage(); 
		//ob_start(); 
		$content = '';  
		$content .= '
		<div align="center">
			<img src="1header.jpg" height="115" width="300">
			<h2 style="color: black;">BARANGAY CUYAB RESIDENTS</h2>
		</div>
		<table border="1" cellspacing="0" cellpadding="5">
        	<thead>
        		<tr>
        			<th><b>ID Number</b></th>
        			<th><b>Name</b></th>
        			<th><b>Gender</b></th>
        			<th><b>Civil Status</b></th>
        			<th><b>Contact</b></th>
        		</tr>
        	</thead>
        	<tbody>';
        $status = 1;
        $rows = $model->displayResidents($status);
        if (!empty($rows)) {
			foreach ($rows as $row) {
			    $id = $row['id'];
				$id_number = $row['id_number'];
				$first_name = $row['fname'];
				$middle_name = $row['mname'];
				$last_name = $row['lname'];
				$email = $row['email'];
				$contact = $row['contact_number'];
				$gender = $row['gender'];
				$civil_status = $row['civil_status'];
				$address = $row['address'];
				$address2 = $row['address2'];
				$resident_since = $row['resident_since'];
				$date_added = $row['date_registered'];
				$verified = $row['verified'];
				
				$content .= '<tr>
			        <td>'.$id_number.'</td>
			        <td>'.$first_name.' '.$middle_name.' '.$last_name.'</td>
			        <td>'.$gender.'</td>
			        <td>'.$civil_status.'</td>
			        <td>'.$contact.'</td>
		        </tr>';
			}
        }
        	
		$content .= '</tbody></table>';  
		$content = utf8_encode($content);
		$obj_pdf->writeHTML($content); 
		ob_end_clean();
		$obj_pdf->Output('Residents.pdf', 'I');  
	}

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
				
				$page = 'records';
				$secondnav = 'residents';

				include 'nav.php'; 

				?>

			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FCFCFC;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Residents Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-agenda"></i>Registered Residents</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
								<div align="right">
									<a href="" class="btn green radius-xl" style="background-color: #1043A9;" data-toggle="modal" data-target="#add-announcement"><i class="ti-agenda"></i><span>&nbsp;ADD NEW RESIDENT</span></a>&nbsp;
									<!-- <a href="pending-residents" class="btn green radius-xl" style="background-color: #267621;"><i class="ti-agenda"></i><span>&nbsp;PENDING RESIDENTS (<?php echo $pending; ?>)</span></a>&nbsp; -->
									<a href="archived-residents" class="btn red radius-xl"><i class="ti-agenda"></i><span>&nbsp;ARCHIVED RESIDENTS</span></a><br>
								</div>
								<div style="padding: 25px;"></div>

								<div class="table-responsive">
									<table id="table" class="table hover" style="width:100%">
										<thead>
											<tr>
												<th>ID Number</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Civil Status</th>
												<th>Contact</th>
												<th width="80">Status</th>
												<th width="100">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 1;
												$rows = $model->displayResidents($status);

												if (!empty($rows)) {
													foreach ($rows as $row) {
														$id = $row['id'];
														$id_number = $row['id_number'];
														$first_name = $row['fname'];
														$middle_name = $row['mname'];
														$last_name = $row['lname'];
														$email = $row['email'];
														$contact = $row['contact_number'];
														$gender = $row['gender'];
														$civil_status = $row['civil_status'];
														$address = $row['address'];
														$address2 = $row['address2'];
														$resident_since = $row['resident_since'];
														$date_added = $row['date_registered'];
														$verified = $row['verified'];
														

														if ($verified == 1) {
															if ($row['email_verif'] == 1) {
															    $verified = 'Verified';
															    $verified2 = 'success';
    														}
    														else {
    															$verified = 'Unverified';
    															$verified2 = 'warning';
    														}
														}
														else {
															$verified = '<span style="font-size: 12px;">Unregistered</span>';
															$verified2 = 'danger';
														}
											?>
											<tr>
												<td><?php echo $id_number; ?></td>
												<td><?php echo $first_name.' '.$middle_name.' '.$last_name; ?></td>
												<td><?php echo $gender; ?></td>
												<td><?php echo $civil_status; ?></td>
												<td><?php echo $contact; ?></td>
												<td style="font-size: 12px;"><center><span class="badge badge-<?php echo $verified2; ?>"><a href="" style="font-size: 14px;color: white;" data-toggle="modal" data-target="#status-<?php echo $row['id']; ?>"><?php echo $verified; ?></a></span></center> 
												    
										
												</td>
												
												
												<!-- <td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($date_added)); ?></td> -->
												<td>
													<center><a href="residents-profile?id=<?php echo $id; ?>" class="btn blue" style="width: 50px; height: 37px;"><div data-toggle="tooltip" title="Profile"><i class="ti-search" style="font-size: 12px;"></i></div></a>&nbsp;<a href="" class="btn red" style="width: 50px; height: 37px;" data-toggle="modal" data-target="#archive-<?php echo $id; ?>"><div data-toggle="tooltip" title="Archive"><i class="ti-archive" style="font-size: 12px;"></i></div></a></center>
											</tr>
											<div id="archive-<?php echo $id; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Archive Resident</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="approve_hidden" value="<?php echo $id; ?>">
																<div class="row">
																	<div class="form-group col-4">
																		<label class="col-form-label">Name</label>
																		<input class="form-control" type="text" value="<?php echo $first_name.' '.$middle_name.' '.$last_name; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Gender</label>
																		<input class="form-control" type="text" value="<?php echo $gender; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Civil Status</label>
																		<input class="form-control" type="text" value="<?php echo $civil_status; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Email</label>
																		<input class="form-control" type="text" value="<?php echo $email; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Contact</label>
																		<input class="form-control" type="text" value="<?php echo $contact; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Date registered</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($date_added)); ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Block</label>
																		<input class="form-control" type="text" name="address1" value="<?php echo $address; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Lot</label>
																		<input class="form-control" type="text" name="address2" value="<?php echo $address2; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Resident Since</label>
																		<input class="form-control" type="text" name="address2" value="<?php echo $resident_since; ?>" readonly>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="archive" value="Archive">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

														if (isset($_POST['archive'])) {
															$approve_id = $_POST['approve_hidden'];
															$model->changeResidentStatus($approve_id, 3);
															echo "<script>window.open('residents', '_self');</script>";
														}
													}
												}

											?>
										</tbody>
									</table>
								</div>
								<br>
								<hr>
								<!-- <div align="right">
									<a href="" class="btn green radius-xl" style="background-color: #267621;" data-toggle="modal" data-target="#add-announcement"><i class="ti-agenda"></i><span>&nbsp;ADD NEW RESIDENT</span></a>&nbsp;
									<a href="pending-residents" class="btn green radius-xl" style="background-color: #267621;"><i class="ti-agenda"></i><span>&nbsp;PENDING RESIDENTS (<?php echo $pending; ?>)</span></a>&nbsp;
									<a href="archived-residents" class="btn red radius-xl"><i class="ti-agenda"></i><span>&nbsp;ARCHIVED RESIDENTS</span></a><br>
								</div> -->
								<div align="right">
								    <form method="POST" target="_blank">
    								    <button type="submit" name="export-pdf" class="btn blue radius-xl" style="background-color: <?php echo $primary_color; ?>"><i class="ti-import"></i>&nbsp;&nbsp;EXPORT TO PDF</button>
    									<!-- <a href="import-residents" class="btn blue radius-xl" style="background-color: <?php echo $primary_color; ?>"><i class="ti-import"></i>&nbsp;&nbsp;IMPORT RESIDENTS</a> -->
    								</form>
								</div>

								<div id="add-announcement" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Add New Resident</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<?php

															$id_counter = $model->fetchIdCounter();

															if ($id_counter == false) {
																$id_counter = 1;
																$checker = 0;
															}

															else {
																$checker = 1;
															}

														?>
														<div class="form-group col-12">
															<label class="col-form-label">Resident ID</label>
															<input class="form-control" type="text" name="r_id" value="<?php echo 'BC-'.date("Y").'-'.str_pad($id_counter + 1, 4, "0", STR_PAD_LEFT); ?>" readonly>
														</div>
														<div class="form-group col-4">
															<label class="col-form-label">Firstname</label>
															<input class="form-control" type="text" name="fname" required maxlength="30">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Middlename</label>
															<input class="form-control" type="text" name="mname" maxlength="30">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Lastname</label>
															<input class="form-control" type="text" name="lname" required maxlength="30">
														</div>
														<div class="form-group col-2">
															<label class="col-form-label">Ext. Name</label>
															<input class="form-control" type="text" name="ext" maxlength="5">
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Occupation</label>
															<input class="form-control" type="text" name="occupation" required maxlength="30">
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Resident Status</label>
															<select class="form-control" name="resident_status">
																<option value="N/A">N/A</option>
																<option value="PWD">PWD</option>
															    <option value="Senior Citizen">Senior Citizen</option>
															    <option value="Single Parent">Single Parent</option>
															    <option value="Working">Working</option>
															</select>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Birth Date</label>
															<input class="form-control" type="date" name="bdate" required>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Birth Place</label>
															<input class="form-control" type="text" name="bplace" required maxlength="30">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Gender</label>
															<select class="form-control" name="gender" readonly>
																<option value="Male">Male</option>
																<option value="Female">Female</option>
															</select>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Civil Status</label>
															<select class="form-control" name="civil_status">
																<option value="Single">Single</option>
																<option value="Married">Married</option>
																<option value="Separated">Separated</option>
																<option value="Widowed">Widowed</option>
															</select>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Block</label>
															<input class="form-control" type="text" name="address1"  maxlength="10">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Lot</label>
															<input class="form-control" type="text" name="address2"  maxlength="10">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Purok/Sitio</label>
															<input class="form-control" type="text" name="address3"  maxlength="20">
														</div>
														<div class="form-group col-3">
															<label class="col-form-label">Resident Since</label>
															<input class="form-control" type="number" name="res_since" required maxlength="4">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="add_resident" value="Add">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>

								<?php
									$category = 0;
									$status = 1;
									if (isset($_POST['add_resident'])) {
										$r_id = $_POST['r_id'];
										$fname = $_POST['fname'];
										$mname = isset($_POST['mname']) ? $_POST['mname'] : "N/A";
										$lname = $_POST['lname'];
										$time = strtotime($_POST['bdate']);
										$bdate = date('Y-m-d', $time);
										$gender = $_POST['gender'];
										$civil_status = $_POST['civil_status'];
										$resident_status = $_POST['resident_status'];
										$address1 = $_POST['address1'];
										$address2 = $_POST['address2'];
										$address3 = $_POST['address3'];
										$bplace = $_POST['bplace'];
										$occupation = $_POST['occupation'];
										$ext = $_POST['ext'];
										$res_since = $_POST['res_since'];
										$date = date("Y-m-d H:i:s");

										$result = $model->addResident($r_id, $ext, $address3, $bplace, $occupation, $fname, $mname, $lname, $bdate, $gender, $civil_status, $address1, $address2, $res_since, $date, $resident_status);

										if ($checker == 0 && $result == true) {
											$model->updateIdCounter();
											$model->updateIdCounter();
										}

										else if ($checker == 1 && $result == true) {
											$model->updateIdCounter();
										}
                                        
                                        echo "<script>alert('Resident has been added!');window.open('residents', '_self')</script>";
									}

								?>
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