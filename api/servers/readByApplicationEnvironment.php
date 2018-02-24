<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../config/core.php';

$application = (isset($_GET['application']) ? $_GET['application'] : null);
$environment = (isset($_GET['environment']) ? $_GET['environment'] : null);
$serv = $server->readByApplicationEnvironment($application, $environment);

if(!empty($serv)){
    echo json_encode($serv);
}else{
    if($application != null && $environment != null){
        echo json_encode(array("message" => "No servers were found using application name: '".$application."' and environment: '".$environment."'."));
    }elseif($application != null){
        echo json_encode(array("message" => "No servers were found using application: '".$application."'."));
    }else{
        echo json_encode(array("message" => "No application name and environment was provided."));
    }
}

?>