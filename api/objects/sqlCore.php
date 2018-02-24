<?php 
Class SQL{
    private $string;
      
    public function userReadAllSQL(){
        $this->string = "SELECT a.id, a.nume, a.prenume, a.username, a.active, a.user_rights, a.cluster_id, a.created_by
            FROM
                aos_msys_test.tbl_users a
            ORDER BY a.username DESC;";
        return $this->string;
    } 
    
    public function userFetchByUserrnameSQL(){
        $this->string = "SELECT a.id, a.nume, a.prenume, a.username, a.active, a.user_rights, a.cluster_id, a.created_by
            FROM
                aos_msys_test.tbl_users a where a.username = ?
            ORDER BY a.username DESC;";
        return $this->string;
    }
    
    public function userFetchByClusterSQL(){
        $this->string = "SELECT a.id, a.nume, a.prenume, a.username, a.active, a.user_rights, a.cluster_id, a.created_by
            FROM
                aos_msys_test.tbl_users a where a.cluster_id = ?
            ORDER BY a.username DESC;";
        return $this->string;
    }
    
    public function userLoginSQL(){
        $this->string = "SELECT a.username, a.active, a.password_hash FROM aos_msys_test.tbl_users a WHERE a.username = ?;";
        return $this->string;
    }
    
    public function userDelSQL(){
        $this->string = "DELETE FROM aos_msys_test.tbl_users a WHERE a.id = ?;";
        return $this->string;
    }
    
    public function userCreateSQL($detailLevel=null){
        if($detailLevel == "full"){
            $this->string = "BEGIN;
                INSERT INTO aos_msys_test.tbl_users (nume, prenume, username, active, user_rigths, cluster_id, password_hash, timestamp, created_by)
                  VALUES(:nume,:prenume,:username,:active,:user_rights,:cluster_id,:password_hash,:timestamp,:created_by);
                INSERT INTO aos_msys_test.tbl_workstations (user_id, hostname, mac_addr, IPv4, reserved_ip)
                  VALUES(LAST_INSERT_ID(),:user_id,:hostname,:mac_addr,:IPv4, :reserved_ip);
                COMMIT;";
        }else{
            $this->string = "INSERT INTO aos_msys_test.tbl_users (nume, prenume, username, active, user_rigths, cluster_id, password_hash, timestamp, created_by)
                  VALUES(:nume,:prenume,:username,:active,:user_rights,:cluster_id,:password_hash,:timestamp,:created_by);";
        }
        return $this->string;
    }
    
    public function applicationFetchAllSQL(){
        $this->string = "SELECT `id`,`application` FROM aos_msys_test.tbl_application;";
        return $this->string;
    }
    
    public function applicationFetchClusterSQL(){
        $this->string = "SELECT b.id,a.cluster FROM aos_msys_test.tbl_servers a LEFT JOIN aos_msys_test.tbl_cluster b ON a.cluster=b.sh_cluster WHERE a.id_app = ? LIMIT 1;";
        return $this->string;
    }
    
    public function applicationFetchResponsablesSQL(){
        $this->string = "SELECT `nume`, `prenume` FROM aos_msys_test.tbl_users a LEFT JOIN aos_msys.tbl_cluster b ON a.cluster_id = b.id WHERE b.id = ?;";
        return $this->string;
    }
    
    public function applicationCreateSQL(){
        $this->string = "INSERT INTO aos_msys_test.tbl_application (`application`) VALUES (?);";
        return $this->string;
    }
    
    public function applicationUpdateSQL(){
        $this->string = "UPDATE aos_msys_test.tbl_application SET application = ? WHERE id = ?;";
        return $this->string;
    }
    
    public function applicationDelSQL(){
        $this->string = "DELETE FROM aos_msys_test.tbl_application WHERE id = ?;";
        return $this->string;
    }
    
    public function clusterReadSQL($detailLevel=null){
        if($detailLevel == "full"){
            $this->string = "SELECT id, cluster, sh_cluster FROM aos_msys_test.tbl_cluster;";
        }else{
            $this->string = "SELECT id, cluster, sh_cluster FROM aos_msys_test.tbl_cluster WHERE cluster = ? OR sh_cluster = ?;";
        }
        return $this->string;
    }
    
    public function clusterCreateSQL(){
        $this->string = "INSERT INTO aos_msys_test.tbl_cluster (`cluster`, `sh_cluster`) VALUES (?,?);";
        return $this->string;
    }
    
    public function clusterDelSQL(){
        $this->string = "DELETE FROM aos_msys_test.tbl_cluster WHERE id = ?;";
        return $this->string;
    }

    public function environmentReadAllSQL(){
        $this->string = "SELECT id, environment FROM aos_msys_test.tbl_environment ORDER BY environment;";
        return $this->string;
    }
    
    public function environmentCreateSQL(){
        $this->string = "INSERT INTO aos_msys_test.tbl_environment (`environment`) VALUES (?);";
        return $this->string;
    }
    
    public function environmentUpdateSQL(){
        $this->string = "UPDATE aos_msys_test.tbl_environment SET environment = ? WHERE id = ?;";
        return $this->string;
    }
    
    public function readEnvironmentByAppIDSQL(){
        $this->string = "SELECT b.id, b.environment, c.application FROM aos_msys_test.tbl_servers a LEFT JOIN aos_msys_test.tbl_environment b on a.id_env = b.id  LEFT JOIN aos_msys_test.tbl_application c on a.id_app = c.id WHERE a.id_app = ? GROUP BY b.id, b.environment, c.application ORDER BY b.environment;";
        return $this->string;
    }
    
    public function environmentDelSQL(){
        //it will delete all servers that have the corresponding environment set....
    }
    
    public function serversReadAllSQL(){
        $this->string = "select * FROM `aos_msys_test`.`server_list`;";
        return $this->string;
    }
    
    public function serversReadHostOrIPSQL(){
        $this->string = "select * FROM `aos_msys_test`.`server_list` WHERE `aos_msys_test`.`server_list`.`server_name` = ? OR `aos_msys_test`.`server_list`.`ip` = ?;";
        return $this->string;
    }
    
    public function serversReadApplicationEnvironmentServersSQL($detailLevel=null){
        
        $defaultServerSQL="select * FROM `aos_msys_test`.`server_list`";
        if($detailLevel=="full"){
            $this->string = $defaultServerSQL." WHERE `aos_msys_test`.`server_list`.`application` = ? AND `aos_msys_test`.`server_list`.`environment` = ?;";
        }else{
            $this->string = $defaultServerSQL." WHERE `aos_msys_test`.`server_list`.`application` = ?;";
        }
            
        return $this->string.$detailLevel;
    }
}

    
?>