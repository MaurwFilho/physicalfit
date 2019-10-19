<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Comparar Medidas</title>
    <link rel="stylesheet" type="text/css" href="css/stylecomparar.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="imagem/png" href="img/icone.png"/>
</head>
<body>
    <header>
        <h1 id="physicalfit">PhysicalFit</h1>
    </header>
    <div id="voltar">
        <a id="voltar" class="btn btn-default btn-sm" href="gerenciaralunos.php">Voltar</a>
    </div>
    <div class="form-group" style="padding-bottom: 2%;">
        <input id="select-avaliacao" type="text" list="avaliacoes">
        <datalist id="avaliacoes">
            <option value="Avaliação dia: 00/00/0000">
            </datalist>

            <input id="select-avaliacao2" type="text" list="avaliacoes">
            <datalist id="avaliacoes">
                <option value="Avaliação dia: 00/00/0000">
                </datalist>
            </div>
            <div id="back">
                <div id="left" class="container">
                    <div>
                        <label style="font-weight: bold;" for="">Avaliação dia:</label>
                    </div>
                    <input type="text" name="pesogordo" id="compleft" placeholder="  Peso Gordo" disabled>
                    <input type="text" name="pesomagro" id="compleft" placeholder="  Peso Magro" disabled>
                    <input type="text" name="gorduraatual" id="compleft" placeholder="  Gordura Atual" disabled>

                    <input type="text" name="tricipital" id="compleft" placeholder="  Tricipital" disabled>
                    <input type="text" name="abdominal" id="compleft" placeholder="  Abdominal" disabled>
                    <input type="text" name="auxiliarmedia" id="compleft" placeholder="  Auxiliar Média" disabled>

                    <input type="text" name="subscapular" id="compleft" placeholder="  Subscapular" disabled>
                    <input type="text" name="suprailiaca" id="compleft" placeholder="  Supra-Iliaca" disabled>
                    <input type="text" name="imc" id="compleft" placeholder="  IMC" disabled>

                    <input type="text" name="peitoral" id="compleft" placeholder="  Peitoral" disabled>
                    <input type="text" name="coxad" id="compleft" placeholder="  Coxa Direita" disabled>
                    <input type="text" name="coxae" id="compleft" placeholder="  Coxa Esquerda" disabled>

                    <input type="text" name="bicepsd" id="compleft" placeholder="  Biceps Direito" disabled>
                    <input type="text" name="antebracod" id="compleft" placeholder="  Antebraço Direito" disabled>
                    <input type="text" name="abdomen" id="compleft" placeholder="  Abdomen" disabled>

                    <input type="text" name="bicepse" id="compleft" placeholder="  Biceps Esquerdo" disabled>
                    <input type="text" name="antebracoe" id="compleft" placeholder="  Antebraço Esquerdo" disabled>
                    <input type="text" name="quadril" id="compleft" placeholder="  Quadril" disabled>

                    <input type="text" name="coxad" id="compleft" placeholder="  Coxa Direira" disabled>
                    <input type="text" name="panturrilhad" id="compleft" placeholder="  Panturrilha Direita" disabled>
                    <input type="text" name="fcrepuso" id="compleft" placeholder="  FC Repouso" disabled>

                    <input type="text" name="coxae" id="compleft" placeholder="  Coxa Esquerda" disabled>
                    <input type="text" name="panturrilhae" id="compleft" placeholder="  Panturrilha Esquerda" disabled>
                    <input type="text" name="peso" id="compleft" placeholder="  Peso" disabled> 
                </div>
                <div id="mid" class="container">
                    <div>
                        <label style="font-weight: bold;" for="">Avaliação dia:</label>
                    </div>
                    <input type="text" name="pesogordo" id="compmid" placeholder="  Peso Gordo" disabled>
                    <input type="text" name="pesomagro" id="compmid" placeholder="  Peso Magro" disabled>
                    <input type="text" name="gorduraatual" id="compmid" placeholder="  Gordura Atual" disabled>

                    <input type="text" name="tricipital" id="compmid" placeholder="  Tricipital" disabled>
                    <input type="text" name="abdominal" id="compmid" placeholder="  Abdominal" disabled>
                    <input type="text" name="auxiliarmedia" id="compmid" placeholder="  Auxiliar Média" disabled>

                    <input type="text" name="subscapular" id="compmid" placeholder="  Subscapular" disabled>
                    <input type="text" name="suprailiaca" id="compmid" placeholder="  Supra-Iliaca" disabled>
                    <input type="text" name="imc" id="compmid" placeholder="  IMC" disabled>

                    <input type="text" name="peitoral" id="compmid" placeholder="  Peitoral" disabled>
                    <input type="text" name="coxad" id="compmid" placeholder="  Coxa Direita" disabled>
                    <input type="text" name="coxae" id="compmid" placeholder="  Coxa Esquerda" disabled>

                    <input type="text" name="bicepsd" id="compmid" placeholder="  Biceps Direito" disabled>
                    <input type="text" name="antebracod" id="compmid" placeholder="  Antebraço Direito" disabled>
                    <input type="text" name="abdomen" id="compmid" placeholder="  Abdomen" disabled>

                    <input type="text" name="bicepse" id="compmid" placeholder="  Biceps Esquerdo" disabled>
                    <input type="text" name="antebracoe" id="compmid" placeholder="  Antebraço Esquerdo" disabled>
                    <input type="text" name="quadril" id="compmid" placeholder="  Quadril" disabled>

                    <input type="text" name="coxad" id="compmid" placeholder="  Coxa Direira" disabled>
                    <input type="text" name="panturrilhad" id="compmid" placeholder="  Panturrilha Direita" disabled>
                    <input type="text" name="fcrepuso" id="compmid" placeholder="  FC Repouso" disabled>

                    <input type="text" name="coxae" id="compmid" placeholder="  Coxa Esquerda" disabled>
                    <input type="text" name="panturrilhae" id="compmid" placeholder="  Panturrilha Esquerda" disabled>
                    <input type="text" name="peso" id="compmid" placeholder="  Peso" disabled> 
                </div>
                <div id="right" class="container">
                    <div>
                        <label style="font-weight: bold;" for="">Comparação</label>
                    </div>
                    <input type="text" name="pesogordo" id="compright" placeholder="  Peso Gordo" disabled>
                    <input type="text" name="pesomagro" id="compright" placeholder="  Peso Magro" disabled>
                    <input type="text" name="gorduraatual" id="compright" placeholder="  Gordura Atual" disabled>

                    <input type="text" name="tricipital" id="compright" placeholder="  Tricipital" disabled>
                    <input type="text" name="abdominal" id="compright" placeholder="  Abdominal" disabled>
                    <input type="text" name="auxiliarmedia" id="compright" placeholder="  Auxiliar Média" disabled>

                    <input type="text" name="subscapular" id="compright" placeholder="  Subscapular" disabled>
                    <input type="text" name="suprailiaca" id="compright" placeholder="  Supra-Iliaca" disabled>
                    <input type="text" name="imc" id="compright" placeholder="  IMC" disabled>

                    <input type="text" name="peitoral" id="compright" placeholder="  Peitoral" disabled>
                    <input type="text" name="coxad" id="compright" placeholder="  Coxa Direita" disabled>
                    <input type="text" name="coxae" id="compright" placeholder="  Coxa Esquerda" disabled>

                    <input type="text" name="bicepsd" id="compright" placeholder="  Biceps Direito" disabled>
                    <input type="text" name="antebracod" id="compright" placeholder="  Antebraço Direito" disabled>
                    <input type="text" name="abdomen" id="compright" placeholder="  Abdomen" disabled>

                    <input type="text" name="bicepse" id="compright" placeholder="  Biceps Esquerdo" disabled>
                    <input type="text" name="antebracoe" id="compright" placeholder="  Antebraço Esquerdo" disabled>
                    <input type="text" name="quadril" id="compright" placeholder="  Quadril" disabled>

                    <input type="text" name="coxad" id="compright" placeholder="  Coxa Direira" disabled>
                    <input type="text" name="panturrilhad" id="compright" placeholder="  Panturrilha Direita" disabled>
                    <input type="text" name="fcrepuso" id="compright" placeholder="  FC Repouso" disabled>

                    <input type="text" name="coxae" id="compright" placeholder="  Coxa Esquerda" disabled>
                    <input type="text" name="panturrilhae" id="compright" placeholder="  Panturrilha Esquerda" disabled>
                    <input type="text" name="peso" id="compright" placeholder="  Peso" disabled> 
                </div>
            </div>

            <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        </body>
        </html>