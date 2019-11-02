<?php 

session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo Aluno</title>
    <link rel="stylesheet" type="text/css" href="css/stylenovoaluno.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>
    <div id="voltar">
        <a class="btn btn-default btn-sm" href="calendario.php">Voltar</a>
    </div>

    <form method="post" action="novo_aluno_salvar.php">
        <div class="row">   
            <div class="container">
                <?php 
                if ($erro == 1) {
                    echo '<font color="#FFFF00"><strong>Erro ao salvar aluno</strong></font>';
                }
                ?>
                <div>
                    <input type="name" name="nome" id="nome" placeholder="  Nome Completo" required>
                </div>
                <div>
                    <input type="date" name="nascimento" id="nascimento" placeholder="  Data de Nascimento" required>
                    <input type="text" name="celular" id="celular" placeholder="  Celular" required>
                    <input type="text" name="sexo" id="sexo" placeholder="  Sexo">
                </div>
                <div>
                    <input type="text" name="endereco" id="endereco" placeholder="  Endereço" required>
                </div>
                <div>
                    <input type="text" name="bairro" id="bairro" placeholder="  Bairro" required>
                    <input type="text" name="cep" id="cep" placeholder="  CEP" required>
                </div>
                <div>
                    <input type="text" name="objetivo" id="objetivo" placeholder="  Objetivo" required>
                </div>
                <div>
                    <button type="submit" name="salvar" id="bt" class="btn btn-dark btn-sm">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>