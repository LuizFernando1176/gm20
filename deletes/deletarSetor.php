<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';

retirarInjecao($id = $_GET['id']);

$queryDeletaSetor = "UPDATE setor SET excluido = 1 WHERE id='$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryDeletaSetor);



if ($resultado) {

 header('Location:../exibir/exibirSetores.php?alerta=4');
   
} else {

    echo 'Erro a cadastra Maquina ';
}

     