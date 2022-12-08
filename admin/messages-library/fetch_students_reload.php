<?php

	session_start();

	include('../../global/model.php');
	$model = new Model();
	if (!empty($_POST['fetch_id'])) {
	$fstud_list = $model->fetchFirstStudentReload($_POST['fetch_id']);

	if (!empty($fstud_list)) {
	if (!empty($fstud_list)) {
		foreach ($fstud_list as $fstud_info) {
			$first_id = $fstud_info['id'];
			$first_name = ''.$fstud_info['fname'].' '.$fstud_info['lname'].'';
			$first_gender = $fstud_info['gender'];
			$fstud_list = $model->fetchFirstStudentReload($_POST['fetch_id']);

			$first_count = $model->unreadMessages($first_id);

			$frecent = $model->fetchMostRecent($first_id);
			if (!empty($frecent)) {
				foreach ($frecent as $frec) {
					$first_message = $frec['message'];
					$first_time = $frec['timestamp'];
					$first_status = $frec['status'];
					$first_user_type = $frec['user_type'];
				}
			}

?>
<button class="list-group-item list-group-item-action active text-white rounded-0" id="<?php echo $first_id; ?>" data-id="<?php echo $first_id; ?>" onclick="turnActive(<?php echo $first_id; ?>)">
	<div class="media">
		<?php 

			if ($first_gender == 'Male') {
				echo '<img src="../assets/images/male.png" alt="user" width="50" class="rounded-circle">';
			}

			else {
				echo '<img src="../assets/images/female.png" alt="user" width="50" class="rounded-circle">';
			}

		?>
		<div class="media-body ml-4">
			<div class="d-flex align-items-center justify-content-between mb-1">
				<h6 class="mb-0"><?php echo $first_name; ?>
					<span id="notifications-name"> (<?php echo $first_count; ?>)</span>
				</h6><small class="small font-weight-bold"><?php echo date('j M', strtotime($first_time)) ?></small>
			</div>
			<?php

			if ($first_user_type == 'admin') {
				echo '<p class="font-italic mb-0 text-small" id="p-'.$first_id.'">You: '.$first_message.'</p>';
			}

			elseif ($first_status == 0) {
				echo '<p class="font-italic mb-0 text-small" id="p-'.$first_id.'">'.$first_message.'</p>';
			}

			else {
				echo '<b class="font-italic mb-0 text-small" id="p-'.$first_id.'">'.$first_message.'</b>';
			}

			?>
		</div>
	</div>
</button>
<?php

		}
	}

	$stud_list = $model->fetchStudentsList($first_id);

	if (!empty($stud_list)) {
		foreach ($stud_list as $stud_info) {
			$id = $stud_info['id'];
			$name = ''.$stud_info['fname'].' '.$stud_info['lname'].'';
			$gender = $stud_info['gender'];

			$count = $model->unreadMessages($id);

			$recent = $model->fetchMostRecent($id);
			if (!empty($recent)) {
				foreach ($recent as $rec) {
					$message = $rec['message'];
					$time = $rec['timestamp'];
					$user_type = $rec['user_type'];
					$status = $rec['status'];
				}
			}

?>
<button class="list-group-item list-group-item-action list-group-item-light rounded-0" id="<?php echo $id; ?>" data-id="<?php echo $id; ?>" onclick="turnActive(<?php echo $id; ?>)">
	<div class="media">		
		<?php 

			if ($gender == 'Male') {
				echo '<img src="../assets/images/male.png" alt="user" width="50" class="rounded-circle">';
			}

			else {
				echo '<img src="../assets/images/female.png" alt="user" width="50" class="rounded-circle">';
			}

		?>
		<div class="media-body ml-4">
			<div class="d-flex align-items-center justify-content-between mb-1">
				<h6 class="mb-0"><?php echo $name; ?>
					<span id="notifications-name-<?php echo $id; ?>"> (<?php echo $count; ?>)</span>
				</h6><small class="small font-weight-bold"><?php echo date('j M', strtotime($time)) ?></small>
			</div>
			<?php

			if ($user_type == 'admin') {
				echo '<p class="font-italic text-muted mb-0 text-small" id="p-'.$id.'">You: '.$message.'</p>';
			}


			elseif ($status == 0) {
				echo '<p class="font-italic text-muted mb-0 text-small" id="p-'.$id.'">'.$message.'</p>';
			}

			else {
				echo '<b class="font-italic text-muted mb-0 text-small" id="p-'.$id.'">'.$message.'</b>';
			}

			?>
		</div>
	</div>
</button>
<?php

		}
	}
}
}
?>