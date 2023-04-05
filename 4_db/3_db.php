<?php
session_start();
?>
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
    if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    require_once('../skrypty/connect.php');

    $sql = "SELECT users.id, firstname, lastname, city, state, birthday, YEAR(CURDATE()) as rok FROM users INNER JOIN cities on users.city_id = cities.id INNER JOIN states on cities.state_id = states.id ORDER BY users.id;";
    $sql2 = 'SELECT id, city FROM cities';
    //echo $sql;
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);

    echo "<table>";
    echo "<tr><th>Imie</th><th>Nazwisko</th><th>Miasto</th><th>Województwo</th><th>Data urodzenia</th><th>Rok</th><td></td></tr>";

    if (!$result || mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="7">Brak wyników</td></tr>';
    } else {
        while ($user = $result->fetch_array()) {
            echo <<<USER
        <tr>
            <td>$user[firstname]</td>
            <td>$user[lastname]</td>
            <td>$user[city]</td>
            <td>$user[state]</td>
            <td>$user[birthday]</td>
            <td>$user[rok]</td>
            <td><a href="../skrypty/delete_user.php?id=$user[id]">Usuń</a></td>
            <td><a href="./3_db.php?updateUserId=$user[id]">Edytuj</a></td>
        </tr>
        USER;
        }
    }

    echo "</table>";
    echo "<a href='4_db.php'>Miasto</a>";


    if (isset($_GET['deleteUser']) != 0) {
        echo "<hr>";
        echo "Usunięto użytkownika o id: $_GET[deleteUser]";
    } else {

    }
    //zapamietac autofocus na form
    if (isset($_GET["addUserForm"])) {
        echo <<<ADDUSERFORM
        <hr><h4>Dodwawanie użytkownika</h4>
    
        <form action="../skrypty/add_user.php" method="post">
            <label for="firstname">Imie</label><br>
            <input type="text" name="firstname" autofocus><br>
            <label for="lastname">Nazwisko</label><br>
            <input type="text" name="lastname" id="lastname"><br>
            <label for="birthday">Data urodzenia</label><br>
            <input type="date" name="birthday" id="birthdate"><br>
            <label for="city_id">Miasto</label><br>
            <select id="city_id" name="city_id">
    ADDUSERFORM;

        while ($row = mysqli_fetch_array($result2)) {
            echo "<option value=$row[id]>$row[city]</option>";
        }


        echo <<<ADDUSERFORM
        </select><br>
        <input type="checkbox" id="regulamin" name="regulamin" value="tak">
        <label for="regulamin"> Regulamin</label><br><br>
        <input type="submit" value="Dodaj użytkownika">
    </form>
    
    ADDUSERFORM;
    } else {
        echo '<br><a href="./3_db.php?addUserForm=1">Dodaj użytkownika</a>';
    }

    if (isset($_GET["updateUserId"])) {
        $sql3 = "SELECT users.id, city_id, firstname, lastname, city, state, birthday, YEAR(CURDATE()) as rok FROM users INNER JOIN cities on users.city_id = cities.id INNER JOIN states on cities.state_id = states.id  WHERE users.id = $_GET[updateUserId] ORDER BY users.id;";
        $result3 = mysqli_query($conn, $sql3);
        //echo $sql3;
        while ($user = mysqli_fetch_array($result3)) {
            $userCityId = $user['city_id'];
            $_SESSION['userId'] = $_GET['updateUserId'];
            echo <<<UPDATEUSERFORM
            <hr><h4>Aktualizacja użytkownika o id: $_GET[updateUserId]</h4>
            
            <form action="../skrypty/update_user.php" method="post">
                <label for="firstname">Imie</label><br>
                <input type="text" name="firstname" value=$user[firstname] autofocus><br>
                <label for="lastname">Nazwisko</label><br>
                <input type="text" name="lastname" id="lastname" value=$user[lastname] ><br>
                <label for="birthday">Data urodzenia</label><br>
                <input type="date" name="birthday" id="birthday" value=$user[birthday] ><br>
                <label for="city_id">Miasto</label><br>
                <select id="city_id" name="city_id">
            UPDATEUSERFORM;
        }
        while ($row = mysqli_fetch_array($result2)) {
            if ($row['id'] == $userCityId) {
                echo "<option selected value=$row[id]>$row[city]</option>";
            } else {
                echo "<option value=$row[id]>$row[city]</option>";
            }
        }


        echo <<<UPDATEUSERFORM
        </select><br>
        <input type="checkbox" id="regulamin" name="regulamin" value="tak">
        <label for="regulamin"> Regulamin</label><br><br>
        <input type="submit" value="Update użytkownik">
    </form>
    
    UPDATEUSERFORM;
        //dokonczyc update
    }
    unset($_SESSION["userId"]);
    $conn->close();
    ?>
    <br>



</body>

</html>