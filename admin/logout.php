<?php

	session_start();
	unset($_SESSION['sess']);
	echo "<script>window.open('../admin.php', '_self');</script>";

?>