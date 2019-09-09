<?php

include_once '../util/conecaoBD.php';

$id = $_GET['id'];

$queryDeletaUser = "DELETE FROM `usuario` WHERE id ='$id'";
$coon = conectar();
$resultado = mysqli_query($coon, $queryDeletaUser);



if ($resultado) {

    echo '<script Language="javascript"> alert("Usuario deletado com sucesso!!"); location.href="../exibir/exibirUsuarios.php"; </script>';
    echo $id;
} else {

    echo 'Erroao delatar Usuario ';
}

     