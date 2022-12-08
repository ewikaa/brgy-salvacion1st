<?php
	session_start();

	include('../../global/model.php');
	$model = new Model();
	// include('../student-profile.php');

	$admin = $model->fetchAdmin(1);

	if (!empty($admin)) {
		foreach ($admin as $a) {
			$name = $a['name'];

			$msg = $model->fetchMostRecent(1);
			if (!empty($msg)) {
				foreach ($msg as $m) {
					$message = $m['message'];
					$timestamp = date('j M', strtotime($m['timestamp']));
					$status = $m['status'];
					$user_type = $m['user_type'];
				}
			}

			else {
				$message = 'No Message';
				$timestamp = '';
				$status = 1;
				$user_type = 'tneduts';
			}
?>
	<button class="list-group-item list-group-item-action active text-white rounded-0">
		<div class="media"><img src="../assets/images/icon.png" alt="user" width="50" class="rounded-circle">
			<div class="media-body ml-4">
				<div class="d-flex align-items-center justify-content-between mb-1">
					<h6 class="mb-0"><?php echo $name; ?></h6>
					<small class="small font-weight-bold"><?php echo $timestamp; ?></small>
				</div>
				<?php

				if ($user_type == 'student') {
					echo '<p class="font-italic mb-0 text-small">You: '.$message.'</p>';
				}

				elseif ($status == 0) {
					echo '<p class="font-italic mb-0 text-small">'.$message.'</p>';
				}

				else {
					echo '<b class="font-italic mb-0 text-small">'.$message.'</b>';
				}

				?>
			</div>
		</div>
	</button>
<?php

		}
	}

	else {
		$admin = $model->emptyMessage(1);

		if (!empty($admin)) {
		foreach ($admin as $a) {
			$name = $a['name'];

?>
	<button class="list-group-item list-group-item-action active text-white rounded-0">
		<div class="media"><img src="../assets/images/icon.png" alt="user" width="50" class="rounded-circle">
			<div class="media-body ml-4">
				<div class="d-flex align-items-center justify-content-between mb-1">
					<h6 class="mb-0"><?php echo $name; ?></h6>
					<small class="small font-weight-bold"></small>
				</div>
					<p class="font-italic mb-0 text-small">No message</p>
			</div>
		</div>
	</button>
<?php

		}
	}
	}

?>