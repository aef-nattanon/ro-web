<?php

$vip_15_day_id = '685';
$vip_30_day_id = '684';
//if($_SERVER['REMOTE_ADDR'] == "172.68.234.118"){ // 203.146.127.112 202.129.207.125 | 127.0.0.1 | 223.24.60.65 https://bbcheats.net/
//temmy_tmpay.php?transaction_id=&password=&real_amount=&status=1
//tm_check_.php?transaction_id=&password=&real_amount=&status=1
require('config_.php');
if (isset($_GET['transaction_id']) && isset($_GET['password']) && isset($_GET['real_amount']) && isset($_GET['status'])) {
  $transaction_id = $_GET['transaction_id'];
  $password = $_GET['password'];
  $amount = $_GET['real_amount'];
  $status = $_GET['status'];
  $day = 0;

  $query_tmt = $connect->query("SELECT * FROM web_topup WHERE truemoney_card = '" . $password . "';");
  $tmtopup = $query_tmt->fetch_assoc();

  if ($amount == 100) {
    $vip_id = $vip_15_day_id;
    $day = 7;
  } else if ($amount == 300) {
    $vip_id = $vip_30_day_id;
    $day = 30;
  } else {
    $vip_id = 0;
    $status = 6;
  }



  ////ตรวจสอบตัวระคร ONLINE/////
  $char_query = $connect->query("SELECT * FROM `char` WHERE char_id = {$tmtopup['char_id']};");
  $char = $char_query->fetch_assoc();
  if ($char['online'] == 1) {
    $status = 7;
  }
  ///////////////
  if ($status == 1) {

    ///////////////////เพิ่ม ITEM VIP//////////////////////////// 
    // เพิ่ม ของเพิ่มจำนวน
    $query_add_point = $connect->query("INSERT INTO `inventory` (`identify`, `amount`, `nameid`, `char_id`) VALUES (1, 1,{$vip_id}, {$tmtopup['char_id']});");
    ///////////////////////////////////////////////

    $sql = "UPDATE `web_topup` SET `transaction_id` = '{$transaction_id}', `point` = '{$amount}', `status` = '1',
            `ip` = '{$_SERVER['REMOTE_ADDR']}',`vip` = {$day}
						WHERE truemoney_card = {$password};";
    $query = $connect->query($sql);

    die("SUCCEED|TOPPED_VIP_{$day}  status: {$status} amount: {$amount} username: {$tmtopup['username']} char_id: {$tmtopup['char_id']} char_online: {$char['online']}");
  } else {
    /* ไม่สามารถเติมเงินได้ */
    $sql = "UPDATE `web_topup` SET `transaction_id` = '{$transaction_id}',`vip` = {$day}, `point` = '{$amount}', `status` = '{$status}', `ip` = '{$_SERVER['REMOTE_ADDR']}' 
						WHERE truemoney_card = {$password};";
    $query = $connect->query($sql);
    die("ERROR|ANY_VIP vip: {$day} amount: {$amount} char_online: {$char['online']} status: {$status}");
  }
} else {
  /* ไม่สามารถเติมเงินได้ */
  die('ERROR|ANY_REASONS');
}
			
			// }else{
			// 	die('ERROR|ACCESS_DENIED|'.$_SERVER['REMOTE_ADDR']);
			// }