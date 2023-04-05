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

if(isset($_POST['regulamin'])){

$sql = "UPDATE `users` SET `city_id`='$_POST[city_id]',`firstname`='$_POST[firstname]',`lastname`='$_POST[lastname]',`birthday`='$_POST[birthday]' WHERE id = $_SESSION[userId]";
echo $sql;
$conn->query($sql);

if($conn->affected_rows == 1){
    //echo "";
    $_SESSION["error"] = "Prawidłowo zaktualizowano rekord";
}
else{
    //echo "";
    $_SESSION["error"] = "Nie zaktualizowano rekordu";
}

}
else{
    $_SESSION["error"] = "Nie zaznaczono regulaminu";
    echo "<script>history.back();</script>";
    exit();
}

//echo $conn->affected_rows;

header("Location: ../4_db/3_db.php?updateUser=1");
//echo $sql;
