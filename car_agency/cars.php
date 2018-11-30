
<?php
include_once 'database.php';
//////////////////////////////////////////////////////////////create database 

function create_DB($name){
    $db = new PDO("mysql:host=".HOST,USER,PASS);
    $sql = "CREATE DATABASE IF NOT EXISTS $name";
    $db->exec($sql);
    }
    create_DB('garage');

////////////////////////////////////////////////////////create table of cars
    $db = new PDO("mysql:host=".HOST,USER,PASS);
$use_db = "use garage";
$db->exec($use_db);
$sql = "CREATE TABLE IF NOT EXISTS cars(
car_id int(11) not null auto_increment primary key,
car_brand varchar(20) not null,
model_name varchar(40) not null,
car_model int(11) not null,
car_status varchar(20) not null,
car_img varchar(250) not null,
car_color varchar(40) not null,
car_description varchar(250) not null,
price decimal(6,2) not null)";
$db->exec($sql);


/////////////////////////////////////////////////////insert the data of cars

$insert_data = "INSERT INTO cars(car_id,car_brand,model_name,car_model,car_status,car_img,car_color,car_description,price) VALUES
(1,'Chevrolet','lanos',2018,'new','1.jpg','black','Some random description',168000),
(2,'Chevrolet','optra',2018,'new','2.jpg','red','Some random description',240000),
(3,'Chevrolet','aveo',2015,'new','3.jpg','white','Some random description',211000),
(4,'Audi','A6',2017,'new','4.jpg','red','Some random description',1300000),
(5,'Renault','logan',2018,'new','5.jpg','brown','Some random description',190000),
(6,'Renault','Duster',2016,'new','6.jpg','brown','Some random description',340000),
(7,'Skoda','octavia',2018,'new','7.jpg','silver','Some random description',450000),
(8,'Skoda','rapid',2017,'new','8.jpg','gray','Some random description',430000),
(9,'Hyundai','verna',2017,'new','9.jpg','black','Some random description',195000),
(10,'peugeot','301',2016,'new','10.jpg','black','Some random description',270000),
(11,'BMW','x3',2013,'used','11.jpg','blue','Some random description',620000),
(12,'Nissan','sunny',2015,'used','12.jpg','golden','Some random description',155000),
(13,'Mistubishi','lancer',2016,'used','13.jpg','dark-blue','Some random description',250000),
(14,'Mercedes','E200',2015,'used','14.jpg','white','Some random description',550000),
(15,'Toyota','corella',2008,'used','15.jpg','white','Some random description',80000);";
$db->exec($insert_data);

///////////////////////////////////////////////////



function choose()
{
    global $dbl;
    $arr=$dbl->getRows("select * from cars",[]);
    return $arr;
}

$cars = choose();





?>


<!DOCTYPE html>
<html >
<head>
  
<title>ABC Car Agency</title>
<meta charset="utf-8">
<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
<!-- Contact Form -->
<link href="contact-form/css/style.css" media="screen" rel="stylesheet" type="text/css">
<!-- JS Files -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="js/jquery.tools.min.js"></script>
<script>
$(function () {
    $("#prod_nav ul").tabs("#panes > div", {
        effect: 'fade',
        fadeOutSpeed: 400
    });
});
</script>
<script>
$(document).ready(function () {
    $(".pane-list li").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });
});
</script>
</head>

<body >
  <ol id="menu">
  <li class="active_menu_item"><a href="#" style="color:#FFF">Home</a></li>
  
  <li><a href="search.php">Search</a> </li>
  
  <li><a href="admin.php">Admin</a></li>

  <li><a href="add.php">Add cars</a></li>
  
</ol>

<div id="container">
  <div id="site_title"><a href="#"><img src="images/logo.png" alt="" width="50px" height="55px"></a></div>
  <!-- tab panes -->
  <div id="prod_wrapper">
    <div id="panes">
      <div style="display: block;"> <img src="images/1.jpg" alt="">
        <h2>Chevorlet </h2>
        <h2>lanos</h2>
        <h2>168000 L.E.</h2>
        <p style="text-align:right; margin-right: 16px"><a href="info.php" class="button">More Info</a> <a href="#" class="button">Buy Now</a></p>
      </div>
      <?php
        foreach($cars as $car) {
      ?>
        <div> <img src=<?php echo "images/".$car['car_img']?> alt="" width='600px' height='500px'>
            <h2><?php echo $car['car_brand']?></h2>
            <h2><?php echo $car['model_name']?></h2>
            <h2><?php echo $car['price']."L.E.";?></h2>
            </div>
    <?php
    }
    ?>
     
    </div>
    <!-- END tab panes -->
    <br clear="all">
    <!-- navigator -->
    <div id="prod_nav" style="">
      <ul>
    <?php
        foreach($cars as $car) {
        ?>
        <li style="margin-top:100px;"><a href="#" class=""><img src=<?php echo "images/".$car['car_img']?> alt="" width="160"><strong><?php echo $car['car_brand']."<br>".$car['model_name']."<br>".$car['price']."LE";?></strong></a></li>
        <?php
    }
    ?>
     
      </ul>
    </div>
    <!-- END navigator -->
  
  </div>
  <!-- END prod wrapper -->
  <div style="clear:both"></div>
  
    </form>
  </div>
  <div style="clear:both; height: 40px"></div>
</div>
</body>
</html>