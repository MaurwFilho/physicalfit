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

$del = 0;

$id = $_SESSION['id_aluno'];

$rs = $sql->select("SELECT idtreino FROM treino WHERE aluno_idaluno = $id;");
if ($rs) {
    $idtr = $rs[0]['idtreino'];

    $rs = $sql->select("SELECT * FROM treinoa WHERE treino_idtreino = $idtr;");

    $aexercicio1 = $rs[0]['exercicio'];
    $aexercicio2 = $rs[1]['exercicio'];
    $aexercicio3 = $rs[2]['exercicio'];
    $aexercicio4 = $rs[3]['exercicio'];
    $aexercicio5 = $rs[4]['exercicio'];
    $aexercicio6 = $rs[5]['exercicio'];
    $aexercicio7 = $rs[6]['exercicio'];
    $aexercicio8 = $rs[7]['exercicio'];

    $arepeticoes1 = $rs[0]['repeticoes'];
    $arepeticoes2 = $rs[1]['repeticoes'];
    $arepeticoes3 = $rs[2]['repeticoes'];
    $arepeticoes4 = $rs[3]['repeticoes'];
    $arepeticoes5 = $rs[4]['repeticoes'];
    $arepeticoes6 = $rs[5]['repeticoes'];
    $arepeticoes7 = $rs[6]['repeticoes'];
    $arepeticoes8 = $rs[7]['repeticoes'];

    $aseries1 = $rs[0]['series'];
    $aseries2 = $rs[1]['series'];
    $aseries3 = $rs[2]['series'];
    $aseries4 = $rs[3]['series'];
    $aseries5 = $rs[4]['series'];
    $aseries6 = $rs[5]['series'];
    $aseries7 = $rs[6]['series'];
    $aseries8 = $rs[7]['series'];

    $rs = $sql->select("SELECT * FROM treinob WHERE treino_idtreino = $idtr;");

    $bexercicio1 = $rs[0]['exercicio'];
    $bexercicio2 = $rs[1]['exercicio'];
    $bexercicio3 = $rs[2]['exercicio'];
    $bexercicio4 = $rs[3]['exercicio'];
    $bexercicio5 = $rs[4]['exercicio'];
    $bexercicio6 = $rs[5]['exercicio'];
    $bexercicio7 = $rs[6]['exercicio'];
    $bexercicio8 = $rs[7]['exercicio'];

    $brepeticoes1 = $rs[0]['repeticoes'];
    $brepeticoes2 = $rs[1]['repeticoes'];
    $brepeticoes3 = $rs[2]['repeticoes'];
    $brepeticoes4 = $rs[3]['repeticoes'];
    $brepeticoes5 = $rs[4]['repeticoes'];
    $brepeticoes6 = $rs[5]['repeticoes'];
    $brepeticoes7 = $rs[6]['repeticoes'];
    $brepeticoes8 = $rs[7]['repeticoes'];

    $bseries1 = $rs[0]['series'];
    $bseries2 = $rs[1]['series'];
    $bseries3 = $rs[2]['series'];
    $bseries4 = $rs[3]['series'];
    $bseries5 = $rs[4]['series'];
    $bseries6 = $rs[5]['series'];
    $bseries7 = $rs[6]['series'];
    $bseries8 = $rs[7]['series'];

    $rs = $sql->select("SELECT * FROM treinoc WHERE treino_idtreino = $idtr;");

    $cexercicio1 = $rs[0]['exercicio'];
    $cexercicio2 = $rs[1]['exercicio'];
    $cexercicio3 = $rs[2]['exercicio'];
    $cexercicio4 = $rs[3]['exercicio'];
    $cexercicio5 = $rs[4]['exercicio'];
    $cexercicio6 = $rs[5]['exercicio'];
    $cexercicio7 = $rs[6]['exercicio'];
    $cexercicio8 = $rs[7]['exercicio'];

    $crepeticoes1 = $rs[0]['repeticoes'];
    $crepeticoes2 = $rs[1]['repeticoes'];
    $crepeticoes3 = $rs[2]['repeticoes'];
    $crepeticoes4 = $rs[3]['repeticoes'];
    $crepeticoes5 = $rs[4]['repeticoes'];
    $crepeticoes6 = $rs[5]['repeticoes'];
    $crepeticoes7 = $rs[6]['repeticoes'];
    $crepeticoes8 = $rs[7]['repeticoes'];

    $cseries1 = $rs[0]['series'];
    $cseries2 = $rs[1]['series'];
    $cseries3 = $rs[2]['series'];
    $cseries4 = $rs[3]['series'];
    $cseries5 = $rs[4]['series'];
    $cseries6 = $rs[5]['series'];
    $cseries7 = $rs[6]['series'];
    $cseries8 = $rs[7]['series'];

} else {
    $del = 2;
}

