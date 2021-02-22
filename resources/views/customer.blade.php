<html>

    <head>
    	<title> Add Customer</title>
    </head>
    <body>
    	<div>
    		<form action = "addCustomer" method ="POST">
    			{{ csrf_field() }}
    			<!-- Begin Demo Table -->
        		<div class = "demo-table">
        			<div class="form-head">Add Customer</div>
        			<!-- Begin Usrname -->
        			<div class="field-column">
        				<div>
        					<label for="firstname">First Name</label><span id="firstname_info" class="error-info"></span>
        					
        				</div>
        				<div>
        					<input name="firstname" id="firstname" type="text" class="demo-input-box">
        					
        				</div>
        			</div>
        			<!-- end Usrname -->
        			<div class="field-column">
        				<div>
        					<label for="lastname">Last Name</label><span id="lastname_info" class="error-info"></span>					
        				</div>
        				<div>
        					<input name="lastname" id="lastname" type="text" class="demo-input-box">
        					
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