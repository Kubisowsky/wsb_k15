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

$sql = "SELECT cities.id, state, city FROM cities INNER JOIN states on state_id = cities.id GROUP BY city ORDER BY id";
//echo $sql;
$result = $conn->query($sql);


echo "<table>";
echo "<tr><th>id</th><th>Wojewodztwo</th><th>Miasto</th><td></td></tr>";

if(!$result || mysqli_num_rows($result) == 0){
    echo '<tr><td colspan="7">Brak wyników</td></tr>';
}
else{
    while($cities = $result->fetch_array()){
        echo <<< cities
        <tr>
            <td>$cities[id]</td>
            <td>$cities[state]</td>
            <td>$cities[city]</td>
            <td><a href="../skrypty/delete_city.php?id=$cities[id]">Usuń</a></td>
        </tr>
        cities;
        }
}

echo "</table>";
echo "<a href='3_db.php'>Użytkownicy</a>";


if(isset($_GET['deleteCity']) != 0){
    echo "<hr>";
    echo "Usunięto miasto o id: $_GET[deleteCity]";
}
else{

}

?>
</body>
</html>