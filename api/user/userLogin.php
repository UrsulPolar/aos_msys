<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/core.php';
$session = Session::getInstance();
$data = json_decode(file_get_contents("php://input"));
$user->setUsername(isset($data->username) ? $data->username : die());
$password = isset($data->password) ? $data->password : die(); 
$user->checkLogin($user->getUsername(), $password);

// create array
if($user->getId() == null){
    print_r(json_encode(array("login_message" => $user->loginMessage)));
}elseif($user->getId() != null && $user->getActive() == 0){
    print_r(json_encode(array("login_message" => $user->loginMessage)));
}else{
        $user_array = array(
        "id" =>  $user->getId(),
        "name" => $user->getNume(),
        "prenume" => $user->getPrenume(),
        "username" => $user->getUsername(),
        "active" => $user->getActive(),
        "user_rights" => $user->getUser_rights(),
        "cluster_id" => $user->getCluster_id(),
        "created_by" => $user->getCreated_by(),
        "login_message" => $user->loginMessage,
        "loggedOn" => 1
    );
        
        foreach($user_array as $key=>$value){
            $session->$key = $value;
        }
        $session->loggedOn = true;

        print_r(json_encode($user_array));
}
// make it json format

?>