<!DOCTYPE html>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<html>
<body>
		<div class ="container">
		<div class ="row">
			<div class = "col-md-12 mt-4"> 
				<div class ="card">
				<div class ="card-header">
					<h4 class = "card-title"> Employee and dependant records </h4> 
					<span class="align-right">
					<a href="index.php" class="btn btn-success float-right" >Home</a>
					</span>
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
	   <th scope="col">Relation</th>
	<tbody>
	
	<?php 
	include "config.php"; 
	

	$sql = "SELECT * FROM employee e , dependent d  WHERE e.SSN = d.SSN"; 

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
		
		 <td><?php echo $row['Relation']; ?></td>
					
		</tr>
		 
		<?php  
		
	}
	}

	 else {

	echo "No results found";

	}
	
	?>
	
	</tbody>
    </tr>
  </thead>
</table>