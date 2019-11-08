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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>

    <div style="text-align: center;">
        <?php 
        if ($erro == 1) {
            echo '<font color="#444"><strong>ERRO AO SALVAR ALUNO</strong></font>';
        }
        ?>
    </div>

    <div id="voltar">
        <a class="btn btn-default btn-sm" href="calendario.php">Voltar</a>
    </div>

    <form method="post" action="novo_aluno_salvar.php">
        <div class="row">   
            <div class="container">
                <div>
                    <input type="name" name="nome" id="nome" placeholder="  Nome Completo" required>
                </div>
                <div>
                    <input type="date" name="nascimento" id="nascimento" placeholder="  Data de Nascimento" required>
                    <input type="text" name="celular" id="celular" placeholder="  Celular" required>
                    <label id="sexo">Sexo</label>
                    <input type="radio" name="sexo" id="masculino" value="masculino">
                    <label for="sexo" id="sexo">Masculino</label>
                    <input type="radio" name="sexo" id="feminino" value="feminino">
                    <label for="sexo" id="sexo">Feminino</label>
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