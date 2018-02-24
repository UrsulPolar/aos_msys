<?php
Class Cluster{
    
    private $conn;
    private $stmt;
    private $sqlStr;
    
    private $clusterID;
    private $clusterName;
    private $clusterShortName;
    
    
    public function __construct($db){
        $this->conn = $db;
    }
    
    private function sqlStrPrep(){
        //instantinate SQL string
        $this->sqlStr = new SQL();
        return $this->sqlStr;
    }
    
    /**
     * @return mixed
     */
    public function getClusterID()
    {
        return $this->clusterID;
    }

    /**
     * @return mixed
     */
    public function getClusterName()
    {
        return $this->clusterName;
    }

    /**
     * @return mixed
     */
    public function getClusterShortName()
    {
        return $this->clusterShortName;
    }

    /**
     * @param mixed $clusterID
     */
    public function setClusterID($clusterID)
    {
        $this->clusterID = $clusterID;
    }

    /**
     * @param mixed $clusterName
     */
    public function setClusterName($clusterName)
    {
        $this->clusterName = $clusterName;
    }

    /**
     * @param mixed $clusterShortName
     */
    public function setClusterShortName($clusterShortName)
    {
        $this->clusterShortName = $clusterShortName;
    }
    
    public function readCluster($clusterName = null, $clusterShortName = null){
        $result["records"] = array();
        if($clusterName == null && $clusterShortName == null){
            $this->stmt = $this->conn->prepare($this->sqlStrPrep()->clusterReadSQL("full"));
            $this->stmt->execute();
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $clusterItem=array(
                    "id" => $id,
                    "cluster" => $cluster,
                    "sh_cluster" => $sh_cluster
                );
                array_push($result["records"], $clusterItem);
            }
        }else{
            $this->stmt = $this->conn->prepare($this->sqlStrPrep()->clusterReadSQL(""));
            $this->stmt->bindParam(1, $clusterName);
            $this->stmt->bindParam(2, $clusterShortName);
            $this->stmt->execute();
                if($this->stmt->rowCount() > 0){
                    extract($this->stmt->fetch(PDO::FETCH_ASSOC));
                    $this->clusterID = $result["records"][0]["id"] = $id;
                    $this->clusterName = $result["records"][0]["cluster"] = $cluster;
                    $this->clusterShortName = $result["records"][0]["sh_cluster"] = $sh_cluster;
                }
        }
            if(!empty($result["records"])){
                return $result;
            }else{
                return array("message" => "No cluster defined with the selected values!");
            }
    }
    
    public function createCluster($clusterName, $clusterShortName){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->clusterCreateSQL());
        $this->stmt->bindParam(1, $clusterName);
        $this->stmt->bindParam(2, $clusterShortName);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }
    
    public function deleteCluster($clusterID){
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->clusterDelSQL());
        $this->stmt->bindParam(1, $clusterID);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }
}

$clust = new Cluster($db);

?>