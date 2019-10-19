<?php 

// $senha = "123456";

// $a = md5($senha);

// if ($a == md5($senha)) {

// 	echo "Sucesso";
// } else {

// 	echo "Falhou";
// }

$senha = "qwerty";

$hash = base64_encode($senha);

echo ($hash);

echo "<br>";

$a = base64_decode($hash);

echo ($a);

 ?>