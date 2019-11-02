<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

require_once("Sql.php");

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : null;
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$objetivo = isset($_POST['objetivo']) ? $_POST['objetivo'] : null;

$idprofessor = isset($_SESSION['id_professor']) ? $_SESSION['id_professor'] : null;

$sql = new Sql();

$result = $sql->select("CALL aluno_insert(:nome, :nascimento, :celular, :sexo, :endereco, :bairro, :cep, :objetivo, :idprofessor)", array(
	":nome"=>$nome,
	":nascimento"=>$nascimento,
	":celular"=>$celular,
	":sexo"=>$sexo,
	":endereco"=>$endereco,
	":bairro"=>$bairro,
	":cep"=>$cep,
	":objetivo"=>$objetivo,
	":idprofessor"=>$idprofessor
));

$_SESSION['id_aluno'] = $result[0]['professor_idprofessor'];

if ($result) {
	header('Location: avaliacaofisica.php');
} else {
	header('Location: novo_aluno.php?erro=1');
}

?>