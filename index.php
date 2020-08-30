<?php
require_once('SystemInfoRAM.php');
require_once('SystemInfoCPU.php');
$server_local_datetime		= date("l, d F Y h:i:s A");
date_default_timezone_set("Asia/Tokyo");
$server_japan_datetime		= date("l, d F Y h:i:s A");
date_default_timezone_set("Asia/Jakarta");
$server_gmt7_datetime		= date("l, d F Y h:i:s A");
$ram = getMemoryServer();
$cpu = getProcessorServer();
$data = [
	'message' => "Hello, Your server status per {$server_local_datetime} is",
	'date_time' => $server_japan_datetime,
	'date_time_gmt7' => $server_gmt7_datetime,
	'memory_usage' => $ram,
	'cpu_usage' => $cpu,
];
header('Content-Type: application/json');
echo json_encode($data);
?>
