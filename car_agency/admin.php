<?php
include('database.php');
if(isset($_GET['id']))
{
  $id = intval($_GET['id']);
  if(isset($_SESSION['garage'][$id]))
  {
        $_SESSION['grage'][$id]['qty']++;
  }
  else
  {
   $q = "SELECT * FROM cars WHERE prod_id=$id";
   $row=$db->getRow($q, array());
   $_SESSION['garage'][$id] = array('qty' => 1, 'price' => $row['price']);
  }
}
?>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body>
<h1 color='#FFFF'>
cars list:
</h1>
<table>
<tr>
<th>car_id</th>
<th>car_brand</th>
<th>car_model</th>
<th>car_status</th>
<th>car_img</th>
<th>car_color</th>
<th>car_description</th>
<th>price</th>
</tr>
<?php
$sql = "SELECT * FROM cars ORDER BY car_id";
$rows = $dbl->getRows($sql,array());
foreach($rows as $row)
{     ?>
<tr>
<td><?php echo $row['car_id']?></td>
<td><?php echo$row['car_brand']?></td>
<td><?php echo$row['car_model']?></td>
<td><?php echo$row['car_status']?></td>
<td><?php echo"<img src = 'images/".$row['car_img']."' width=100px height=100px>"?></td>
<td><?php echo$row['car_color']?></td>
<td><?php echo$row['car_description']?></td>
<td><?php echo$row['price']?></td>
<td><a href="delete.php?car_id=<?php echo $row['car_id']?>">Delete</a></td>
<td><a href="edit.php?car_id=<?php echo $row['car_id']?>">Edit</a></td>

</tr>
<?php
}
?>
</table>
</body
</html>