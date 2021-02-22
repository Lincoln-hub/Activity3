<?php 
namespace App\services\data;
use App\Models\CustomerModel;
use Carbon\Exceptions\Exception;
use App\services\data\Utility\DBConnect;

class CustomerDAO
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
        $this->dbObj = $dbObj;
    }
    
    
    //add a new customer
    public function addCustomer(CustomerModel $custData)
    {
        try 
        {
            
           //define the query to search the database for the credentials
           $this->dbQuery = "INSERT INTo customer
                                (FirstName, LastName)
                                VALUES 
                                ('{$custData->getFirstName()}', '{$custData->getLastName()}')";
           //if the selected query returns a resultset
           //$result = mysqli_query($this->conn,$this->dbQuery);
           
           if( $this->dbObj->query($this->dbQuery))
           {
              // $this->conn->closeDbConnect();
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
    
    //ACID 
    //Get the next ID for the promaty keyto put in the foreign key
    public function getNextID()
    {
        try{
            //define the query to get the next ID
            $this->dbQuery = "SELECT CustomerID FROM customer
                                 ORDER BY CustomerID DESC LIMIT 0,1";
            
            $results = $this->dbObj->query($this->dbQuery);
            
            while($row = mysqli_fetch_array($results))
            {
                return $row['CustomerID'] +1;
            }
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
}