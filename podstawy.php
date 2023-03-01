<?php
$firstName = "Janusz";
$lastName = "Nowak";
echo "Imie i naziwsko: $firstName $lastName <br>";
echo 'Imie i naziwsko: $firstName $lastName <br>';

//heardoc
echo <<< DATA
<hr>
Imię: $firstName<br>
Naziwsko: $lastName
<hr>
DATA;

$data = <<< DATA
<hr>
Imię: $firstName<br>
Naziwsko: $lastName
<hr>
DATA;

echo $data;

$data1 = <<< 'DATA1'
<hr>
Imię: $firstName<br>
Naziwsko: $lastName
<hr>
DATA1;

echo $data1;

$bin = 0b1010;
echo $bin;
echo "<br>";

$oct = 0101;
echo $oct;
echo "<br>";

$hex = 0x1A;
echo $hex;
echo "<br>";

echo PHP_VERSION;
echo "<br>";

$x=1;
$y=1.0;
echo gettype($x);
echo "<br>";

echo gettype($y);
echo "<br>";

if($x==$y){
    echo "Równe<br>";
}else{
    echo "Rózne<br>";
}

if($x===$y){
    echo "Identico<br>";
}else{
    echo "Nie Identico<br>";
}

?>
