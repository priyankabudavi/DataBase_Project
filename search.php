<!DOCTYPE html>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<html>
<body>
		<div class ="container">
		<div class ="row">
			<div class = "col-md-12 mt-4"> 
				<div class ="card">
				<div class ="card-header">
					<h4 class = "card-title"> Search employee record with first name </h4> 
				</div> 
				<div class = "card-body"> 
				<form action =""  method="post"> 
				<div class ="row"> 
					<div class =" col-md-6"> 
						<div class = form-group>
							 
							<input type = "text"  name = "filter_value" class= "form-control" placeholder ="search" > 
							</div>
							</div> 
						<div class =" col-md-6"> 
						<button type = submit name = "filter_btn" class = "btn btn-primary"> Filter Data</button> 
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php" class="btn btn-primary float-right" >Home</a>
		</div>
			
		</div>
		</form> 
		</div>
		</div>
		
		</div>
		</div>
		</div>

		
		<table class="table">
  <thead>
   <tr>
      <th scope="col">SSN</th>
      <th scope="col">DOB</th>
      <th scope="col">Fname</th>
      <th scope="col">Minit</th>
	  <th scope="col">Lname</th>
	  <th scope="col">Address</th>
    </tr>
  
  </thead>
  <tbody>
  

		
	<?php 
	include "config.php"; 
	if(isset($_POST['filter_btn'])){

	$value_filter = $_POST['filter_value'];

	$sql = "SELECT * FROM Employee WHERE Fname LIKE '%$value_filter%'";

	$result =  $conn->query($sql);


	if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){
		
		?>
		
		<tr> 
		
        <td><?php echo $row['SSN']; ?></td>
					
		<td><?php echo $row['DOB']; ?></td>

        <td><?php echo $row['Fname']; ?></td>
					
		<td><?php echo $row['Minit']; ?></td>

        <td><?php echo $row['Lname']; ?></td>

        <td><?php echo $row['Address']; ?></td>
					
		</tr>
		 
		<?php  
		
	}
	}

	 else {

	echo "No results found";

	}
	}
	?>
	
  </tbody>
</table>


</body>	
</html>
