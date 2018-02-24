<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../config/core.php';

$user->setUsername(isset($_GET['username']) ? $_GET['username'] : die());
$user->readByUsername($user->getUsername());

// create array
$user_array = array(
    "id" =>  $user->getId(),
    "name" => $user->getNume(),
    "prenume" => $user->getPrenume(),
    "username" => $user->getUsername(),
    "active" => $user->getActive(),
    "user_rights" => $user->getUser_rights(),
    "cluster_id" => $user->getCluster_id(),
    "created_by" => $user->getCreated_by()
);

// make it json format
print_r(json_encode($user_array));

?>