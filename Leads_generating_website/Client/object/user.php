<?php
class userRequest{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer_info";
    private $table_name1="lawyer_profile";
    private $table_name2="lawyer_invoice";
    
    
    // object properties
    public $id;
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
    public $Catogory2;
    public $Catogory3;
    public $Catogory4;
    
    public $total_Leads;
    public $DummyLeads;
    public $state;
    public $city;
    public $city2;
    public $city3;
    public $city4;
    
    
    public function __construct($db){
        $this->conn = $db;
    }
 
    // sign up
    function UserR(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    Name=:Name, Email=:Email, PhoneNo=:PhoneNo,ZipCode=:ZipCode,State=:State,Lawyer_category=:Lawyer_category,legal_matter=:legal_matter";
 
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->Name=htmlspecialchars(strip_tags($this->Name));
        $this->Email=htmlspecialchars(strip_tags($this->Email));
        $this->PhoneNo=htmlspecialchars(strip_tags($this->PhoneNo));
        $this->ZipCode=htmlspecialchars(strip_tags($this->ZipCode));
        $this->State=htmlspecialchars(strip_tags($this->State));
        
        $this->Lawyer_category=htmlspecialchars(strip_tags($this->Lawyer_category));
        $this->legal_matter=htmlspecialchars(strip_tags($this->legal_matter));
        // bind values 
        $stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":PhoneNo", $this->PhoneNo);
        $stmt->bindParam(":ZipCode", $this->ZipCode);
        $stmt->bindParam(":State", $this->State);
        
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
                $sql ="SELECT lawyer_profile.* ,lawyer_city.city from lawyer_profile,lawyer_city WHERE lawyer_profile.id=lawyer_city.id_fk AND lawyer_profile.PendingBalance >= 40 AND lawyer_city.city=:city order by rand() LIMIT 1";
                
                $query= $this->conn->prepare($sql);

                // // posted values
              
                $this->city=htmlspecialchars(strip_tags($this->city));
                // $this->city2=htmlspecialchars(strip_tags($this->city2));
                // $this->city3=htmlspecialchars(strip_tags($this->city3));
                // $this->city4=htmlspecialchars(strip_tags($this->city4));
                
                $query->bindParam(":city", $this->city);
                // $query->bindParam(":city2", $this->city2);
                // $query->bindParam(":city3", $this->city3);
                // $query->bindParam(":city4", $this->city4);
                
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
                        $_SESSION['pending']=htmlentities($result->PendingBalance);
                        $_SESSION['time']=htmlentities($result->timezone);
                        $_SESSION['sms']=htmlentities($result->smsPhoneNumber);
                        
                        
                    }
                    return true;
                }
                else
                {
                     return false;
                }

            
         }
         function AssignLawyerdemo()
        {
            
                // $email=$_POST['username'];
                // $password=md5($_POST['password']);

                $sql ="SELECT * FROM
                ". $this->table_name1 .
                " WHERE 
                    id=13";
                
                $query= $this->conn->prepare($sql);

                // // posted values
              
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result){
                        // $_SESSION['ID1']=htmlentities($result->id);
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
            
            //  $dt = new DateTime('now', new DateTimezone('America/New_York'));
            //  $da=$dt->format('F j, Y, g:i a');
            // // echo $ias;
            // $this->Created =$da; 
 
            
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
         function leadworkdemo()
         {
            $sql = "UPDATE
            " . $this->table_name1 . "
        SET
        Leads=:Leads WHERE id=13";

$query = $this->conn->prepare($sql);

// posted values
$this->leads=htmlspecialchars(strip_tags($this->leads));
$this->id=htmlspecialchars(strip_tags($this->id));



// bind values 
$query->bindParam(":Leads", $this->leads);

$query->bindParam(":id", $this->id);


if($query->execute()){
    return true;
}else{
    return false;
}

         }
}
?>
