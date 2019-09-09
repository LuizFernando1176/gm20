<?php

include_once '../util/conecaoBD.php';
$id_setor = $_POST ['id_setor'];
$id_rack = $_POST ['id_rack'];
$nome_maquina = $_POST ['nome_maquina'];
$nome_usuario = $_POST ['nome_usuario'];
$ponto = $_POST ['ponto'];
$mac = $_POST ['mac'];
$id_sw = $_POST ['id_sw'];
$id_barramento = $_POST ['id_barramento'];
$inv = $_POST ['inv'];
$tombo = $_POST ['tombo'];

$queryMaquinas = "INSERT INTO `maquina`( `id_setor`, `id_rack`, `nome_maquina`, `nome_usuario`, `ponto`, `mac`, `id_sw`, `id_barramento`, `inv`, `tombo`) VALUES ('$id_setor','$id_rack','$nome_maquina','$nome_usuario','$ponto','$mac','$id_sw','$id_barramento','$inv','$tombo')";
$coon = conectar();
$resultado = mysqli_query($coon, $queryMaquinas);

echo $queryMaquinas;


if ($resultado) {

    echo '<script Language="javascript"> alert("Maquina Cadastrada Com sucesso!!"); location.href="../exibir/exibirMaquinas.php"; </script>';
} else {

    echo 'Erro a cadastra maquina ';
}
?>

