<?php 

require_once("Sql.php");

$idprofessor = $_SESSION['id_professor'];

$sql = new Sql();
$rs = $sql->select("SELECT * FROM events WHERE professor_idprofessor = $idprofessor;");

$eventos = [];

while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['id'];
	$title = $row['title'];
	$color = $row['color'];
	$start = $row['start'];
	$end = $row['end'];

	$eventos[] = [
		'id'=>$id,
		'title'=>$title,
		'color'=>$color,
		'start'=>$start,
		'end'=>$end
	];
}

return json_encode($eventos);

 ?>