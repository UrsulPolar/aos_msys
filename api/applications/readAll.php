<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/core.php';

$apps = $app->readAll();

if(!empty($apps)){
    echo json_encode($apps);
}else{
    echo json_encode(array("message" => "No applications were found"));    
}
?>