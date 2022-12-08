<?php

	$department = $model->displayDepartment2($_SESSION['sess2']);

	if (!empty($department)) {
		foreach ($department as $dep) {
			$r_id = $dep['id'];
			$r_id_number = $dep['id_number'];
			$r_fname = $dep['fname'];
			$r_mname = $dep['mname'];
			$r_lname = $dep['lname'];
			$r_ext = $dep['ext'];
			$r_gender = $dep['gender'];
			$r_email = $dep['email'];
			$r_contact = $dep['contact_number'];
			$r_occupation = $dep['occupation'];
			$r_civil_status = $dep['civil_status'];
			$r_birth_date = $dep['birth_date'];
			$r_birth_place = $dep['birth_place'];
			$r_address = $dep['address'];
			$r_address2 = $dep['address2'];
			$r_address3 = $dep['address3'];
			$r_resident_since = $dep['resident_since'];
			$r_password = $dep['password'];
			$email_verif = $dep['email_verif'];

			$photo = $dep['photo'];
														if ($photo == '') {
															$photo = 'default';
    													}
    													else {
    														$photo = $dep['photo'];
    													}
		}
	}

    $rows = $model->website_details();

    if (!empty($rows)) {
        foreach ($rows as $row) {
        	$web_name = $row['web_name'];
        	$web_code = strtoupper($row['web_code']);
            $web_header = $row['web_header'];
            $primary_color = $row['primary_color'];
            $secondary_color = $row['secondary_color'];
            $web_icon = $row['web_icon'];
       	}
    }
		
?> 