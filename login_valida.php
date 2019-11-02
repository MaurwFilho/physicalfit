<?php 

session_start();

require_once("Sql.php");

$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";

$sql = new Sql();

$result = $sql->select("SELECT * FROM professor WHERE email = :email AND senha = :senha", array(
	":email"=>$email,
	":senha"=>$senha
));


if ($result) {

	$_SESSION['nome'] = $result[0]['nome'];
	$_SESSION['email'] = $result[0]['email'];
	$_SESSION['id_professor'] = $result[0]['idprofessor'];

	header('Location: calendario.php');
} else {
	header('Location: login.php?erro=1');
}


 ?>