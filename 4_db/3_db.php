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

$sql = "SELECT users.id, firstname, lastname, city, state, birthday, YEAR(CURDATE()) as rok FROM users INNER JOIN cities on users.city_id = cities.id INNER JOIN states on cities.state_id = states.id ORDER BY users.id;";

//echo $sql;
$result = $conn->query($sql);


echo "<table>";
echo "<tr><th>Imie</th><th>Nazwisko</th><th>Miasto</th><th>Województwo</th><th>Data urodzenia</th><th>Rok</th><td></td></tr>";

if(!$result || mysqli_num_rows($result) == 0){
    echo '<tr><td colspan="7">Brak wyników</td></tr>';
}
else{
    while($user = $result->fetch_array()){
        echo <<< USER
        <tr>
            <td>$user[firstname]</td>
            <td>$user[lastname]</td>
            <td>$user[city]</td>
            <td>$user[state]</td>
            <td>$user[birthday]</td>
            <td>$user[rok]</td>
            <td><a href="../skrypty/delete_user.php?id=$user[id]">Usuń</a></td>
        </tr>
        USER;
        }
}

echo "</table>";
echo "<a href='4_db.php'>Miasto</a>";


if(isset($_GET['deleteUser']) != 0){
    echo "<hr>";
    echo "Usunięto użytkownika o id: $_GET[deleteUser]";
}
else{

}

?>
</body>
</html>