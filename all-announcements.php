<?php
	include 'content/head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="<?php echo $web_name; ?>" />
	<meta property="og:title" content="<?php echo $web_name; ?>" />
	<meta property="og:description" content="<?php echo $web_name; ?>" />
	<meta name="og:image" content="images/preview.png" align="middle"/>
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $web_icon; ?>.png" />
	<title><?php echo $web_name; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
</head>
<?php include 'assets/css/color/color-1.php';  ?>
<style type="text/css">
	ul {
  list-style-type: none; /* Remove bullets */
  padding: 0; /* Remove padding */
  margin: 0; /* Remove margins */
}
</style>
<body id="bg">
<div class="page-wraper">
	<?php include 'content/navigation.php'; ?>
    <div class="page-content bg-white">
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/cover.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Barangay Announcements</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index">Home</a></li>
					<li>Announcements</li>
				</ul>
			</div>
		</div>
		<div class="content-block">
            <div class="section-area section-sp1">
                <div class="container">
					<div class="row align-items d-flex">
						<div class="col-lg-12 col-md-12">
							<div class="content-block">
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="#"><span>All</span></a> 
							</li>
							<li data-filter="happening" class="btn">
								<input type="radio">
								<a href="#"><span>Happening</span></a> 
							</li>
							<li data-filter="upcoming" class="btn">
								<input type="radio">
								<a href="#"><span>Upcoming</span></a> 
							</li>
							<li data-filter="expired" class="btn">
								<input type="radio">
								<a href="#"><span>Previous</span></a> 
							</li>
						</ul>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<?php
							$category = 0;
							$status = 1;
							$rows = $model->displayAnnouncements($category, $status);

							if (!empty($rows)) {
								foreach ($rows as $row) {

									$class = date('Y-m-d H:i:s', strtotime($row['date']));
									$class_today = date("Y-m-d H:i:s");

									if ($class == $class_today) {
										$class_name = "happening";
									}

									else if ($class < $class_today) {
										$class_name = "expired";
									}
									else {
										$class_name = "upcoming";
									}
							?>
							<li class="action-card col-lg-6 col-md-6 col-sm-12 <?php echo $class_name; ?>">
								<div class="event-bx m-b30">
									<div class="action-box">
										<a href="announcement-details?id=<?php echo $row['id']; ?>"><img src="assets/images/announcement/<?php echo $row['image_unique']; ?>.jpg" style="height: 280px;object-fit: cover;" alt=""></a>
									</div>
									<div class="info-bx d-flex">
										<div>
											<a href="announcement-details?id=<?php echo $row['id']; ?>"><div class="event-time">
												<div class="event-date"><?php echo date('d', strtotime($row['date'])); ?></div>
												<div class="event-month"><?php echo date('F', strtotime($row['date'])); ?></div>
											</div></a>
										</div>
										<div class="event-info">
											<h4 class="event-title"><a href="announcement-details?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date('g:i A', strtotime($row['date'])); ?></a></li>
											</ul>
											<p><?php echo substr($row['details'], 0, 150); ?><a href="announcement-details?id=<?php echo $row['id']; ?>" style="color: green;">.... See More</a></p>
										</div>
									</div>
								</div>
							</li>
							<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
        </div>
							
						</div>
					</div>
                </div>
            </div>
			<?php include 'content/footer.php' ?>
			
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>
</html>
