<?php 
namespace App\services\data;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;

class SecurityDAO
{
    //Define the connection string
    private $conn;
    private $severname = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "activity2";
    private $port ="";
    private $dbQuery;
    
    //constuctor that creates a connection with the database
    public function __construct()
    {
        //create a connection to the database
        $this->conn = mysqli_connect($this->severname,$this->username,$this->password,$this->dbname);
        
        //test the connection
        
    }
    
    public function fingByUser(UserModel $credentials)
    {
        try 
        {
           //define the query to search the database for the credentials
           $this->dbQuery = "SELECT Username, Password FROM  user
                                WHERE Username = '{$credentials->getUsername()}'
                                    AND Password ='{$credentials->getPassword()}'";
           //if the selected query returns a resultset
           $result = mysqli_query($this->conn,$this->dbQuery);
           
           if(mysqli_num_rows($result) >0)
           {
               mysqli_free_result($result);
               mysqli_close($this->conn);
               return true;
           }
           else
           {
               mysqli_free_result($result);
               mysqli_close($this->conn);
               return false;
           }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
        
    }
    
}