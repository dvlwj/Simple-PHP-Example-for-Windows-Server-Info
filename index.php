<?php
function get_memory_load() {
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;
    return $memory_usage;
}
require_once('SystemInfoRAM.php');
require_once('SystemInfoCPU.php');
$server_local_datetime		= date("Y-m-d h:i:sa");
date_default_timezone_set("Asia/Jakarta");
$server_gmt7_datetime		= date("Y-m-d h:i:sa");
$ram = getMemoryServer();
$cpu = getProcessorServer();
$data = [
	'message' => 'Hello, below is information for the server:',
	'date_time' => $server_local_datetime,
	'date_time_gmt7' => $server_gmt7_datetime,
	'memory_usage' => $ram,
	'cpu_usage' => $cpu,
];
header('Content-Type: application/json');
echo json_encode($data);
?>