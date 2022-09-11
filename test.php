<?php

require('config_.php');
$query_tmt = $connect->query("SELECT * FROM web_topup ;");
$tmtopup = $query_tmt->fetch_assoc();

echo $tmtopup;
