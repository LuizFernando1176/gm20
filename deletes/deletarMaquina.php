<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';

retirarInjecao($id = $_GET['id']);

$queryDeletaMaquina = "UPDATE maquina SET excluido = 1 WHERE id='$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryDeletaMaquina);



if ($resultado) {

header('Location:../exibir/exibirMaquinas.php?alerta=2');
    
} else {

    echo 'Erro a cadastra usuario ';
}


    