<?php

require_once 'model/database.php';


$clave = '1';

echo $clave;
echo "<br><br>";

$claveEncriptada = Database::encryptor('encrypt',$clave);

echo $claveEncriptada;
echo "<br><br>";

$claveDesencriptada = Database::encryptor('decrypt',$claveEncriptada);

echo $claveDesencriptada;
echo "<br><br>";

