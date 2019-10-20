<?php 

session_start();

require_once("Sql.php");

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : null;
$estatura = isset($_POST['estatura']) ? $_POST['estatura'] : null;
$peso = isset($_POST['peso']) ? $_POST['peso'] : null;
$repouso = isset($_POST['repouso']) ? $_POST['repouso'] : null;


$c_pesogordo = isset($_POST['pesogordo']) ? $_POST['pesogordo'] : null;
$c_tricipital = isset($_POST['tricipital']) ? $_POST['tricipital'] : null;
$c_subscapular = isset($_POST['subscapular']) ? $_POST['subscapular'] : null;
$c_peitoral = isset($_POST['peitoral']) ? $_POST['peitoral'] : null;
$c_abdominal = isset($_POST['abdominal']) ? $_POST['abdominal'] : null;
$c_suprailiaca = isset($_POST['suprailiaca']) ? $_POST['suprailiaca'] : null;
$c_coxad = isset($_POST['coxad']) ? $_POST['coxad'] : null;
$c_gorduraatual = isset($_POST['gorduraatual']) ? $_POST['gorduraatual'] : null;
$c_auxiliarmedia = isset($_POST['auxiliarmedia']) ? $_POST['auxiliarmedia'] : null;
$c_imc = isset($_POST['imc']) ? $_POST['imc'] : null;
$c_coxae = isset($_POST['coxae']) ? $_POST['coxae'] : null;
$c_pesomagro = isset($_POST['pesomagro']) ? $_POST['pesomagro'] : null;
$p_bicepsd = isset($_POST['bicepsd']) ? $_POST['bicepsd'] : null;
$p_bicepse = isset($_POST['bicepse']) ? $_POST['bicepse'] : null;
$p_coxad = isset($_POST['coxad']) ? $_POST['coxad'] : null;
$p_coxae = isset($_POST['coxae']) ? $_POST['coxae'] : null;
$p_antebracod = isset($_POST['antebracod']) ? $_POST['antebracod'] : null;
$p_antebracoe = isset($_POST['antebracoe']) ? $_POST['antebracoe'] : null;
$p_panturrilhad = isset($_POST['panturrilhad']) ? $_POST['panturrilhad'] : null;
$p_panturrilhae = isset($_POST['panturrilhae']) ? $_POST['panturrilhae'] : null;
$p_abdomen = isset($_POST['abdomen']) ? $_POST['abdomen'] : null;
$p_quadril = isset($_POST['quadril']) ? $_POST['quadril'] : null;
$p_torax = isset($_POST['torax']) ? $_POST['torax'] : null;
$p_cintura = isset($_POST['cintura']) ? $_POST['cintura'] : null;


$sql = new Sql();

$result = $sql->select("CALL avaliacao_insert(:nome, :sexo, :nascimento, :estatura, :peso, :repouso, :c_pesogordo, :c_tricipital, :c_subscapular, :c_peitoral, :c_abdominal, :c_suprailiaca, :c_coxad, :c_gorduraatual, :c_auxiliarmedia, :c_imc, :c_coxae, :c_pesomagro, :p_bicepsd, :p_bicepse, :p_coxad, :p_coxae, :p_antebracod, :p_antebracoe, :p_panturrilhad, :p_panturrilhae, :p_abdomen, :p_quadril, :p_torax, :p_cintura)", array(
	":nome"=>$nome,
	":sexo"=>$sexo,
	":nascimento"=>$nascimento,
	":estatura"=>$estatura,
	":peso"=>$peso,
	":repouso"=>$repouso,
	":c_pesogordo"=>$c_pesogordo,
	":c_tricipital"=>$c_tricipital,
	":c_subscapular"=>$c_subscapular,
	":c_peitoral"=>$c_peitoral,
	":c_abdominal"=>$c_abdominal,
	":c_suprailiaca"=>$c_suprailiaca,
	":c_coxad"=>$c_coxad,
	":c_gorduraatual"=>$c_gorduraatual,
	":c_auxiliarmedia"=>$c_auxiliarmedia,
	":c_imc"=>$c_imc,
	":c_coxae"=>$c_coxae,
	":c_pesomagro"=>$c_pesomagro,
	":p_bicepsd"=>$p_bicepsd,
	":p_bicepse"=>$p_bicepse,
	":p_coxad"=>$p_coxad,
	":p_coxae"=>$p_coxae,
	":p_antebracod"=>$p_antebracod,
	":p_antebracoe"=>$p_antebracoe,
	":p_panturrilhad"=>$p_panturrilhad,
	":p_panturrilhae"=>$p_panturrilhae,
	":p_abdomen"=>$p_abdomen,
	":p_quadril"=>$p_quadril,
	":p_torax"=>$p_torax,
	":p_cintura"=>$p_cintura
));


if ($result) {
	header('Location: avaliacaofisica.php?register=1');
} else {
	header('Location: avaliacaofisica.php?register=2');
}

 ?>