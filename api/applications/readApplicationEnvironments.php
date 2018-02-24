<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../config/core.php';

$app_id = (isset($_GET['id']) ? $_GET['id'] : null);
$apps = $app->readApplicationEnvironments($app_id);

if(!empty($apps)){
    echo json_encode($apps);
}else{
    echo json_encode(array("message" => "No applications were found"));
}

?>