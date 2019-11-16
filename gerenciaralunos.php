<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header('Location: index.php');
}

require_once("conexao.php");

require_once("Sql.php");

$sql = new Sql();

$del = 0;
$exibe = 0;

if (isset($_SESSION['id_aluno'])) {
	$id = $_SESSION['id_aluno'];
	$query = "SELECT * FROM aluno WHERE idaluno = $id;";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
		$nome = $row['nome'];
		$nascimento = $row['nascimento'];
		$nascimento = date( 'd-m-Y' , strtotime( $nascimento ) );
		$objetivo = $row['objetivo'];
		$sexo = $row['sexo'];
	}
	$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id ORDER BY idavaliacao DESC LIMIT 1;";
	$rs = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($rs)){
		$ultava = $row['data_avaliacao'];
		$ultava = date( 'd-m-Y' , strtotime( $ultava ) );
		$estatura = $row['estatura'];
		$estatura = str_replace('.', ',', $estatura);
		$peso = $row['peso'];
		$peso = str_replace('.', ',', $peso);
	}
}

if (isset($_POST['buscar'])) {
	if(isset($_POST['nomes'])){
		$id = $_POST['nomes'];
		$_SESSION['id_aluno'] = $id;
		$query = "SELECT * FROM aluno WHERE idaluno = $id;";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
			$nome = $row['nome'];
			$nascimento = $row['nascimento'];
			$nascimento = date( 'd-m-Y' , strtotime( $nascimento ) );
			$objetivo = $row['objetivo'];
			$sexo = $row['sexo'];
		}
		$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id ORDER BY idavaliacao DESC LIMIT 1;";
		$rs = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($rs)){
			$ultava = $row['data_avaliacao'];
			$ultava = date( 'd-m-Y' , strtotime( $ultava ) );
			$estatura = $row['estatura'];
			$estatura = str_replace('.', ',', $estatura);
			$peso = $row['peso'];
			$peso = str_replace('.', ',', $peso);
		}
	}
}

if (isset($_POST['excluir'])) {
	if (isset($_SESSION['id_aluno'])) {
		$id = $_SESSION['id_aluno'];

		$rs = $sql->select("SELECT idtreino FROM treino WHERE aluno_idaluno = $id;");    
		if ($rs) {
			$idtr = $rs[0]['idtreino'];
			$query = "DELETE FROM treinoa WHERE treino_idtreino = $idtr;";
			$a = mysqli_query($conn, $query);
			$query = "DELETE FROM treinob WHERE treino_idtreino = $idtr;";
			$b = mysqli_query($conn, $query);
			$query = "DELETE FROM treinoc WHERE treino_idtreino = $idtr;";
			$c = mysqli_query($conn, $query);
			$query = "DELETE FROM treino WHERE aluno_idaluno = $id;";
			$t = mysqli_query($conn, $query);
		}

		$query = "DELETE FROM avaliacao WHERE aluno_idaluno = $id;";
		$r = mysqli_query($conn, $query);
		$query = "DELETE FROM aluno WHERE idaluno = $id;";
		$s = mysqli_query($conn, $query);
		if ($r && $s) {
			$del = 1;
			unset($_SESSION['id_aluno']);
		} else {
			$del = 2;
		}
	} else {
		$del = 3;
	}
}

if (isset($_POST['excava'])) {
	if (isset($_POST['id_avaliacao'])) {
		$id = $_POST['id_avaliacao'];
		$exibe = 1;
		$rs = $sql->query("DELETE FROM avaliacao WHERE idavaliacao = $id;");
		if ($rs) {
			$del = 4;
		} else {
			$del = 2;
		}
	}
}

