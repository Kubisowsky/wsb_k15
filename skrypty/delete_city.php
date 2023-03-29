<?php
require_once('connect.php');

$id = $_GET['id'];
//echo $id;

$sql = "DELETE FROM cities WHERE `cities`.`id` = $id";
echo $sql;
$conn->query($sql);
//echo $conn->affected_rows;
if($conn->affected_rows != 0){
    $deleteCity =  $id;
}else{
    $deleteCity =  0;
}

 header("Location: ../4_db/4_db.php?deleteCity=$deleteCity");

?>

