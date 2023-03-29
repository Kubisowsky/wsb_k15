<?php
session_start();

foreach($_POST as $key => $value){
    //echo "$key: $value<br>";
    if(empty($value)){
        $_SESSION["error"] = "Wypełnij wszystkie pola w formularzu!";
        //echo "$key<br>";
        echo "<script>history.back();</script>";
        exit();
    }
}
require_once('./connect.php');
$sql = "INSERT INTO `users`(`city_id`, `firstname`, `lastname`, `birthday`) VALUES ('$_POST[city_id]','$_POST[firstname]','$_POST[lastname]','$_POST[birthday]')";
echo $sql;
$conn->query($sql);

//echo $conn->affected_rows;
if($conn->affected_rows == 1){
    //echo "";
    $_SESSION["error"] = "Prawidłowo dodano rekord";
}
else{
    //echo "";
    $_SESSION["error"] = "Nie dodano rekordu";
}
header("Location: ../4_db/3_db.php?addUser=1");
//echo $sql;