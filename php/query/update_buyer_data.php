<?php

	$connection = mysqli_connect("localhost", "root", "database");
	mysqli_query($connection, "SET NAMES 'utf8'");
	$db = mysqli_select_db($connection, "yuanta");

	// 取得變數
	//$from_bank_user_account = $_POST['from_bank_user_account'];
	$from_bank_user_account = '0134589 0134285';
	$from_bank_value = $_POST['from_bank_value'];
	
	$fee = $_POST['fee'];

	//取得轉出帳戶現有點數
	$query = "SELECT bank_id,value FROM yuanta WHERE account = '".$from_bank_user_account."'
				UNION
				SELECT bank_id,value FROM cathay WHERE account = '".$from_bank_user_account."'
				UNION
				SELECT bank_id,value FROM citi WHERE account = '".$from_bank_user_account."'			
			";

	$result = mysqli_query($connection, $query);

	$from = mysqli_fetch_assoc($result);

	$updated_value = $from['value']-$from_bank_value-$fee;

	//更新轉出帳戶點數
	if ($from['bank_id']==1) {
		$sql = "UPDATE cathay SET value = $updated_value Where account = '".$from_bank_user_account."'";
	}else if($from['bank_id']==2){
		$sql = "UPDATE yuanta SET value = $updated_value Where account = '".$from_bank_user_account."'";
	}else if($from['bank_id']==3){
		$sql = "UPDATE citi SET value = $updated_value Where account = '".$from_bank_user_account."'";
	}
	$result = mysqli_query($connection,$sql);

	mysqli_close($connection); // Closing Connection

?>