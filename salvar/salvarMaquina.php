<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';

retirarInjecao($id = $_POST['id']);
retirarInjecao($id_setor = $_POST ['id_setor']);
retirarInjecao($id_rack = $_POST ['id_rack']);
retirarInjecao($nome_maquina = $_POST ['nome_maquina']);
retirarInjecao($nome_usuario = $_POST ['nome_usuario']);
retirarInjecao($ponto = $_POST ['ponto']);
retirarInjecao($mac = $_POST ['mac']);
retirarInjecao($inv = $_POST ['inv']);
retirarInjecao($tombo = $_POST ['tombo']);

$queryMaquinas = "UPDATE `maquina` SET `id_setor`='$id_setor',`id_rack`='$id_rack', `nome_maquina`='$nome_maquina',`nome_usuario`='$nome_usuario',`ponto`='$ponto',`mac`='$mac',`inv`='$inv' ,`tombo`='$tombo' WHERE id = '$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryMaquinas);

echo $queryMaquinas;

if ($resultado) {

    header('Location:../exibir/exibirMaquinas.php?alerta=3');
} else {

    echo 'Erro a editar usuario ';
}

      