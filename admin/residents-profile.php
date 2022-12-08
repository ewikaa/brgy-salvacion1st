<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$id = isset($_GET['id']) ? $_GET['id'] : '';
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
			ul.dropdown-menu > li {
			    border: 0px!important;
			    margin-bottom: 0px!important;
			    display: block!important;
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
						<li><i class="ti-agenda"></i>Resident Profile</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; 
				$rows = $model->displayResidentsProfile($id);

				if (!empty($rows)) {
					foreach ($rows as $row) {
						$id = $row['id'];
						$id_number = $row['id_number'];
						$first_name = $row['fname'];
						$middle_name = $row['mname'];
						$last_name = $row['lname'];
						$email = $row['email'];
						$contact = $row['contact_number'];
						$address = $row['address'];
						$address2 = $row['address2'];
						$address3 = $row['address3'];
						$date_added = $row['date_registered'];
						$bplace = $row['birth_place'];
						$occupation = $row['occupation'];
						$ext = $row['ext'];
						$civil_status = $row['civil_status'];
						$bd = date('M. d, Y', strtotime($row['birth_date']));
						$bdt = date('Y', strtotime($row['birth_date']));
						$dttt = date("Y");
						$age = $dttt - $bdt;
						$gender = $row['gender'];
						$status = $row['status'];
						$resident_since = $row['resident_since'];
														$photo = $row['photo'];
														if ($photo == '') {
															$photo = 'default';
    													}
    													else {
    														$photo = $row['photo'];
    													}
					}
				}


				?>

				<div class="row">
					<div class="col-lg-5 m-b30">
								<div class="new-user-list">
									<h3><img src="../assets/images/profile-pictures/<?php echo $photo; ?>.jpg" alt="User" style="width: 30px; height: 30px; border-radius: 50%;object-fit: cover;">

										<?php echo strtoupper($first_name); ?> <?php echo strtoupper($middle_name); ?> <?php echo strtoupper($last_name); ?> <?php echo strtoupper($ext); ?><br><small><?php echo $id_number; ?></small></h3><br>
									<div class="new-user-list">
										<ul>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Email</a>
												</span>
												<span class="new-users-btn">
													<?php echo $email; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Contact</a>
												</span>
												<span class="new-users-btn">
													<?php echo $contact; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Gender</a>
												</span>
												<span class="new-users-btn">
													<?php echo $gender; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Civil Status</a>
												</span>
												<span class="new-users-btn">
													<?php echo $civil_status; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Occupation</a>
												</span>
												<span class="new-users-btn">
													<?php echo $occupation; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Birth Date & Age</a>
												</span>
												<span class="new-users-btn">
													<?php echo $bd; ?> - <?php echo $age; ?>yrs old
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Birth Place</a>
												</span>
												<span class="new-users-btn">
													<?php echo $bplace; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Block</a>
												</span>
												<span class="new-users-btn">
													<?php echo $address; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Lot</a>
												</span>
												<span class="new-users-btn">
													<?php echo $address2; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Purok/Sitio</a>
												</span>
												<span class="new-users-btn">
													<?php echo $address3; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Resident Since</a>
												</span>
												<span class="new-users-btn">
													<?php echo $resident_since; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Voter Status</a>
												</span>
												<span class="new-users-btn">
													<?php echo $row['resident_status']; ?>
												</span>
											</li>
											<li>
												<span class="new-users-text">
													<a href="#" class="new-users-name">Account Status</a>
												</span>
												<span class="new-users-btn">
													<?php
													if ($status == '0') {
														echo '<span style="color: red;"><b>ARCHIVED</b></span>';
													}
													elseif ($status == '1') {
														echo '<span style="color: green;"><b>ACTIVE</b></span>';
													}
													elseif ($status == '2') {
														echo '<span style="color: blue;"><b>PENDING</b></span>';
													}
													elseif ($status == '3') {
														echo '<span style="color: red;"><b>ARCHIVED</b></span>';
													}
													else {
														echo $status;
													}

													?>
												</span>
											</li>
											 <li>
												<span class="new-users-btn">
													<div class="row">
													    <div class="col-lg-6" align="center">
													        <a href="update-resident-profile?id=<?php echo $id; ?>" class="btn yellow radius-xl" style="width: 180px;height: 45px;display: flex;align-items: center;justify-content: center;"><i class="ti-user" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Update Profile</span></a>
													    </div>
														<div class="col-lg-6" align="center">
															<a href="" class="btn blue radius-xl" style="width: 180px;height: 45px;display: flex;align-items: center;justify-content: center;" data-toggle="modal" data-target="#reset-pw"><i class="ti-lock" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Reset Password</span></a>
														</div>
													</div>
												</span>
											</li> 
											<div id="reset-pw" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Reset Password</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label">New Password</label>
															<input class="form-control" type="text" name="new_pw" required maxlength="15">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="reset-pword" value="Save Changes">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								
								<div id="update-status" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Update Status</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label">Status</label>
															<select class="form-control" name="status">
															    <option value="N/A">N/A</option>
															    <option value="PWD">PWD</option>
															    <option value="Senior Citizen">Senior Citizen</option>
															    <option value="Single Parent">Single Parent</option>
															    <option value="Working">Working</option>
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="status-update" value="Save Changes">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php 
								
								if (isset($_POST['reset-pword'])) {
                        		    $hashed_password = password_hash($_POST['new_pw'], PASSWORD_DEFAULT);
                        		    $model->verifiedChangePassword($id, $hashed_password);
                        		    
                        		   echo "<script>alert('Password has been reset!');window.open('residents-profile?id=".$id."','_self');</script>";
                        	    }
                        	    
                        	    if (isset($_POST['status-update'])) {
                        		    $model->updateResidentStatus($_POST['status'], $_GET['id']);
                        		    
                        		   echo "<script>alert('Status has been updated!');window.open('residents-profile?id=".$id."','_self');</script>";
                        	    }
								?>
										</ul>
										<hr>
										<br><br>
									</div>
								</div>



					</div>
					<div class="col-lg-7 m-b30">
								<center><h3>Blotter History of Resident</h3><br><br></center> 
								<div class="table-responsive">
									<table id="table" class="table hover" style="width:100%">
										<thead>
											<tr>
												<th>Brgy. Case Number</th>
												<th>Accussation</th>
												<th>Blotter Date</th>
												<th width="50">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 1;
												$blot_status = 1;
												$rows = $model->displayResidentsProfileBlotter($id, $blot_status);

												if (!empty($rows)) {
													foreach ($rows as $row) {
														$brgy_case = $row['brgy_case'];
														$accussation = $row['accussation'];
														$date_filed = $row['date_filed'];
														$id = $row['id'];

											?>
											<tr>
												<td><?php echo $brgy_case; ?></td>
												<td><?php echo $accussation; ?></td>
												<td><?php echo date('M. d, Y g:i A', strtotime($date_filed)); ?></td>
												<td>
													<center><a href="" class="btn blue" style="width: 50px; height: 37px;" data-toggle="modal" data-target="#archive-<?php echo $id; ?>"><div data-toggle="tooltip" title="View"><i class="ti-search" style="font-size: 12px;"></i></div></a></center>
											</tr>
											<div id="archive-<?php echo $id; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Archive Blotter</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="approve_hidden" value="<?php echo $id; ?>">
																<div class="row">
																	<div class="form-group col-6">
																		<label class="col-form-label">Brgy. Case ID</label>
																		<input class="form-control" type="text" value="<?php echo $row['brgy_case']; ?>" readonly>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Accusation</label>
																		<input class="form-control" type="text" value="<?php echo $row['accussation']; ?>" readonly>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Complainant’s Full Name</label>
																		<input class="form-control" type="text" value="<?php echo $row['complaint_name']; ?>" readonly>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Complainant’s Address</label>
																		<input class="form-control" type="text" value="<?php echo $row['address']; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Age</label>
																		<input class="form-control" type="text" value="<?php echo $row['age']; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Gender</label>
																		<input class="form-control" type="text" value="<?php echo $row['gender']; ?>" readonly>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Contact Number</label>
																		<input class="form-control" type="text" value="<?php echo $row['contact']; ?>" readonly>
																	</div>
																	<div class="form-group col-3">
																		<label class="col-form-label">Where</label>
																		<input class="form-control" type="text" value="<?php echo $row['date']; ?>" readonly>
																	</div>
																	<div class="form-group col-3">
																		<label class="col-form-label">Time</label>
																		<input class="form-control" type="text" value="<?php echo $row['time']; ?>" readonly>
																	</div>
																	<div class="form-group col-3">
																		<label class="col-form-label">Where</label>
																		<input class="form-control" type="text" value="<?php echo $row['happened']; ?>" readonly>
																	</div>
																	<div class="form-group col-3">
																		<label class="col-form-label">Blotter Date</label>
																		<input class="form-control" type="text" value="<?php echo $row['date_filed']; ?>" readonly>
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
								<div align="right">
									<a href="" class="btn green radius-xl" style="float: right;background-color: #333333;" data-toggle="modal" data-target="#add-blotters"><i class="ti-agenda"></i><span>&nbsp;ADD BLOTTER RECORD</span></a><br>
								</div>
								<div id="add-blotters" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Add Blotter Record</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label"><b>Brgy. Case ID</b></label>
															<input class="form-control" type="number" name="brgy_case" required>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label"><b>Accusation</b></label>
															<select class="form-control" name="accussation">
																<option value="Arrest report">Arrest report</option>
																<option value="Incident report">Incident report</option>
																<option value="Crime report">Crime report</option>
																<option value="Accident report">Accident report</option>
																<option value="Others">Others</option>
															</select>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label"><b>Specify Accusation</b></label>
															<input class="form-control" type="text" name="spec_accu" required>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label"><b>Complainant’s Full Name</b></label>
															<input class="form-control" type="text" name="complaint_name" required>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label"><b>Complainant’s Address</b></label>
															<input class="form-control" type="text" name="address" required>
														</div>
														<div class="form-group col-4">
															<label class="col-form-label"><b>Age</b></label>
															<input class="form-control" type="number" name="age" required>
														</div>
														<div class="form-group col-4">
															<label class="col-form-label"><b>Gender</b></label>
															<input class="form-control" type="text" name="gender" required>
														</div>
														<div class="form-group col-4">
															<label class="col-form-label"><b>Contact Number</b></label>
															<input class="form-control" type="number" name="contact" required>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label"><b>Date Happened</b></label>
															<input class="form-control" type="date" name="date" required>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label"><b>Time</b></label>
															<input class="form-control" type="time" name="time" required>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label"><b>Where</b></label>
															<input class="form-control" type="text" name="happened" required>
														</div>
														<div class="form-group col-3">
															<label class="col-form-label"><b>Blotter Date</b></label>
															<input class="form-control" type="datetime-local" name="date_filed" required>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="add-confirm" value="Add Record">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>

								<?php

									if (isset($_POST['add-confirm'])) {
										$model->addBlotters($id, $_POST['brgy_case'], $_POST['complaint_name'], $_POST['age'], $_POST['gender'], $_POST['address'], $_POST['contact'], $_POST['time'], $_POST['date'], $_POST['happened'], $_POST['accussation'], $_POST['date_filed']);

										echo "<script>window.open('residents-profile?id=".$id."', '_self');</script>";
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