<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';

retirarInjecao($id = $_GET['id']);

$queryDeletaSetor = "DELETE FROM `setor` WHERE id ='$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryDeletaSetor);



if ($resultado) {

    echo '<script Language="javascript"> alert("Setor deletado com sucesso!!"); location.href="../exibir/exibirSetores.php"; </script>';
    echo $id;
} else {

    echo 'Erro a cadastra Maquina ';
}

     