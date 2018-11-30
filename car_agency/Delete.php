<?php
    include_once('database.php');
    $dbl->myExec("use garage;");
    $sql = "delete from cars where car_id=".$_GET['car_id'].";";
    $dbl->deleteRow($sql,array());
    header("location:cars.php");

?>