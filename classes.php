<?php

class Database {
    private $url;
    private $servername;
    private $username;
    private $password;
    private $database;
    private $dbport;
    public  $conn;
    
    
    public function __construct(){
        $this->db_conn();
    }
    
    private function db_conn(){
      
        // $this->servername = getenv('IP');
        // $this->username= getenv('C9_USER');
        // $this->password= "";
        // $this->database= "c9";
        // $this->dbport= 3306;
        
        $this->servername = "sql11.freemysqlhosting.net";
        $this->username   = "sql11209524";
        $this->password   = "ZrIZcJ6XW1";
        $this->database   = "sql11209524";
        $this->dbport     = 3306;
        $this->conn = new mysqli(
            $this->servername, $this->username, $this->password, $this->database//, $this->dbport
        );
        return $this->conn;
    }
    
    public function db_num_rows($sql){
        $result = $this->conn->query($sql);
        return $result->num_rows;
    }
    
    public function db_query($sql){
        $result = $this->conn->query($sql);
        return $result;
    }

}

?>