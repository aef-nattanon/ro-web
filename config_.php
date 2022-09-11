<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

// define('SITE_KEY', '6LcHspofAAAAABbKRWLHKitOQAEkmiyzCX0GG2jK');
// define('SECRET_KEY', '6LcHspofAAAAAJEOGDqwxJcIC0YpfhSMTVfgy_kx');

$merchant_id = 'WI22041118'; // รหัสร้านค้า TMPAY WI22041118  
//สามารถรับพารามิเตอร์จากข้างนิกได้ เช่น ลงโฮมจริง หรือไม่ก็ ฟอร์เวอร์พอต
$config_url = 'www.ro-yak.online/'; // URL เว็บ รอ tmpay ตอบกลับข้อมูลที่ส่งกลับมายัง ตัวอย่าง http://127.0.0.1/tmpay/tmpay_result.php


// $db_host = 'www.ro-yak.online';
$db_host = 'localhost';
$db_user = 'rathena4444';
$db_pass = 'secretpassword';
$db_name = 'yak_rag_opt';


/// DON'T EDIT ==> 
$connect = new mysqli($db_host, $db_user, $db_pass, $db_name);
$connect->query('SET names utf8');
if ($connect->connect_errno) {
  exit($connect->connect_error);
}
$config = $connect->query('SELECT * FROM login')->fetch_assoc();
/// DON'T EDIT ==<
