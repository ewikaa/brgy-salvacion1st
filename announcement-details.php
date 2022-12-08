<?php
	include 'content/head.php';
	$details_id = isset($_GET['id']) ? $_GET['id'] : '';
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
                    <h1 class="text-white"><?php echo $web_header; ?> Announcements</h1>
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

					<div class="clearfix">
						<div class="row">
							<?php
							$category = 0;
							$status = 1;
							$rows = $model->displayAnnouncementDetails($category, $status, $details_id);

							if (!empty($rows)) {
								foreach ($rows as $row) {
									$image_unique = $row['image_unique'];
									$title = $row['title'];
									$details = $row['details'];
									$image_unique = $row['image_unique'];
									$date = date('M. d, Y g:i A', strtotime($row['date']));
								}	
							}
								
							?>
							<div class="col-lg-8 col-xl-8">
								<div class="recent-news blog-lg">
									<div class="action-box blog-lg">
										<img src="assets/images/announcement/<?php echo $image_unique; ?>.jpg" style="height: 320px;object-fit: cover;" alt="">
									</div>
									<div class="info-bx">
										<ul class="media-post">
											<li><i class="fa fa-calendar"></i> <?php echo $date; ?></li>
										</ul>
										<h5 class="post-title"><?php echo $title; ?></h5>
										<p><?php echo $details; ?>.</p>
										<div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-xl-4">
								<aside  class="side-bar sticky-top">
									<div class="widget recent-posts-entry">
										<h6 class="widget-title">Recent Announcements</h6>
										<?php
										$category = 0;
										$status = 1;
										$rows = $model->displayRecentAnnouncements($category, $status);

										if (!empty($rows)) {
											foreach ($rows as $row) {
										?>
										<div class="widget-post-bx">
											<div class="widget-post clearfix">
												<div class="ttr-post-media"><a href="announcement-details?id=<?php echo $row['id']; ?>"><img src="assets/images/announcement/<?php echo $row['image_unique']; ?>.jpg" style="height: 70px!important; object-fit: cover;" alt=""></a></div>
												<div class="ttr-post-info">
													<div class="ttr-post-header">
														<h6 class="post-title"><a href="announcement-details?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h6>
													</div>
													<ul class="media-post">
														<li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date('F. d, Y g:i A', strtotime($row['date'])); ?></a></li>
													</ul>
												</div>
											</div>
										</div>
										<?php	}
										}
										?>
									</div>
								</aside>
							</div>
						</div>
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

