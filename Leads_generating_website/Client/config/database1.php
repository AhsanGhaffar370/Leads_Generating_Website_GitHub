<?php
class Database1{

   private $host = "localhost";
    private $db_name = "u728873214_leads_generate";
    private $username = "u728873214_lead";
    private $password = "123456";
    public $conn;


    function connect() {
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            echo 'Connection established!';}
        return $this->myconn;
    }

    function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }
}
?>