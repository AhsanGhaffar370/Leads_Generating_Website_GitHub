<?php
class Signup{
 
    // database connection and table name
    private $conn;
    private $table_name = "lawyer_profile";
    private $table_name1 = "lawyer_invoice";
    private $table_name2 = "lawyer_city";

    
 
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
    public $access_code;
    public $city;
    public $id_fk;
    
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
        function emailExists(){
 
            // query to check if email exists
            $query = "SELECT id, Email, Name, Password
                    FROM " . $this->table_name . "
                    WHERE Email = ?
                    LIMIT 0,1";
         
            // prepare the query
            $stmt = $this->conn->prepare( $query );
         
            // sanitize
            $this->Email=htmlspecialchars(strip_tags($this->Email));
         
            // bind given email value
            $stmt->bindParam(1, $this->Email);
         
            // execute the query
            $stmt->execute();
         
            // get number of rows
            $num = $stmt->rowCount();
         
            // if email exists, assign values to object properties for easy access and use for php sessions
            if($num>0){
         
                // get record details / values
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
                // assign values to object properties
                $this->id = $row['id'];
                $this->Email = $row['Email'];
                $this->Name = $row['Name'];
                $this->Password = $row['Password'];
         
                // return true because email exists in the database
                return true;
            }
         
            // return false if email does not exist in the database
            return false;
        }
        function getToken($length=32){
            $token = "";
            $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
            $codeAlphabet.= "0123456789";
            for($i=0;$i<$length;$i++){
                $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
                echo $token;
            }
            return $token;
        }
         
        function crypto_rand_secure($min, $max) {
            $range = $max - $min;
            if ($range < 0) return $min; // not so random...
            $log = log($range, 2);
            $bytes = (int) ($log / 8) + 1; // length in bytes
            $bits = (int) $log + 1; // length in bits
            $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ($rnd >= $range);
            return $min + $rnd;
        }
        function updateAccessCode(){
 
            // update query
            $query = "UPDATE
                        " . $this->table_name . "
                    SET
                        access_code = :access_code
                    WHERE
                        Email = :Email";
         
            // prepare the query
            $stmt = $this->conn->prepare($query);
         
            // sanitize
            $this->access_code=htmlspecialchars(strip_tags($this->access_code));
            $this->Email=htmlspecialchars(strip_tags($this->Email));
         
            // bind the values from the form
            $stmt->bindParam(':access_code', $this->access_code);
            $stmt->bindParam(':Email', $this->Email);
         
            // execute the query
            if($stmt->execute()){
                echo "hello";
                return true;
            }
         
            return false;
        }
        function accessCodeExists(){
 
            // query to check if access_code exists
            $query = "SELECT id
                    FROM " . $this->table_name . "
                    WHERE access_code = ?
                    LIMIT 0,1";
         
            // prepare the query
            $stmt = $this->conn->prepare( $query );
         
            // sanitize
            $this->access_code=htmlspecialchars(strip_tags($this->access_code));
         
            // bind given access_code value
            $stmt->bindParam(1, $this->access_code);
         
            // execute the query
            $stmt->execute();
         
            // get number of rows
            $num = $stmt->rowCount();
         
            // if access_code exists
            if($num>0){
         
                // return true because access_code exists in the database
                return true;
            }
         
            // return false if access_code does not exist in the database
            return false;
         
        }
        function updatePassword(){
 
            // update query
            $query = "UPDATE " . $this->table_name . "
                    SET Password = :Password
                    WHERE access_code = :access_code";
         
            // prepare the query
            $stmt = $this->conn->prepare($query);
         
            // sanitize
            $this->Password=htmlspecialchars(strip_tags($this->Password));
            $this->access_code=htmlspecialchars(strip_tags($this->access_code));
         
            // bind the values from the form
            // $password_hash = md5($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':Password', $this->Password);
            $stmt->bindParam(':access_code', $this->access_code);
         
            // execute the query
            if($stmt->execute()){
                return true;
            }
         
            return false;
        }
        function cityExists(){
 
            // query to check if email exists
            $sql ="SELECT * FROM
            ". $this->table_name2 .
            " WHERE 
                id_fk=:id_fk AND city=:city";
            
         
            // prepare the query
            $query = $this->conn->prepare($sql);
         
            // sanitize
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->id_fk=htmlspecialchars(strip_tags($this->id_fk));
            $query-> bindParam(":city",$this->city, PDO::PARAM_STR);
            $query-> bindParam(":id_fk",$this->id_fk, PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }
            // bind given email value
            
         
            // return false if email does not exist in the database
            return false;
        }
}


?>
