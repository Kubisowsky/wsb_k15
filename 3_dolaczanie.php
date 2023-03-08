<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dołączenie plików</title>
</head>
<body>

<h4>Początek strony</h4>
<?php
//include, require_once, require, once
//require_once('skrypty/lista.php');
include('./skrypty/lista.php');
@include_once('./skrypty/lista1.php');

@require_once('./skrypty/lista.php');
require('./skrypty/lista1.php');

?>
<h4>Koniec strony</h4>

</body>
</html>