<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';


// query products
$stmt = $user->readAll();
$num = $user->rowCount();
//$num = 2; 
// check if more than 0 record found
if($num>0){
 
    // products array
    $user=array();
    $user["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $user_item=array(
            "id" => $id,
            "nume" => $nume,
            "prenume" => $prenume,
            "username" => $username,
            "active" => $active,
            "user_rights" => $user_rights,
            "cluster_id" => $cluster_id,
            "created_by" => $created_by
        );
 
        array_push($user["records"], $user_item);
    }
 
    echo json_encode($user);
}
 
else{
    echo json_encode(
        array("message" => "No users were found")
    );
    

}
?>