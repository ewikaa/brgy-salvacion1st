<?php

	session_start();
	include('../../global/model.php');
	$model = new Model();

	$msgRows = $model->fetchMessages($_POST['fetch_id'], $_SESSION['sess2']);

	if (!empty($msgRows)) {
		foreach ($msgRows as $msg) {
			$type = $msg['user_type'];
			$message = $msg['message'];
			$time = $msg['timestamp'];
			$status = $msg['status'];

			if ($type == "admin") {
				echo '
					<div class="media w-50 mb-3">
						<img src="../assets/images/icon.png" alt="user" width="50" class="rounded-circle">
						<div class="media-body ml-3">
							<div class="bg-light rounded py-2 px-3 mb-2">
								<p class="text-small mb-0 text-muted">'.$message.'</p>
							</div>
							<p class="small text-muted">'.date('g:i A | M j', strtotime($time)).'</p>
						</div>
					</div>
				';
			}

			else {
				echo '
					<div class="media w-50 ml-auto mb-3">
						<div class="media-body">
							<div class="bg-primary rounded py-2 px-3 mb-2"  style="background-color: #267621;">
								<p class="text-small mb-0 text-white">'.$message.'</p>
							</div>
							<p class="small text-muted" style="float: right;">'.date('g:i A | M j', strtotime($time)).'</p>
						</div>
					</div>
				';
			}
		}
	}

	else {
		echo 'No messages';
	}

?>