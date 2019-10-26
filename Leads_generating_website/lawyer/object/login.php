<?php
class Signup{
 
    // database connection and table name
    private $conn;
    private $table_name = "lawyer_profile";
    private $table_name1 = "lawyer_invoice";

    
 
    // object properties
    public $id;
    public $Name;
    public $Organization;
    public $Email;
    public $Password;
    public $Contact;
    public $Zipcode;
    public $state;
    public $LawyerName;
    public $Catogory;
    public $Description;
    
    public function __construct($db){
        $this->conn = $db;
    }
 
    // sign up
    function lawyerSignup(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    Name=:Name,Organization=:Organization, Email=:Email, Password=:Password,Contact=:Contact,state=:state,Zipcode=:Zipcode";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->Name=htmlspecialchars(strip_tags($this->Name));
        
 
        // bind values 
        $stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":Organization", $this->Organization);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Password", $this->Password);
        $stmt->bindParam(":Contact", $this->Contact);
        $stmt->bindParam(":Zipcode", $this->Zipcode);
        $stmt->bindParam(":state", $this->state);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function invoice1(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name1 . "
                SET
                LawyerName=:LawyerName";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->LawyerName=htmlspecialchars(strip_tags($this->LawyerName));
        
 
        // bind values 
        $stmt->bindParam(":LawyerName", $this->LawyerName);
        
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
        function lawyerSignIn()
        {
            
                // $email=$_POST['username'];
                // $password=md5($_POST['password']);

                $sql ="SELECT * FROM
                ". $this->table_name .
                " WHERE 
                    Email=:Email AND Password=:Password";
                
                $query= $this->conn->prepare($sql);

                $this->Email=htmlspecialchars(strip_tags($this->Email));
                $this->Password=htmlspecialchars(strip_tags($this->Password));

                $query-> bindParam(":Email",$this->Email, PDO::PARAM_STR);
                $query-> bindParam(":Password",$this->Password, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() > 0)
                {
                    foreach($results as $result){
                        $_SESSION['Lawyerlogin']=htmlentities($result->Email);
                        $_SESSION['Organization']=htmlentities($result->Organization);
                        $_SESSION['Name']=htmlentities($result->Name);
                        $_SESSION['Contact']=htmlentities($result->Contact);
                        $_SESSION['Zipcode']=htmlentities($result->Zipcode);
                        $_SESSION['id']=htmlentities($result->id);
                        $_SESSION['Leads']=htmlentities($result->Leads);
                        $_SESSION['total']=htmlentities($result->total_Leads);
                        $_SESSION['Description']=htmlentities($result->Description);
                        $_SESSION['Catogory']=htmlentities($result->Catogory);
                        

                        
                        
                       
                    }
                    
                    return true;
                }
                else
                {
                     return false;
                }

            
         }
         function readAll($limit_start, $limit_range) {
            $query = "
                select id, name, description, price, category_id
                from " . $this->table_name . "
                order by name asc
                limit {$limit_start}, {$limit_range}
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
?>
