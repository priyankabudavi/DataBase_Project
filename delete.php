<?php 

include "config.php"; 

if (isset($_GET['SSN'])) {

    $SSN = $_GET['SSN'];
	
	$my_query = "Delete from dependent where `SSN`='$SSN'";
	$result1 = $conn->query($my_query);

    $sql = "DELETE FROM `employee` WHERE `SSN`='$SSN'";

    $result2 = $conn->query($sql);

     if ($result1 == TRUE and $result2 == TRUE) {

        echo "Record deleted successfully.";
		header('Location: view.php');
		

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }	

} 

?>