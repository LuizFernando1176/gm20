<?php

include_once '../util/conecaoBD.php';
$id = $_POST['id'];
$login = $_POST['login'];
$senha = $_POST ['senha'];
$nivel = $_POST ['nivel'];
$coon = conectar();
$query01 = "update `usuario`set login=('$login'),senha=('$senha'),nivel=('$nivel') where id=$id";
$queryCadastroSetor = mysqli_query($coon, $query01);
$resultado = $queryCadastroSetor;


if ($resultado) {

    echo '<script Language="javascript"> alert("Usuario editado Com sucesso!!"); location.href="../exibir/exibirUsuarios.php" </script>';
} else {

    echo 'Erro a editar usuario ';
}

      