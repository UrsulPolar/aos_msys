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
if($app->updateApplication($data->id, $data->application)){
    $result = json_encode(array("message" => "The application '".$data->application."' successfuly updated in the database."));
}else{
    $result = json_encode(array("message" => "Unable to update the application '".$data->application."' in the database."));
}
echo $result;
?>