<?php
// database class 
class Database{
 
    // database credentials
    private $host = "localhost";
    private $db_name = "ims";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // function to establish database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>