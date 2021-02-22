<?php 
namespace App\services\data\Utility;

use mysqli;
class DBConnect
{
    //Define the connection string
    private $conn;
    private $severname;
    private $username;
    private $password;
    private $dbname;
  
    
    
    //constuctor that creates a connection with the database
    public function __construct(string $dbname)
    {
        //
        $this->dbname=$dbname;
        $this->severname= "localhost";
        $this->username= "root";
        $this->password= "root";
       // $this->severname= "localhost";
        
        
        //create a connection to the database
        $this->conn = mysqli_connect($this->severname,$this->username,$this->password,$this->dbname);
        
        //test the connection
        
    }
    public function getDbConnect()
    {
        //OOP
        $this->conn = new mysqli($this->severname,$this->username,$this->password,$this->dbname);
        //create a connection to the database
        //precedural
       // $this->conn = mysqli_connect($this->severname,$this->username,$this->password,$this->dbname);
        
        //$this->conn = mysqli::connect($this->severname,$this->username,$this->password,$this->dbname);
        
        if($this->conn->connect_error)
        {
            echo "Failed to connect to MySQL: " .$this->conn->connect_error;
            exit();
        }
        return($this->conn);
    }
    
    //Turn on the auto commit
    public function setDbAutoCommitTrue()
    {
        $this->conn->autocommit(True);
    }
    
    public function setDbAutoCommitFalse()
    {
        $this->conn->autocommit(False);
    }
    
    public function closeDbConnect()
    {
        //mysqli_close($this->conn);
        
        $this->conn->close();
        
       // mysqli::close($this->close);
    }
    
    //begin a Transaction
    public function beginTransaction()
    {
        $this->conn->begin_transaction();
    }
    
    //commit transaction1
    public function commitTransaction()
    {
        $this->conn->commit();
    }
    
    //Rollback a transaction
    public function rollbackTransaction()
    {
        $this->conn->rollback();
    }
}
   