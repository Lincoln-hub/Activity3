<html>

    <head>
    	<title> Add Order</title>
    </head>
    <body>
    	<div>
    		<form action = "addOrder" method ="POST">
    			{{ csrf_field() }}
    			<!-- Begin Demo Table -->
        		<div class = "demo-table">
        			<div class="form-head">Order Product</div>
        			<!-- Begin Product -->
        			<div class="field-column">
        				<div>
        					<label for="product">Product</label><span id="product_info" class="error-info"></span>
        					
        				</div>
        				<div>
        					<input name="product" id="product" type="text" class="demo-input-box">
        					
        				</div>
        			</div>
        			<!-- end product -->
        			<!-- Start Customer ID -->
        			<div class="field-column">
        				<div>
        					<label for="customerID">Customer ID</label><span id="customerid_info" class="error-info"></span>					
        				</div>
        				<div>
        					<input name="customerID" id="customerID" type="text" value="{{ Session::get('nextID') }}" class="demo-input-box">
        					
        				</div>
        				
        				<div>
        					<input name="firstname" id="firstname" type="text" value="{{ Session::get('firstname') }}"class="demo-input-box">
        					
        				</div>
        				<div>
        					<input name="lastname" id="lastname" type="text" value="{{ Session::get('lastname') }}"class="demo-input-box">
        					
        				</div>
        			</div>
        			<!-- End Customer ID -->
        		</div>
        		<!-- End Demo table -->
        		<div class="field-column">
        			<input type ="submit" class="btnlogin">
        		</div>
			</form>
    	</div>
    </body>
</html>