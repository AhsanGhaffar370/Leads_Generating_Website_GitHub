<?php
class userRequest{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer_info";
    private $table_name1="lawyer_profile";
    private $table_name2="lawyer_invoice";
    
    
    // object properties
    public $Name; 
    public $Email; 
    public $PhoneNo;
    public $ZipCode;
    public $State;
    public $Lawyer_category;
    public $legal_matter;
    public $LawyerID;
    public $LawyerName;
    public $ClientID;
    public $EntityType;
    public $Name1;
    public $Amount;
    public $Created;
    public $leads;
    public $Phone;
    public $ids;
    public $Catogory;
    public $total_Leads;
    public $DummyLeads;
    public $state;
    public function __construct($db){
        $this->conn = $db;
    }
 
    // sign up
    function UserR(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    Name=:Name, Email=:Email, PhoneNo=:PhoneNo,ZipCode=:ZipCode,Lawyer_category=:Lawyer_category,legal_matter=:legal_matter";
 
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->Name=htmlspecialchars(strip_tags($this->Name));
        $this->Email=htmlspecialchars(strip_tags($this->Email));
        $this->PhoneNo=htmlspecialchars(strip_tags($this->PhoneNo));
        $this->ZipCode=htmlspecialchars(strip_tags($this->ZipCode));
        $this->Lawyer_category=htmlspecialchars(strip_tags($this->Lawyer_category));
        $this->legal_matter=htmlspecialchars(strip_tags($this->legal_matter));
        // bind values 
        $stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":PhoneNo", $this->PhoneNo);
        $stmt->bindParam(":ZipCode", $this->ZipCode);
        $stmt->bindParam(":Lawyer_category", $this->Lawyer_category);
        $stmt->bindParam(":legal_matter", $this->legal_matter);
        if($stmt->execute()){
            
        $_SESSION['ii'] = $this->conn->lastInsertId();
            
            return true;
        }else{
            
            return false;
        }
 
    }
    function AssignLawyer()
        {
            
                // $email=$_POST['username'];
                // $password=md5($_POST['password']);

                $sql ="SELECT * FROM
                ". $this->table_name1 .
                " WHERE 
                    state=:state AND Catogory=:Catogory order by rand() LIMIT 1";
                
                $query= $this->conn->prepare($sql);

                // // posted values
              
                $this->state=htmlspecialchars(strip_tags($this->state));
                $this->Catogory=htmlspecialchars(strip_tags($this->Catogory));
                
                $query->bindParam(":state", $this->state);
                $query->bindParam(":Catogory", $this->Catogory);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result){
                        $_SESSION['ID1']=htmlentities($result->id);
                        $_SESSION['Namess']=htmlentities($result->Name);
                        $_SESSION['organization1']=htmlentities($result->Organization);
                        $_SESSION['catog']=htmlentities($result->Catogory);
                        $_SESSION['Email1']=htmlentities($result->Email);
                        $_SESSION['PhoneNo1']=htmlentities($result->Contact);
                        $_SESSION['ZipCode1']=htmlentities($result->Zipcode);
                        $_SESSION['des']=htmlentities($result->Description);
                    }
                    return true;
                }
                else
                {
                     return false;
                }

            
         }
        
         function invoice1(){
 
            //write query
            $sql = "INSERT INTO
                        " . $this->table_name2 . "
                    SET
                    LawyerID=:LawyerID,LawyerName=:LawyerName,ClientID=:ClientID,EntityType=:EntityType,Name=:Name,Email=:Email,Phone=:Phone,Amount=:Amount,Created=:Created";
     
            $query = $this->conn->prepare($sql);
            
     
            // posted values
            $this->LawyerID=htmlspecialchars(strip_tags($this->LawyerID));
            $this->LawyerName=htmlspecialchars(strip_tags($this->LawyerName));
            $this->ClientID=htmlspecialchars(strip_tags($this->ClientID));
            $this->EntityType=htmlspecialchars(strip_tags($this->EntityType));
            $this->Name=htmlspecialchars(strip_tags($this->Name));
            
            $this->Email=htmlspecialchars(strip_tags($this->Email));
            $this->Phone=htmlspecialchars(strip_tags($this->Phone));
            $this->Amount=htmlspecialchars(strip_tags($this->Amount));
            $this->Created = date('Y-m-d H:i:s');
 
            
            // bind values 
            $query->bindParam(":LawyerID", $this->LawyerID);
            $query->bindParam(":LawyerName", $this->LawyerName);
            
            // $query->bindParam(":LawyerName", $this->LawyerName);
            $query->bindParam(":ClientID", $this->ClientID);
            
            $query->bindParam(":EntityType", $this->EntityType);
            $query->bindParam(":Name", $this->Name);
            $query->bindParam(":Email", $this->Email);
            $query->bindParam(":Phone", $this->Phone);
            
            $query->bindParam(":Amount", $this->Amount);
            $query->bindParam(":Created", $this->Created);
     
            if($query->execute()){
                return true;
            }else{
                return false;
            }
     
        }
        function leadsWork()
        {
    
                $sql ="SELECT * FROM
                ". $this->table_name1 .
                " WHERE 
                    id=:id";
                
                $query= $this->conn->prepare($sql);
                $this->id=htmlspecialchars(strip_tags($this->id));
                $query->bindParam(":id", $this->id);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result){
                        $_SESSION['leads']=htmlentities($result->Leads);
                        $_SESSION['dummy']=htmlentities($result->DummyLeads);

                    }
                    return true;
                }
                else
                {
                     return false;
                }

            
         }
         function leadwork()
         {
            $sql = "UPDATE
            " . $this->table_name1 . "
        SET
        Leads=:Leads,DummyLeads=:DummyLeads,total_Leads=:total_Leads WHERE id=:id";

$query = $this->conn->prepare($sql);

// posted values
$this->leads=htmlspecialchars(strip_tags($this->leads));
$this->DummyLeads=htmlspecialchars(strip_tags($this->DummyLeads));

$this->total_Leads=htmlspecialchars(strip_tags($this->total_Leads));
$this->id=htmlspecialchars(strip_tags($this->id));



// bind values 
$query->bindParam(":Leads", $this->leads);

$query->bindParam(":DummyLeads", $this->DummyLeads);
$query->bindParam(":total_Leads", $this->total_Leads);

$query->bindParam(":id", $this->id);


if($query->execute()){
    return true;
}else{
    return false;
}

         }
}
?>
