<?php 

session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

if (!isset($_SESSION['id_aluno'])) {
    header('Location: gerenciaralunos.php');
}

$register = isset($_GET['register']) ? $_GET['register'] : 0;

require_once("conexao.php");

$id = isset($_SESSION['id_aluno']) ? $_SESSION['id_aluno'] : null;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação Fisica</title>
    <link rel="stylesheet" type="text/css" href="css/styleavaliacaofisica.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>
    <div style="text-align: center;">
        <?php 
        if ($register == 1) {
            echo '<font color="#444"><strong>SALVO COM SUCESSO</strong></font>';
        }
        if ($register == 2) {
            echo '<font color="#444"><strong>NÃO FOI POSSÍVEL SALVAR AVALIAÇÃO</strong></font>';
        }
        ?>
    </div>

    <form method="post" action="avaliacaofisica_salvar.php">
        <div id="voltar">
            <a class="btn btn-default btn-sm" href="gerenciaralunos.php">Voltar</a>
        </div>
        <div class="container float-left" id="left">
            <div>
                <?php 
                $sql = "SELECT * FROM aluno WHERE idaluno = $id;";
                $rs = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($rs)){
                    $nome = $row['nome'];
                }
                ?>
                <input type="text" name="nome" id="nome" value="<?php if(isset($nome)) echo $nome; ?>" placeholder="  Nome" disabled>
            </div>
            <div style="position: relative;">
                <input type="text" name="estatura" id="iep" placeholder="  Estatura">
                <input type="text" name="peso" id="iep" placeholder="  Peso">
                <input type="text" name="repouso" id="fcrepouso" placeholder="  FC Repouso">
                <button type="submit" class="btn btn-dark btn-sm" id="ies">Salvar</button>
            </div>


            <div>
                <label id="perimetros">Perímetros</label>
                <label id="ccdc">Composição Corporal por Dobras Cotâneas</label>
            </div>
            <div>
                <input type="text" name="bicepsd" id="baa" placeholder="  Biceps Direito">
                <input type="text" name="antebracod" id="baa" placeholder="  Antebraço Direito">
                <input type="text" name="abdomen" id="baa" placeholder="  Abdomen">  

                <input type="text" name="pesogordo" id="ppg" placeholder="  Peso Gordo" style="margin-left: 35px;">
                <input type="text" name="pesomagro" id="ppg" placeholder="  Peso Magro">
                <input type="text" name="gorduraatual" id="ppg" placeholder="  Gordura Atual">
            </div>
            <div>
                <input type="text" name="bicepse" id="baq" placeholder="  Biceps Esquerdo">
                <input type="text" name="antebracoe" id="baq" placeholder="  Antebraço Esquerdo">
                <input type="text" name="quadril" id="baq" placeholder="  Quadril"> 

                <input type="text" name="tricipital" id="taa" placeholder="  Tricipital" style="margin-left: 35px;">
                <input type="tex    t" name="abdominal" id="taa" placeholder="  Abdominal">
                <input type="text" name="auxiliarmedia" id="taa" placeholder="  Auxiliar Média">
            </div>
            <div>
                <input type="text" name="pcoxad" id="cpt" placeholder="  Coxa Direira">
                <input type="text" name="panturrilhad" id="cpt" placeholder="  Panturrilha Direita">
                <input type="text" name="torax" id="cpt" placeholder="  Torax"> 

                <input type="text" name="subscapular" id="ssi" placeholder="  Subscapular" style="margin-left: 35px;">
                <input type="text" name="suprailiaca" id="ssi" placeholder="  Supra-Iliaca">
                <input type="text" name="imc" id="ssi" placeholder="  IMC">
            </div>
            <div>
                <input type="text" name="pcoxae" id="cpa" placeholder="  Coxa Esquerda">
                <input type="text" name="panturrilhae" id="cpa" placeholder="  Panturrilha Esquerda">
                <input type="text" name="cintura" id="cpa" placeholder="  Cintura">

                <input type="text" name="peitoral" id="pcc" placeholder="  Peitoral" style="margin-left: 35px;">
                <input type="text" name="ccoxad" id="pcc" placeholder="  Coxa Direita">
                <input type="text" name="ccoxae" id="pcc" placeholder="  Coxa Esquerda">
            </div>
        </div>
    </form>
</body>
</html>