if (isset($_POST['buscar_avaliacao'])) {
	$id = $_SESSION['id_aluno'];
	$query = "SELECT * FROM aluno WHERE idaluno = $id;";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
		$nome = $row['nome'];
		$nascimento = $row['nascimento'];
		$nascimento = date( 'd-m-Y' , strtotime( $nascimento ) );
		$objetivo = $row['objetivo'];
		$sexo = $row['sexo'];
	}
	$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id ORDER BY idavaliacao DESC LIMIT 1;";
	$rs = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($rs)){
		$ultava = $row['data_avaliacao'];
		$ultava = date( 'd-m-Y' , strtotime( $ultava ) );
		$estatura = $row['estatura'];
		$estatura = str_replace('.', ',', $estatura);
		$peso = $row['peso'];
		$peso = str_replace('.', ',', $peso);
	}

	if (!isset($_POST['avaliacao'])) {
		header('Location: gerenciaralunos.php');
	}
	$exibe = 1;
	$id_avaliacao = $_POST['avaliacao'];
	$rs = $sql->select("SELECT * FROM avaliacao WHERE idavaliacao = $id_avaliacao;");

	$pesogordo = $rs[0]['c_pesogordo'];
	$tricipital = $rs[0]['c_tricipital'];
	$subscapular = $rs[0]['c_subscapular'];
	$peitoral = $rs[0]['c_peitoral'];
	$abdominal = $rs[0]['c_abdominal'];
	$suprailiaca = $rs[0]['c_suprailiaca'];
	$ccoxad = $rs[0]['c_coxad'];
	$gorduraatual = $rs[0]['c_gorduraatual'];
	$auxiliarmedia = $rs[0]['c_auxiliarmedia'];
	$imc = $rs[0]['c_imc'];
	$ccoxae = $rs[0]['c_coxae'];
	$pesomagro = $rs[0]['c_pesomagro'];
	$bicepsd = $rs[0]['p_bicepsd'];
	$bicepse = $rs[0]['p_bicepse'];
	$pcoxad = $rs[0]['p_coxad'];
	$pcoxae = $rs[0]['p_coxae'];
	$antebracod = $rs[0]['p_antebracod'];
	$antebracoe = $rs[0]['p_antebracoe'];
	$panturrilhad = $rs[0]['p_panturrilhad'];
	$panturrilhae = $rs[0]['p_panturrilhae'];
	$abdomen = $rs[0]['p_abdomen'];
	$quadril = $rs[0]['p_quadril'];
	$torax = $rs[0]['p_torax'];
	$cintura = $rs[0]['p_cintura'];

	if ($pesogordo == 0) unset($pesogordo);
	if ($tricipital == 0) unset($tricipital);
	if ($subscapular == 0) unset($subscapular);
	if ($peitoral == 0) unset($peitoral);
	if ($abdominal == 0) unset($abdominal);
	if ($suprailiaca == 0) unset($suprailiaca);
	if ($ccoxad == 0) unset($ccoxad);
	if ($gorduraatual == 0) unset($gorduraatual);
	if ($auxiliarmedia == 0) unset($auxiliarmedia);
	if ($imc == 0) unset($imc);
	if ($ccoxae == 0) unset($ccoxae);
	if ($pesomagro == 0) unset($pesomagro);
	if ($bicepsd == 0) unset($bicepsd);
	if ($bicepse == 0) unset($bicepse);
	if ($pcoxad == 0) unset($pcoxad);
	if ($pcoxae == 0) unset($pcoxae);
	if ($antebracod == 0) unset($antebracod);
	if ($antebracoe == 0) unset($antebracoe);
	if ($panturrilhad == 0) unset($panturrilhad);
	if ($panturrilhae == 0) unset($panturrilhae);
	if ($abdomen == 0) unset($abdomen);
	if ($quadril == 0) unset($quadril);
	if ($torax == 0) unset($torax);
	if ($cintura == 0) unset($cintura);
	
}

if (isset($_POST['exbmedidas'])) {
	if (isset($_POST['id_aluno'])){
		$id = $_SESSION['id_aluno'];
		$query = "SELECT * FROM aluno WHERE idaluno = $id;";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
			$nome = $row['nome'];
			$nascimento = $row['nascimento'];
			$nascimento = date( 'd-m-Y' , strtotime( $nascimento ) );
			$objetivo = $row['objetivo'];
			$sexo = $row['sexo'];
		}
		$query = "SELECT * FROM avaliacao WHERE aluno_idaluno = $id ORDER BY idavaliacao DESC LIMIT 1;";
		$rs = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($rs)){
			$ultava = $row['data_avaliacao'];
			$ultava = date( 'd-m-Y' , strtotime( $ultava ) );
			$estatura = $row['estatura'];
			$estatura = str_replace('.', ',', $estatura);
			$peso = $row['peso'];
			$peso = str_replace('.', ',', $peso);
		}
	}
	if (!isset($_SESSION['id_aluno']) || $_SESSION['id_aluno'] == 0){
		header('Location: gerenciaralunos.php');
	} else {
		$exibe = 1;
	}
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Gerenciar Alunos</title>
	<link rel="stylesheet" type="text/css" href="css/stylegerenciaralunos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>

