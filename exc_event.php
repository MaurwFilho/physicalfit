<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

if (!isset($_POST['id_event'])) {
	header('Location: calendario.php');
}

require_once("Sql.php");
$id = $_POST['id_event'];

$sql = new Sql();
$rs = $sql->query("DELETE FROM events WHERE id = $id;");

if ($rs) {
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento deletado com sucesso!</div>';
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: Evento não deletado com sucesso!</div>';
}

header('Location: calendario.php');


?>