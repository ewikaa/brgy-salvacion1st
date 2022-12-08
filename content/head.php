<?php
	
	include 'global/model.php';

    $model = new Model();
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

    $rows = $model->content_management();
    if (!empty($rows)) {
        foreach ($rows as $row) {
            $story = $row['story'];
            $mission = $row['mission'];
            $vission = $row['vission'];
            $guidelines = $row['guidelines'];
            $brgy_head = $row['brgy_head'];
            $brgy_head_pic = $row['brgy_head_pic'];
            $clearance = $row['clearance'];
            $residency = $row['residency'];
            $indigency = $row['indigency'];
            $fb_link = $row['fb_link'];
            $iframe = $row['iframe'];
        }
    }

    $rows = $model->visits();

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $total = $row['total'];
        }
    }

    $date = date("Y-m-d H:i:s");
    $add = $model->add_visit($date);

    if ($add) {
    } 
    else {
        
    }

?>