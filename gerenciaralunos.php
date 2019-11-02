<?php 


session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

$conn = mysqli_connect("localhost", "root", "", "physicalfit");

if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
}

if (isset($_POST['buscar'])) {
    if(isset($_POST['nomes'])){
        $id = $_POST['nomes'];
        $_SESSION['id_aluno'] = $id;
        $sql = "SELECT * FROM aluno WHERE idaluno = $id;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $nome = $row['nome'];
            $nascimento = $row['nascimento'];
        }
        $sqlultava = "SELECT * FROM avaliacao WHERE idavaliacao = $id ORDER BY idavaliacao DESC LIMIT 1;";
        $rs = mysqli_query($conn, $sqlultava);
        while($row = mysqli_fetch_array($rs)){
            $ultava = $row['data_avaliacao'];
            $estatura = $row['estatura'];
            $peso = $row['peso'];
        }
    }
}


?>


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

            <label id="lbl">Selecione um aluno</label>
            <form action="#" method="post">
                <select id="select-nome" name="nomes">
                    <?php 
                    $sql = "SELECT * FROM aluno";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['idaluno'] ?>"><?php echo $row['nome'] ?></option>
                    <?php } ?>
                </select>
                <input type="submit" id="buscar" class="btn btn-dark btn-sm" name="buscar" value="Buscar">
            </form>

        </div>


        <div class="circle">
            <img src="#" alt="">
        </div>

        <div>
            <input type="text" name="nome" id="nome" value="<?php if(isset($nome)) echo $nome; ?>" placeholder="  Nome" disabled>
        </div>

        <div>
            <input type="text" name="idade" id="idade" value="<?php if(isset($nascimento)) echo $nascimento; ?>" placeholder="  Nascimento" disabled>
            <input type="text" name="estatura" id="estatura" value="<?php if(isset($estatura)) echo $estatura; ?>" placeholder="  Estatura" disabled>
            <input type="text" name="peso" id="peso" value="<?php if(isset($peso)) echo$peso ?>" placeholder="  Peso" disabled>
        </div>
        <div>
            <input type="text" name="ultimaav" id="ultimaav" value="<?php if(isset($ultava)) echo $ultava; ?>" placeholder="  Ultima Avaliação" disabled>
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