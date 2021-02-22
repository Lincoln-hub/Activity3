<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\services\business\SecurityService;

class OrderController extends Controller
{
    //to obtain an instance of the current HTTP request from post
    public function index(Request $request)
    {
        $customerData = new CustomerModel($request->input('firstname'),$request->input('lastname'));
        
        
        //Since we are not using a model
        $product = request()->get('product');
        
        //this is a more efficeitn way since its not calling a method
        $customerID = $request->input('customerID');
        
        
        //Instatiate the Business logic layer
        $serviceCustomer = new SecurityService();
        
        //pass all data to the business layer
        $isValid = $serviceCustomer->addAllInfo($product, $customerID,$customerData);
        
        //determine which view to display
        if($isValid)
        {
            echo("Order Data Committed successfully");
        }
        else
        {
            echo("Order Data was Rolled Back ");
        }
        return view('order');        
    }
    
    //validate added for Aactivity3
    private function validateForm(Request $request)
    {
        //setup Data validation Rules for Login Form
        $rules = ['user_name'=>'Required | Between: 4,10 | Alpha',
                  'password'=>'Required | Between: 4,10'
        ];
        
        $this->validate($request,$rules);
    }
}
