
@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')
<html>

    <head>
    	<title> User Login</title>
    </head>
    <body>
    	<div>
    		<form action = "dologin" method ="POST">
    			{{ csrf_field() }}
    			<!-- Begin Demo Table -->
        		<div class = "demo-table">
        			<div class="form-head">Login</div>
        			<!-- Begin Usrname -->
        			<div class="field-column">
        				<div>
        					<label for="username">Username</label><span id="user_info" class="error-info"></span>
        					
        				</div>
        				<div>
        					<input name="user_name" id="user_name" type="text" class="demo-input-box">
        				</div>
        			</div>
        			<!-- end Usrname -->
        			<div class="field-column">
        				<div>
        					<label for="password">Password</label><span id="password_info" class="error-info"></span>					
        				</div>
        				<div>
        					<input name="password" id="password" type="text" class="demo-input-box">
        				</div>
        			</div>
        		</div>
        		<!-- End Demo table -->
        		<div class="field-column">
        			<input type ="submit" class="btnlogin">
        		</div>
			</form>
    	</div>
    </body>
</html>
@endsection
