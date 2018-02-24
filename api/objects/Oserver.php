<?php
Class Servers{
    //database connection instance and table name
    private $conn;
    private $stmt;
    private $sqlStr;
    
    private $serverName;
    private $serverIP;
    private $serverCluster;
    private $serverApplication;
    private $serverEnvironment;
    private $serverApplicationVersion;
    private $serverType;
    private $serverCountry;
    private $serverObservations;
    private $serverOS;
    private $serverFirewallRules;
    private $serverSLADefinition;
    private $serverUsersAndPasswords;
    private $serverDocumentation;
   
    
    public function getServerName()
    {
        return $this->serverName;
    }

    public function getServerIP()
    {
        return $this->serverIP;
    }

    public function getServerCluster()
    {
        return $this->serverCluster;
    }

    public function getServerApplication()
    {
        return $this->serverApplication;
    }

    public function getServerEnvironment()
    {
        return $this->serverEnvironment;
    }

    public function getServerApplicationVersion()
    {
        return $this->serverApplicationVersion;
    }

    public function getServerType()
    {
        return $this->serverType;
    }

    public function getServerCountry()
    {
        return $this->serverCountry;
    }

    public function getServerObservations()
    {
        return $this->serverObservations;
    }

    public function getServerOS()
    {
        return $this->serverOS;
    }

    public function getServerFirewallRules()
    {
        return $this->serverFirewallRules;
    }

    public function getServerSLADefinition()
    {
        return $this->serverSLADefinition;
    }

    public function getServerUsersAndPasswords()
    {
        return $this->serverUsersAndPasswords;
    }

    public function getServerDocumentation()
    {
        return $this->serverDocumentation;
    }

    private function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    private function setServerIP($serverIP)
    {
        $this->serverIP = $serverIP;
    }

    private function setServerCluster($serverCluster)
    {
        $this->serverCluster = $serverCluster;
    }

    private function setServerApplication($serverApplication)
    {
        $this->serverApplication = $serverApplication;
    }

    private function setServerEnvironment($serverEnvironment)
    {
        $this->serverEnvironment = $serverEnvironment;
    }

    private function setServerApplicationVersion($serverApplicationVersion)
    {
        $this->serverApplicationVersion = $serverApplicationVersion;
    }

    private function setServerType($serverType)
    {
        $this->serverType = $serverType;
    }

    private function setServerCountry($serverCountry)
    {
        $this->serverCountry = $serverCountry;
    }

    private function setServerObservations($serverObservations)
    {
        $this->serverObservations = $serverObservations;
    }

    private function setServerOS($serverOS)
    {
        $this->serverOS = $serverOS;
    }

    private function setServerFirewallRules($serverFirewallRules)
    {
        $this->serverFirewallRules = $serverFirewallRules;
    }

    private function setServerSLADefinition($serverSLADefinition)
    {
        $this->serverSLADefinition = $serverSLADefinition;
    }

    private function setServerUsersAndPasswords($serverUsersAndPasswords)
    {
        $this->serverUsersAndPasswords = $serverUsersAndPasswords;
    }

    private function setServerDocumentation($serverDocumentation)
    {
        $this->serverDocumentation = $serverDocumentation;
    }

    public function __construct($db){
        $this->conn = $db;
    }
    
    private function sqlStrPrep(){
        //instantinate SQL string
        $this->sqlStr = new SQL();
        return $this->sqlStr;
    }
    
    public function readAll(){
        $result["records"] = array();
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->serversReadAllSQL());
        $this->stmt->execute();
        if($this->stmt->RowCount() > 0){
            while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($result["records"], $row);
            }
            return $result;
        }
        return null;
    }
    
    public function readByServerHostnameOrIP($hostname, $ip){
        if($hostname != null || $ip != null){
        $result["records"] = array();
        $this->stmt = $this->conn->prepare($this->sqlStrPrep()->serversReadHostOrIPSQL());
        $this->stmt->bindParam(1, $hostname);
        $this->stmt->bindParam(2, $ip);
        $this->stmt->execute();
            if($this->stmt->RowCount() > 0){
                while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($result["records"], $row);
                }
                return $result;
            }
            return null;
        }
        return null;
    }
    
    public function readByApplicationEnvironment($application, $environment){
        $result["records"] = array();
        if(!empty($application)){
            if(!empty($application) && !empty($environment)){
                $this->stmt = $this->conn->prepare($this->sqlStrPrep()->serversReadApplicationEnvironmentServersSQL("full"));
                $this->stmt->bindParam(1, $application);
                $this->stmt->bindParam(2, $environment);
            }elseif(!empty($application) && empty($environment)){               $detailLevel=null;
                $this->stmt = $this->conn->prepare($this->sqlStrPrep()->serversReadApplicationEnvironmentServersSQL());
                $this->stmt->bindParam(1, $application);
            }
            $this->stmt->execute();  
            if($this->stmt->RowCount() > 0){
                while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($result["records"], $row);
                }
                return $result;
            }
            return null;
        }else{
         return null;   
        }
        
    }
}
$server = new Servers($db);
?>