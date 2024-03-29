<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

unset($_SESSION['id_aluno']);

require_once("conexao.php");

$nome_professor = $_SESSION['nome'];

$data = date('Y/m/d',mktime(0,0,0,date('m') - 3,date('d'),date('Y')));
$data = str_replace('/', '-', '"'.$data.'"');

$sql = "SELECT * FROM avaliacao WHERE data_avaliacao = $data;";
$rs = mysqli_query($conn, $sql);

if (mysqli_num_rows($rs) > 1) {
	while($row = mysqli_fetch_array($rs)){
		$idaluno = $row['aluno_idaluno'];
		$query = "SELECT * FROM aluno WHERE idaluno = $idaluno;";
		$result = mysqli_query($conn, $query);
		while($row_aluno = mysqli_fetch_array($result)){
			$nome_aluno[] = $row_aluno['nome'];
		}
	}

	$_SESSION['msg'] = '<div class="alert" id="msg" role="alert">Os alunos abaixo precisam de uma nova avaliação!
	<br>';
	foreach ($nome_aluno as $nome){
		$_SESSION['msg'] .= ' - '.$nome.'<br>';
	}
	$_SESSION['msg'] .= '</div>';

} elseif(mysqli_num_rows($rs) == 1) {
	while($row = mysqli_fetch_array($rs)){
		$idaluno = $row['aluno_idaluno'];
	}
	$rs = mysqli_query($conn, "SELECT * FROM aluno WHERE idaluno = $idaluno;");
	while($row = mysqli_fetch_array($rs)){
		$nome = $row['nome'];
	}

	$_SESSION['msg'] = '<div class="alert" id="msg" role="alert">O aluno '.$nome.' precisa de uma nova avaliação!</div>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Início</title>
	<link rel="stylesheet" type="text/css" href="css/stylecalendario.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>

	<link href='packages/core/main.min.css' rel='stylesheet' />
	<link href='packages/daygrid/main.min.css' rel='stylesheet' />
	<link href='packages/timegrid/main.css' rel='stylesheet' />
	<link href='packages/list/main.css' rel='stylesheet' />

	<script src='packages/core/main.min.js'></script>
	<script src='packages/interaction/main.min.js'></script>
	<script src='packages/daygrid/main.min.js'></script>
	<script src='packages/timegrid/main.js'></script>
	<script src='packages/list/main.js'></script>
	<script src='packages/core/locales/pt-br.js'></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var calendar = new FullCalendar.Calendar(calendarEl, {
				locale: 'pt-br',
				plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
				header: {
					left: 'prevYear,prev,next,nextYear today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
				},
				editable: true,
				eventLimit: true,
				events: [
				<?php 
				$idprofessor = $_SESSION['id_professor'];
				$sql = "SELECT * FROM events WHERE professor_idprofessor = $idprofessor;";
				$rs = mysqli_query($conn, $sql);
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
				],
				extraParams: function () {
					return {
						cachebuster: new Date().valueOf()
					};
				},
				eventClick: function(info) {
					info.jsEvent.preventDefault();

					$('#visualizar #id').text(info.event.id);
					$('#visualizar #id').val(info.event.id);

					$('#visualizar #id_event').val(info.event.id);

					$('#visualizar #title').text(info.event.title);
					$('#visualizar #title').val(info.event.title);
					$('#visualizar #start').text(info.event.start.toLocaleString());
					$('#visualizar #start').val(info.event.start.toLocaleString());
					$('#visualizar #end').text(info.event.end.toLocaleString());
					$('#visualizar #end').val(info.event.end.toLocaleString());
					$('#visualizar #color').val(info.event.backgroundColor);
					$('#visualizar').modal('show');

				},
				selectable: true,
				select: function (info) {
					$('#cadastrar #start').val(info.start.toLocaleString());
					$('#cadastrar #end').val(info.end.toLocaleString());
					$('#cadastrar').modal('show');
				}

			});

			calendar.render();
		});
	</script>

	<script>
		function DataHora(evento, objeto){
			var keypress=(window.event)?event.keyCode:evento.which;
			campo = eval (objeto);
			if (campo.value == '00/00/0000 00:00:00')
			{
				campo.value=""
			}

			caracteres = '0123456789';
			separacao1 = '/';
			separacao2 = ' ';
			separacao3 = ':';
			conjunto1 = 2;
			conjunto2 = 5;
			conjunto3 = 10;
			conjunto4 = 13;
			conjunto5 = 16;
			if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
			{
				if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
				else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
				else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
				else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
				else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
			}
			else
				event.returnValue = false;
		}
	</script>

	<script>
		$(document).ready(function () {
			$("#addevent").on("submit", function (event) {
				event.preventDefault();
				$.ajax({
					method: "POST",
					url: "cad_event.php",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(retorna){
						if (retorna['sit']) {
							$("#msg-cad").html(retorna['msg']);
							location.reload();
						} else {
							$("#msg-cad").html(retorna['msg']);
						}
					}
				});
			});

			$('.btn-canc-vis').on("click", function() {
				$('.visevent').slideToggle();
				$('.formedit').slideToggle();
			});

			$('.btn-canc-edit').on("click", function() {
				$('.formedit').slideToggle();
				$('.visevent').slideToggle();
			});

			$("#editevent").on("submit", function (event) {
				event.preventDefault();
				$.ajax({
					method: "POST",
					url: "edit_event.php",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(retorna){
						if (retorna['sit']) {
							// $("#msg-cad").html(retorna['msg']);
							location.reload();
						} else {
							$("#msg-edit").html(retorna['msg']);
						}
					}
				});
			});

		});
	</script>

