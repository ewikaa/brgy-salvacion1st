<?php

	session_start();
	include('global/model.php');

	$model = new Model();
	$rows = $model->website_details();

	if (empty($_SESSION['verify_resident'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	if (!empty($rows)) {
		foreach ($rows as $row) {
			$web_name = $row['web_name'];
			$web_code = strtoupper($row['web_code']);
			$web_header = $row['web_header'];
			$primary_color = $row['primary_color'];
			$secondary_color = $row['secondary_color'];
			$web_icon = $row['web_icon'];
		}
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
		<meta name="format-detection" content="telephone=no">
		
		<link rel="icon" href="assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $web_icon; ?>.png" />
		<title><?php echo $web_name; ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="styles/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="styles/assets/css/typography.css">
		<link rel="stylesheet" type="text/css" href="styles/assets/css/shortcodes/shortcodes.css">
		<link rel="stylesheet" type="text/css" href="styles/assets/css/style.css">
		<style type="text/css">
			.red-hover:hover {
				background-color: #8d0e2b!important
			}

			.btn.dropdown-toggle:hover, .btn.dropdown-toggle:focus {
				color: black;
			}
		</style>
	</head>
	<?php include 'assets/css/color/color-1.php'; ?>
	<body id="bg">
		<div class="page-wraper">
			<!-- <div id="loading-icon-bx"></div> -->
			<div class="account-form">
				<div class="account-head" style="background-image:url(assets/images/bg2.png);"></div>
				<div class="account-form-inner">
					<div class="account-container">
						<form class="contact-bx" method="POST">
							<div class="heading-bx left">
								<h2 class="title-head">Registration <span></span></h2>
							</div>	
							<div class="row placeani">
								<?php

									$rows = $model->displayResidentsProfile($_SESSION['verify_resident']);

									if (!empty($rows)) {
										foreach ($rows as $row) {

								?>
								<div class="col-lg-12">
									<div class="form-group focused">
										<span><b>ID Number</b></span><br>
										<?php echo $id_number = $row['id_number']; ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group focused">
										<span><b>Name</b></span><br>
										<?php echo $fname = $row['fname']; ?> <?php echo $mname  = $row['mname']; ?> <?php echo $lname  = $row['lname']; ?> <?php echo $row['ext']; ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group focused">
										<span><b>Gender</b></span><br>
										<?php echo $gender = $row['gender']; ?>
									</div>
								</div>
										<?php $birth_date = $row['birth_date']; ?>

										<?php $birth_place = $row['birth_place']; ?>

										<?php $address = $row['address']; ?>

										<?php $address2 = $row['address2']; ?>

										<?php $address3 = $row['address3']; ?>

										<?php $occupation = $row['occupation']; ?>

										<?php $resident_since = $row['resident_since']; ?>

								<div class="col-lg-12">
									<span><b>Civil Status</b></span><div style="padding: 5px;"></div>
									<select class="form-control" name="civil_status" readonly>
										<option value="Single" <?php if ($row['civil_status'] == 'Single') { echo 'selected'; } ?>>Single</option>
										<option value="Married" <?php if ($row['civil_status'] == 'Married') { echo 'selected'; } ?>>Married</option>
										<option value="Separated" <?php if ($row['civil_status'] == 'Separated') { echo 'selected'; } ?>>Separated</option>
										<option value="Widowed" <?php if ($row['civil_status'] == 'Widowed') { echo 'selected'; } ?>>Widowed</option>
									</select>
								</div>
								<div style="padding: 10px;"></div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Contact Number</label>
											<input name="contact" type="text" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Email</label>
											<input name="email" type="email" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group"> 
											<label>Password</label>
											<input id="password" name="password" type="password" class="form-control" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group"> 
											<label>Confirm Password</label>
											<input id="confirm-password" type="password" class="form-control" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<?php

										}
									}

								?>
							</div>
							<br>
							<div class="heading-bx left">
								<h2 class="title-head">Census <span></span></h2>
							</div>	
							<div class="row placeani">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Room Number</label>
											<input name="room_number" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>House Number</label>
											<input name="house_number" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>Block Number</label>
											<input name="block_number" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>Lot Number</label>
											<input name="lot_number" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Street/Compound</label>
											<input name="street" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Subdivision</label>
											<input name="subdivision" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<span><b>Barangay</b></span><br>
										Victoria Reyes
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<span><b>City</b></span><br>
									    Dasmarinas
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<span><b>Province</b></span><br>
										Cavite
									</div>
								</div>
								<div class="col-lg-12">
									<span><b>Monthly Income</b></span><div style="padding: 5px;"></div>
									<select class="form-control" name="monthly_income">
										<option value="PHP 10,000 and below">PHP 10,000 and below</option>
										<option value="PHP 10,001 to 20,000">PHP 10,001 to 20,000</option>
										<option value="PHP 20,001 to 30,000">PHP 20,001 to 30,000</option>
										<option value="PHP 30,001 to 40,000">PHP 30,001 to 40,000</option>
										<option value="PHP 40,001 to 50,000">PHP 40,001 to 50,000</option>
										<option value="PHP 50,001 to 100,000">PHP 50,001 to 100,000</option>
										<option value="PHP 100,001 and above">PHP 100,001 and above</option>
									</select>
								</div>
								<div class="col-lg-12">
									<br>
									<span><b>Income Sources</b></span><div style="padding: 5px;"></div>
									<input name="salary" id="salary" type="checkbox" value="1">
									<label for="salary" style="margin-bottom: 1px; font-weight: 400">&nbsp;Salary</label><br>
									<input name="business" id="business" type="checkbox" value="1">
									<label for="business" style="margin-bottom: 1px; font-weight: 400">&nbsp;Business</label><br>
									<input name="remittance" id="remittance" type="checkbox" value="1">
									<label for="remittance" style="font-weight: 400">&nbsp;Remittance</label>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Others</label>
											<input name="others" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-12" id="family_field">
									<div class="row">
										<div class="col-lg-12">
											<span><b>Head of the Family</b></span>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="input-group">
													<label>First name</label>
													<input name="head_first_name" type="text" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="input-group">
													<label>Last name</label>
													<input name="head_last_name" type="text" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="input-group">
													<label>Middle name</label>
													<input name="head_middle_name" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="input-group">
													<label>Suffix name</label>
													<input name="head_suffix_name" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<label>Gender</label>
											<select class="form-control" name="head_gender" required>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
										<div class="col-lg-4">
											<label>Civil Status</label>
											<select class="form-control" name="head_civil_status" required>
												<option value="Single">Single</option>
												<option value="Married">Married</option>
												<option value="Separated">Separated</option>
												<option value="Widowed">Widowed</option>
											</select>
										</div>
										<div class="col-lg-4">
											<label>Birthday</label>
											<input name="head_birthday" type="date" class="form-control" required>
										</div>
										<div class="col-lg-6">
											<br>
											<div class="form-group">
												<div class="input-group">
													<label>Email</label>
													<input name="head_email" type="email" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<br>
											<div class="form-group">
												<div class="input-group">
													<label>Phone number</label>
													<input name="head_contact" type="text" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<input name="head_employed" id="head_employed" type="checkbox" value="1">
											<label for="head_employed" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you employed?</label><br>
											<input name="head_self_employed" id="head_self_employed" type="checkbox" value="1">
											<label for="head_self_employed" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you self-employed in business?</label><br>
											<input name="head_informal" id="head_informal" type="checkbox" value="1">
											<label for="head_informal" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you self-employed	in the informal sector?</label><br>
											<input name="head_solo_parent" id="head_solo_parent" type="checkbox" value="1">
											<label for="head_solo_parent" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you a solo parent?</label><br>
											<input name="head_pwd" id="head_pwd" type="checkbox" value="1">
											<label for="head_pwd" style="font-weight: 400">&nbsp;Are you a PWD?</label>
										</div>
										<div class="col-lg-12">
											<button type="button" class="red-hover btn button-md btn-block" style="background-color: #267621!important;" id="add-family">Add a family member</button>
										</div>
									</div>
								</div>
								<div class="col-lg-12 m-b30">
									<br>
									<button name="submit" type="submit" value="Submit" class="red-hover btn button-md" style="background-color: #267621!important;" onclick="return validateSelect()">Register Account</button>
								</div>
								<?php

									if (isset($_POST['submit'])) {
										$civil_status = $_POST['civil_status'];
										$contact = $_POST['contact'];
										$email = $_POST['email'];
										$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

										$model->verifiedRegistration($id_number, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $address, $email, $password, $contact, $birth_date, $_SESSION['verify_resident']);

										$salary = (isset($_POST['salary'])) ? $_POST['salary'] : 0;
										$business = (isset($_POST['business'])) ? $_POST['business'] : 0;
										$remittance = (isset($_POST['remittance'])) ? $_POST['remittance'] : 0;

										$head_employed = (isset($_POST['head_employed'])) ? $_POST['head_employed'] : 0;
										$head_self_employed = (isset($_POST['head_self_employed'])) ? $_POST['head_self_employed'] : 0;
										$head_informal = (isset($_POST['head_informal'])) ? $_POST['head_informal'] : 0;
										$head_solo_parent = (isset($_POST['head_solo_parent'])) ? $_POST['head_solo_parent'] : 0;
										$head_pwd = (isset($_POST['head_pwd'])) ? $_POST['head_pwd'] : 0;

										$last_id = $model->insertCensus($_POST['room_number'], $_POST['house_number'], $_POST['block_number'], $_POST['lot_number'], $_POST['street'], $_POST['subdivision'], $_POST['monthly_income'], $salary, $business, $remittance, $_POST['others'], $_POST['head_first_name'], $_POST['head_middle_name'], $_POST['head_last_name'], $_POST['head_suffix_name'], $_POST['head_gender'], $_POST['head_civil_status'], $_POST['head_birthday'], $_POST['head_email'], $_POST['head_contact'], $head_employed, $head_self_employed, $head_informal, $head_solo_parent, $head_pwd, $_SESSION['verify_resident']);

										$i = 0;

										foreach ($_POST['hfname'] as $fname) {
											$employed = (isset($_POST['hemployed'][$i])) ? $_POST['hemployed'][$i] : 0;
											$self_employed = (isset($_POST['hselfemployed'][$i])) ? $_POST['hselfemployed'][$i] : 0;
											$informal = (isset($_POST['hinformal'][$i])) ? $_POST['hinformal'][$i] : 0;
											$solo_parent = (isset($_POST['hsoloparent'][$i])) ? $_POST['hsoloparent'][$i] : 0;
											$pwd = (isset($_POST['hpwd'][$i])) ? $_POST['hpwd'][$i] : 0;

											$model->insertHouseholdMember($_POST['hfname'][$i], $_POST['hmname'][$i], $_POST['hlname'][$i], $_POST['hsname'][$i], $_POST['hgender'][$i], $_POST['hcivilstatus'][$i], $_POST['hbirthday'][$i], $_POST['hemail'][$i], $_POST['hcontact'][$i], $_POST['hrelation'][$i], $employed, $self_employed, $informal, $solo_parent, $pwd, $last_id, $_SESSION['verify_resident']);

											$i++;
										}

										unset($_SESSION['verify_resident']);
										echo "<script>window.open('success.php', '_self');</script>";
									}

								?>
								<div class="col-lg-12 m-b30">Not your Information? <a href="residents.php">Back here</a></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="styles/assets/js/jquery.min.js"></script>
		<script src="styles/assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="styles/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="styles/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="styles/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="styles/assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="styles/assets/vendors/counter/waypoints-min.js"></script>
		<script src="styles/assets/vendors/counter/counterup.min.js"></script>
		<script src="styles/assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="styles/assets/vendors/masonry/masonry.js"></script>
		<script src="styles/assets/vendors/masonry/filter.js"></script>
		<script src="styles/assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src="styles/assets/js/functions.js"></script>
		<script src="styles/assets/js/contact.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var id = 1;

				$('#add-family').click(function() {
					$('#family_field').append('<div class="row" id="row'+id+'"><div class="col-lg-12"><br><span><b>Household Member</b></span></div><div class="col-lg-6"><div class="form-group"><div class="input-group"><label>First name</label><input name="hfname[]" type="text" class="form-control" required></div></div></div><div class="col-lg-6"><div class="form-group"><div class="input-group"><label>Last name</label><input name="hlname[]" type="text" class="form-control" required></div></div></div><div class="col-lg-6"><div class="form-group"><div class="input-group"><label>Middle name</label><input name="hmname[]" type="text" class="form-control"></div></div></div><div class="col-lg-6"><div class="form-group"><div class="input-group"><label>Suffix name</label><input name="hsname[]" type="text" class="form-control"></div></div></div><div class="col-lg-4"><label>Gender</label><select class="form-control" name="hgender[]" required><option value="Male">Male</option><option value="Female">Female</option></select></div><div class="col-lg-4"><label>Civil Status</label><select class="form-control" name="hcivilstatus[]" required><option value="Single">Single</option><option value="Married">Married</option><option value="Separated">Separated</option><option value="Widowed">Widowed</option></select></div><div class="col-lg-4"><label>Birthday</label><input name="hbirthday[]" type="date" class="form-control" required></div><div class="col-lg-6"><br><div class="form-group"><div class="input-group"><label>Email</label><input name="hemail[]" type="email" class="form-control" required></div></div></div><div class="col-lg-6"><br><div class="form-group"><div class="input-group"><label>Phone number</label><input name="hcontact[]" type="text" class="form-control" required></div></div></div><div class="col-lg-12"><div class="form-group"><div class="input-group"><label>Relation to the head of the family</label><input name="hrelation[]" type="text" class="form-control" required></div></div></div><div class="col-lg-12"><input type="hidden" name="hemployed[]" value="0"><input id="hemployed'+id+'" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"><label for="hemployed'+id+'" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you employed?</label><br><input type="hidden" name="hselfemployed[]" value="0"><input id="hselfemployed'+id+'" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"><label for="hselfemployed'+id+'" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you self-employed in business?</label><br><input type="hidden" name="hinformal[]" value="0"><input id="hinformal'+id+'" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"><label for="hinformal'+id+'" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you self-employed in the informal sector?</label><br><input type="hidden" name="hsoloparent[]" value="0"><input id="hsoloparent'+id+'" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"><label for="hsoloparent'+id+'" style="margin-bottom: 1px; font-weight: 400">&nbsp;Are you a solo parent?</label><br><input type="hidden" name="hpwd[]" value="0"><input id="hpwd'+id+'" type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"><label for="hpwd'+id+'" style="font-weight: 400">&nbsp;Are you a PWD?</label></div><div class="col-lg-12"><button type="button" class="red-hover btn button-md btn-block remove" style="background-color: #267621!important;" id="'+id+'">Remove</button></div></div>');
					id++;
				});

				$(document).on('focusin', 'input[name="hfname[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hfname[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hlname[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hlname[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hmname[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hmname[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hsname[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hsname[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hemail[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hemail[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hcontact[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hcontact[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('focusin', 'input[name="hrelation[]"]', function() {
					$(this).parent().parent().addClass('focused');
				});

				$(document).on('focusout', 'input[name="hrelation[]"]', function() {
					if ($(this).val() == '') {
						$(this).parent().parent().removeClass('focused');
					}
				});

				$(document).on('click', '.remove', function() {
					var button_id = $(this).attr("id");
					$('#row'+button_id+"").remove();
				});
			});

			var password = document.getElementById("password"), confirm_password = document.getElementById("confirm-password");

			function validatePassword() {
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("Passwords don't match.");
				} 

				else {
					confirm_password.setCustomValidity('');
				}
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
	</body>
</html>
