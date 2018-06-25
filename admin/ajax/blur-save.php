<?php
	
	// Database Connection:
	include('../../config/connection.php');
	
	// Turn off those pesky Index notices.
	error_reporting(E_ALL & ~E_NOTICE); 
	
	// Breakup the POST values into easy variables:
	$id = $_GET['id']; // Unique identifier for the record we wish to UPDATE
	$value = $_GET['value']; // New Value
	$action = $_GET['action']; // 
	
	# Break up database info:
	$dbc = explode('-', $_GET['db']); // Explode the table and feild name from string.
	$table = $dbc[0]; // Store the table name.
	$field = $dbc[1]; // Store the field name.



	if($action == 'save') {
	
		# Run a query to get the current value of the field:
		$q = "SELECT $field FROM $table WHERE id = '$id'";
		$r = mysqli_query($db,$q);
		
		// Store the result:
		$check = mysqli_fetch_assoc($r);
      	
		# Check the new value with the current value:
		if($check[$field] != $value) {
        
	        # Make the update:
	        $q = "UPDATE $table SET $field = '$value' WHERE id = '$id'";
	        $r = mysqli_query($db,$q);

			# If there is a result
	        if($r){
	        	
				// Send successful update status back:
	        	echo 1;
				
			}else{
				
				// Error Handling:
				echo mysqli_error($db).'<br>'.$q;
				
			}        
        
      	}else{
        
			// Send no update status back:
        	echo 3;
        
      	} // END if $check

	} // END if $action

?>
