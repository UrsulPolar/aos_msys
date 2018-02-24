<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/core.php';
// get posted data
$data = json_decode(file_get_contents("php://input"));

$result;
if($app->createApplication($data->application)){
    $result = json_encode(array("message" => "The application '".$data->application."' added to the database."));
}else{
    $result = json_encode(array("message" => "Unable to add the application '".$data->application."' to the database."));
}
echo $result;
?>