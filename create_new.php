<?php 

include "config.php";

  if (isset($_POST['submit'])) {
  
	$SSN = $_POST['SSN'];
	
	$DOB = $_POST['DOB'];

    $firstname = $_POST['firstname'];
	
	$middlename = $_POST['middlename'];
	
    $lastname = $_POST['lastname'];
	
	$Address = $_POST['Address'];
	$length = strlen ($SSN); 

	
	$flag = true; // set flag as true by default, if any error set it as false
 

		if(empty($SSN)){ //check if SSN is blank
			$ErrMsg = "Error! You didn't enter the SSN. <br>";  
			echo $ErrMsg;
			$flag = false;					
		} 
		else if ( $length < 9 or $length > 9) {   	//check if SSN is 9 digits
			$ErrMsg = "ERROR! SSN should be strictly 9 digits <br>";  
			echo $ErrMsg;
			$flag = false;					
		} 
		else if (!preg_match ("/^[0-9]*$/", $SSN) ){  	//check if SSN is only numeric 
			$ErrMsg = "ERROR! Only numeric value is allowed for SSN.<br>";  
			echo $ErrMsg;  
		}
		if(empty($firstname)){							//check if SSN is blank
			$ErrMsg = "Error! You didn't enter the FirstName.<br>";  
			echo $ErrMsg; 
			$flag = false;		
		}
		else if (!preg_match ("/^[a-zA-z]*$/", $firstname) ) {		//check if firstname has only alpha or space
			$msg_nonalpha = "ERROR! Only alphabets and white space allowed in FirstName <br>";
			echo $msg_nonalpha; 
			$flag = false;			
			
		}
		
		if($flag){//Insert only when flag is true i.e when there is no error
			
			if(!empty($SSN)){
				
						
				$myquery = "select * from employee where SSN = '$SSN'" ;
				$myquery_result = $conn->query($myquery);
				
					if($myquery_result ->num_rows > 0)
						
					{
						echo "Employee Record Exists.Please enter a new record with different SSN";	
						
						
					}
					
					else {
						$sql = "INSERT INTO employee (SSN, DOB, Fname, Minit, Lname, Address) VALUES ('$SSN', '$DOB','$firstname', '$middlename', '$lastname', '$Address')";

						$result = $conn->query($sql);

						if ($result == TRUE) {

							echo "New record created successfully.";

						}else{

							echo "Error:". $sql . "<br>". $conn->error;

			}
		}
			}
		$conn->close();
		
  }
  }
?>

<!DOCTYPE html>

<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

<h2 style="text-align: center;" > Create an Employee </h2>

<span class="align-right">
        <a href="index.php" class="btn btn-success float-right" >Home</a>
	</span>

<form class = "container-sm"  action="" method="POST">

  <fieldset>

    <legend>Add an Employee information:</legend>
	

	<br><br>
	
	
	<label class="form-label"> SSN </label>
    <input class="form-control" type="text" name="SSN">

    <br>
	
	<label class="form-label"> DOB </label>
    <input class="form-control" type="date" name="DOB">

    <br>

	
	<label class="form-label">First name </label>
    <input class="form-control" type="text" name="firstname">

    <br>
	    
	<label class="form-label"> Middle Name </label>
	<input class="form-control" type="text" name="middlename">

    <br>

	<label class="form-label"> Last name </label>
    <input class="form-control" type="text" name="lastname">

    <br>

	
	<label class="form-label"> Address </label>
    <input class="form-control" type="text" name="Address">

    <br>

    <br><br>

    <input class="form-control" type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>