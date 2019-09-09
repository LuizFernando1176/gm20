<?php

include_once '../util/conecaoBD.php';

$id = $_POST['id'];
$id_setor = $_POST ['id_setor'];
$id_rack = $_POST ['id_rack'];
$nome_maquina = $_POST ['nome_maquina'];
$nome_usuario = $_POST ['nome_usuario'];
$ponto = $_POST ['ponto'];
$mac = $_POST ['mac'];
$inv = $_POST ['inv'];
$tombo = $_POST ['tombo'];

$queryMaquinas = "UPDATE `maquina` SET `id_setor`='$id_setor',`id_rack`='$id_rack', `nome_maquina`='$nome_maquina',`nome_usuario`='$nome_usuario',`ponto`='$ponto',`mac`='$mac',`inv`='$inv' ,`tombo`='$tombo' WHERE id = '$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryMaquinas);

echo $queryMaquinas;

if ($resultado) {

    echo '<script Language="javascript"> alert("Maquina editada  com sucesso!!"); location.href="../exibir/exibirMaquinas.php"; </script>';
} else {

    echo 'Erro a editar usuario ';
}

      