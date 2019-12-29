<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "u728873214_leads_generate";
    private $username = "u728873214_lead";
    private $password = "123456";
    
    // private $db_name = "leads_generate_db";
    // private $username = "root";
    // private $password = "";
    public $conn;
  
    // get the database connection
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