</head>
<body>
	<header>
		<h1 id="physicalfit">PhysicalFit</h1>
	</header>

	<div style="text-align: center;">
		<?php 
		if ($del == 1) {
			echo '<font color="#444"><strong>DELETADO</strong></font>';
		}
		if ($del == 2) {
			echo '<font color="#444"><strong>NAO FOI POSSIVEL DELETAR</strong></font>';
		}
		if ($del == 3) {
			echo '<font color="#444"><strong>NENHUM ALUNO SELECIONADO</strong></font>';
		}
		if ($del == 4) {
			echo '<font color="#444"><strong>AVALIAÇÃO DELETADA</strong></font>';
		}
		?>
	</div>

	<div id="voltar">
		<a class="btn btn-sm" href="calendario.php" style="color: #444; font-weight: bold;">Voltar</a>
	</div>

	<form action="#" method="post">
		<div class="container float-left">
			<div class="form-group" style="margin-bottom: 20px;">
				<div>
					<label id="lbl">Selecione um aluno</label>
				</div>
				<select id="select-nome" name="nomes">
					<?php 
					$id = $_SESSION['id_professor'];
					$query = "SELECT * FROM aluno WHERE professor_idprofessor = $id;";
					$result = mysqli_query($conn, $query);
					?>
					<option value=null></option>
					<?php while($row = mysqli_fetch_array($result)){ ?>
						<option value="<?php echo $row['idaluno'] ?>"><?php echo $row['nome'] ?></option>
					<?php }
					?>
				</select>
				<input type="submit" id="buscar" class="btn btn-dark btn-sm" name="buscar" value="Selecionar">

			</div>

            <!-- <div class="circle">
                <img src="" alt="Imagem">
            </div> -->

            <div id="labels">
            	<label id="lbl-nome">Nome</label>
            </div>
            <div>
            	<input type="text" id="nome" value="<?php if(isset($nome)) echo "  ".$nome ?>" disabled>
            </div>
            <div id="labels">
            	<label id="lbl-nascimento">Nascimento</label>
            	<label id="lbl-estatura">Estatura</label>
            	<label id="lbl-peso">Peso</label>
            </div>
            <div>
            	<input type="text" id="idade" value="<?php if(isset($nascimento)) echo "  ".$nascimento ?>" disabled>
            	<input type="text" id="estatura" value="<?php if(isset($estatura)) echo "  ".$estatura ?>" disabled>
            	<input type="text" id="peso" value="<?php if(isset($peso)) echo "  ".$peso ?>" disabled>
            </div>
            <div id="labels">
            	<label id="lbl-objetivo">Objetivo</label>
            	<label id="lbl-sexo">Sexo</label>
            </div>
            <div>
            	<input type="text" id="objetivo" value="<?php if(isset($objetivo)) echo "  ".$objetivo ?>" disabled>
            	<input type="text" id="sexo" value="<?php if(isset($sexo)) echo "  ".$sexo ?>" disabled>
            </div>
            <div id="labels">
            	<label id="lbl-ult">Ultima Avaliação</label>
            </div>
            <div>
            	<input type="text" id="ultimaav" value="<?php if(isset($ultava)) echo "  ".$ultava ?>" disabled>
            	<input <?php if(!isset($nome)) echo "hidden" ?> type="submit" id="excluir" name="excluir" class="btn btn-dark btn-sm" value="Excluir Aluno" onclick="return confirm('Quer mesmo excluir este aluno?')">
            </div>

            <div>
            	<a id="novaav" class="btn btn-dark btn-sm" href="avaliacaofisica.php" style="line-height: 25px;">Nova Avaliação</a>
            	<a id="comparar" class="btn btn-dark btn-sm" href="comparar.php" style="padding: 17px;">Comparar</a>
            	<a id="exbtreino" class="btn btn-dark btn-sm" href="treino_exibe.php" style="line-height: 25px;">Exibe Treino</a>
            </div>
            <div id="tei">
            	<a id="treino" class="btn btn-dark btn-sm" href="treino.php" style="padding: 17px;">Novo Treino</a>
            	<input type="submit" id="exibirmedidas" name="exbmedidas" class="btn btn-dark btn-sm" value="Exibir Medidas" style="line-height: 25px;">
            	<a id="inicio" class="btn btn-dark btn-sm" href="calendario.php" style="padding: 17px;">Início</a>
            </div>

        </div>
    </form>

    <div <?php if($exibe == 0) echo "hidden" ?> id="right" class="container float-right">

    	<form action="#" method="post">
    		<div>
    			<label for="" style="margin-top: 2%">Avaliação dia:</label>
    			<select id="select-avaliacao" name="avaliacao">
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
    			<input type="submit" id="buscar" class="btn btn-dark btn-sm" name="buscar_avaliacao" value="Buscar" style="background-color: black;">
    		</div>
    		<div>
    			<input type="hidden" name="id_avaliacao" value="<?php if(isset($id_avaliacao)) echo $id_avaliacao ?>">
    			<input <?php if(!isset($pesogordo)) echo "hidden" ?> type="text" name="pesogordo" id="ppg" value="  Peso Gordo: <?php if(isset($pesogordo)) echo $pesogordo.'cm' ?>" placeholder="  Peso Gordo" disabled>
    			<input <?php if(!isset($pesomagro)) echo "hidden" ?> type="text" name="pesomagro" id="ppg" value="  Peso Magro: <?php if(isset($pesomagro)) echo $pesomagro.'cm' ?>" placeholder="  Peso Magro" disabled>
    			<input <?php if(!isset($gorduraatual)) echo "hidden" ?> type="text" name="gorduraatual" id="ppg" value="  Gordura Atual: <?php if(isset($gorduraatual)) echo $gorduraatual.'cm' ?>" placeholder="  Gordura Atual" disabled>
    		</div>
    		<div>
    			<input <?php if(!isset($tricipital)) echo "hidden" ?> type="text" name="tricipital" id="taa" value="  Tricipital: <?php if(isset($tricipital)) echo $tricipital.'cm' ?>" placeholder="  Tricipital" disabled>
    			<input <?php if(!isset($abdominal)) echo "hidden" ?> type="text" name="abdominal" id="taa" value="  Abdominal: <?php if(isset($abdominal)) echo $abdominal.'cm' ?>" placeholder="  Abdominal" disabled>
    			<input <?php if(!isset($auxiliarmedia)) echo "hidden" ?> type="text" name="auxiliarmedia" value="  Auxiliar Média: <?php if(isset($auxiliarmedia)) echo $auxiliarmedia.'cm' ?>" id="taa" placeholder="  Auxiliar Média" disabled> 
    		</div>
    		<div>
    			<input <?php if(!isset($subscapular)) echo "hidden" ?> type="text" name="subscapular" id="ssi" value="  Subscapular: <?php if(isset($subscapular)) echo $subscapular.'cm' ?>" placeholder="  Subscapular" disabled>
    			<input <?php if(!isset($suprailiaca)) echo "hidden" ?> type="text" name="suprailiaca" id="ssi" value="  Supra-Iliaca: <?php if(isset($suprailiaca)) echo $suprailiaca.'cm' ?>" placeholder="  Supra-Iliaca" disabled>
    			<input <?php if(!isset($imc)) echo "hidden" ?> type="text" name="imc" id="ssi" value="  IMC: <?php if(isset($imc)) echo $imc.'cm' ?>" placeholder="  IMC" disabled> 
    		</div>
    		<div>
    			<input <?php if(!isset($peitoral)) echo "hidden" ?> type="text" name="peitoral" id="pcc" value="  Peitoral: <?php if(isset($peitoral)) echo $peitoral.'cm' ?>" placeholder="  Peitoral" disabled>
    			<input <?php if(!isset($ccoxad)) echo "hidden" ?> type="text" name="coxad" id="pcc" value="  Coxa Direita: <?php if(isset($ccoxad)) echo $ccoxad.'cm' ?>" placeholder="  Coxa Direita" disabled>
    			<input <?php if(!isset($ccoxae)) echo "hidden" ?> type="text" name="coxae" id="pcc" value="  Coxa Esquerda: <?php if(isset($ccoxae)) echo $ccoxae.'cm' ?>" placeholder="  Coxa Esquerda" disabled>     
    		</div>
    		<div>
    			<input <?php if(!isset($bicepsd)) echo "hidden" ?> type="text" name="bicepsd" id="baa" value="  Biceps D: <?php if(isset($bicepsd)) echo $bicepsd.'cm' ?>" placeholder="  Biceps Direito" disabled>
    			<input <?php if(!isset($antebracod)) echo "hidden" ?> type="text" name="antebracod" id="baa" value="  Antebraço D: <?php if(isset($antebracod)) echo $antebracod.'cm' ?>" placeholder="  Antebraço Direito" disabled>
    			<input <?php if(!isset($abdomen)) echo "hidden" ?> type="text" name="abdomen" id="baa" value="  Abdomen: <?php if(isset($abdomen)) echo $abdomen.'cm' ?>" placeholder="  Abdomen" disabled>  
    		</div>
    		<div>
    			<input <?php if(!isset($bicepse)) echo "hidden" ?> type="text" name="bicepse" id="baq" value="  Biceps E: <?php if(isset($bicepse)) echo $bicepse.'cm' ?>" placeholder="  Biceps Esquerdo" disabled>
    			<input <?php if(!isset($antebracoe)) echo "hidden" ?> type="text" name="antebracoe" id="baq" value="  Antebraço E: <?php if(isset($antebracoe)) echo $antebracoe.'cm' ?>" placeholder="  Antebraço Esquerdo" disabled>
    			<input <?php if(!isset($quadril)) echo "hidden" ?> type="text" name="quadril" id="baq" value="  Quadril: <?php if(isset($quadril)) echo $quadril.'cm' ?>" placeholder="  Quadril" disabled> 
    		</div>
    		<div>
    			<input <?php if(!isset($pcoxad)) echo "hidden" ?> type="text" name="coxad" id="cpf" value="  Coxa Direira: <?php if(isset($pcoxad)) echo $pcoxad.'cm'?>" placeholder="  Coxa Direira" disabled>
    			<input <?php if(!isset($panturrilhad)) echo "hidden" ?> type="text" name="panturrilhad" id="cpf" value="  Panturrilha D: <?php if(isset($panturrilhad)) echo $panturrilhad.'cm' ?>" placeholder="  Panturrilha Direita" disabled>
    			<input <?php if(!isset($torax)) echo "hidden" ?> type="text" name="torax" id="cpf" value="  Torax: <?php if(isset($torax)) echo $torax.'cm' ?>" placeholder="  Torax" disabled> 
    		</div>
    		<div>
    			<input <?php if(!isset($pcoxae)) echo "hidden" ?> type="text" name="coxae" id="cpp" value="  Coxa Esquerda: <?php if(isset($pcoxae)) echo $pcoxae.'cm' ?>" placeholder="  Coxa Esquerda" disabled>
    			<input <?php if(!isset($panturrilhae)) echo "hidden" ?> type="text" name="panturrilhae" id="cpp" value="  Panturrilha E: <?php if(isset($panturrilhae)) echo $panturrilhae.'cm' ?>" placeholder="  Panturrilha Esquerda" disabled>
    			<input <?php if(!isset($cintura)) echo "hidden" ?> type="text" name="peso" id="cpp" value="  Cintura: <?php if(isset($cintura)) echo $cintura.'cm' ?>" placeholder="  Cintura" disabled> 
    		</div>
    		<hr>
    		<div>
    			<input <?php if(!isset($id_avaliacao)) echo "hidden" ?> type="submit" id="excava" name="excava" class="btn btn-danger btn-sm" value="Excluir Avaliação" onclick="return confirm('Quer mesmo excluir esta avaliação?')">
    		</div>
    	</form>
    </div>
</body>
</html>