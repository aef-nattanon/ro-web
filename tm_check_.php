<?php

//if($_SERVER['REMOTE_ADDR'] == "172.68.234.118"){ // 203.146.127.112 202.129.207.125 | 127.0.0.1 | 223.24.60.65 https://bbcheats.net/
//temmy_tmpay.php?transaction_id=&password=&real_amount=&status=1
//tm_check_.php?transaction_id=&password=&real_amount=&status=1
require('config_.php');
if (isset($_GET['transaction_id']) && isset($_GET['password']) && isset($_GET['real_amount']) && isset($_GET['status'])) {
	$transaction_id = $_GET['transaction_id'];
	$password = $_GET['password'];
	$amount = $_GET['real_amount'];
	$status = $_GET['status'];
	$bonus = 2;

	$query_tmt = $connect->query("SELECT * FROM web_topup WHERE truemoney_card = '" . $password . "';");
	$tmtopup = $query_tmt->fetch_assoc();

	if ($tmtopup['type'] == "Truemoney") {
		$samount = $amount;
	} else if ($tmtopup['type'] == "Razergold") {
		$samount = 0;
	}

	$samount = $samount * 5 * $bonus;
	if ($status == 1) {
		/* เติมเงินสำเร็จ */

		$chk_topup = $connect->query('SELECT * FROM login WHERE userid = "' . $tmtopup['username'] . '"')->fetch_assoc();

		$query_check = $connect->query('SELECT * FROM acc_reg_num WHERE `acc_reg_num`.`key` = "#CASHPOINTS" and account_id = "' . $chk_topup['account_id'] . '"; ');
		$topup_check = $query_check->num_rows;

		if ($topup_check == 1) { // update
			$query_add_point = $connect->query("UPDATE `acc_reg_num` SET `value` = value + '{$samount}' WHERE `acc_reg_num`.`key` = '#CASHPOINTS' AND `acc_reg_num`.`account_id` = '" . $chk_topup['account_id'] . "';");
		} else {
			$query_add_point = $connect->query("INSERT INTO `acc_reg_num` (`account_id`, `key`, `index`, `value`) VALUES ('" . $chk_topup['account_id'] . "', '#CASHPOINTS', '0', '{$samount}');");
		}



		$sql = "UPDATE `web_topup` SET `transaction_id` = '{$transaction_id}', `point` = '{$samount}', `status` = '1', `ip` = '{$_SERVER['REMOTE_ADDR']}' 
						WHERE truemoney_card = {$password};";
		$query = $connect->query($sql);


		die($topup_check . 'SUCCEED|TOPPED_UP_THB_' . $amount . '_TO_ ' . $tmtopup['username']);
	} else {
		/* ไม่สามารถเติมเงินได้ */
		$sql = "UPDATE `web_topup` SET `transaction_id` = '{$transaction_id}', `status` = '{$status}', `ip` = '{$_SERVER['REMOTE_ADDR']}' 
						WHERE truemoney_card = {$password};";
		$query = $connect->query($sql);
		die('ERROR|ANY_REASONS');
	}
} else {
	/* ไม่สามารถเติมเงินได้ */
	die('ERROR|ANY_REASONS');
}
			
			// }else{
			// 	die('ERROR|ACCESS_DENIED|'.$_SERVER['REMOTE_ADDR']);
			// }