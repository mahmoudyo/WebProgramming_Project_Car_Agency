<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div id = "container" align="center">
	<form method="GET" action="search.php">

		<label >Search_by_brand</label>
		<input type="Text" name="searched_car">
		<input type="submit" value="submit" name="submit" >


	</form>
	</div>
<?php
	include_once 'database.php';
	if(isset($_GET['submit']))
	{
		$res = $_GET['searched_car'];
	
?>
<table>
	<tr>
		<th>car_id</th>
		<th>car_brand</th>
		<th>model_name</th>
		<th>car_model</th>
		<th>car_status</th>
		<th>car_img</th>
		<th>car_color</th>
		<th>car_description</th>
		<th>price</th>
	</tr>
	<?php
		$sql = "SELECT * from cars where car_brand LIKE '%$res%'";
		$rows = $dbl->getRows($sql,[]);
		
		
		foreach($rows as $r) 
	{ 
	?>
	<tr>
	    <td><?php echo $r['car_id'];?></td>
		<td><?php echo $r['car_brand'];?></td>
		<td><?php echo $r['model_name'];?></td>
		<td><?php echo $r['car_model'];?></td>
		<td><?php echo $r['car_status'];?></td>
		<td><?php echo "<img src = images/".$r['car_img']." width='100px' height='100px'>";?></td>
		<td><?php echo $r['car_color'];?></td>
		<td><?php echo $r['car_description'];?></td>
		<td><?php echo $r['price'];?></td> 
	
	</tr>
	<?php 
	}
}
	?>
</table>
</body>
</html>