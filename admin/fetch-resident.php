<?php

	session_start();
	include('../global/model.php');
	$model = new Model();

	if (!empty($_POST['resident_id'])) {
	    $rows = $model->fetchResidentDetails($_POST['resident_id']);
	    
	    if (!empty($rows)) {
			foreach ($rows as $row) {
			    $fname = $row['fname'];
			    $mname = $row['mname'];
			    $lname = $row['lname'];
			    $block = $row['address'];
			    $lot = $row['address2'];
			    $id = $row['id'];
			}
			
			$result = [$fname, $mname, $lname, $block, $lot, $id];
	    }
	    
	    else {
	        $result = ['', '', '', '', '', ''];
	    }
	    
	    echo json_encode($result); 
	}

?>