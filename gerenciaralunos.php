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
    if (isset($_SESSION['id_aluno'])){
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

if (isset($_POST['buscar_avaliacao'])) {
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
}

if (isset($_POST['exbmedidas'])) {
    if (!isset($_SESSION['id_aluno'])){
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
        ?>
    </div>

    <div id="voltar">
        <a  class="btn btn-sm" href="calendario.php" style="color: #444;">Voltar</a>
    </div>

    <form action="#" method="post">
        <div class="container float-left">
            <div class="form-group" style="margin-bottom: 20px;">

                <label id="lbl">Selecione um aluno</label>

                <select id="select-nome" name="nomes">
                    <?php 
                    $query = "SELECT * FROM aluno";
                    $result = mysqli_query($conn, $query);
                    ?>

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

            <div>
                <input type="text" id="nome" value="<?php if(isset($nome)) echo "  ".$nome ?>" placeholder="  Nome" disabled>
            </div>

            <div>
                <input type="text" id="idade" value="<?php if(isset($nascimento)) echo "  ".$nascimento ?>" placeholder="  Nascimento" disabled>
                <input type="text" id="estatura" value="<?php if(isset($estatura)) echo "  ".$estatura ?>" placeholder="  Estatura" disabled>
                <input type="text" id="peso" value="<?php if(isset($peso)) echo "  ".$peso ?>" placeholder="  Peso" disabled>
            </div>
            <div>
                <input type="text" id="objetivo" value="<?php if(isset($objetivo)) echo "  ".$objetivo ?>" placeholder="  Objetivo" disabled>
                <input type="text" id="sexo" value="<?php if(isset($sexo)) echo "  ".$sexo ?>" placeholder="  Sexo" disabled>
            </div>
            <div>
                <input type="text" id="ultimaav" value="<?php if(isset($ultava)) echo "  ".$ultava ?>" placeholder="  Ultima Avaliação" disabled>
                <input <?php if(!isset($nome)) echo "hidden" ?> type="submit" id="excluir" class="btn btn-dark btn-sm" value="Excluir Aluno" onclick="return confirm('Quer mesmo excluir este aluno?')">
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
                        <option value="<?php echo $row['idavaliacao'] ?>"><?php echo date( 'd-m-Y' , strtotime( $row['data_avaliacao'] ) )  ?></option>
                    <?php }
                    ?>
                </select>
                <input type="submit" id="buscar" class="btn btn-dark btn-sm" name="buscar_avaliacao" value="Buscar" style="background-color: black;">
            </div>
        </form>

        <div>
            <input type="text" name="pesogordo" id="ppg" value="  Peso Gordo: <?php if(isset($pesogordo)) echo $pesogordo ?>" placeholder="  Peso Gordo" disabled>
            <input type="text" name="pesomagro" id="ppg" value="  Peso Magro: <?php if(isset($pesomagro)) echo $pesomagro ?>" placeholder="  Peso Magro" disabled>
            <input type="text" name="gorduraatual" id="ppg" value="  Gordura Atual: <?php if(isset($gorduraatual)) echo $gorduraatual ?>" placeholder="  Gordura Atual" disabled>
        </div>
        <div>
            <input type="text" name="tricipital" id="taa" value="  Tricipital: <?php if(isset($tricipital)) echo $tricipital ?>" placeholder="  Tricipital" disabled>
            <input type="text" name="abdominal" id="taa" value="  Abdominal: <?php if(isset($abdominal)) echo $abdominal ?>" placeholder="  Abdominal" disabled>
            <input type="text" name="auxiliarmedia" value="  Auxiliar Média: <?php if(isset($auxiliarmedia)) echo $auxiliarmedia ?>" id="taa" placeholder="  Auxiliar Média" disabled> 
        </div>
        <div>
            <input type="text" name="subscapular" id="ssi" value="  Subscapular: <?php if(isset($subscapular)) echo $subscapular ?>" placeholder="  Subscapular" disabled>
            <input type="text" name="suprailiaca" id="ssi" value="  Supra-Iliaca: <?php if(isset($suprailiaca)) echo $suprailiaca ?>" placeholder="  Supra-Iliaca" disabled>
            <input type="text" name="imc" id="ssi" value="  IMC: <?php if(isset($imc)) echo $imc ?>" placeholder="  IMC" disabled> 
        </div>
        <div>
            <input type="text" name="peitoral" id="pcc" value="  Peitoral: <?php if(isset($peitoral)) echo $peitoral ?>" placeholder="  Peitoral" disabled>
            <input type="text" name="coxad" id="pcc" value="  Coxa Direita: <?php if(isset($ccoxad)) echo $ccoxad ?>" placeholder="  Coxa Direita" disabled>
            <input type="text" name="coxae" id="pcc" value="  Coxa Esquerda: <?php if(isset($ccoxae)) echo $ccoxae ?>" placeholder="  Coxa Esquerda" disabled>     
        </div>
        <div>
            <input type="text" name="bicepsd" id="baa" value="  Biceps Direito: <?php if(isset($bicepsd)) echo $bicepsd ?>" placeholder="  Biceps Direito" disabled>
            <input type="text" name="antebracod" id="baa" value="  Antebraço D: <?php if(isset($antebracod)) echo $antebracod ?>" placeholder="  Antebraço Direito" disabled>
            <input type="text" name="abdomen" id="baa" value="  Abdomen: <?php if(isset($abdomen)) echo $abdomen ?>" placeholder="  Abdomen" disabled>  
        </div>
        <div>
            <input type="text" name="bicepse" id="baq" value="  Biceps Esquerdo: <?php if(isset($bicepse)) echo $bicepse ?>" placeholder="  Biceps Esquerdo" disabled>
            <input type="text" name="antebracoe" id="baq" value="  Antebraço E: <?php if(isset($antebracoe)) echo $antebracoe ?>" placeholder="  Antebraço Esquerdo" disabled>
            <input type="text" name="quadril" id="baq" value="  Quadril: <?php if(isset($quadril)) echo $quadril ?>" placeholder="  Quadril" disabled> 
        </div>
        <div>
            <input type="text" name="coxad" id="cpf" value="  Coxa Direira: <?php if(isset($pcoxad)) echo $pcoxad ?>" placeholder="  Coxa Direira" disabled>
            <input type="text" name="panturrilhad" id="cpf" value="  Panturrilha D: <?php if(isset($panturrilhad)) echo $panturrilhad ?>" placeholder="  Panturrilha Direita" disabled>
            <input type="text" name="torax" id="cpf" value="  Torax: <?php if(isset($torax)) echo $torax ?>" placeholder="  Torax" disabled> 
        </div>
        <div>
            <input type="text" name="coxae" id="cpp" value="  Coxa Esquerda: <?php if(isset($pcoxae)) echo $pcoxae ?>" placeholder="  Coxa Esquerda" disabled>
            <input type="text" name="panturrilhae" id="cpp" value="  Panturrilha E: <?php if(isset($panturrilhae)) echo $panturrilhae ?>" placeholder="  Panturrilha Esquerda" disabled>
            <input type="text" name="peso" id="cpp" value="  Cintura: <?php if(isset($cintura)) echo $cintura ?>" placeholder="  Cintura" disabled> 
        </div>
    </div>
</body>
</html>