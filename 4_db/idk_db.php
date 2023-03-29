<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzytkownicy</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
require_once('../skrypty/connect.php');

$sql = "SELECT firstname, lastname, city, state, birthday, YEAR(CURDATE()) as rok FROM users INNER JOIN cities on users.city_id = cities.id INNER JOIN states on cities.state_id = states.id ORDER BY users.id;";


$result = $conn->query($sql);


echo "<table>";
echo "<tr><th>Imie</th><th>Nazwisko</th><th>Miasto</th><th>Województwo</th><th>Data urodzenia</th><th>Rok</th></tr>";
while($user = $result->fetch_array()){
echo <<< USER
<tr>
    <td>$user[firstname]</td>
    <td>$user[lastname]</td>
    <td>$user[city]</td>
    <td>$user[state]</td>
    <td>$user[birthday]</td>
    <td>$user[rok]</td>
</tr>
USER;
}
echo "</table>";

?>
</body>
</html>