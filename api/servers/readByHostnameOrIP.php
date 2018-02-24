<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../config/core.php';

$hostname = (isset($_GET['hostname']) ? $_GET['hostname'] : null);
$ip = (isset($_GET['ip']) ? $_GET['ip'] : null);
$serv = $server->readByServerHostnameOrIP($hostname, $ip);

if(!empty($serv)){
    echo json_encode($serv);
}else{
    if($hostname != null && $ip != null){
        echo json_encode(array("message" => "No servers were found using hostname: '".$hostname."' and IP: '".$ip."'."));
    }elseif($ip != null){
        echo json_encode(array("message" => "No servers were found using IP: '".$ip."'."));
    }elseif($hostname != null){
        echo json_encode(array("message" => "No servers were found using hostname: '".$hostname."'."));
    }else{
        echo json_encode(array("message" => "No hostname or IP was provided."));
    }
}

?>