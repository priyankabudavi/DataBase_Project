<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $SSN = $_POST['SSN'];
		
		$DOB = $_POST['DOB'];
		
		$firstname = $_POST['firstname'];
		
		$Minit = $_POST['Minit'];

        $lastname = $_POST['lastname'];
		
        $Address = $_POST['address'];
		
		$length = strlen($SSN);
		
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
		if(empty($firstname)){							//check if firstname is blank
			$ErrMsg = "Error! You didn't enter the FirstName.<br>";  
			echo $ErrMsg; 
			$flag = false;		
		}
		else if (!preg_match ("/^[a-zA-z]*$/", $firstname) ) {		//check if firstname has only alpha or space
			$msg_nonalpha = "ERROR! Only alphabets and white space allowed in FirstName <br>";
			echo $msg_nonalpha; 
			$flag = false;			
			
		}
		
		if($flag){		
		 
        $sql = "UPDATE employee SET Fname='$firstname',Lname='$lastname',Address='$Address',Minit='$Minit' ,DOB ='$DOB', SSN='$SSN' WHERE Lname='$lastname'"; 

        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Record updated successfully.";
			header('Location: view.php');

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }
		
		}
    } 

if (isset($_GET['SSN'])) {

    $SSN = $_GET['SSN']; 

    $sql = "SELECT * FROM `employee` WHERE `SSN`='$SSN'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $firstname = $row['Fname'];
			
			$Minit = $row['Minit'];

            $lastname = $row['Lname'];

            $Address = $row['Address'];

            $DOB  = $row['DOB'];
			
            $SSN= $row['SSN'];

        } 

    ?>

        <h2>Employee Update Form</h2>
		
		
<style type="text/css">

label {
  font-weight:bold;
}

</style>

        <form class = "container-sm"   action="update_new.php" method="post">

          <fieldset>

            <legend>Personal information:</legend>
			
			<label>SSN:</label> &nbsp;&nbsp;&nbsp;
			
			
            <input type="text" name="SSN" value="<?php echo $SSN; ?>">
			

            <br>
			
			
			<label>DOB:</label> &nbsp;&nbsp;&nbsp;

            <input type="date" name="DOB" value="<?php echo $DOB; ?>">

            <br>

            <label>First name:</label>  &nbsp;&nbsp;&nbsp;

            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
			
            <br>
			
			<label>Middle name:</label>  &nbsp;&nbsp;&nbsp;

            <input type="text" name="Minit" value="<?php echo $Minit; ?>">

            <br>

            <label>Last name:</label> &nbsp;&nbsp;&nbsp;

            <input type="text" name="lastname" value="<?php echo $lastname; ?>">

            <br>

		
            <label>Address:</label> &nbsp;&nbsp;&nbsp;


            <input type="text" name="address" value="<?php echo $Address; ?>">

            <br>
			
            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>