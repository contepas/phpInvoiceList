<?php

class Database {
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
        $this->servername = getenv('IP');
        $this->username= getenv('C9_USER');
        $this->password= "";
        $this->database= "c9";
        $this->dbport= 3306;
        $this->conn = new mysqli(
            $this->servername, $this->username, $this->password, $this->database, $this->dbport
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

// if($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }
// $resultConn = "Connected successfuly (" . $db->host_info. ")";

// if($num_rows > 0){
//     $to_encode  = array();
//     //output data of each row
//     while($row = $result->fetch_row()){
//         $tempVal = $row['client'] . " " . $row['invoice_amount'];
//         array_push($to_encode, $tempArray);
//     }
// }

//echo json_encode($results); 

?>