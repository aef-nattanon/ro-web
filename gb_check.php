<?php
//collection of allowed IP addresses
$allowlist = array(
    '203.151.205.33'
);

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = getIPAddress();

//if users IP is not in allowed list kill the script
// if (!in_array($ip, $allowlist)) {
//     die('This website cannot be accessed from your location.');
// } else {

    
//if($_SERVER['REMOTE_ADDR'] == "172.68.234.118"){ // 203.146.127.112 202.129.207.125 | 127.0.0.1 | 223.24.60.65 https://bbcheats.net/
//temmy_tmpay.php?transaction_id=&password=&real_amount=&status=1
//tm_check_.php?transaction_id=&password=&real_amount=&status=1
require('config_.php');
$json_str = file_get_contents('php://input');

if ($json_str) {

    $json_obj = json_decode($json_str);

    $resultCode = $json_obj->resultCode;
    $amount = $json_obj->amount;
    $referenceNo = $json_obj->referenceNo;
    $gbpReferenceNo = $json_obj->gbpReferenceNo;
    $customerName = $json_obj->customerName;
    $customerAddress = $json_obj->customerAddress;
    $detail = $json_obj->detail;

    $type = "Promptpay";

    $bonus = 2;

    $samount = $amount * 5 * $bonus;


    if ($resultCode == "00") {

        if ($detail == "DonatePoint") {

            /* เติมเงินสำเร็จ */

            $chk_topup = $connect->query('SELECT * FROM login WHERE userid = "' . $customerName . '"')->fetch_assoc();

            if (!empty($chk_topup['account_id'])) {

                $query_check = $connect->query('SELECT * FROM acc_reg_num WHERE `acc_reg_num`.`key` = "#CASHPOINTS" and account_id = "' . $chk_topup['account_id'] . '"; ');
                $topup_check = $query_check->num_rows;

                if ($topup_check == 1) { // update
                    $query_add_point = $connect->query("UPDATE `acc_reg_num` SET `value` = value + '{$samount}' WHERE `acc_reg_num`.`key` = '#CASHPOINTS' AND `acc_reg_num`.`account_id` = '" . $chk_topup['account_id'] . "';");
                } else {
                    $query_add_point = $connect->query("INSERT INTO `acc_reg_num` (`account_id`, `key`, `index`, `value`) VALUES ('" . $chk_topup['account_id'] . "', '#CASHPOINTS', '0', '{$samount}');");
                }

                $sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`) VALUES 
            (NULL, '" . $type . "', '" . $gbpReferenceNo . "', '" . '0' . "','" . $samount  . "', '" . $referenceNo . "', '1', '" . $customerName . "', '" . $customerAddress . "');";
                $query = $connect->query($sql);
            } else {
                $sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`) VALUES 
                (NULL, '" . $type . "', '" . $gbpReferenceNo . "', '" . '0' . "','" . $samount  . "', '" . $referenceNo . "', '" . '23' . "', '" . $customerName . "', '" . $customerAddress . "');";
                $query = $connect->query($sql);
            }
        } elseif ($detail == "DonateVip") {

            //สำหรับ VIP

            $vip_15_day_id = '14133';//+Yakcoin 600ea
            $vip_30_day_id = '14132';//+Yakcoin 1200ea
            $customerEmail = $json_obj->customerEmail;
            $day = 0;

            $status = $resultCode;


            if ($amount == 150) {
                $vip_id = $vip_15_day_id;
                $day = 15;
            } else if ($amount == 300) {
                $vip_id = $vip_30_day_id;
                $day = 30;
            } else {
                $vip_id = 0;
            }


            ////ตรวจสอบตัวระคร ONLINE/////
            $char_query = $connect->query("SELECT * FROM `char` WHERE char_id = {$customerEmail};");
            $char = $char_query->fetch_assoc();
            if ($char['online'] == 1) {
                $status = 7;
            }
            ///////////////
            if ($status == "00" && $customerEmail != null) {

                ///////////////////เพิ่ม ITEM VIP//////////////////////////// 
                // เพิ่ม ของเพิ่มจำนวน
                $query_add_point = $connect->query("INSERT INTO `inventory` (`identify`, `amount`, `nameid`, `char_id`) VALUES (1, 1,{$vip_id}, {$customerEmail});");
                ///////////////////////////////////////////////

                $sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`,`vip`,`char_id`) VALUES 
            (NULL, '" . $type . "', '" . $gbpReferenceNo . "', '" . '0' . "','" . $amount  . "', '" . $referenceNo . "', '1', '" . $customerName . "', '" . $customerAddress . "', '" . $day . "', '" . $customerEmail . "');";
                $query = $connect->query($sql);

                //die("SUCCEED|TOPPED_VIP_{$day}  status: {$status} amount: {$amount} username: {$customerName} char_id: {$customerEmail} char_online: {$char['online']}");
            } else {
                /* ไม่สามารถเติมเงินได้ */

                $sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`,`vip`,`char_id`) VALUES 
            (NULL, '" . $type . "', '" . $gbpReferenceNo . "', '" . '0' . "','" . $amount  . "', '" . $referenceNo . "', '7', '" . $customerName . "', '" . $customerAddress . "', '" . $day . "', '" . $customerEmail . "');";
                $query = $connect->query($sql);

                //die("ERROR|ANY_VIP vip: {$day} amount: {$amount} char_online: {$char['online']} status: {$status}");
            }
        }
    } else {
        /* ไม่สามารถเติมเงินได้ */

        $sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`) VALUES 
        (NULL, '" . $type . "', '" . $gbpReferenceNo . "', '" . '0' . "','" . $amount  . "', '" . $referenceNo . "', '" . $resultCode . "', '" . $customerName . "', '" . $customerAddress . "');";
        $query = $connect->query($sql);

        die('ERROR|ANY_REASONS');
    }
} else {
    /* ไม่สามารถเติมเงินได้ */
    die('ERROR|ANY_REASONS');
}
//}
