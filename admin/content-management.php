<?php
	ob_start(); 
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
				
				$page = 'content';
				$secondnav = '';

				include 'nav.php'; 

				?>
				
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FCFCFC;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Content Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-harddrives"></i>Story, Logo, Vission, Mission</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
								
								<div class="row align-items d-flex">
									<div class="col-lg-6 col-md-12">
										<div class="heading-bx left">
											<h2 class="m-b10 title-head">Story</h2>
										</div>
											<p style="text-align: justify; "><?php echo $story; ?></p>				
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="heading-bx left">
											<h2 class="m-b10 title-head">Logo</h2>
											<img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 180px; height: 180px; border-radius: 50%;"><br>
										</div>
														
									</div>
								</div>
								<div class="row align-items d-flex">
									<div class="col-lg-6 col-md-12">
											<a href="edit-content?id=3" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>					
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="heading-bx left">
											<a href="edit-content?id=4" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
										</div>
														
									</div>
								</div>
								<br><hr><br>
								<div class="row align-items d-flex">
									<div class="col-lg-6 col-md-12">
										<div class="heading-bx left">
											<h2 class="m-b10 title-head">Vision</h2>
										</div>
											<p style="text-align: justify; "><?php echo $vission; ?></p>				
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="heading-bx left">
											<h2 class="m-b10 title-head">Mission</h2>
										</div>
											<p style="text-align: justify; "><?php echo $mission; ?></p>						
									</div>
								</div>
								<div class="row align-items d-flex">
									<div class="col-lg-6 col-md-12">
										<a href="edit-content?id=1" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
									</div>
									<div class="col-lg-6 col-md-12">
											<a href="edit-content?id=2" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
									</div>
								</div>
								<br>
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
		</script>
	</body>

</html>