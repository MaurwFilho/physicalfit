<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";


 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<title>Início</title>
	<link rel="stylesheet" type="text/css" href="css/stylecalendario.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>

	<link href='packages/core/main.css' rel='stylesheet' />
	<link href='packages/daygrid/main.css' rel='stylesheet' />
	<link href='packages/timegrid/main.css' rel='stylesheet' />

	<script src='packages/core/main.js'></script>
	<script src='packages/interaction/main.js'></script>
	<script src='packages/daygrid/main.js'></script>
	<script src='packages/timegrid/main.js'></script>

	<script>

		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var calendar = new FullCalendar.Calendar(calendarEl, {
				plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				defaultDate: '2019-10-01',
	      navLinks: true, // can click day/week names to navigate views
	      selectable: true,
	      selectMirror: true,
	      select: function(arg) {
	      	var title = prompt('Evento:');
	      	if (title) {
	      		calendar.addEvent({
	      			title: title,
	      			start: arg.start,
	      			end: arg.end,
	      			allDay: arg.allDay
	      		})
	      	}
	      	calendar.unselect()
	      },
	      editable: true,
	      eventLimit: true, // allow "more" link when too many events
	      events: [

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
				<div class="circle">
					<!-- <img src="img/logoo.jpg" alt="Imagem"> -->
				</div>
				<div>
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
					<a class="btn btn-default btn-sm" href="#">Ajuda</a>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>