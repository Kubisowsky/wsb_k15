<?php
require_once('connect.php');

$id = $_GET['id'];
//echo $id;

$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
$conn->query($sql);
//echo $conn->affected_rows;
if($conn->affected_rows != 0){
    $deleteUser =  $id;
}else{
    $deleteUser =  0;
}

header("Location: ../4_db/3_db.php?deleteUser=$deleteUser");

?>

