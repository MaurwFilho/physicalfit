<?php 

$register = isset($_GET['register']) ? $_GET['register'] : 0;


 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>PhysicalFit</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylecadastro.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>

	<div id="in">
		<a class="btn btn-default btn-sm" href="index.php">Início</a>
	</div>

	<form method="post" action="registra_professor.php" id="formulario">
		<div class="container">
			<label id="lb">PhysicalFit</label>
			<div>
				<input type="text" name="nome" id="nome" placeholder="  Nome" autofocus required>	
			</div>
			<div>
				<input type="email" name="email" id="email" placeholder="  E-mail" required>
			</div>
			<div>
				<input type="password" name="senha" id="senha" placeholder="  Senha" required>
			</div>
			<div class="form-group">
				<button type="submit" id="bt" class="btn btn-dark btn-sm">Cadastrar</button>
			</div>
			<div id="login" class="form-group">
				<a id="lo" class="btn btn-default btn-sm" href="login.php">Login</a>
			</div>
			<div>
				<?php 
					if ($register == 1) {
						echo '<font color="#008000"><strong>Cadastrado com sucesso</strong></font>';
					}
					if ($register == 2) {
						echo '<font color="#FF0000"><strong>Não foi possível cadastrar</strong></font>';
					}
				 ?>
			</div>
		</div>	
	</form>

	<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>