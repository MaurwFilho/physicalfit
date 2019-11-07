<?php 

$conn = mysqli_connect("localhost", "root", "", "physicalfit");

if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
}

 ?>