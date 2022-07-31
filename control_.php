<?php

require('config_.php');





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
