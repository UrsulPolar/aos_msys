<?php 
Class Application{
    private $conn;
    private $stmt;
    private $sqlStr;
    
    private $applicationID;
    private $application;
    private $clusterName;
    private $clusterID;
    private $applicationTech;
    private $applicationResponsable;
    
    
    public function __construct($db){
        $this->conn = $db;
    }
    
    private function sqlStrPrep(){
        //instantinate SQL string
        $this->sqlStr = new SQL();
        return $this->sqlStr;
    }
    
    public function setApplicationName($applicationName){
        $this->application = $applicationName;
    }
    
    public function getClusterName(){
        return $this->clusterName;
    }
    
    public function getApplicationResponsables(){
        return $this->applicationResponsable;
    }
    
    public function getApplicationName(){
        return $this->application;
    }
    
    public function getApplicationID(){
        return $this->applicationID;
    }
    
    public function readEnvironments(){
        
    }
    
    public function createEnvironment($environmentName){
        
    }
    
    public function updateEnvironment($environmentID){
        
    }
    
    public function deleteEnvironment($environmentID){
        
    }
    
    public function readAll(){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationFetchAllSQL());
        $this->stmt->execute();
        $applications=array();
        $applications["records"]=array();
        $stmt=$this->stmt;
        
        if($this->stmt->rowCount() > 0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                
                $this->readApplicationCluster($id);
                $this->readApplicationResponsables($this->clusterID);
                $applicationItem=array(
                    "id" => $id,
                    "application" => $application,
                    "cluster" => $this->getClusterName(),
                    "responsables" => $this->getApplicationResponsables()
                );
                
                array_push($applications["records"], $applicationItem);
            }
            return $applications;
        }else{
            return array("message" => "No applications defined.");
        }
        
    }
    
    public function readApplicationCluster($applicationID){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationFetchClusterSQL());
        $this->stmt->bindParam(1, $applicationID);
        $this->stmt->execute();
        $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)){
            $this->clusterName = $row['cluster'];
            $this->clusterID = $row['id'];
        }else{
            $this->clusterName = "N\A";
        }
        
    }
    
    public function readApplicationResponsables($clustID){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationFetchResponsablesSQL());
        $this->stmt->bindParam(1, $clustID);
        $this->stmt->execute();
        $responsables=array();
        while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
           array_push($responsables, $row);
        }
        if(!empty($responsables)){
            $this->applicationResponsable = $responsables;
        }else{
            $this->applicationResponsable = "N/A";
        }
        return $this->applicationResponsable;
    }
    
    
    public function readApplicationListClustered(){
        $array = $this->readAll();
        $result["records"]=array();
        foreach($array["records"] as $line){
            extract($line);
            $this->readApplicationCluster($id);
            $result["records"][]=array("application" => $application, "cluster" => $this->getClusterName() , "responsables" =>  $this->readApplicationResponsables($this->clusterID));
        
        }
        return $result;
    }
    
    public function readApplicationEnvironments($applicationID){
        $result["records"] = array();
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->readEnvironmentByAppIDSQL());
        $this->stmt->bindParam(1, $applicationID);
        $this->stmt->execute();
        if($this->stmt->RowCount() > 0){
            while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($result["records"], $row);
            }
            return $result;
        }
        return null;
    }
    
    public function createApplication($applicationName){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationCreateSQL());
        $this->stmt->bindParam(1, $applicationName);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }
    
    public function deleteApplication($applicationID){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationDelSQL());
        $this->stmt->bindParam(1, $applicationID);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }
    
    public function updateApplication($applicationID, $applicationName){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->applicationUpdateSQL());
        $this->stmt->bindParam(1, $applicationName);
        $this->stmt->bindParam(2, $applicationID);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }
    
    public function rowCount() {
        //return row count for statement
        return $this->stmt->rowCount();
    }
    
}
$app = new Application($db);
?>