</head>
<body>
	<header>
		<h1 id="physicalfit">PhysicalFit</h1>
	</header>

	<div class="row">

		<div class="col-md-9">
			<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			} ?>
			<div id='calendar'></div>
		</div>

		<div class="col-md-3">
			<div class="float-right">
				<!-- <div class="circle">
					<img src="" alt="Imagem">
				</div> -->
				<div style="margin-top: 50px;">
					<label id="nome"><?= $nome_professor?></label>
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
					<!-- <a class="btn btn-default btn-sm" href="ajuda.php">Ajuda</a> -->
				</div>
			</div>
		</div>

	</div>

	<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="exc_event.php">
						<div class="visevent">
							<dl class="row">
								<dt class="col-sm-3">ID do evento</dt>
								<dd class="col-sm-9" id="id"></dd>
								<input type="hidden" name="id_event" id="id_event">

								<dt class="col-sm-3">Título do evento</dt>
								<dd class="col-sm-9" id="title"></dd>

								<dt class="col-sm-3">Início do evento</dt>
								<dd class="col-sm-9" id="start"></dd>

								<dt class="col-sm-3">Fim do evento</dt>
								<dd class="col-sm-9" id="end"></dd>
							</dl>
							<button type="button" class="btn btn-warning btn-canc-vis">Editar</button>
							<input type="submit" name="excluir" class="btn btn-danger" value="Excluir" onclick="return confirm('Quer mesmo excluir este evento?')">
						</div>
					</form>
					<div class="formedit">
						<span id="msg-edit"></span>
						<form id="editevent" method="POST">
							<input type="hidden" name="id" id="id">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Título</label>
								<div class="col-sm-10">
									<input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Cor</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>
										<option style="color:#FFD700" value="#FFD700">Amarelo</option>
										<option style="color:#0071c5" value="#0071c5">Azul Turquesa</option>
										<option style="color:#FF4500" value="#FF4500">Laranja</option>
										<option style="color:#8B4513" value="#8B4513">Marrom</option>
										<option style="color:#436EEE" value="#436EEE">Azul Royal</option>
										<option style="color:#A020F0" value="#A020F0">Roxo</option>
										<option style="color:#40E0D0" value="#40E0D0">Turquesa</option>
										<option style="color:#228B22" value="#228B22">Verde</option>
										<option style="color:#8B0000" value="#8B0000">Vermelho</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Início do evento</label>
								<div class="col-sm-10">
									<input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Final do evento</label>
								<div class="col-sm-10">
									<input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
									<button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="msg-cad"></span>
					<form id="addevent" method="POST">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Título</label>
							<div class="col-sm-10">
								<input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Cor</label>
							<div class="col-sm-10">
								<select name="color" class="form-control" id="color">
									<option value="">Selecione</option>
									<option style="color:#FFD700" value="#FFD700">Amarelo</option>
									<option style="color:#0071c5" value="#0071c5">Azul Turquesa</option>
									<option style="color:#FF4500" value="#FF4500">Laranja</option>
									<option style="color:#8B4513" value="#8B4513">Marrom</option>
									<option style="color:#436EEE" value="#436EEE">Azul Royal</option>
									<option style="color:#A020F0" value="#A020F0">Roxo</option>
									<option style="color:#40E0D0" value="#40E0D0">Turquesa</option>
									<option style="color:#228B22" value="#228B22">Verde</option>
									<option style="color:#8B0000" value="#8B0000">Vermelho</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Início do evento</label>
							<div class="col-sm-10">
								<input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Final do evento</label>
							<div class="col-sm-10">
								<input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>