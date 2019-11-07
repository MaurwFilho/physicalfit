<?php 

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>

<body>
    <form method="post" action="login_valida.php" id="formulario">
        <div id="inicio">
            <a class="btn btn-default btn-sm" href="index.php" style="color: white;">Início</a>
        </div>
        <div class="container">


            <div>
                <label id="physicalfit" class="lb">PhysicalFit</label>
            </div>

            <input type="email" name="email" id="email" placeholder="  E-mail" required> 
            <input type="password" name="senha" id="senha" placeholder="  Senha" required> 

            <div>
                <button type="submit" id="bt" class="btn btn-dark btn-sm">Login</button>
            </div>

            <br>

            <div>
                <a id="esquecisenha" href="#" >Esqueci Minha Senha</a>
            </div>

            <div>
                <a id="cadastrar" href="cadastro.php">Cadastrar-se</a>
            </div>
            <div>
                <?php 
                    if ($erro == 1) {
                        echo '<font color="#FFFF00"><strong>Usuário ou senha inválido(s)</strong></font>';
                    }
                 ?>
            </div>

        </div>

    </form>

    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>