<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id_setor = $_POST ['id_setor']);
retirarInjecao($id_rack = $_POST ['id_rack']);
retirarInjecao($nome_maquina = $_POST ['nome_maquina']);
retirarInjecao($nome_usuario = $_POST ['nome_usuario']);
retirarInjecao($ponto = $_POST ['ponto']);
retirarInjecao($mac = $_POST ['mac']);
retirarInjecao($id_sw = $_POST ['id_sw']);
retirarInjecao($id_barramento = $_POST ['id_barramento']);
retirarInjecao($inv = $_POST ['inv']);
retirarInjecao($tombo = $_POST ['tombo']);

$queryMaquinas = "INSERT INTO `maquina`( `id_setor`, `id_rack`, `nome_maquina`, `nome_usuario`, `ponto`, `mac`, `id_sw`, `id_barramento`, `inv`, `tombo`) VALUES ('$id_setor','$id_rack','$nome_maquina','$nome_usuario','$ponto','$mac','$id_sw','$id_barramento','$inv','$tombo')";
$coon = conectar();
$resultado = mysqli_query($coon, $queryMaquinas);



if ($resultado) {

    echo '<script Language="javascript"> alert("Maquina Cadastrada Com sucesso!!"); location.href="../exibir/exibirMaquinas.php"; </script>';
} else {

    echo 'Erro a cadastra maquina ';
}
?>

