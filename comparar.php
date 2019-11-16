<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

if (!isset($_SESSION['id_aluno']) || $_SESSION['id_aluno'] == 0) {
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

	// VERIFICAÇÃO

	if ($pesogordo1 == 0) unset($pesogordo1);
	if ($tricipital1 == 0) unset($tricipital1);
	if ($subscapular1 == 0) unset($subscapular1);
	if ($peitoral1 == 0) unset($peitoral1);
	if ($abdominal1 == 0) unset($abdominal1);
	if ($suprailiaca1 == 0) unset($suprailiaca1);
	if ($ccoxad1 == 0) unset($ccoxad1);
	if ($gorduraatual1 == 0) unset($gorduraatual1);
	if ($auxiliarmedia1 == 0) unset($auxiliarmedia1);
	if ($imc1 == 0) unset($imc1);
	if ($ccoxae1 == 0) unset($ccoxae1);
	if ($pesomagro1 == 0) unset($pesomagro1);
	if ($bicepsd1 == 0) unset($bicepsd1);
	if ($bicepse1 == 0) unset($bicepse1);
	if ($pcoxad1 == 0) unset($pcoxad1);
	if ($pcoxae1 == 0) unset($pcoxae1);
	if ($antebracod1 == 0) unset($antebracod1);
	if ($antebracoe1 == 0) unset($antebracoe1);
	if ($panturrilhad1 == 0) unset($panturrilhad1);
	if ($panturrilhae1 == 0) unset($panturrilhae1);
	if ($abdomen1 == 0) unset($abdomen1);
	if ($quadril1 == 0) unset($quadril1);
	if ($torax1 == 0) unset($torax1);
	if ($cintura1 == 0) unset($cintura1);

	if ($pesogordo2 == 0) unset($pesogordo2);
	if ($tricipital2 == 0) unset($tricipital2);
	if ($subscapular2 == 0) unset($subscapular2);
	if ($peitoral2 == 0) unset($peitoral2);
	if ($abdominal2 == 0) unset($abdominal2);
	if ($suprailiaca2 == 0) unset($suprailiaca2);
	if ($ccoxad2 == 0) unset($ccoxad2);
	if ($gorduraatual2 == 0) unset($gorduraatual2);
	if ($auxiliarmedia2 == 0) unset($auxiliarmedia2);
	if ($imc2 == 0) unset($imc2);
	if ($ccoxae2 == 0) unset($ccoxae2);
	if ($pesomagro2 == 0) unset($pesomagro2);
	if ($bicepsd2 == 0) unset($bicepsd2);
	if ($bicepse2 == 0) unset($bicepse2);
	if ($pcoxad2 == 0) unset($pcoxad2);
	if ($pcoxae2 == 0) unset($pcoxae2);
	if ($antebracod2 == 0) unset($antebracod2);
	if ($antebracoe2 == 0) unset($antebracoe2);
	if ($panturrilhad2 == 0) unset($panturrilhad2);
	if ($panturrilhae2 == 0) unset($panturrilhae2);
	if ($abdomen2 == 0) unset($abdomen2);
	if ($quadril2 == 0) unset($quadril2);
	if ($torax2 == 0) unset($torax2);
	if ($cintura2 == 0) unset($cintura2);

	if ($pesogordo < 0) { $pesogordos = "background-color: #fdcb6e;"; } else { $pesogordos = "background-color: #6c5ce7;"; } 
	if ($tricipital < 0) { $tricipitals = "background-color: #fdcb6e;"; } else { $tricipitals = "background-color: #6c5ce7;"; } 
	if ($subscapular < 0) { $subscapulars = "background-color: #fdcb6e;"; } else { $subscapulars = "background-color: #6c5ce7;"; } 
	if ($peitoral < 0) { $peitorals = "background-color: #fdcb6e;"; } else { $peitorals = "background-color: #6c5ce7;"; } 
	if ($abdominal < 0) { $abdominals = "background-color: #fdcb6e;"; } else { $abdominals = "background-color: #6c5ce7;"; } 
	if ($suprailiaca < 0) { $suprailiacas = "background-color: #fdcb6e;"; } else { $suprailiacas = "background-color: #6c5ce7;"; } 
	if ($ccoxad < 0) { $ccoxads = "background-color: #fdcb6e;"; } else { $ccoxads = "background-color: #6c5ce7;"; } 
	if ($gorduraatual < 0) { $gorduraatuals = "background-color: #fdcb6e;"; } else { $gorduraatuals = "background-color: #6c5ce7;"; } 
	if ($auxiliarmedia < 0) { $auxiliarmedias = "background-color: #fdcb6e;"; } else { $auxiliarmedias = "background-color: #6c5ce7;"; } 
	if ($imc < 0) { $imcs = "background-color: #fdcb6e;"; } else { $imcs = "background-color: #6c5ce7;"; } 
	if ($ccoxae < 0) { $ccoxaes = "background-color: #fdcb6e;"; } else { $ccoxaes = "background-color: #6c5ce7;"; } 
	if ($pesomagro < 0) { $pesomagros = "background-color: #fdcb6e;"; } else { $pesomagros = "background-color: #6c5ce7;"; } 
	if ($bicepsd < 0) { $bicepsds = "background-color: #fdcb6e;"; } else { $bicepsds = "background-color: #6c5ce7;"; } 
	if ($bicepse < 0) { $bicepses = "background-color: #fdcb6e;"; } else { $bicepses = "background-color: #6c5ce7;"; } 
	if ($pcoxad < 0) { $pcoxads = "background-color: #fdcb6e;"; } else { $pcoxads = "background-color: #6c5ce7;"; } 
	if ($pcoxae < 0) { $pcoxaes = "background-color: #fdcb6e;"; } else { $pcoxaes = "background-color: #6c5ce7;"; } 
	if ($antebracod < 0) { $antebracods = "background-color: #fdcb6e;"; } else { $antebracods = "background-color: #6c5ce7;"; } 
	if ($antebracoe < 0) { $antebracoes = "background-color: #fdcb6e;"; } else { $antebracoes = "background-color: #6c5ce7;"; } 
	if ($panturrilhad < 0) { $panturrilhads = "background-color: #fdcb6e;"; } else { $panturrilhads = "background-color: #6c5ce7;"; } 
	if ($panturrilhae < 0) { $panturrilhaes = "background-color: #fdcb6e;"; } else { $panturrilhaes = "background-color: #6c5ce7;"; } 
	if ($abdomen < 0) { $abdomens = "background-color: #fdcb6e;"; } else { $abdomens = "background-color: #6c5ce7;"; } 
	if ($quadril < 0) { $quadrils = "background-color: #fdcb6e;"; } else { $quadrils = "background-color: #6c5ce7;"; } 
	if ($torax < 0) { $toraxs = "background-color: #fdcb6e;"; } else { $toraxs = "background-color: #6c5ce7;"; } 
	if ($cintura < 0) { $cinturas = "background-color: #fdcb6e;"; } else { $cinturas = "background-color: #6c5ce7;"; } 
	
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Comparar Medidas</title>
	<link rel="stylesheet" type="text/css" href="css/stylecomparar.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
					<option value="<?php echo $row['idavaliacao'] ?>"><?php echo date( 'd-m-Y H:i:s' , strtotime( $row['data_avaliacao'] ) )  ?></option>
				<?php }
				?>
			</select>
			<select name="select2" id="select-avaliacao2">
				<?php 
				$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id;";
				$result = mysqli_query($conn, $query);
				?>

				<?php while($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row['idavaliacao'] ?>"><?php echo date( 'd-m-Y H:i:s' , strtotime( $row['data_avaliacao'] ) )  ?></option>
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
				<input <?php if(!isset($pesogordo1)) echo "hidden" ?> type="text" name="pesogordo" id="compleft" value="  Peso Gordo: <?php if(isset($pesogordo1)) echo $pesogordo1.'cm' ?>" placeholder="  Peso Gordo" disabled>
				<input <?php if(!isset($pesomagro1)) echo "hidden" ?> type="text" name="pesomagro" id="compleft" value="  Peso Magro: <?php if(isset($pesomagro1)) echo $pesomagro1.'cm' ?>" placeholder="  Peso Magro" disabled>
				<input <?php if(!isset($gorduraatual1)) echo "hidden" ?> type="text" name="gorduraatual" id="compleft" value="  Gordura Atual: <?php if(isset($gorduraatual1)) echo $gorduraatual1.'cm' ?>" placeholder="  Gordura Atual" disabled>

				<input <?php if(!isset($tricipital1)) echo "hidden" ?> type="text" name="tricipital" id="compleft" value="  Tricipital: <?php if(isset($tricipital1)) echo $tricipital1.'cm' ?>" placeholder="  Tricipital" disabled>
				<input <?php if(!isset($abdominal1)) echo "hidden" ?> type="text" name="abdominal" id="compleft" value="  Abdominal: <?php if(isset($abdominal1)) echo $abdominal1.'cm' ?>" placeholder="  Abdominal" disabled>
				<input <?php if(!isset($auxiliarmedia1)) echo "hidden" ?> type="text" name="auxiliarmedia" id="compleft" value="  Auxiliar Média: <?php if(isset($auxiliarmedia1)) echo $auxiliarmedia1.'cm' ?>" placeholder="  Auxiliar Média" disabled>

				<input <?php if(!isset($subscapular1)) echo "hidden" ?> type="text" name="subscapular" id="compleft" value="  Subscapular: <?php if(isset($subscapular1)) echo $subscapular1.'cm' ?>" placeholder="  Subscapular" disabled>
				<input <?php if(!isset($suprailiaca1)) echo "hidden" ?> type="text" name="suprailiaca" id="compleft" value="  Supra-Iliaca: <?php if(isset($suprailiaca1)) echo $suprailiaca1.'cm' ?>" placeholder="  Supra-Iliaca" disabled>
				<input <?php if(!isset($imc1)) echo "hidden" ?> type="text" name="imc" id="compleft" value="  IMC: <?php if(isset($imc1)) echo $imc1.'cm' ?>" placeholder="  IMC" disabled>

				<input <?php if(!isset($peitoral1)) echo "hidden" ?> type="text" name="peitoral" id="compleft" value="  Peitoral: <?php if(isset($peitoral1)) echo $peitoral1.'cm' ?>" placeholder="  Peitoral" disabled>
				<input <?php if(!isset($ccoxad1)) echo "hidden" ?> type="text" name="coxad" id="compleft" value="  Coxa Direita: <?php if(isset($ccoxad1)) echo $ccoxad1.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($ccoxae1)) echo "hidden" ?> type="text" name="coxae" id="compleft" value="  Coxa Esquerda: <?php if(isset($ccoxae1)) echo $ccoxae1.'cm' ?>" placeholder="  Coxa Esquerda" disabled>

				<input <?php if(!isset($bicepsd1)) echo "hidden" ?> type="text" name="bicepsd" id="compleft" value="  Biceps D: <?php if(isset($bicepsd1)) echo $bicepsd1.'cm' ?>" placeholder="  Biceps Direito" disabled>
				<input <?php if(!isset($antebracod1)) echo "hidden" ?> type="text" name="antebracod" id="compleft" value="  Antebraço D: <?php if(isset($antebracod1)) echo $antebracod1.'cm' ?>" placeholder="  Antebraço Direito" disabled>
				<input <?php if(!isset($abdomen1)) echo "hidden" ?> type="text" name="abdomen" id="compleft" value="  Abdomen: <?php if(isset($abdomen1)) echo $abdomen1.'cm' ?>" placeholder="  Abdomen" disabled>

				<input <?php if(!isset($bicepse1)) echo "hidden" ?> type="text" name="bicepse" id="compleft" value="  Biceps E: <?php if(isset($bicepse1)) echo $bicepse1.'cm' ?>" placeholder="  Biceps Esquerdo" disabled>
				<input <?php if(!isset($antebracoe1)) echo "hidden" ?> type="text" name="antebracoe" id="compleft" value="  Antebraço E: <?php if(isset($antebracoe1)) echo $antebracoe1.'cm' ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input <?php if(!isset($quadril1)) echo "hidden" ?> type="text" name="quadril" id="compleft" value="  Quadril: <?php if(isset($quadril1)) echo $quadril1.'cm' ?>" placeholder="  Quadril" disabled>

				<input <?php if(!isset($pcoxad1)) echo "hidden" ?> type="text" name="coxad" id="compleft" value="  Coxa Direita: <?php if(isset($pcoxad1)) echo $pcoxad1.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($panturrilhad1)) echo "hidden" ?> type="text" name="panturrilhad" id="compleft" value="  Panturrilha D: <?php if(isset($panturrilhad1)) echo $panturrilhad1.'cm' ?>" placeholder="  Panturrilha Direita" disabled>
				<input <?php if(!isset($torax1)) echo "hidden" ?> type="text" name="torax" id="compleft" value="  Torax: <?php if(isset($torax1)) echo $torax1.'cm' ?>" placeholder="  Torax" disabled>

				<input <?php if(!isset($pcoxae1)) echo "hidden" ?> type="text" name="coxae" id="compleft" value="  Coxa Esquerda: <?php if(isset($pcoxae1)) echo $pcoxae1.'cm' ?>" placeholder="  Coxa Esquerda" disabled>
				<input <?php if(!isset($panturrilhae1)) echo "hidden" ?> type="text" name="panturrilhae" id="compleft" value="  Panturrilha E: <?php if(isset($panturrilhae1)) echo $panturrilhae1.'cm' ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input <?php if(!isset($cintura1)) echo "hidden" ?> type="text" name="cintura" id="compleft" value="  Cintura: <?php if(isset($cintura1)) echo $cintura1.'cm' ?>" placeholder="  Cintura" disabled> 
			</div>
			<div id="mid" class="container">
				<div>
					<label style="font-weight: bold;" for="">Avaliação dia: <?php if(isset($data2)) echo $data2 ?></label>
				</div>
				<input<?php if(!isset($pesogordo2)) echo "hidden" ?> type="text" name="pesogordo" id="compmid" value="  Peso Gordo: <?php if(isset($pesogordo2)) echo $pesogordo2.'cm' ?>" placeholder="  Peso Gordo" disabled>
				<input <?php if(!isset($pesomagro2)) echo "hidden" ?> type="text" name="pesomagro" id="compmid" value="  Peso Magro: <?php if(isset($pesomagro2)) echo $pesomagro2.'cm' ?>" placeholder="  Peso Magro" disabled>
				<input <?php if(!isset($gorduraatual2)) echo "hidden" ?> type="text" name="gorduraatual" id="compmid" value="  Gordura Atual: <?php if(isset($gorduraatual2)) echo $gorduraatual2.'cm' ?>" placeholder="  Gordura Atual" disabled>

				<input <?php if(!isset($tricipital2)) echo "hidden" ?> type="text" name="tricipital" id="compmid" value="  Tricipital: <?php if(isset($tricipital2)) echo $tricipital2.'cm' ?>" placeholder="  Tricipital" disabled>
				<input <?php if(!isset($abdominal2)) echo "hidden" ?> type="text" name="abdominal" id="compmid" value="  Abdominal: <?php if(isset($abdominal2)) echo $abdominal2.'cm' ?>" placeholder="  Abdominal" disabled>
				<input <?php if(!isset($auxiliarmedia2)) echo "hidden" ?> type="text" name="auxiliarmedia" id="compmid" value="  Auxiliar Média: <?php if(isset($auxiliarmedia2)) echo $auxiliarmedia2.'cm' ?>" placeholder="  Auxiliar Média" disabled>

				<input <?php if(!isset($subscapular2)) echo "hidden" ?> type="text" name="subscapular" id="compmid" value="  Subscapular: <?php if(isset($subscapular2)) echo $subscapular2.'cm' ?>" placeholder="  Subscapular" disabled>
				<input <?php if(!isset($suprailiaca2)) echo "hidden" ?> type="text" name="suprailiaca" id="compmid" value="  Supra-Iliaca: <?php if(isset($suprailiaca2)) echo $suprailiaca2.'cm' ?>" placeholder="  Supra-Iliaca" disabled>
				<input <?php if(!isset($imc2)) echo "hidden" ?> type="text" name="imc" id="compmid" value="  IMC: <?php if(isset($imc2)) echo $imc2.'cm' ?>" placeholder="  IMC" disabled>

				<input <?php if(!isset($peitoral2)) echo "hidden" ?> type="text" name="peitoral" id="compmid" value="  Peitoral: <?php if(isset($peitoral2)) echo $peitoral2.'cm' ?>" placeholder="  Peitoral" disabled>
				<input <?php if(!isset($ccoxad2)) echo "hidden" ?> type="text" name="coxad" id="compmid" value="  Coxa Direita: <?php if(isset($ccoxad2)) echo $ccoxad2.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($ccoxae2)) echo "hidden" ?> type="text" name="coxae" id="compmid" value="  Coxa Esquerda: <?php if(isset($ccoxae2)) echo $ccoxae2.'cm' ?>" placeholder="  Coxa Esquerda" disabled>

				<input <?php if(!isset($bicepsd2)) echo "hidden" ?> type="text" name="bicepsd" id="compmid" value="  Biceps D: <?php if(isset($bicepsd2)) echo $bicepsd2.'cm' ?>" placeholder="  Biceps Direito" disabled>
				<input <?php if(!isset($antebracod2)) echo "hidden" ?> type="text" name="antebracod" id="compmid" value="  Antebraço D: <?php if(isset($antebracod2)) echo $antebracod2.'cm' ?>" placeholder="  Antebraço Direito" disabled>
				<input <?php if(!isset($abdomen2)) echo "hidden" ?> type="text" name="abdomen" id="compmid" value="  Abdomen: <?php if(isset($abdomen2)) echo $abdomen2.'cm' ?>" placeholder="  Abdomen" disabled>

				<input <?php if(!isset($bicepse2)) echo "hidden" ?> type="text" name="bicepse" id="compmid" value="  Biceps E: <?php if(isset($bicepse2)) echo $bicepse2.'cm' ?>" placeholder="  Biceps Esquerdo" disabled>
				<input <?php if(!isset($antebracoe2)) echo "hidden" ?> type="text" name="antebracoe" id="compmid" value="  Antebraço E: <?php if(isset($antebracoe2)) echo $antebracoe2.'cm' ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input <?php if(!isset($quadril2)) echo "hidden" ?> type="text" name="quadril" id="compmid" value="  Quadril: <?php if(isset($quadril2)) echo $quadril2.'cm' ?>" placeholder="  Quadril" disabled>

				<input <?php if(!isset($pcoxad2)) echo "hidden" ?> type="text" name="coxad" id="compmid" value="  Coxa Direita: <?php if(isset($pcoxad2)) echo $pcoxad2.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($panturrilhad2)) echo "hidden" ?> type="text" name="panturrilhad" id="compmid" value="  Panturrilha D: <?php if(isset($panturrilhad2)) echo $panturrilhad2.'cm' ?>" placeholder="  Panturrilha Direita" disabled>
				<input <?php if(!isset($torax2)) echo "hidden" ?> type="text" name="torax" id="compmid" value="  Torax: <?php if(isset($torax2)) echo $torax2.'cm' ?>" placeholder="  Torax" disabled>

				<input <?php if(!isset($pcoxae2)) echo "hidden" ?> type="text" name="coxae" id="compmid" value="  Coxa Esquerda: <?php if(isset($pcoxae2)) echo $pcoxae2.'cm' ?>" placeholder="  Coxa Esquerda" disabled>
				<input <?php if(!isset($panturrilhae2)) echo "hidden" ?> type="text" name="panturrilhae" id="compmid" value="  Panturrilha E: <?php if(isset($panturrilhae2)) echo $panturrilhae2.'cm' ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input <?php if(!isset($cintura2)) echo "hidden" ?> type="text" name="cintura" id="compmid" value="  Cintura: <?php if(isset($cintura2)) echo $cintura2.'cm' ?>" placeholder="  Cintura" disabled> 
			</div>
			<div id="right" class="container">
				<div>
					<label style="font-weight: bold;" for="">Comparação</label>
				</div>
				<input <?php if(!isset($pesogordo1) || !isset($pesogordo2)) echo "hidden" ?> type="text" name="pesogordo" id="compright" style="<?php if(isset($pesogordos)) echo $pesogordos ?>" value="  Peso Gordo: <?php if(isset($pesogordo)) echo $pesogordo.'cm' ?>" placeholder="  Peso Gordo" disabled>
				<input <?php if(!isset($pesomagro1) || !isset($pesomagro2)) echo "hidden" ?> type="text" name="pesomagro" id="compright" style="<?php if(isset($pesomagros)) echo $pesomagros ?>" value="  Peso Magro: <?php if(isset($pesomagro)) echo $pesomagro.'cm' ?>" placeholder="  Peso Magro" disabled>
				<input <?php if(!isset($gorduraatual1) || !isset($gorduraatual2)) echo "hidden" ?> type="text" name="gorduraatual" id="compright" style="<?php if(isset($gorduraatuals)) echo $gorduraatuals ?>" value="  Gordura Atual: <?php if(isset($gorduraatual)) echo $gorduraatual.'cm' ?>" placeholder="  Gordura Atual" disabled>

				<input <?php if(!isset($tricipital1) || !isset($tricipital2)) echo "hidden" ?> type="text" name="tricipital" id="compright" style="<?php if(isset($tricipitals)) echo $tricipitals ?>" value="  Tricipital: <?php if(isset($tricipital)) echo $tricipital.'cm' ?>" placeholder="  Tricipital" disabled>
				<input <?php if(!isset($abdominal1) || !isset($abdominal2)) echo "hidden" ?> type="text" name="abdominal" id="compright" style="<?php if(isset($abdominals)) echo $abdominals ?>" value="  Abdominal: <?php if(isset($abdominal)) echo $abdominal.'cm' ?>" placeholder="  Abdominal" disabled>
				<input <?php if(!isset($auxiliarmedia1) || !isset($auxiliarmedia2)) echo "hidden" ?> type="text" name="auxiliarmedia" id="compright" style="<?php if(isset($auxiliarmedias)) echo $auxiliarmedias ?>" value="  Auxiliar Média: <?php if(isset($auxiliarmedia)) echo $auxiliarmedia.'cm' ?>" placeholder="  Auxiliar Média" disabled>

				<input <?php if(!isset($subscapular1) || !isset($subscapular2)) echo "hidden" ?> type="text" name="subscapular" id="compright" style="<?php if(isset($subscapulars)) echo $subscapulars ?>" value="  Subscapular: <?php if(isset($subscapular)) echo $subscapular.'cm' ?>" placeholder="  Subscapular" disabled>
				<input <?php if(!isset($suprailiaca1) || !isset($suprailiaca2)) echo "hidden" ?> type="text" name="suprailiaca" id="compright" style="<?php if(isset($suprailiacas)) echo $suprailiacas ?>" value="  Supra-Iliaca: <?php if(isset($suprailiaca)) echo $suprailiaca.'cm' ?>" placeholder="  Supra-Iliaca" disabled>
				<input <?php if(!isset($imc1) || !isset($imc2)) echo "hidden" ?> type="text" name="imc" id="compright" style="<?php if(isset($imcs)) echo $imcs ?>" value="  IMC: <?php if(isset($imc)) echo $imc.'cm' ?>" placeholder="  IMC" disabled>

				<input <?php if(!isset($peitoral1) || !isset($peitoral2)) echo "hidden" ?> type="text" name="peitoral" id="compright" style="<?php if(isset($peitorals)) echo $peitorals ?>" value="  Peitoral: <?php if(isset($peitoral)) echo $peitoral.'cm' ?>" placeholder="  Peitoral" disabled>
				<input <?php if(!isset($ccoxad1) || !isset($ccoxad2)) echo "hidden" ?> type="text" name="coxad" id="compright" style="<?php if(isset($ccoxads)) echo $ccoxads ?>" value="  Coxa Direita: <?php if(isset($ccoxad)) echo $ccoxad.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($ccoxae1) || !isset($ccoxae2)) echo "hidden" ?> type="text" name="coxae" id="compright" style="<?php if(isset($ccoxaes)) echo $ccoxaes ?>" value="  Coxa Esquerda: <?php if(isset($ccoxae)) echo $ccoxae.'cm' ?>" placeholder="  Coxa Esquerda" disabled>

				<input <?php if(!isset($bicepsd1) || !isset($bicepsd2)) echo "hidden" ?> type="text" name="bicepsd" id="compright" style="<?php if(isset($bicepsds)) echo $bicepsds ?>" value="  Biceps D: <?php if(isset($bicepsd)) echo $bicepsd.'cm' ?>" placeholder="  Biceps Direito" disabled>
				<input <?php if(!isset($antebracod1) || !isset($antebracod2)) echo "hidden" ?> type="text" name="antebracod" id="compright" style="<?php if(isset($antebracods)) echo $antebracods ?>" value="  Antebraço D: <?php if(isset($antebracod)) echo $antebracod.'cm' ?>" placeholder="  Antebraço Direito" disabled>
				<input <?php if(!isset($abdomen1) || !isset($abdomen2)) echo "hidden" ?> type="text" name="abdomen" id="compright" style="<?php if(isset($abdomens)) echo $abdomens ?>" value="  Abdomen: <?php if(isset($abdomen)) echo $abdomen.'cm' ?>" placeholder="  Abdomen" disabled>

				<input <?php if(!isset($bicepse1) || !isset($bicepse2)) echo "hidden" ?> type="text" name="bicepse" id="compright" style="<?php if(isset($bicepses)) echo $bicepses ?>" value="  Biceps E: <?php if(isset($bicepse)) echo $bicepse.'cm' ?>" placeholder="  Biceps Esquerdo" disabled>
				<input <?php if(!isset($antebracoe1) || !isset($antebracoe2)) echo "hidden" ?> type="text" name="antebracoe" id="compright" style="<?php if(isset($antebracoes)) echo $antebracoes ?>" value="  Antebraço E: <?php if(isset($antebracoe)) echo $antebracoe.'cm' ?>" placeholder="  Antebraço Esquerdo" disabled>
				<input <?php if(!isset($quadril1) || !isset($quadril2)) echo "hidden" ?> type="text" name="quadril" id="compright" style="<?php if(isset($quadrils)) echo $quadrils ?>" value="  Quadril: <?php if(isset($quadril)) echo $quadril.'cm' ?>" placeholder="  Quadril" disabled>

				<input <?php if(!isset($pcoxad1) || !isset($pcoxad2)) echo "hidden" ?> type="text" name="coxad" id="compright" style="<?php if(isset($pcoxads)) echo $pcoxads ?>" value="  Coxa Direita: <?php if(isset($pcoxad)) echo $pcoxad.'cm' ?>" placeholder="  Coxa Direita" disabled>
				<input <?php if(!isset($panturrilhad1) || !isset($panturrilhad2)) echo "hidden" ?> type="text" name="panturrilhad" id="compright" style="<?php if(isset($panturrilhads)) echo $panturrilhads ?>" value="  Panturrilha D: <?php if(isset($panturrilhad)) echo $panturrilhad.'cm' ?>" placeholder="  Panturrilha Direita" disabled>
				<input <?php if(!isset($torax1) || !isset($torax2)) echo "hidden" ?> type="text" name="torax" id="compright" style="<?php if(isset($toraxs)) echo $toraxs ?>" value="  Torax: <?php if(isset($torax)) echo $torax.'cm' ?>" placeholder="  Torax" disabled>

				<input <?php if(!isset($pcoxae1) || !isset($pcoxae2)) echo "hidden" ?> type="text" name="coxae" id="compright" style="<?php if(isset($pcoxaes)) echo $pcoxaes ?>" value="  Coxa Esquerda: <?php if(isset($pcoxae)) echo $pcoxae.'cm' ?>" placeholder="  Coxa Esquerda" disabled>
				<input <?php if(!isset($panturrilhae1) || !isset($panturrilhae2)) echo "hidden" ?> type="text" name="panturrilhae" id="compright" style="<?php if(isset($panturrilhaes)) echo $panturrilhaes ?>" value="  Panturrilha E: <?php if(isset($panturrilhae)) echo $panturrilhae.'cm' ?>" placeholder="  Panturrilha Esquerda" disabled>
				<input <?php if(!isset($cintura1) || !isset($cintura2)) echo "hidden" ?> type="text" name="cintura" id="compright" style="<?php if(isset($cinturas)) echo $cinturas ?>" value="  Cintura: <?php if(isset($cintura)) echo $cintura.'cm' ?>" placeholder="  Cintura" disabled> 
			</div>
		</div>
	</body>
	</html>