<?php 

session_start();

if (!isset($_SESSION['nome'])) {
	header("Location: index.php");
}

require_once("Sql.php");

// TREINO A
$aexercicio1 = isset($_POST['aexercicio1']) ? $_POST['aexercicio1'] : "";
$arepeticoes1 = isset($_POST['arepeticoes1']) ? $_POST['arepeticoes1'] : "";
$aseries1 = isset($_POST['aseries1']) ? $_POST['aseries1'] : "";

$aexercicio2 = isset($_POST['aexercicio2']) ? $_POST['aexercicio2'] : "";
$arepeticoes2 = isset($_POST['arepeticoes2']) ? $_POST['arepeticoes2'] : "";
$aseries2 = isset($_POST['aseries2']) ? $_POST['aseries2'] : "";

$aexercicio3 = isset($_POST['aexercicio3']) ? $_POST['aexercicio3'] : "";
$arepeticoes3 = isset($_POST['arepeticoes3']) ? $_POST['arepeticoes3'] : "";
$aseries3 = isset($_POST['aseries3']) ? $_POST['aseries3'] : "";

$aexercicio4 = isset($_POST['aexercicio4']) ? $_POST['aexercicio4'] : "";
$arepeticoes4 = isset($_POST['arepeticoes4']) ? $_POST['arepeticoes4'] : "";
$aseries4 = isset($_POST['aseries4']) ? $_POST['aseries4'] : "";

$aexercicio5 = isset($_POST['aexercicio5']) ? $_POST['aexercicio5'] : "";
$arepeticoes5 = isset($_POST['arepeticoes5']) ? $_POST['arepeticoes5'] : "";
$aseries5 = isset($_POST['aseries5']) ? $_POST['aseries5'] : "";

$aexercicio6 = isset($_POST['aexercicio6']) ? $_POST['aexercicio6'] : "";
$arepeticoes6 = isset($_POST['arepeticoes6']) ? $_POST['arepeticoes6'] : "";
$aseries6 = isset($_POST['aseries6']) ? $_POST['aseries6'] : "";

$aexercicio7 = isset($_POST['aexercicio7']) ? $_POST['aexercicio7'] : "";
$arepeticoes7 = isset($_POST['arepeticoes7']) ? $_POST['arepeticoes7'] : "";
$aseries7 = isset($_POST['aseries7']) ? $_POST['aseries7'] : "";

$aexercicio8 = isset($_POST['aexercicio8']) ? $_POST['aexercicio8'] : "";
$arepeticoes8 = isset($_POST['arepeticoes8']) ? $_POST['arepeticoes8'] : "";
$aseries8 = isset($_POST['aseries8']) ? $_POST['aseries8'] : "";

// TREINO B
$bexercicio1 = isset($_POST['bexercicio1']) ? $_POST['bexercicio1'] : "";
$brepeticoes1 = isset($_POST['brepeticoes1']) ? $_POST['brepeticoes1'] : "";
$bseries1 = isset($_POST['bseries1']) ? $_POST['bseries1'] : "";

$bexercicio2 = isset($_POST['bexercicio2']) ? $_POST['bexercicio2'] : "";
$brepeticoes2 = isset($_POST['brepeticoes2']) ? $_POST['brepeticoes2'] : "";
$bseries2 = isset($_POST['bseries2']) ? $_POST['bseries2'] : "";

$bexercicio3 = isset($_POST['bexercicio3']) ? $_POST['bexercicio3'] : "";
$brepeticoes3 = isset($_POST['brepeticoes3']) ? $_POST['brepeticoes3'] : "";
$bseries3 = isset($_POST['bseries3']) ? $_POST['bseries3'] : "";

$bexercicio4 = isset($_POST['bexercicio4']) ? $_POST['bexercicio4'] : "";
$brepeticoes4 = isset($_POST['brepeticoes4']) ? $_POST['brepeticoes4'] : "";
$bseries4 = isset($_POST['bseries4']) ? $_POST['bseries4'] : "";

