<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/whoami','WhatsMyNameController@index');

Route::get('/askme', function () { return view('whoami'); }); 

Route::get('/login', function ()
{
    //view loginView has to be name of the file in the view
    return view('loginView'); 
}); 


//when the data is posted from the login page with action set to 'dologin'

Route::post('/dologin','LoginController@index'); 

Route::get('/login2', function ()
{
    return view('loginView2');
});

Route::get('/customer', function() 
{
    return view('customer');
});

Route::post('/addCustomer', 'CustomerController@index');

//Route for addOder
Route::get('/neworder', function()
{
    return view('order');
});
Route::post('/addOrder', 'OrderController@index');
