<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

require_once("Sql.php");
$idprofessor = $_SESSION['id_professor'];

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$id = $dados['id'];
$title = $dados['title'];
$color = $dados['color'];

$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dados['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$sql = new Sql();
$rs = $sql->query("UPDATE events SET title=:title, color=:color, start=:start, end=:end, professor_idprofessor=:idprofessor WHERE id=:id", array(
	":title"=>$title,
	":color"=>$color,
	":start"=>$data_start_conv,
	":end"=>$data_end_conv,
	":idprofessor"=>$idprofessor,
	":id"=>$id
));

if ($rs) {
	$retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>'];
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento editado com sucesso!</div>';
}else{
	$retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi editado com sucesso!</div>'];
}

header('Content-Type: application/json');
echo json_encode($retorna);

?>