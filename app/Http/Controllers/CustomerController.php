<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\services\business\SecurityService;

class CustomerController extends Controller
{
    //to obtain an instance of the current HTTP request from post
    public function index(Request $request)
    {
        //Added for Activity 3 
        //test the form variables being passed in
        //$this->validateForm($request);
        
        //create a CustomerModel with firstname and lastname
        //$custData = new CustomerModel($request->get('firstname'), $request->get('lastname'));
        
        //Instatiate the Business logic layer
        //$serviceCustomer = new SecurityService();
        
        //pass the credentials to the business layer
        //$isValid = $serviceCustomer->addCustomer($custData);
        
        //determine which view to display
       /* if($isValid)
        {
            echo("Customer Data added successfully");
        }
        else
        {
            echo("Customer Data was not added ");
        }*/
        $nextID =0;
        return redirect('neworder')->with('nextID',$nextID)
                                   ->with('firstname',$request->get('firstname'))
                                   ->with('lastname',$request->get('lastname'));
        //return view('loginPassed2');
       /* //put all the form values in an array called formValues
        $formvalues = $request->all();
        //getting just the username
        $userName = $request->input('username');
        $password = $request->input('password');
        return $request->all();*/     
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
