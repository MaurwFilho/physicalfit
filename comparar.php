<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

if (!isset($_SESSION['id_aluno'])) {
	header('Location: gerenciaralunos.php');
}

require_once("conexao.php");

require_once("Sql.php");

$sql = new Sql();

if (isset($_POST['comparar'])) {
	$id1 = $_POST['select1'];
	$id2 = $_POST['select2'];

	$rs = $sql->select("SELECT * FROM avaliacao WHERE idavaliacao = $id1;");

	$pesogordo1 = $rs[0]['c_pesogordo'];
	$tricipital1 = $rs[0]['c_tricipital'];
	$subscapular1 = $rs[0]['c_subscapular'];
	$peitoral1 = $rs[0]['c_peitoral'];
	$abdominal1 = $rs[0]['c_abdominal'];
	$suprailiaca1 = $rs[0]['c_suprailiaca'];
	$ccoxad1 = $rs[0]['c_coxad'];
	$gorduraatual1 = $rs[0]['c_gorduraatual'];
	$auxiliarmedia1 = $rs[0]['c_auxiliarmedia'];
	$imc1 = $rs[0]['c_imc'];
	$ccoxae1 = $rs[0]['c_coxae'];
	$pesomagro1 = $rs[0]['c_pesomagro'];
	$bicepsd1 = $rs[0]['p_bicepsd'];
	$bicepse1 = $rs[0]['p_bicepse'];
	$pcoxad1 = $rs[0]['p_coxad'];
	$pcoxae1 = $rs[0]['p_coxae'];
	$antebracod1 = $rs[0]['p_antebracod'];
	$antebracoe1 = $rs[0]['p_antebracoe'];
	$panturrilhad1 = $rs[0]['p_panturrilhad'];
	$panturrilhae1 = $rs[0]['p_panturrilhae'];
	$abdomen1 = $rs[0]['p_abdomen'];
	$quadril1 = $rs[0]['p_quadril'];
	$torax1 = $rs[0]['p_torax'];
	$cintura1 = $rs[0]['p_cintura'];
	$data1 = $rs[0]['data_avaliacao'];
	$data1 = date( 'd-m-Y' , strtotime( $data1 ) );

	$rs = $sql->select("SELECT * FROM avaliacao WHERE idavaliacao = $id2;");

	$pesogordo2 = $rs[0]['c_pesogordo'];
	$tricipital2 = $rs[0]['c_tricipital'];
	$subscapular2 = $rs[0]['c_subscapular'];
	$peitoral2 = $rs[0]['c_peitoral'];
	$abdominal2 = $rs[0]['c_abdominal'];
	$suprailiaca2 = $rs[0]['c_suprailiaca'];
	$ccoxad2 = $rs[0]['c_coxad'];
	$gorduraatual2 = $rs[0]['c_gorduraatual'];
	$auxiliarmedia2 = $rs[0]['c_auxiliarmedia'];
	$imc2 = $rs[0]['c_imc'];
	$ccoxae2 = $rs[0]['c_coxae'];
	$pesomagro2 = $rs[0]['c_pesomagro'];
	$bicepsd2 = $rs[0]['p_bicepsd'];
	$bicepse2 = $rs[0]['p_bicepse'];
	$pcoxad2 = $rs[0]['p_coxad'];
	$pcoxae2 = $rs[0]['p_coxae'];
	$antebracod2 = $rs[0]['p_antebracod'];
	$antebracoe2 = $rs[0]['p_antebracoe'];
	$panturrilhad2 = $rs[0]['p_panturrilhad'];
	$panturrilhae2 = $rs[0]['p_panturrilhae'];
	$abdomen2 = $rs[0]['p_abdomen'];
	$quadril2 = $rs[0]['p_quadril'];
	$torax2 = $rs[0]['p_torax'];
	$cintura2 = $rs[0]['p_cintura'];
	$data2 = $rs[0]['data_avaliacao'];
	$data2 = date( 'd-m-Y' , strtotime( $data2 ) );

    // COPARAÇÃO

	$pesogordo = $pesogordo2 - $pesogordo1;
	$tricipital = $tricipital2 - $tricipital1;
	$subscapular = $subscapular2 - $subscapular1;
	$peitoral = $peitoral2 - $peitoral1;
	$abdominal = $abdominal2 - $abdominal1;
	$suprailiaca = $suprailiaca2 - $suprailiaca1;
	$ccoxad = $ccoxad2 - $ccoxad1;
	$gorduraatual = $gorduraatual2 - $gorduraatual1;
	$auxiliarmedia = $auxiliarmedia2 - $auxiliarmedia1;
	$imc = $imc2 - $imc1;
	$ccoxae = $ccoxae2 - $ccoxae1;
	$pesomagro = $pesomagro2 - $pesomagro1;
	$bicepsd = $bicepsd2 - $bicepsd1;
	$bicepse = $bicepse2 - $bicepse1;
	$pcoxad = $pcoxad2 - $pcoxad1;
	$pcoxae = $pcoxae2 - $pcoxae1;
	$antebracod = $antebracod2 - $antebracod1;
	$antebracoe = $antebracoe2 - $antebracoe1;
	$panturrilhad = $panturrilhad2 - $panturrilhad1;
	$panturrilhae = $panturrilhae2 - $panturrilhae1;
	$abdomen = $abdomen2 - $abdomen1;
	$quadril = $quadril2 - $quadril1;
	$torax = $torax2 - $torax1;
	$cintura = $cintura2 - $cintura1;

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Comparar Medidas</title>
	<link rel="stylesheet" type="text/css" href="css/stylecomparar.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
	<header>
		<h1 id="physicalfit">PhysicalFit</h1>
	</header>
	<div class="form-group" style="padding-bottom: 2%;">

		<div>
			<?php 
			$id = $_SESSION['id_aluno'];
			$sql = "SELECT * FROM aluno WHERE idaluno = $id;";
			$rs = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_array($rs)){
				$nome = $row['nome'];
			}
			?>
			<input id="nome" type="text" value="Aluno: <?php if(isset($nome)) echo $nome; ?>" disabled style="text-align: center; font-weight: bold;">
		</div>

		<form action="#" method="post">
			<select name="select1" id="select-avaliacao">
				<?php 
				$id = $_SESSION['id_aluno'];
				$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id;";
				$result = mysqli_query($conn, $query);
				?>

				<?php while($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row['idavaliacao'] ?>"><?php echo date( 'd-m-Y' , strtotime( $row['data_avaliacao'] ) )  ?></option>
				<?php }
				?>
			</select>
			<select name="select2" id="select-avaliacao2">
				<?php 
				$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id;";
				$result = mysqli_query($conn, $query);
				?>

				<?php while($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row['idavaliacao'] ?>"><?php echo date( 'd-m-Y' , strtotime( $row['data_avaliacao'] ) )  ?></option>
				<?php }
				?>
			</select>
			<input type="submit" id="comparar" class="btn btn-dark btn-sm" name="comparar" value="Comparar">
			<a id="voltar" class="btn btn-sm float-right" href="gerenciaralunos.php">Voltar</a>
		</form>

		<div id="back">
			<div id="left" class="container">
				<div>
					<label style="font-weight: bold;" for="">Avaliação dia: <?php if(isset($data1)) echo $data1 ?></label>
				</div>
				<input type="text" name="pesogordo" id="compleft" value="  Peso Gordo: <?php if(isset($pesogordo1)) echo $pesogordo1 ?>" placeholder="  Peso Gordo" disabled>
				<input type="text" name="pesomagro" id="compleft" value="  Peso Magro: <?php if(isset($pesomagro1)) echo $pesomagro1 ?>" placeholder="  Peso Magro" disabled>
				<input type="text" name="gorduraatual" id="compleft" value="  Gordura Atual: <?php if(isset($gorduraatual1)) echo $gorduraatual1 ?>" placeholder="  Gordura Atual" disabled>

				<input type="text" name="tricipital" id="compleft" value="  Tricipital: <?php if(isset($tricipital1)) echo $tricipital1 ?>" placeholder="  Tricipital" disabled>
				<input type="text" name="abdominal" id="compleft" value="  Abdominal: <?php if(isset($abdominal1)) echo $abdominal1 ?>" placeholder="  Abdominal" disabled>
				<input type="text" name="auxiliarmedia" id="compleft" value="  Auxiliar Média: <?php if(isset($auxiliarmedia1)) echo $auxiliarmedia1 ?>" placeholder="  Auxiliar Média" disabled>

				<input type="text" name="subscapular" id="compleft" value="  Subscapular: <?php if(isset($subscapular1)) echo $subscapular1 ?>" placeholder="  Subscapular" disabled>
				<input type="text" name="suprailiaca" id="compleft" value="  Supra-Iliaca: <?php if(isset($suprailiaca1)) echo $suprailiaca1 ?>" placeholder="  Supra-Iliaca" disabled>
				<input type="text" name="imc" id="compleft" value="  IMC: <?php if(isset($imc1)) echo $imc1 ?>" placeholder="  IMC" disabled>

				<input type="text" name="peitoral" id="compleft" value="  Peitoral: <?php if(isset($peitoral1)) echo $peitoral1 ?>" placeholder="  Peitoral" disabled>
				<input type="text" name="coxad" id="compleft" value="  Coxa Direita: <?php if(isset($ccoxad1)) echo $ccoxad1 ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="coxae" id="compleft" value="  Coxa Esquerda: <?php if(isset($ccoxae1)) echo $ccoxae1 ?>" placeholder="  Coxa Esquerda" disabled>

				<input type="text" name="bicepsd" id="compleft" value="  Biceps Direito: <?php if(isset($bicepsd1)) echo $bicepsd1 ?>" placeholder="  Biceps Direito" disabled>
				<input type="text" name="antebracod" id="compleft" value="  Antebraço D: <?php if(isset($antebracod1)) echo $antebracod1 ?>" placeholder="  Antebraço Direito" disabled>
				<input type="text" name="abdomen" id="compleft" value="  Abdomen: <?php if(isset($abdomen1)) echo $abdomen1 ?>" placeholder="  Abdomen" disabled>

				<input type="text" name="bicepse" id="compleft" value="  Biceps Esquerdo: <?php if(isset($bicepse1)) echo $bicepse1 ?>" placeholder="  Biceps Esquerdo" disabled>
				<input type="text" name="antebracoe" id="compleft" value="  Antebraço E: <?php if(isset($antebracoe1)) echo $antebracoe1 ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input type="text" name="quadril" id="compleft" value="  Quadril: <?php if(isset($quadril1)) echo $quadril1 ?>" placeholder="  Quadril" disabled>

				<input type="text" name="coxad" id="compleft" value="  Coxa Direita: <?php if(isset($pcoxad1)) echo $pcoxad1 ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="panturrilhad" id="compleft" value="  Panturrilha D: <?php if(isset($panturrilhad1)) echo $panturrilhad1 ?>" placeholder="  Panturrilha Direita" disabled>
				<input type="text" name="torax" id="compleft" value="  Torax: <?php if(isset($torax1)) echo $torax1 ?>" placeholder="  Torax" disabled>

				<input type="text" name="coxae" id="compleft" value="  Coxa Esquerda: <?php if(isset($pcoxae1)) echo $pcoxae1 ?>" placeholder="  Coxa Esquerda" disabled>
				<input type="text" name="panturrilhae" id="compleft" value="  Panturrilha E: <?php if(isset($panturrilhae1)) echo $panturrilhae1 ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input type="text" name="cintura" id="compleft" value="  Cintura: <?php if(isset($cintura1)) echo $cintura1 ?>" placeholder="  Cintura" disabled> 
			</div>
			<div id="mid" class="container">
				<div>
					<label style="font-weight: bold;" for="">Avaliação dia: <?php if(isset($data2)) echo $data2 ?></label>
				</div>
				<input type="text" name="pesogordo" id="compmid" value="  Peso Gordo: <?php if(isset($pesogordo2)) echo $pesogordo2 ?>" placeholder="  Peso Gordo" disabled>
				<input type="text" name="pesomagro" id="compmid" value="  Peso Magro: <?php if(isset($pesomagro2)) echo $pesomagro2 ?>" placeholder="  Peso Magro" disabled>
				<input type="text" name="gorduraatual" id="compmid" value="  Gordura Atual: <?php if(isset($gorduraatual2)) echo $gorduraatual2 ?>" placeholder="  Gordura Atual" disabled>

				<input type="text" name="tricipital" id="compmid" value="  Tricipital: <?php if(isset($tricipital2)) echo $tricipital2 ?>" placeholder="  Tricipital" disabled>
				<input type="text" name="abdominal" id="compmid" value="  Abdominal: <?php if(isset($abdominal2)) echo $abdominal2 ?>" placeholder="  Abdominal" disabled>
				<input type="text" name="auxiliarmedia" id="compmid" value="  Auxiliar Média: <?php if(isset($auxiliarmedia2)) echo $auxiliarmedia2 ?>" placeholder="  Auxiliar Média" disabled>

				<input type="text" name="subscapular" id="compmid" value="  Subscapular: <?php if(isset($subscapular2)) echo $subscapular2 ?>" placeholder="  Subscapular" disabled>
				<input type="text" name="suprailiaca" id="compmid" value="  Supra-Iliaca: <?php if(isset($suprailiaca2)) echo $suprailiaca2 ?>" placeholder="  Supra-Iliaca" disabled>
				<input type="text" name="imc" id="compmid" value="  IMC: <?php if(isset($imc2)) echo $imc2 ?>" placeholder="  IMC" disabled>

				<input type="text" name="peitoral" id="compmid" value="  Peitoral: <?php if(isset($peitoral2)) echo $peitoral2 ?>" placeholder="  Peitoral" disabled>
				<input type="text" name="coxad" id="compmid" value="  Coxa Direita: <?php if(isset($ccoxad2)) echo $ccoxad2 ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="coxae" id="compmid" value="  Coxa Esquerda: <?php if(isset($ccoxae2)) echo $ccoxae2 ?>" placeholder="  Coxa Esquerda" disabled>

				<input type="text" name="bicepsd" id="compmid" value="  Biceps Direito: <?php if(isset($bicepsd2)) echo $bicepsd2 ?>" placeholder="  Biceps Direito" disabled>
				<input type="text" name="antebracod" id="compmid" value="  Antebraço D: <?php if(isset($antebracod2)) echo $antebracod2 ?>" placeholder="  Antebraço Direito" disabled>
				<input type="text" name="abdomen" id="compmid" value="  Abdomen: <?php if(isset($abdomen2)) echo $abdomen2 ?>" placeholder="  Abdomen" disabled>

				<input type="text" name="bicepse" id="compmid" value="  Biceps Esquerdo: <?php if(isset($bicepse2)) echo $bicepse2 ?>" placeholder="  Biceps Esquerdo" disabled>
				<input type="text" name="antebracoe" id="compmid" value="  Antebraço E: <?php if(isset($antebracoe2)) echo $antebracoe2 ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input type="text" name="quadril" id="compmid" value="  Quadril: <?php if(isset($quadril2)) echo $quadril2 ?>" placeholder="  Quadril" disabled>

				<input type="text" name="coxad" id="compmid" value="  Coxa Direita: <?php if(isset($pcoxad2)) echo $pcoxad2 ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="panturrilhad" id="compmid" value="  Panturrilha D: <?php if(isset($panturrilhad2)) echo $panturrilhad2 ?>" placeholder="  Panturrilha Direita" disabled>
				<input type="text" name="torax" id="compmid" value="  Torax: <?php if(isset($torax2)) echo $torax2 ?>" placeholder="  Torax" disabled>

				<input type="text" name="coxae" id="compmid" value="  Coxa Esquerda: <?php if(isset($pcoxae2)) echo $pcoxae2 ?>" placeholder="  Coxa Esquerda" disabled>
				<input type="text" name="panturrilhae" id="compmid" value="  Panturrilha E: <?php if(isset($panturrilhae2)) echo $panturrilhae2 ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input type="text" name="cintura" id="compmid" value="  Cintura: <?php if(isset($cintura2)) echo $cintura2 ?>" placeholder="  Cintura" disabled> 
			</div>
			<div id="right" class="container">
				<div>
					<label style="font-weight: bold;" for="">Comparação</label>
				</div>
				<input type="text" name="pesogordo" id="compright" value="  Peso Gordo: <?php if(isset($pesogordo)) echo $pesogordo ?>" placeholder="  Peso Gordo" disabled>
				<input type="text" name="pesomagro" id="compright" value="  Peso Magro: <?php if(isset($pesomagro)) echo $pesomagro ?>" placeholder="  Peso Magro" disabled>
				<input type="text" name="gorduraatual" id="compright" value="  Gordura Atual: <?php if(isset($gorduraatual)) echo $gorduraatual ?>" placeholder="  Gordura Atual" disabled>

				<input type="text" name="tricipital" id="compright" value="  Tricipital: <?php if(isset($tricipital)) echo $tricipital ?>" placeholder="  Tricipital" disabled>
				<input type="text" name="abdominal" id="compright" value="  Abdominal: <?php if(isset($abdominal)) echo $abdominal ?>" placeholder="  Abdominal" disabled>
				<input type="text" name="auxiliarmedia" id="compright" value="  Auxiliar Média: <?php if(isset($auxiliarmedia)) echo $auxiliarmedia ?>" placeholder="  Auxiliar Média" disabled>

				<input type="text" name="subscapular" id="compright" value="  Subscapular: <?php if(isset($subscapular)) echo $subscapular ?>" placeholder="  Subscapular" disabled>
				<input type="text" name="suprailiaca" id="compright" value="  Supra-Iliaca: <?php if(isset($suprailiaca)) echo $suprailiaca ?>" placeholder="  Supra-Iliaca" disabled>
				<input type="text" name="imc" id="compright" value="  IMC: <?php if(isset($imc)) echo $imc ?>" placeholder="  IMC" disabled>

				<input type="text" name="peitoral" id="compright" value="  Peitoral: <?php if(isset($peitoral)) echo $peitoral ?>" placeholder="  Peitoral" disabled>
				<input type="text" name="coxad" id="compright" value="  Coxa Direita: <?php if(isset($ccoxad)) echo $ccoxad ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="coxae" id="compright" value="  Coxa Esquerda: <?php if(isset($ccoxae)) echo $ccoxae ?>" placeholder="  Coxa Esquerda" disabled>

				<input type="text" name="bicepsd" id="compright" value="  Biceps Direito: <?php if(isset($bicepsd)) echo $bicepsd ?>" placeholder="  Biceps Direito" disabled>
				<input type="text" name="antebracod" id="compright" value="  Antebraço D: <?php if(isset($antebracod)) echo $antebracod ?>" placeholder="  Antebraço Direito" disabled>
				<input type="text" name="abdomen" id="compright" value="  Abdomen: <?php if(isset($abdomen)) echo $abdomen ?>" placeholder="  Abdomen" disabled>

				<input type="text" name="bicepse" id="compright" value="  Biceps Esquerdo: <?php if(isset($bicepse)) echo $bicepse ?>" placeholder="  Biceps Esquerdo" disabled>
				<input type="text" name="antebracoe" id="compright" value="  Antebraço E: <?php if(isset($antebracoe)) echo $antebracoe ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input type="text" name="quadril" id="compright" value="  Quadril: <?php if(isset($quadril)) echo $quadril ?>" placeholder="  Quadril" disabled>

				<input type="text" name="coxad" id="compright" value="  Coxa Direita: <?php if(isset($pcoxad)) echo $pcoxad ?>" placeholder="  Coxa Direita" disabled>
				<input type="text" name="panturrilhad" id="compright" value="  Panturrilha D: <?php if(isset($panturrilhad)) echo $panturrilhad ?>" placeholder="  Panturrilha Direita" disabled>
				<input type="text" name="torax" id="compright" value="  Torax: <?php if(isset($torax)) echo $torax ?>" placeholder="  Torax" disabled>

				<input type="text" name="coxae" id="compright" value="  Coxa Esquerda: <?php if(isset($pcoxae)) echo $pcoxae ?>" placeholder="  Coxa Esquerda" disabled>
				<input type="text" name="panturrilhae" id="compright" value="  Panturrilha E: <?php if(isset($panturrilhae)) echo $panturrilhae ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input type="text" name="cintura" id="compright" value="  Cintura: <?php if(isset($cintura)) echo $cintura ?>" placeholder="  Cintura" disabled> 
			</div>
		</div>

		<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>