<?php
session_start();
include('database.php');
 if(isset($_GET['car_id']))
 {
  $id = $_GET['car_id'];
  $sql = "SELECT * FROM cars WHERE car_id = $id";
  $car = $dbl->getRow($sql,[]);
  
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
  <title>Search</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<style type="text/css">
		
	</style>
</head>
<body>

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
  
    <tr>
      <td><input type="text" size="1px" value = "<?php echo $car['car_id'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['car_brand'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['model_name'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['car_model'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['car_status'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['car_img'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['car_color'];?>"</td>
      <td><input type="text" size="15px" value = "<?php echo $car['car_description'];?>"</td>
      <td><input type="text" size="5px" value = "<?php echo $car['price'];?>"</td>
      <td><input type="submit" value = "Edit" action="add.php"></td>
  	</tr>
     
     </div>
   </div>
</body>
</html>
