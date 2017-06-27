<?php

	$connection = mysqli_connect("localhost", "root", "database");
	mysqli_query($connection, "SET NAMES 'utf8'");
	$db = mysqli_select_db($connection, "yuanta");

	// citi data

	$query = "SELECT citi.* FROM citi";

	$result = mysqli_query($connection, $query);
	$rows = mysqli_num_rows($result);

	$i=-1;
	$total_value = 0;
	while ($temp = mysqli_fetch_assoc($result)) {
		$i++;

		$citi_data[$i]['id'] = $temp['id'];
		$citi_data[$i]['bank_id'] = $temp['bank_id'];
		$citi_data[$i]['account'] = $temp['account'];
		$citi_data[$i]['user_id'] = $temp['user_id'];
		$citi_data[$i]['name'] = $temp['name'];
		$citi_data[$i]['value'] = $temp['value'];
		$total_value = $total_value + $temp['value'];
		$citi_data[$i]['regist_time'] = $temp['regist_time'];
	}

	mysqli_close($connection); // Closing Connection
?>