if(isset($_POST['excluir'])) {
    $rs = $sql->select("SELECT idtreino FROM treino WHERE aluno_idaluno = $id;");    
    if ($rs) {
        $sql = "DELETE FROM treinoa WHERE treino_idtreino = $idtr;";
        $a = mysqli_query($conn, $sql);
        $sql = "DELETE FROM treinob WHERE treino_idtreino = $idtr;";
        $b = mysqli_query($conn, $sql);
        $sql = "DELETE FROM treinoc WHERE treino_idtreino = $idtr;";
        $c = mysqli_query($conn, $sql);
        $sql = "DELETE FROM treino WHERE aluno_idaluno = $id;";
        $t = mysqli_query($conn, $sql);
        if ($a && $b && $c && $t) {
            $del = 1;
        }
    } else {
        $del = 2;
    }
}


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
        if ($del == 1) {
            echo '<font color="#DDD"><strong>DELETADO</strong></font>';
        }
        if ($del == 2) {
            echo '<font color="#DDD"><strong>ESTE ALUNO NÃO POSSUI TREINO</strong></font>';
        }
        ?>
    </div>
    
    <form method="post" action="#">
        <div style="padding-bottom: 2%; margin-top: 20px;">

            <?php 
            $id = $_SESSION['id_aluno'];
            $sql = "SELECT * FROM aluno WHERE idaluno = $id;";
            $rs = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $nome = $row['nome'];
            }
            ?>
            <input id="select-treino" type="text" value="Aluno: <?php if(isset($nome)) echo $nome; ?>" disabled style="text-align: center; font-weight: bold;">
            <input <?php if($del == 2 || $del == 1) echo "hidden" ?> type="submit" id="adicionar" name="excluir" class="btn btn-dark btn-sm" value="Excluir" onclick="return confirm('Quer excluir este treino?')">
            <a id="voltar" class="btn btn-dark btn-sm float-right" href="gerenciaralunos.php">Voltar</a>

        </div>
        <div id="back">
            <div id="left" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino A</label>
                </div>
                <input type="text" name="aexercicio1" id="comptreino" value="<?php if(isset($aexercicio1)) echo $aexercicio1 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes1" id="comptreino" value="<?php if(isset($arepeticoes1)) echo $arepeticoes1 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries1" id="comptreino" value="<?php if(isset($aseries1)) echo $aseries1 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio2" id="comptreino" value="<?php if(isset($aexercicio2)) echo $aexercicio2 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes2" id="comptreino" value="<?php if(isset($arepeticoes2)) echo $arepeticoes2 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries2" id="comptreino" value="<?php if(isset($aseries2)) echo $aseries2 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio3" id="comptreino" value="<?php if(isset($aexercicio3)) echo $aexercicio3 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes3" id="comptreino" value="<?php if(isset($arepeticoes3)) echo $arepeticoes3 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries3" id="comptreino" value="<?php if(isset($aseries3)) echo $aseries3 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio4" id="comptreino" value="<?php if(isset($aexercicio4)) echo $aexercicio4 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes4" id="comptreino" value="<?php if(isset($arepeticoes4)) echo $arepeticoes4 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries4" id="comptreino" value="<?php if(isset($aseries4)) echo $aseries4 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio5" id="comptreino" value="<?php if(isset($aexercicio5)) echo $aexercicio5 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes5" id="comptreino" value="<?php if(isset($arepeticoes5)) echo $arepeticoes5 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries5" id="comptreino" value="<?php if(isset($aseries5)) echo $aseries5 ?>" placeholder="  Séries"disabled>

                <input type="text" name="aexercicio6" id="comptreino" value="<?php if(isset($aexercicio6)) echo $aexercicio6 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes6" id="comptreino" value="<?php if(isset($arepeticoes6)) echo $arepeticoes6 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries6" id="comptreino" value="<?php if(isset($aseries6)) echo $aseries6 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio7" id="comptreino" value="<?php if(isset($aexercicio7)) echo $aexercicio7 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes7" id="comptreino" value="<?php if(isset($arepeticoes7)) echo $arepeticoes7 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries7" id="comptreino" value="<?php if(isset($aseries7)) echo $aseries7 ?>" placeholder="  Séries" disabled>

                <input type="text" name="aexercicio8" id="comptreino" value="<?php if(isset($aexercicio8)) echo $aexercicio8 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="arepeticoes8" id="comptreino" value="<?php if(isset($arepeticoes8)) echo $arepeticoes8 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="aseries8" id="comptreino" value="<?php if(isset($aseries8)) echo $aseries8 ?>" placeholder="  Séries" disabled>
            </div>
            <div id="mid" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino B</label>
                </div>
                <input type="text" name="bexercicio1" id="comptreino" value="<?php if(isset($bexercicio1)) echo $bexercicio1 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes1" id="comptreino" value="<?php if(isset($brepeticoes1)) echo $brepeticoes1 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries1" id="comptreino" value="<?php if(isset($bseries1)) echo $bseries1 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio2" id="comptreino" value="<?php if(isset($bexercicio2)) echo $bexercicio2 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes2" id="comptreino" value="<?php if(isset($brepeticoes2)) echo $brepeticoes2 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries2" id="comptreino" value="<?php if(isset($bseries2)) echo $bseries2 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio3" id="comptreino" value="<?php if(isset($bexercicio3)) echo $bexercicio3 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes3" id="comptreino" value="<?php if(isset($brepeticoes3)) echo $brepeticoes3 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries3" id="comptreino" value="<?php if(isset($bseries3)) echo $bseries3 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio4" id="comptreino" value="<?php if(isset($bexercicio4)) echo $bexercicio4 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes4" id="comptreino" value="<?php if(isset($brepeticoes4)) echo $brepeticoes4 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries4" id="comptreino" value="<?php if(isset($bseries4)) echo $bseries4 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio5" id="comptreino" value="<?php if(isset($bexercicio5)) echo $bexercicio5 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes5" id="comptreino" value="<?php if(isset($brepeticoes5)) echo $brepeticoes5 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries5" id="comptreino" value="<?php if(isset($bseries5)) echo $bseries5 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio6" id="comptreino" value="<?php if(isset($bexercicio6)) echo $bexercicio6 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes6" id="comptreino" value="<?php if(isset($brepeticoes6)) echo $brepeticoes6 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries6" id="comptreino" value="<?php if(isset($bseries6)) echo $bseries6 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio7" id="comptreino" value="<?php if(isset($bexercicio7)) echo $bexercicio7 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes7" id="comptreino" value="<?php if(isset($brepeticoes7)) echo $brepeticoes7 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries7" id="comptreino" value="<?php if(isset($bseries7)) echo $bseries7 ?>" placeholder="  Séries" disabled>

                <input type="text" name="bexercicio8" id="comptreino" value="<?php if(isset($bexercicio8)) echo $bexercicio8 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="brepeticoes8" id="comptreino" value="<?php if(isset($brepeticoes8)) echo $brepeticoes8 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="bseries8" id="comptreino" value="<?php if(isset($bseries8)) echo $bseries8 ?>" placeholder="  Séries" disabled>
            </div>
            <div id="right" class="container">
                <div>
                    <label style="font-weight: bold;" for="">Treino C</label>
                </div>
                <input type="text" name="cexercicio1" id="comptreino" value="<?php if(isset($cexercicio1)) echo $cexercicio1 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes1" id="comptreino" value="<?php if(isset($crepeticoes1)) echo $crepeticoes1 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries1" id="comptreino" value="<?php if(isset($cseries1)) echo $cseries1 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio2" id="comptreino" value="<?php if(isset($cexercicio2)) echo $cexercicio2 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes2" id="comptreino" value="<?php if(isset($crepeticoes2)) echo $crepeticoes2 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries2" id="comptreino" value="<?php if(isset($cseries2)) echo $cseries2 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio3" id="comptreino" value="<?php if(isset($cexercicio3)) echo $cexercicio3 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes3" id="comptreino" value="<?php if(isset($crepeticoes3)) echo $crepeticoes3 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries3" id="comptreino" value="<?php if(isset($cseries3)) echo $cseries3 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio4" id="comptreino" value="<?php if(isset($cexercicio4)) echo $cexercicio4 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes4" id="comptreino" value="<?php if(isset($crepeticoes4)) echo $crepeticoes4 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries4" id="comptreino" value="<?php if(isset($cseries4)) echo $cseries4 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio5" id="comptreino" value="<?php if(isset($cexercicio5)) echo $cexercicio5 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes5" id="comptreino" value="<?php if(isset($crepeticoes5)) echo $crepeticoes5 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries5" id="comptreino" value="<?php if(isset($cseries5)) echo $cseries5 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio6" id="comptreino" value="<?php if(isset($cexercicio6)) echo $cexercicio6 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes6" id="comptreino" value="<?php if(isset($crepeticoes6)) echo $crepeticoes6 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries6" id="comptreino" value="<?php if(isset($cseries6)) echo $cseries6 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio7" id="comptreino" value="<?php if(isset($cexercicio7)) echo $cexercicio7 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes7" id="comptreino" value="<?php if(isset($crepeticoes7)) echo $crepeticoes7 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries7" id="comptreino" value="<?php if(isset($cseries7)) echo $cseries7 ?>" placeholder="  Séries" disabled>

                <input type="text" name="cexercicio8" id="comptreino" value="<?php if(isset($cexercicio8)) echo $cexercicio8 ?>" placeholder="  Exercicio" disabled>
                <input type="text" name="crepeticoes8" id="comptreino" value="<?php if(isset($crepeticoes8)) echo $crepeticoes8 ?>" placeholder="  Repetições" disabled>
                <input type="text" name="cseries8" id="comptreino" value="<?php if(isset($cseries8)) echo $cseries8 ?>" placeholder="  Séries" disabled>
            </div>
        </div>
    </form>
</body>
</html>