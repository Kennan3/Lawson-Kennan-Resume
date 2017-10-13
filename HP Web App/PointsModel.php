<?php


//Class that interacts with the database. Interacts with the records table.
class PointsModel {
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

    //Adds a new record to the points table, given the form input from the user.
    public function add_record($house,$value,$professor,$reason) {
        $prepared = $this->connection->prepare(
            "INSERT INTO records (house,value,professor,reason,date) VALUES (:house,:value,:professor,:reason,now())"
        );
        if($prepared->execute([":house"=>$house,":value"=>$value,":professor"=>$professor,":reason"=>$reason])) {
            return true;
        } else {
            return false;
            }
        
    }
    
    //Returns the sum of the values of points for a given house.
    public function get_total_points($house) {
        $prepared = $this->connection->prepare("SELECT sum(value) FROM records WHERE house=:house");
        $prepared->execute([":house"=>$house]);
        $row = $prepared->fetch(PDO::FETCH_ASSOC);
        return $row['sum(value)'];
        
        
    }
    
    //Returns all the records associated with a certain house.
    public function get_all_records($house) {
        $prepared = $this->connection->prepare("SELECT * FROM records WHERE house=:house");
        $prepared->execute([":house"=>$house]);
        return $prepared;
        
        
    }
    
    //Gets just the point values, and returns them for use in a graph.
    public function get_points_array($house) {
        $prepared = $this->connection->prepare("SELECT value FROM records WHERE house=:house");
        $prepared->execute([":house"=>$house]);
        return $prepared;
    }

    
    
    
}


?>