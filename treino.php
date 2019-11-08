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

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Treinos</title>
    <link rel="stylesheet" type="text/css" href="css/styletreino.css">
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
            echo '<font color="#DDD"><strong>SALVO COM SUCESSO</strong></font>';
        }
        if ($register == 2) {
            echo '<font color="#DDD"><strong>NÃO FOI POSSIVEL SALVAR O TREINO</strong></font>';
        }
        ?>
    </div>
    <form method="post" action="treino_salvar.php">

        <div style="padding-bottom: 1%; margin-top: 20px;">

            <?php 
            $id = $_SESSION['id_aluno'];
            $sql = "SELECT * FROM aluno WHERE idaluno = $id;";
            $rs = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $nome = $row['nome'];
            }
            ?>
            <input id="select-treino" type="text" value="Aluno: <?php if(isset($nome)) echo $nome; ?>" disabled>
            <input type="submit" id="adicionar" class="btn btn-dark btn-sm" value="Adicionar">
            <a id="voltar" class="btn btn-dark btn-sm float-right" href="gerenciaralunos.php">Voltar</a>
        </div>
        <div id="back">
            <div id="left" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino A</label>
                </div>
                <input type="text" name="aexercicio1" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes1" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries1" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio2" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes2" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries2" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio3" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes3" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries3" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio4" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes4" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries4" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio5" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes5" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries5" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio6" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes6" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries6" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio7" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes7" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries7" id="comptreino" placeholder="  Séries">

                <input type="text" name="aexercicio8" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="arepeticoes8" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="aseries8" id="comptreino" placeholder="  Séries">
            </div>
            <div id="mid" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino B</label>
                </div>
                <input type="text" name="bexercicio1" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes1" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries1" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio2" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes2" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries2" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio3" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes3" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries3" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio4" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes4" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries4" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio5" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes5" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries5" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio6" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes6" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries6" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio7" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes7" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries7" id="comptreino" placeholder="  Séries">

                <input type="text" name="bexercicio8" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="brepeticoes8" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="bseries8" id="comptreino" placeholder="  Séries">
            </div>
            <div id="right" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino C</label>
                </div>
                <input type="text" name="cexercicio1" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes1" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries1" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio2" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes2" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries2" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio3" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes3" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries3" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio4" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes4" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries4" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio5" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes5" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries5" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio6" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes6" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries6" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio7" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes7" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries7" id="comptreino" placeholder="  Séries">

                <input type="text" name="cexercicio8" id="comptreino" placeholder="  Exercicio" >
                <input type="text" name="crepeticoes8" id="comptreino" placeholder="  Repetições" >
                <input type="text" name="cseries8" id="comptreino" placeholder="  Séries">
            </div>
        </div>
    </form>
</body>
</html>