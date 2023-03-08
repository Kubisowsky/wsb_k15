<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzytkownicy</title>
</head>
<body>
<h4>Uzytkownicy z bazy danych</h4>
<?php
require_once('../skrypty/connect.php');
$sql = "SELECT * FROM `users`;";

$result = $conn->query($sql);
//$user = $result->fetch_assoc();
//print_r($user);

//echo "Imię i nazwisko: ".$user["firstname"]." ".$user["lastname"]."<br>";

while($user = $result->fetch_array()){
echo <<< USER
Imię i nazwisko: $user[firstname] $user[lastname] <br>
Data urodzenia: $user[birthday]<hr>
USER;
}

?>
</body>
</html>