<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';

retirarInjecao($id = $_GET['id']);

$queryDeletaUser = "DELETE FROM `usuario` WHERE id ='$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryDeletaUser);



if ($resultado) {

  header('Location:../exibir/exibirUsuarios.php?alerta=7');
} else {

    echo 'Erroao delatar Usuario ';
}

     