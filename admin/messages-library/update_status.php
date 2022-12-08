<?php

	session_start();

	include('../../global/model.php');
	$model = new Model();

	$fetch_id = $_POST['fetch_id'];

	$model->updateReadStatus($fetch_id, $_SESSION['sess'], 'student');

?>