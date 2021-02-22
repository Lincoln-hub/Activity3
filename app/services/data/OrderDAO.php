<?php 
namespace App\services\data;

use Carbon\Exceptions\Exception;
use App\services\data\Utility\DBConnect;

class OrderDAO
{
    //Define the connection string
    private $conn;
    private $dbname = "activity3";
    private $dbQuery;
    private $connection;
    private $dbObj;
    
    //constuctor that creates a connection with the database
    public function __construct($dbObj)
    {
        $this->dbOj=$dbObj;
    }
    
    
    //add a new customer
    public function addOrder(string $product, int $cutomerID)
    {
        try 
        {
            
           //define the query to search the database for the credentials
           $this->dbQuery = @"INSERT INTO `order`
                                (Product, CustomerID)
                                VALUES 
                                ('". $product ."',". $cutomerID. ")";
           //if the selected query returns a resultset
           //$result = mysqli_query($this->conn,$this->dbQuery);
           
           if($this->dbOj->query($this->dbQuery))
           {
               //$this->conn->closeDbConnect();
               return true;
           }
           else
           {
               $this->conn->closeDbConnect();
               return false;
           }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
        
    }
    
}