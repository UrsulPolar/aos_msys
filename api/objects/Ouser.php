<?php 
Class User{
    
    //database connection instance and table name
    private $conn;
    private $stmt;
    private $sqlStr;
    
    //object proprieties
    private $id;
    public $nume;
    public $prenume;
    public $username;
    private $active;
    private $user_rights;
    private $cluster_id;
    private $created_by;
    private $password_hash;
    public $loginMessage;
    
    public function __construct($db){
        $this->conn = $db;
    }
    
    
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * @return mixed
     */
    public function getPrenume()
    {
        return $this->prenume;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return mixed
     */
    public function getUser_rights()
    {
        return $this->user_rights;
    }

    /**
     * @return mixed
     */
    public function getCluster_id()
    {
        return $this->cluster_id;
    }

    /**
     * @return mixed
     */
    public function getCreated_by()
    {
        return $this->created_by;
    }

    /**
     * @return mixed
     */
    public function getPassword_hash()
    {
        return $this->password_hash;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nume
     */
    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    /**
     * @param mixed $prenume
     */
    public function setPrenume($prenume)
    {
        $this->prenume = $prenume;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @param mixed $user_rights
     */
    public function setUser_rights($user_rights)
    {
        $this->user_rights = $user_rights;
    }

    /**
     * @param mixed $cluster_id
     */
    public function setCluster_id($cluster_id)
    {
        $this->cluster_id = $cluster_id;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreated_by($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @param mixed $password_hash
     */
    public function setPassword_hash($password_hash)
    {
        $this->password_hash = $password_hash;
    }

    private function sqlStrPrep(){
        //instantinate SQL string
        $this->sqlStr = new SQL();
        return $this->sqlStr;
    }
    
    public function readAll(){
                
        // prepare query statement
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->userFetchAllSQL());
        
        // execute query
        $this->stmt->execute();
        
        return $this->stmt;
    }
    
    public function readByUsername($username){
        
        // prepare query statement
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->userFetchByUserrnameSQL());
        $this->stmt->bindParam(1, $username);
        
        // execute query
        $this->stmt->execute();
              
        // get retrieved row
        $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
        
        // set values to object properties
        $this->id = $row['id'];
        $this->nume = $row['nume'];
        $this->prenume = $row['prenume'];
        $this->active = $row['active'];
        $this->user_rights = $row['user_rights'];
        $this->cluster_id = $row['cluster_id'];
        $this->created_by = $row['created_by'];
    }
    
    public function checkLogin($username, $password){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->userLoginSQL());
        $this->stmt->bindParam(1, $username);
        $this->stmt->execute();
        $row = $this->stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($row) && !empty($row)){
            extract($row);
            if(password_verify($password, $password_hash) && $active == 1){
                $this->readByUsername($username);
                $this->loginMessage =array("message"=> "Login successful for user: {$username}."); 
            }elseif(password_verify($password, $password_hash) && $active == 0){
                $this->readByUsername($username);
                $this->loginMessage = array("message" => "User {$username} is not active. Ask an administrator to reactivate the account if needed."); 
            }elseif(!password_verify($password, $password_hash)){
                $this->loginMessage = array("message" => "The password provided for user {$username} is not correct.");
            }
        }else{
            $this->loginMessage =array("message"=>'The user does not exist.');
        }
    }
    
    public function deleteUser($id){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->userDelSQL());
        $this->stmt->bindParam(1, $id);
        if($this->stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    private function genPasswordHash($password){
        $options = [
            'cost' => 11,
        ];
        $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password_hash;
    }
    
    public function userCreate($userDetails, $workstationDetails){
        $detailLevel = (!empty($userDetails) && !empty($workstationDetails)) ?  "full" :  "user";
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->userCreateSQL($detailLevel));
        
        if($detailLevel == "full"){
            extract($userDetails);
            extract($workstationDetails);
            $this->stmt->bindParam(':nume', $nume);
            $this->stmt->bindParam(':prenume', $prenume);
            $this->stmt->bindParam(':username', $username);
            $this->stmt->bindParam(':active', $active);
            $this->stmt->bindParam(':user_rights', $user_rights);
            $this->stmt->bindParam(':cluster_id', $cluster_id);
            $this->stmt->bindParam(':password_hash', $this->genPasswordHash($password_hash));
            $this->stmt->bindParam(':timestamp', $timestamp);
            $this->stmt->bindParam(':created_by', $created_by);
            $this->stmt->bindParam(':hostname', $hostname);
            $this->stmt->bindParam(':mac_addr', $mac_addr);
            $this->stmt->bindParam(':IPv4', $IPv4);
            $this->stmt->bindParam(':reserved_ip', $reserved_ip);       
        }else{
            extract($userDetails);
            $this->stmt->bindParam(':nume', $nume);
            $this->stmt->bindParam(':prenume', $prenume);
            $this->stmt->bindParam(':username', $username);
            $this->stmt->bindParam(':active', $active);
            $this->stmt->bindParam(':user_rights', $user_rights);
            $this->stmt->bindParam(':cluster_id', $cluster_id);
            $this->stmt->bindParam(':password_hash', $this->genPasswordHash($password_hash));
            $this->stmt->bindParam(':timestamp', $timestamp);
            $this->stmt->bindParam(':created_by', $created_by);
        }
      
        if($this->stmt->execute()){
            return array("records" => $this->stmt, "message" => "User {$username} successfully created.");
        }else{
            return array("message" => "There was a problem when trying to create the user: {$username}.");
        }
    }
    
    
    public function rowCount() {
        //return row count for statement
        return $this->stmt->rowCount();
    }
}
$user = new User($db);
?>