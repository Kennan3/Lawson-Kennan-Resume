<?php

//Class that connects to the project database.
class LoginModel {
    private static $database = "project";
    private static $user = "dbuser";
    private static $password = "cs4640";
    private static $host = "localhost";
    private $connection;
    
    
    //Constructor that connects to the project database.
    public function __construct() {
     try {    
         $this->connection = new PDO(
         "mysql:host=" . self::$host,
         self::$user,
         self::$password
     );
     } catch(PDOException $e) {
         throw new Exception("Could not connect: " . $e->getMessage());
     }
    
        
     if(!$this->connection->query("USE " . self::$database)) {
        throw new Exception("Could not select database");
    }
 }
 
    //Function that verifies if the user exists and provided a valid password.
    public function verify_login($username, $password) {
    $prepared = $this->connection->prepare(
        "SELECT password FROM users WHERE username = :username"
     );
        
     //
     if(!$prepared->execute([":username"=>$username])) {
         throw new Exception("FATAL ERROR SEND IN BACKUPS!");
     }
        
     if($prepared->rowCount() == 0) {
         //No results
         throw new Exception("User $username not found.");
     }
        
     $row = $prepared->fetch(PDO::FETCH_ASSOC);
     $stored_pass = $row['password'];
        
     if(sha1($password) != $stored_pass) {
         throw new Exception("Password wrong.");
     }
        
     return true;
        
    }
    
    //Inserts a user into the table given provided form data.
    public function register_user($username,$password,$first,$last,$house,$userType) { 
        $prepared = $this->connection->prepare("INSERT INTO users (username,password,first,last,house,userType) VALUES (:username,sha1(:password),:first,:last,:house,:userType)");
        
        if(!$prepared->execute([":username"=>$username,":password"=>$password,":first"=>$first,":last"=>$last,":house"=>$house,":userType"=>$userType])) {
             throw new Exception("Could not regiser user.");
        }
        
        return true;
    }
    
    //Get users house. Need this for the cookie to display on the pages.
    public function get_house($username) {
        $prepared = $this->connection->prepare("SELECT house FROM users WHERE username=:username");
        $prepared->execute([":username"=>$username]);
        $row = $prepared->fetch(PDO::FETCH_ASSOC);
        $house = $row['house'];
        return $house;
    }
    
    //Getter for the user's usertype.
    public function get_userType($username) {
        $prepared = $this->connection->prepare("SELECT userType FROM users WHERE username=:username");
        $prepared->execute([":username"=>$username]);
        $row = $prepared->fetch(PDO::FETCH_ASSOC);
        $userType = $row['userType'];
        return $userType;
    }
    
    //Getter for user's last name.
    public function get_last($username) {
        $prepared = $this->connection->prepare("SELECT last FROM users WHERE username=:username");
        $prepared->execute([":username"=>$username]);
        $row = $prepared->fetch(PDO::FETCH_ASSOC);
        $last = $row['last'];
        return $last;
    }

}


?>