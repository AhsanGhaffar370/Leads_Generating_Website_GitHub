<?php
class Invoice{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer_info";
    private $table_name1="lawyer_profile";
    private $table_name2="lawyer_invoice";
    
    
    // object properties
    public $pastDue;
    public $LawyerID;
    public $id;
    
   
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // sign up
    function readName(){
        
        $query = "SELECT LawyerName FROM " . $this->table_name2 . " WHERE LawyerID = ? limit 0,1";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->LawyerID);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row['LawyerName'];
    }
    function PastdueBalance()
        {
            
                // $email=$_POST['username'];
                // $password=md5($_POST['password']);

                $sql ="SELECT sum(Amount) FROM
                ". $this->table_name2 .
                " WHERE 
                LawyerID=:LawyerID";
                
                $query= $this->conn->prepare($sql);

                // // posted values
                // $this->Name=htmlspecialchars(strip_tags($this->Name));
                // $this->Email=htmlspecialchars(strip_tags($this->Email));
                // $this->PhoneNo=htmlspecialchars(strip_tags($this->PhoneNo));
                $this->LawyerID=htmlspecialchars(strip_tags($this->LawyerID));
                // $this->State=htmlspecialchars(strip_tags($this->State));
                // $this->Lawyer_category=htmlspecialchars(strip_tags($this->Lawyer_category));
                // $this->legal_matter=htmlspecialchars(strip_tags($this->legal_matter));
                // bind values 
                // $query->bindParam(":Name", $this->Name);
                // $query->bindParam(":Email", $this->Email);
                // $query->bindParam(":PhoneNo", $this->PhoneNo);
                $query->bindParam(":LawyerID", $this->LawyerID);
                // $query->bindParam(":State", $this->State);
                // $query->bindParam(":Lawyer_category", $this->Lawyer_category);
                // $query->bindParam(":legal_matter", $this->legal_matter);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result){
                        $this->pastDue=htmlentities($result->sum(Amount));
                        // $_SESSION['Email']=htmlentities($result->Email);
                        // $_SESSION['PhoneNo']=htmlentities($result->PhoneNo);
                        // $_SESSION['ZipCode']=htmlentities($result->ZipCode);
                        // $_SESSION['State']=htmlentities($result->State);
                        // $_SESSION['Lawyer_category']=htmlentities($result->Lawyer_category);
                    }
                    return true;
                }
                else
                {
                     return false;
                }

            
         }      
?>