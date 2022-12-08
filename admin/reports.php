<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$depart = "1";
	$status = "1";
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
	<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #F3F3F3;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				
				<?php 
			
				include 'sidebar.php';
				
				$page = 'reports';
				$secondnav = '';

				include 'nav.php'; 

				?>

				
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Reports Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-stats-up"></i>Reports</li>
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
					<div class="col-lg-12 m-b30">
							<?php
								$rows = $model->count_Residents();
								if (!empty($rows)) {
									foreach ($rows as $row) {
										$verified = $row['verified'];
										$not_verified = $row['n_verified'];
										$male = $row['male'];
										$female = $row['female'];
										$single = $row['single'];
										$married = $row['married'];
										$divorced = $row['divorced'];
										$separated = $row['separated'];
										$widowed = $row['widowed'];

										$pwd = $row['pwd'];
										$sc = $row['sc'];
										$working = $row['working'];
										$sp = $row['sp'];
									
									}
								}
								$rows = $model->count_Residents2();
								if (!empty($rows)) {
									foreach ($rows as $row) {
										$ns = $row['ns'];
									}
								}
							?>
							<div style="padding: 25px;"></div>
							<div class="widget-inner">
								<center><h3>Residents Registration</h3></center>
								<script type="text/javascript">
								  google.charts.load('current', {'packages':['corechart']});
								  google.charts.setOnLoadCallback(drawChart);

								  function drawChart() {

									var data = google.visualization.arrayToDataTable([
									  ['Task', 'Hours per Day'],
									  ['Registered',     <?php echo $verified; ?>],
									  ['Not Registered',    <?php echo $not_verified; ?>]
									]);

									var options = {
									  title: '',
									  backgroundColor: '#f3f3f3',
									  pieHole: 0.4
									};
									var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

									chart.draw(data, options);
								  }
								</script>
								<div id="piechart1" class="chart"></div>
							</div>

							<div class="widget-inner">
								<center><h3>Residents Gender</h3></center>
								<script type="text/javascript">
								  google.charts.load('current', {'packages':['corechart']});
								  google.charts.setOnLoadCallback(drawChart);

								  function drawChart() {

									var data = google.visualization.arrayToDataTable([
									  ['Task', 'Hours per Day'],
									  ['Male',     <?php echo $male; ?>],
									  ['Female',    <?php echo $female; ?>]
									]);

									var options = {
									  title: '',
									  backgroundColor: '#f3f3f3',
									  pieHole: 0.4
									};
									var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

									chart.draw(data, options);
								  }
								</script>
								<div id="piechart2" class="chart"></div>
							</div>

							<div class="widget-inner">
								<center><h3>Residents Status</h3></center>
								<script type="text/javascript">
								  google.charts.load('current', {'packages':['corechart']});
								  google.charts.setOnLoadCallback(drawChart);

								  function drawChart() {
									var data = google.visualization.arrayToDataTable([
									  ['Task', 'Hours per Day'],
									  ['Person with Disablity',     <?php echo $pwd; ?>],
									  ['Senior Citizen',     <?php echo $sc; ?>],
									  ['Working',     <?php echo $working; ?>],
									  ['Single Parent',     <?php echo $sp; ?>],
									  ['No Status',     <?php echo $ns; ?>],
									]);

									var options = {
									  title: '',
									  backgroundColor: '#f3f3f3',
									  pieHole: 0.4
									};
									var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

									chart.draw(data, options);
								  }
								</script>
								<div id="piechart4" class="chart"></div>
							</div>

							<div class="widget-inner">
								<center><h3>Residents Civil Status</h3></center>
								<script type="text/javascript">
								  google.charts.load('current', {'packages':['corechart']});
								  google.charts.setOnLoadCallback(drawChart);

								  function drawChart() {
									var data = google.visualization.arrayToDataTable([
									  ['Task', 'Hours per Day'],
									  ['Single',     <?php echo $single; ?>],
									  ['Married',     <?php echo $married; ?>],
									  ['Divorced',     <?php echo $divorced; ?>],
									  ['Separated',     <?php echo $separated; ?>],
									  ['Widowed',     <?php echo $widowed; ?>],
									]);

									var options = {
									  title: '',
									  backgroundColor: '#f3f3f3',
									  pieHole: 0.4
									};
									var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

									chart.draw(data, options);
								  }
								</script>
								<div id="piechart3" class="chart"></div>
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
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>