<?php 
namespace App\services\business;

use App\Models\UserModel;
use App\Models\CustomerModel;
use App\services\data\SecurityDAO;
use App\services\data\CustomerDAO;
use App\services\data\OrderDAO;
use App\services\data\Utility\DBConnect;


class SecurityService
{
    private $verifyCred;
    
    
    public function login(UserModel $credentials)
    {
        //instantiate the data access layer
        $this->verifyCred = new SecurityDAO();
        
        //return true or false by passing the credentials to the object
        return $this->verifyCred->fingByUser($credentials);
    }
    
    //Method to manage the customer data in he Business Layer
    public  function addCustomer(CustomerModel $custData)
    {
        //instantiate the data access layer
        $this->addNewCustomer = new CustomerDAO();
        
        //return true or false by passing customer data to the object
        return $this->addNewCustomer->addCustomer($custData);
    }
    
    
    //Method to manage the order data in he Business Layer
    public  function addOrder(string $product, int $customerID)
    {
        //instantiate the data access layer
        $this->addNewOrder = new OrderDAO();
        
        //return true or false by passing order data to the object
        return $this->addNewOrder->addOrder($product, $customerID);
    }
    
    //Manage the ACID Transactions
    public function addAllInfo(string $product, int $CustomerID, CustomerModel $customerData)
    {
        //create a connection to the database
        //create an instance of the class
        $conn = new DBConnect("activity3");
        
        //call the methods to create the connection
        $dbObj = $conn->getDbConnect();
        
        //First turn off autocommit
        $conn->setDbAutoCommitFalse();
        
        //Begin a transaction
        $conn->beginTransaction();
        
        //Instantiate the data acces layer
        $this->addNewCustomer = new CustomerDAO($dbObj);
        
        //Next CustomerId
        $customerID = $this->addNewCustomer->getNextID();
        
        //add customer data
        $isSuccessful = $this->addNewCustomer->addCustomer($customerData);
        
        //instantiate the data access layer for our order
        $this->addNewOrder = new OrderDAO($dbObj);
        
        //add the product order data
        $isSuccessfulOrder = $this->addNewOrder->addOrder($product, $customerID);
        
        if($isSuccessful && $isSuccessfulOrder )
        {
            $conn->commitTransaction();
            return true;
        }
        else
        {
            $conn->rollbackTransaction();
            return false;
        }
    }
    
}