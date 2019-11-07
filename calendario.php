<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

require_once("conexao.php");

$idprofessor = $_SESSION['id_professor'];
$sql = "SELECT * FROM events WHERE professor_idprofessor = $idprofessor;";
$rs = mysqli_query($conn, $sql);

$nome = $_SESSION['nome'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<title>Início</title>
	<link rel="stylesheet" type="text/css" href="css/stylecalendario.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>

	<link href='packages/core/main.min.css' rel='stylesheet' />
	<link href='packages/daygrid/main.min.css' rel='stylesheet' />

	<script src='packages/core/main.min.js'></script>
	<script src='packages/interaction/main.min.js'></script>
	<script src='packages/daygrid/main.min.js'></script>
	<script src='packages/core/locales/pt-br.js'></script>
	
	<script>

		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var calendar = new FullCalendar.Calendar(calendarEl, {
				locale: 'pt-br',
				plugins: [ 'interaction', 'dayGrid' ],
				editable: true,
      			eventLimit: true,
      			events: [
      				<?php 
      					while($row = mysqli_fetch_array($rs)) {
      						?>
      						{
      						id: '<?php echo $row['id'] ?>',
      						title: '<?php echo $row['title'] ?>',
      						color: '<?php echo $row['color'] ?>',
      						start: '<?php echo $row['start'] ?>',
      						end: '<?php echo $row['end'] ?>',
      						},<?php
      					}
      				 ?>
      			]
 			});

			calendar.render();
		});

	</script>

</head>
<body>
	<header>
		<h1 id="physicalfit">PhysicalFit</h1>
	</header>

	<div class="row">
		<div class="col-md-9">
			<div id='calendar'></div>
		</div>
		<div class="col-md-3">
			<div class="float-right">
				<!-- <div class="circle">
					<img src="img/logoo.jpg" alt="Imagem">
				</div> -->
				<div style="margin-top: 50px;">
					<label id="nome"><?= $nome?></label>
				</div>
				<div>
					<a id="bt" class="btn btn-dark btn-sm" href="novo_aluno.php">Novo Aluno</a>
				</div>
				<div>
					<a id="bt" class="btn btn-dark btn-sm" href="gerenciaralunos.php">Gerenciar Alunos</a>
				</div>
				<div>
					<a id="bt" class="btn btn-dark btn-sm" href="sair.php">Sair</a>
				</div>
				<div id="sair">
					<a class="btn btn-default btn-sm" href="ajuda.php">Ajuda</a>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>