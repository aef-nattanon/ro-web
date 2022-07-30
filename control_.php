<?php

require('config_.php');
if (isset($_GET['login'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		DisplayMSG('error', 'Error', 'กรุณาอย่าเว้นช่องว่าง.', 'false');
	}
	// $ip = $_SERVER['REMOTE_ADDR'];
	// $secret = SECRET_KEY;
	// $captcha = $_POST['recaptcha'];

	// $stream_opts = [
	// 	"ssl" => [
	// 		"verify_peer" => false,
	// 		"verify_peer_name" => false,
	// 	]
	// ];
	// $gRecaptchaResponse = $captcha;
	// $remoteIp = $ip;
	// $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$gRecaptchaResponse&remoteip=$remoteIp";
	// $response = file_get_contents($url, false, stream_context_create($stream_opts));
	// $result = json_decode($response);
	// if ($result->success) {

	$username = $connect->real_escape_string($_POST['username']);
	$password = $_POST['password'];
	$query = $connect->query('SELECT * FROM login WHERE userid = "' . $username . '" and user_pass = "' . $password . '" ');
	$username_check = $query->num_rows;
	$account = $query->fetch_assoc();
	if ($username_check == 0) {
		DisplayMSG('error', 'Error', 'ชื่อผู้ใช้์ หรือ รหัสผ่านไม่ถูกต้อง.', 'false');
	}
	if ($account['state'] == "1") {
		DisplayMSG('error', 'Banned !!!', 'บัญชีของคุณถูกแบนถาวร !!!', 'false');
	} else {
		$_SESSION['username'] = $username;
		$connect->query("UPDATE `login` SET `last_ip` = '" . $_SERVER['REMOTE_ADDR'] . "' WHERE `login`.`userid` = '$username' ;");
		DisplayMSG('success', 'Login Success !!!', 'เข้าสู่ระบบสำเร็จ !!', 'true');
	}
	// } else {
	// 	DisplayMSG('error', 'Are you a rebot!!', 'กรุณายืนยันตัวตนก่อน!!.', 'true');
	// }
}

@$userinfo_login = $connect->query('SELECT * FROM login WHERE userid = "' . $_SESSION['username'] . '"')->fetch_assoc();

if (isset($_GET['register'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		DisplayMSG('error', 'Error', 'กรุณาอย่าเว้นช่องว่าง.', 'false');
	}
	if (empty($_POST['sex'])) {
		DisplayMSG('error', 'Error', 'กรุณาเลือกเพศ.', 'false');
	}
	if (empty($_POST['sD1']) || empty($_POST['sY1']) || empty($_POST['sM1'])) {
		DisplayMSG('error', 'Error', 'กรุณากรอก วัน/เดือน/ปี เกิด.', 'false');
	}
	if (!preg_match('/^[a-zA-Z0-9\_]*$/', $_POST['username'])) {
		DisplayMSG('error', 'Error', 'ชื่อผู้ใช้ไม่ถูกต้อง ต้องเป็น A-Z 0-9 เท่านั้น !!.', 'false');
	}
	if (mb_strlen($_POST['username']) <= 4) {
		DisplayMSG('error', 'Error', 'ชื่อผู้ใช้อย่างน้อย 5 ตัวขึ้นไป !!', 'false');
	}
	if (mb_strlen($_POST['username']) >= 25) {
		DisplayMSG('error', 'Error', 'ชื่อผู้ใช้สูงสุด 24 ตัวขึ้นไป !!', 'false');
	}
	if (strlen($_POST['password']) <= 4) {
		DisplayMSG('error', 'Error', 'รหัสผ่านอย่างน้อย 5 ตัวขึ้นไป !!', 'false');
	}
	if (mb_strlen($_POST['password']) >= 25) {
		DisplayMSG('error', 'Error', 'รหัสผ่านสูงสุด 24 ตัว !!', 'false');
	}
	if ($_POST['password'] != $_POST['repassword']) {
		DisplayMSG('error', 'Error', 'รหัสผ่าน ไม่ตรงกัน !!', 'false');
	}
	if (empty($_POST['recaptcha'])) {
		DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตน.', 'false');
	}
	$birthdate = $_POST['sY1'] . "-" . $_POST['sM1'] . "-" . $_POST['sD1'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$secret = SECRET_KEY;
	$captcha = $_POST['recaptcha'];

	$stream_opts = [
		"ssl" => [
			"verify_peer" => false,
			"verify_peer_name" => false,
		]
	];

	$gRecaptchaResponse = $captcha;
	$remoteIp = $ip;
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$gRecaptchaResponse&remoteip=$remoteIp";
	$response = file_get_contents($url, false, stream_context_create($stream_opts));
	$result = json_decode($response);
	if ($result->success) {
		$username = $connect->real_escape_string($_POST['username']);
		$password = $_POST['password'];
		$query = $connect->query('SELECT * FROM login WHERE userid = "' . $username . '" ');
		$username_check = $query->num_rows;
		if ($username_check >= 1) {
			DisplayMSG('error', 'Error', ' มีผู้ใช้งานไปแล้ว !!!', 'false');
		} else {
			// $query = $connect->query
			// ('
			// 	INSERT INTO `user` (`id`, `username`, `password`, `ip`, `point`, `ban`, `rank`) VALUES 
			// 	(NULL, "'.$username.'", "'.$password.'", "'.$_SERVER['REMOTE_ADDR'].'", "0", "false", "Member");
			// ');
			$query = $connect->query('INSERT INTO login (account_id, userid, user_pass, sex, email, group_id, state, birthdate) 
			VALUES (NULL, "' . $username . '", "' . $password . '", "' . $_POST['sex'] . '", "' . $_POST['email'] . '", "0", "0", "' . $birthdate . '"); ');

			if ($query) {
				DisplayMSG('success', 'Register Success !!!', 'สมัครสมาชิกสำเร็จ !!!..', 'true');
			} else {
				DisplayMSG('error', 'Error', ' สมัครสมาชิกไม่สำเร็จ !!!', 'false');
			}
		}
	} else {
		DisplayMSG('error', 'Are you a rebot!!', 'กรุณายืนยันตัวตนก่อน!!.', 'true');
	}
}


if (isset($_SESSION['username'])) {

	if (isset($_GET['truemoney-vip'])) {

		if (!preg_match('/^[0-9]*$/', $_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'รหัสบัตรเงินสดทรูมันนี่ 14 หลัก เป็นตัวเลขเท่านั้น!!', 'false');
		} elseif (empty($_POST['topuptype'])) {
			DisplayMSG('error', 'Error', 'ประเภทบัตรทรูมันนี่ไม่ถูกต้อง!!', 'false');
		} elseif (mb_strlen($_POST['truemoney_card']) != 14) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสดทรูมันนี่ให้ครบ 14 หลัก !!', 'false');
		} elseif (empty($_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสดทรูมันนี่ (14 หลัก)', 'false');
		} elseif (empty($_POST['char_id'])) {
			DisplayMSG('error', 'Error', 'ต้องเลือกตัวละคร', 'false');
		} elseif (empty($_POST['vip_type'])) {
			DisplayMSG('error', 'Error', 'ต้องเลือก VIP ที่จะเติม', 'false');
		} else {
			if (empty($_POST['recaptcha'])) {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตน.', 'false');
			}

			$secretKey = SECRET_KEY;
			$captcha = $_POST['recaptcha'];
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			// should return JSON with success as true
			if ($responseKeys["success"]) {

				$query = $connect->query('SELECT * FROM web_topup WHERE truemoney_card = "' . $_POST['truemoney_card'] . '" ;');
				$tmt_check = $query->num_rows;
				if ($tmt_check >= 1) {
					DisplayMSG('error', 'Error', ' บัตรเงินสดทรูมันนี่มีผู้ใช้งานไปแล้ว !!!', 'false');
				}

				$truemoney_cashcard = $_POST['truemoney_card']; // รหัสบัตรเงินสดทรูมันนี่ (14 หลัก)
				$char_id = $_POST['char_id'];
				$vip_type = $_POST['vip_type'];
				$tmpay_url = "https://www.tmpay.net/TPG/backend.php?merchant_id={$merchant_id}&password={$truemoney_cashcard}&resp_url={$config_url}tm_check_vip.php";

				//
				$curl = curl_init($tmpay_url);
				curl_setopt($curl, CURLOPT_TIMEOUT, 15);
				curl_setopt($curl, CURLOPT_HEADER, FALSE);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				$curl_content = curl_exec($curl);
				curl_close($curl);
				$t = time();
				if (strpos($curl_content, 'SUCCEED') !== FALSE) {
					$sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`, `vip`, `char_id`) VALUES 
					(NULL, '" . $_POST['topuptype'] . "', '0', '" . $truemoney_cashcard . "', '0', '" . $t . "', '0', '" . $_SESSION['username'] . "', '0', " .	$vip_type . ", '" . $char_id . "');";
					$query = $connect->query($sql);

					DisplayMSG('success', 'Success !!!', 'ดำเนินการสำเร็จกรุณารอตรวจสอบ 2-5 นาที', 'true');
				} else {
					DisplayMSG('error', 'Error', 'ไม่สามารถเชื่อมต่อได้', 'false');
				}
			} else {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตนใหม่', 'true');
			}
		}

		//ดูตัวอย่างได้ที่ https://www.tmpay.net/front/TMPAY-Overview_Coding_PHP.pdf

	}
	if (isset($_GET['truemoney'])) {

		if (!preg_match('/^[0-9]*$/', $_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'รหัสบัตรเงินสดทรูมันนี่ 14 หลัก เป็นตัวเลขเท่านั้น!!', 'false');
		}
		if (empty($_POST['topuptype'])) {
			DisplayMSG('error', 'Error', 'ประเภทบัตรทรูมันนี่ไม่ถูกต้อง!!', 'false');
		}
		if (mb_strlen($_POST['truemoney_card']) != 14) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสดทรูมันนี่ให้ครบ 14 หลัก !!', 'false');
		}
		if (empty($_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสดทรูมันนี่ (14 หลัก)', 'false');
		} else {
			if (empty($_POST['recaptcha'])) {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตน.', 'false');
			}

			$secretKey = SECRET_KEY;
			$captcha = $_POST['recaptcha'];
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			// should return JSON with success as true
			if ($responseKeys["success"]) {

				$query = $connect->query('SELECT * FROM web_topup WHERE truemoney_card = "' . $_POST['truemoney_card'] . '" ;');
				$tmt_check = $query->num_rows;
				if ($tmt_check >= 1) {
					DisplayMSG('error', 'Error', ' บัตรเงินสดทรูมันนี่มีผู้ใช้งานไปแล้ว !!!', 'false');
				}

				$truemoney_cashcard = $_POST['truemoney_card']; // รหัสบัตรเงินสดทรูมันนี่ (14 หลัก)
				$tmpay_url = "https://www.tmpay.net/TPG/backend.php?merchant_id={$merchant_id}&password={$truemoney_cashcard}&resp_url={$config_url}tm_check_.php";

				//
				$curl = curl_init($tmpay_url);
				curl_setopt($curl, CURLOPT_TIMEOUT, 15);
				curl_setopt($curl, CURLOPT_HEADER, FALSE);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				$curl_content = curl_exec($curl);
				curl_close($curl);
				$t = time();
				if (strpos($curl_content, 'SUCCEED') !== FALSE) {

					$sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`) VALUES 
					(NULL, '" . $_POST['topuptype'] . "', '0', '" . $truemoney_cashcard . "', '0', '" . $t . "', '0', '" . $_SESSION['username'] . "', '0');";
					$query = $connect->query($sql);

					DisplayMSG('success', 'Success !!!', 'ดำเนินการสำเร็จกรุณารอตรวจสอบ 2-5 นาที', 'true');
				} else {
					DisplayMSG('error', 'Error', 'ไม่สามารถเชื่อมต่อได้', 'false');
				}
			} else {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตนใหม่', 'true');
			}
		}

		//ดูตัวอย่างได้ที่ https://www.tmpay.net/front/TMPAY-Overview_Coding_PHP.pdf

	}
	if (isset($_GET['razergold'])) {

		if (!preg_match('/^[0-9]*$/', $_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'รหัสบัตรเงินสด Razer Gold 14 หลัก เป็นตัวเลขเท่านั้น!!', 'false');
		}
		if (empty($_POST['topuptype'])) {
			DisplayMSG('error', 'Error', 'ประเภทบัตร Razer Gold ไม่ถูกต้อง!!', 'false');
		}
		if (mb_strlen($_POST['truemoney_card']) != 14) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสด Razer Gold ให้ครบ 14 หลัก !!', 'false');
		}
		if (empty($_POST['truemoney_card'])) {
			DisplayMSG('error', 'Error', 'ต้องกรอกรหัสบัตรเงินสด Razer Gold (14 หลัก)', 'false');
		} else {
			if (empty($_POST['recaptcha'])) {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตน.', 'false');
			}

			$secretKey = SECRET_KEY;
			$captcha = $_POST['recaptcha'];
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			// should return JSON with success as true
			if ($responseKeys["success"]) {

				$query = $connect->query('SELECT * FROM web_topup WHERE truemoney_card = "' . $_POST['truemoney_card'] . '" ;');
				$tmt_check = $query->num_rows;
				if ($tmt_check >= 1) {
					DisplayMSG('error', 'Error', ' บัตรเงินสดทรูมันนี่มีผู้ใช้งานไปแล้ว !!!', 'false');
				}

				$truemoney_cashcard = $_POST['truemoney_card']; // รหัสบัตรเงินสดทรูมันนี่ (14 หลัก)
				$tmpay_url = "https://www.tmpay.net/TPG/backend.php?merchant_id={$merchant_id}&password={$truemoney_cashcard}&resp_url={$config_url}tm_check_.php&channel=razer_gold_pin";

				//
				$curl = curl_init($tmpay_url);
				curl_setopt($curl, CURLOPT_TIMEOUT, 15);
				curl_setopt($curl, CURLOPT_HEADER, FALSE);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				$curl_content = curl_exec($curl);
				curl_close($curl);
				$t = time();
				if (strpos($curl_content, 'SUCCEED') !== FALSE) {

					$sql = "INSERT INTO `web_topup` (`id`, `type`, `transaction_id`, `truemoney_card`, `point`, `time`, `status`, `username`, `ip`) VALUES 
					(NULL, '" . $_POST['topuptype'] . "', '0', '" . $truemoney_cashcard . "', '0', '" . $t . "', '0', '" . $username . "', '0');";
					$query = $connect->query($sql);

					DisplayMSG('success', 'Success !!!', 'ดำเนินการสำเร็จกรุณารอตรวจสอบ 2-5 นาที', 'true');
				} else {
					DisplayMSG('error', 'Error', 'ไม่สามารถเชื่อมต่อได้', 'false');
				}
			} else {
				DisplayMSG('error', 'Error', 'กรุณายืนยันตัวตนใหม่', 'true');
			}
		}

		//ดูตัวอย่างได้ที่ https://www.tmpay.net/front/TMPAY-Overview_Coding_PHP.pdf

	}


	//------------------------------------------------------ news ------------------------------------------------//
	if (isset($_GET['add_news'])) {
		// if(empty($_POST['title']) || empty($_POST['color']) || empty($_POST['info_news']))  {
		//    DisplayMSG('error','Error', 'กรุณาอย่าเว้นช่องว่าง.','false');
		// }

		$time_news = time();

		$query = $connect->query("INSERT INTO `web_news` (`id`, `img_news`, `title_news`, `info_news`, `color`, `time`) VALUES (NULL, '" . $_POST['img_news'] . "',  '" . $_POST['title'] . "', '" . $_POST['info_news'] . "', '" . $_POST['color'] . "', '" . $time_news . "');");

		if ($query) {
			DisplayMSG('success', 'Add Success !!!', 'เพิ่มข่าวสำเร็จ !!!..', 'true');
		} else {
			DisplayMSG('error', 'Error', ' เพิ่มข่าวไม่สำเร็จ !!!', 'false');
		}
	}


	if (isset($_GET['del_news'])) {
		if (!preg_match('/^[0-9]*$/', $_GET['id'])) {
			DisplayMSG('error', 'Error', 'Error', 'false');
		}
		if (empty($_GET['id'])) {
			DisplayMSG('error', 'Error', 'Error', 'false');
		}

		$sql = "DELETE FROM `web_news` WHERE `web_news`.`id` = " . $_GET['id'] . ";";
		$query = $connect->query($sql);

		DisplayMSG('success', 'Success !!!', 'ลบข้อมูลสำเร็จ', 'true');
	}
}





function DisplayMSG($function, $title, $msg, $reload)
{
	global $url;
	if ($reload == 'true') {
		$data = exit("<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>");
	} else {
		$data = exit("<script>$function('$title', '$msg', 'false');</script>");
	}
	return $data;
}
function iDisplayMSG($function, $title, $msg, $reload, $url)
{
	if (empty($url)) {
		$url = "..";
	} else {
		$url = $url;
	}
	if ($function == 'isuccess' || $function == 'ierror') {
		if ($reload == 'true') {
			$data = "<script>$function('$title', '$msg', 'true', '$url');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>";
		} else {
			$data = "<script>$function('$title', '$msg', 'false','');</script>";
		}
	} else {
		if ($reload == 'true') {
			$data = "<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>";
		} else {
			$data = "<script>$function('$title', '$msg', 'false');</script>";
		}
	}
	echo $data;
}


$months = array(
	"0" => "", "1" => "มกราคม", "2" => "กุมภาพันธ์", "3" => "มีนาคม", "4" => "เมษายน", "5" => "พฤษภาคม", "6" => "มิถุนายน", "7" => "กรกฎาคม", "8" => "สิงหาคม", "9" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม"
);
function th_full($time)
{
	global $months;
	@$th .= date("H", $time);
	@$th .= ":" . date("i", $time);
	@$th .= "  วันที่ " . date("j", $time);
	@$th .= " " . $months[date("n", $time)];
	@$th .= " พ.ศ." . (date("Y", $time) + 543);
	return $th;
}
function th($time)
{
	global $months;
	@$th .= date("H", $time);
	@$th .= ":" . date("i", $time);
	@$th .= " " . date("j", $time);
	@$th .= " " . $months[date("n", $time)];
	@$th .= " " . (date("Y", $time) + 543);
	return $th;
}
function th_s($time)
{
	global $months;
	@$th .= "  วันที่ " . date("j", $time);
	@$th .= " " . $months[date("n", $time)];
	@$th .= " พ.ศ." . (date("Y", $time) + 543);
	return $th;
}

function genString($length)
{
	$StringHash = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$cLength = strlen($StringHash);
	$string = '';
	for ($i = 0; $i < $length; $i++) {
		$string .= $StringHash[rand(0, $cLength - 1)];
	}
	return $string;
}
