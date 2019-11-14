<?php 

session_start();

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
	$_SESSION['nome'] = $result[0]['nome'];
	$_SESSION['email'] = $result[0]['email'];
	$_SESSION['id_professor'] = $result[0]['idprofessor'];

	header('Location: calendario.php');
} else {
	header('Location: cadastro.php?register=2');

}



 ?>