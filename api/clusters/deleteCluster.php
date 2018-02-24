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
if($clust->deleteCluster($data->id)){
    $result = json_encode(array("message" => "The cluster '".$data->cluster."' successfuly deleted from the database."));
}else{
    $result = json_encode(array("message" => "Unable to delete the cluster '".$data->cluster."' from the database."));
}
echo $result;
?>