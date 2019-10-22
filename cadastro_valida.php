<?php 

require_once("Sql.php");

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

$sql = new Sql();

$result = $sql->select("CALL professor_insert(:nome, :email, :senha)", array(
	":nome"=>$nome,
	":email"=>$email,
	":senha"=>$senha
));

if ($result) {
	header('Location: cadastro.php?register=1');
	
} else {
	header('Location: cadastro.php?register=2');

}



 ?>