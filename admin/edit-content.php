<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$content_id = isset($_GET['id']) ? $_GET['id'] : '';
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="froala/css/froala_editor.css">
		<link rel="stylesheet" href="froala/css/froala_style.css">
		<link rel="stylesheet" href="froala/css/plugins/code_view.css">
		<link rel="stylesheet" href="froala/css/plugins/colors.css">
		<link rel="stylesheet" href="froala/css/plugins/emoticons.css">
		<link rel="stylesheet" href="froala/css/plugins/image_manager.css">
		<link rel="stylesheet" href="froala/css/plugins/image.css">
		<link rel="stylesheet" href="froala/css/plugins/line_breaker.css">
		<link rel="stylesheet" href="froala/css/plugins/table.css">
		<link rel="stylesheet" href="froala/css/plugins/char_counter.css">
		<link rel="stylesheet" href="froala/css/plugins/video.css">
		<link rel="stylesheet" href="froala/css/plugins/fullscreen.css">
		<link rel="stylesheet" href="froala/css/plugins/file.css">
		<link rel="stylesheet" href="froala/css/plugins/quick_insert.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
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
										<form method="POST">
											<div class="heading-bx left">
												<h2 class="m-b10 title-head">Story</h2>
											</div>
											<?php if ($content_id == 3) { ?>
												<textarea class="form-control" name="content" required id="edit"><?php echo $story; ?></textarea><br>
												<button type="submit" name="story" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;SAVE CHANGES</span></button>
											<?php }
												else { ?>
												<p style="text-align: justify; "><?php echo $story; ?></p><br>
												<a href="edit-content?id=3" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
											<?php } ?>        
										</form>  
									</div>
									<div class="col-lg-6 col-md-12">
										<form method="POST" enctype="multipart/form-data">
											<div class="heading-bx left">
												<h2 class="m-b10 title-head">Logo</h2>

												<?php if ($content_id == 4) { ?>
													<img src="../assets/images/<?php echo $web_icon; ?>.png" id="display-img" style="width: 180px; height: 180px; border-radius: 50%;"><br><br><br>
													<input class="form-control" type="file" name="image" accept="image/*" style="border: 0px; padding: 0px; background-color: transparent;" onchange="readURL(this)" required>
													<button type="submit" name="logo" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;SAVE CHANGES</span></button>
												<?php }
													else { ?>
													<img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 180px; height: 180px; border-radius: 50%;"><br><br><br>
													<a href="edit-content?id=4" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
												<?php } ?>
											</div>
										</form>			
									</div>
								</div>
								<hr>
								<div class="row align-items d-flex">
									<div class="col-lg-6 col-md-12">
										<form method="POST">
											<div class="heading-bx left">
												<h2 class="m-b10 title-head">Vision</h2>
											</div>
											<?php if ($content_id == 1) { ?>
												<textarea class="form-control" name="content" required id="edit"><?php echo $vission; ?></textarea><br>
												<button type="submit" name="vision" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;SAVE CHANGES</span></button>
											<?php }
												else { ?>
												<p style="text-align: justify; "><?php echo $vission; ?></p><br>
												<a href="edit-content?id=1" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
											<?php } ?>
										</form>
									</div>
									<div class="col-lg-6 col-md-12">
										<form method="POST">
											<div class="heading-bx left">
												<h2 class="m-b10 title-head">Mission</h2>
											</div>
											<?php if ($content_id == 2) { ?>
												<textarea class="form-control" name="content" required id="edit"><?php echo $mission; ?></textarea><br>
												<button type="submit" name="mission" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;SAVE CHANGES</span></button>
											<?php }
												else { ?>
												<p style="text-align: justify; "><?php echo $mission; ?></p><br>
												<a href="edit-content?id=2" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
											<?php } ?>
										</form>
									</div>
								</div>
								
								
								<?php

									if (isset($_POST['logo'])) {
										$path = '../assets/images/';
										$unique = time().uniqid(rand());
										$destination = $path . $unique . '.png';
										$base = basename($_FILES["image"]["name"]);
										$image = $_FILES["image"]["tmp_name"];
										move_uploaded_file($image, $destination);

										$model->editLogo($unique, $web_icon);

										echo "<script>window.open('content-management', '_self');</script>";
									}

									if (isset($_POST['vision'])) {
										$model->editContent('vission', $_POST['content']);
										echo "<script>window.open('content-management', '_self');</script>";
									}

									if (isset($_POST['mission'])) {
										$model->editContent('mission', $_POST['content']);
										echo "<script>window.open('content-management', '_self');</script>";
									}

									if (isset($_POST['story'])) {
										$model->editContent('story', $_POST['content']);
										echo "<script>window.open('content-management', '_self');</script>";
									}

									// if (isset($_POST['guidelines'])) {
									// 	$model->editContent('guidelines', $_POST['content']);
									// 	echo "<script>window.open('content-management', '_self');</script>";
									// }

								?>
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
		<script type="text/javascript" src="froala/js/froala_editor.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/align.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/char_counter.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/code_beautifier.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/code_view.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/colors.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/draggable.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/emoticons.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/entities.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/file.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/font_size.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/font_family.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/fullscreen.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/image.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/image_manager.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/line_breaker.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/inline_style.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/link.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/lists.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/paragraph_format.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/paragraph_style.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/quick_insert.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/quote.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/table.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/save.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/url.min.js"></script>
		<script type="text/javascript" src="froala/js/plugins/video.min.js"></script>
		<script>
			(function () {
				new FroalaEditor("#edit", {
					toolbarButtons: {
						moreText: {
							buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting'],
							align: 'left',
							buttonsVisible: 3
						},
						moreParagraph: {
							buttons: ['alignLeft', 'alignCenter', 'formatOLSimple'],
							align: 'left',
							buttonsVisible: 3
						},
						moreMisc: {
							buttons: ['undo', 'redo'],
							align: 'right'
						}
					},
					toolbarButtonsXS: [['undo', 'redo'], ['bold', 'italic', 'underline']]
				})
			})()
		</script>
		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#display-img').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function() {
				$('#table').DataTable();
			});
		</script>
	</body>

</html>