<?php 
Class Database{
    //database connection params
    private $host = "localhost";
    private $db_name = "aos_msys_test";
    private $username = "root";
    private $password = "Bucuresti*21";
    
    //get database connection instance
    public function getConnection(){
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e){
            echo "Connection error: ".$e->getMessage();
        }
        return $this->conn;
    }
}
$database = new Database();
$db = $database->getConnection();
?>