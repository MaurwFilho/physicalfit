<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Alunos</title>
    <link rel="stylesheet" type="text/css" href="css/stylegerenciaralunos.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>

    <div class="container float-left">
    <div class="form-group">
        <input id="select-nome" type="text" list="nomes">
        <datalist id="nomes">
            <option value="Vinicius">
            <option value="Mauro">
            <option value="Ragnar">
        </datalist>
    </div>
    
    <div class="circle">
        <img src="#" alt="">
    </div>

    <div>
        <input type="text" name="nome" id="nome" placeholder="  Nome" disabled>
    </div>

    <div>
        <input type="text" name="idade" id="idade" placeholder="  Idade" disabled>
        <input type="text" name="estatura" id="estatura" placeholder="  Estatura" disabled>
        <input type="text" name="peso" id="peso" placeholder="  Peso" disabled>
    </div>
    <div>
        <input type="text" name="ultimaav" id="ultimaav" placeholder="  Ultima Avaliação" disabled>
        <input type="text" name="imc" id="imc" placeholder="  IMC" disabled>
    </div>
    <div>
        <a id="novaav" class="btn btn-dark btn-sm" href="avaliacaofisica.php" style="line-height: 25px;">Nova Avaliação</a>
        <a id="comparar" class="btn btn-dark btn-sm" href="comparar.php" style="padding: 17px;">Comparar</a>
        <a id="excluir" class="btn btn-dark btn-sm" style="padding: 17px;">Excluir</a>
    </div>
    <div id="tei">
        <a id="treino" class="btn btn-dark btn-sm" href="treino.php" style="padding: 17px;">Treino</a>
        <a id="exibirmedidas" class="btn btn-dark btn-sm" style="line-height: 25px;">Exibir Medidas</a>
        <a id="inicio" class="btn btn-dark btn-sm" href="calendario.php" style="padding: 17px;">Início</a>
    </div>
    </div>

    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>