$bexercicio5 = isset($_POST['bexercicio5']) ? $_POST['bexercicio5'] : "";
$brepeticoes5 = isset($_POST['brepeticoes5']) ? $_POST['brepeticoes5'] : "";
$bseries5 = isset($_POST['bseries5']) ? $_POST['bseries5'] : "";

$bexercicio6 = isset($_POST['bexercicio6']) ? $_POST['bexercicio6'] : "";
$brepeticoes6 = isset($_POST['brepeticoes6']) ? $_POST['brepeticoes6'] : "";
$bseries6 = isset($_POST['bseries6']) ? $_POST['bseries6'] : "";

$brepeticoes7 = isset($_POST['brepeticoes7']) ? $_POST['brepeticoes7'] : "";
$bexercicio7 = isset($_POST['bexercicio7']) ? $_POST['bexercicio7'] : "";
$bseries7 = isset($_POST['bseries7']) ? $_POST['bseries7'] : "";

$bexercicio8 = isset($_POST['bexercicio8']) ? $_POST['bexercicio8'] : "";
$brepeticoes8 = isset($_POST['brepeticoes8']) ? $_POST['brepeticoes8'] : "";
$bseries8 = isset($_POST['bseries8']) ? $_POST['bseries8'] : "";

// TREINO C
$cexercicio1 = isset($_POST['cexercicio1']) ? $_POST['cexercicio1'] : "";
$crepeticoes1 = isset($_POST['crepeticoes1']) ? $_POST['crepeticoes1'] : "";
$cseries1 = isset($_POST['cseries1']) ? $_POST['cseries1'] : "";

$cexercicio2 = isset($_POST['cexercicio2']) ? $_POST['cexercicio2'] : "";
$crepeticoes2 = isset($_POST['crepeticoes2']) ? $_POST['crepeticoes2'] : "";
$cseries2 = isset($_POST['cseries2']) ? $_POST['cseries2'] : "";

$cexercicio3 = isset($_POST['cexercicio3']) ? $_POST['cexercicio3'] : "";
$crepeticoes3 = isset($_POST['crepeticoes3']) ? $_POST['crepeticoes3'] : "";
$cseries3 = isset($_POST['cseries3']) ? $_POST['cseries3'] : "";

$cexercicio4 = isset($_POST['cexercicio4']) ? $_POST['cexercicio4'] : "";
$crepeticoes4 = isset($_POST['crepeticoes4']) ? $_POST['crepeticoes4'] : "";
$cseries4 = isset($_POST['cseries4']) ? $_POST['cseries4'] : "";

$cexercicio5 = isset($_POST['cexercicio5']) ? $_POST['cexercicio5'] : "";
$crepeticoes5 = isset($_POST['crepeticoes5']) ? $_POST['crepeticoes5'] : "";
$cseries5 = isset($_POST['cseries5']) ? $_POST['cseries5'] : "";

$cexercicio6 = isset($_POST['cexercicio6']) ? $_POST['cexercicio6'] : "";
$crepeticoes6 = isset($_POST['crepeticoes6']) ? $_POST['crepeticoes6'] : "";
$cseries6 = isset($_POST['cseries6']) ? $_POST['cseries6'] : "";

$cexercicio7 = isset($_POST['cexercicio7']) ? $_POST['cexercicio7'] : "";
$crepeticoes7 = isset($_POST['crepeticoes7']) ? $_POST['crepeticoes7'] : "";
$cseries7 = isset($_POST['cseries7']) ? $_POST['cseries7'] : "";

$cexercicio8 = isset($_POST['cexercicio8']) ? $_POST['cexercicio8'] : "";
$crepeticoes8 = isset($_POST['crepeticoes8']) ? $_POST['crepeticoes8'] : "";
$cseries8 = isset($_POST['cseries8']) ? $_POST['cseries8'] : "";



?>