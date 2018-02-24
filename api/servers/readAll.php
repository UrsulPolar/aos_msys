<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/core.php';

$serv = $server->readAll();

if(!empty($serv)){
    echo json_encode($serv);
}else{
    echo json_encode(array("message" => "No servers were found"));    
}
?>