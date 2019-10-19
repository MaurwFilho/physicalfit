<?php 


session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}


$register = isset($_GET['register']) ? $_GET['register'] : 0;


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação Fisica</title>
    <link rel="stylesheet" type="text/css" href="css/styleavaliacaofisica.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>

    <form method="post" action="">
        <form method="post" action="">
            <div>
                <?php 
                if ($register == 1) {
                    echo '<font color="#008000"><strong>Salvo com sucesso</strong></font>';
                }
                if ($register == 2) {
                    echo '<font color="#FF0000"><strong>Não foi possível salvar avaliação</strong></font>';
                }
                ?>
            </div>
            <div id="voltar">
                <a id="voltar" class="btn btn-default btn-sm" href="calendario.php">Voltar</a>
            </div>
            <div class="container float-left" id="left">
                <div>
                    <input type="text" name="nome" id="nome" placeholder="  Nome">
                </div>
                <div style="position: relative;">
                    <input type="text" name="estatura" id="iep" placeholder="  Estatura">
                    <input type="text" name="peso" id="iep" placeholder="  Peso">
                    <input type="text" name="fcrepouso" id="fcrepouso" placeholder="  FC Repouso">
                </div>
                <div>
                    <input type="date" name="data" id="data">
                    <button type="submit" class="btn btn-dark btn-sm" id="ies">Salvar</button>
                </div>
            </form>

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
                <input type="text" name="coxad" id="cpt" placeholder="  Coxa Direira">
                <input type="text" name="panturrilhad" id="cpt" placeholder="  Panturrilha Direita">
                <input type="text" name="torax" id="cpt" placeholder="  Torax"> 

                <input type="text" name="subscapular" id="ssi" placeholder="  Subscapular" style="margin-left: 35px;">
                <input type="text" name="suprailiaca" id="ssi" placeholder="  Supra-Iliaca">
                <input type="text" name="imc" id="ssi" placeholder="  IMC">
            </div>
            <div>
                <input type="text" name="coxae" id="cpa" placeholder="  Coxa Esquerda">
                <input type="text" name="panturrilhae" id="cpa" placeholder="  Panturrilha Esquerda">
                <input type="text" name="cintura" id="cpa" placeholder="  Cintura">

                <input type="text" name="peitoral" id="pcc" placeholder="  Peitoral" style="margin-left: 35px;">
                <input type="text" name="coxad" id="pcc" placeholder="  Coxa Direita">
                <input type="text" name="coxae" id="pcc" placeholder="  Coxa Esquerda"> 
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-sm" id="ies" style="margin-top: 418px;">Salvar</button>
    </form>

    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>