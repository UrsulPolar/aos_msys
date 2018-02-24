<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../config/core.php';

$clusterName = (isset($_GET['cluster']) ? $_GET['cluster'] : null);
$clusterShortName = (isset($_GET['sh_cluster']) ? $_GET['sh_cluster'] : null);

$clusters = $clust->readCluster($clusterName, $clusterShortName);

if(!empty($clusters)){
    echo json_encode($clusters);
}else{
    echo json_encode(array("message" => "No clusters were found"));    
}
?>