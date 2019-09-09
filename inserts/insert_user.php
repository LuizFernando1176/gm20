<?php

include_once '../util/conecaoBD.php';
$login = $_POST ['login'];
$senha = $_POST ['senha'];
$nivel = $_POST ['nivel'];


$queryUsuario = "INSERT INTO `usuario`(`login`, `senha`, `nivel`) VALUES ('$login','$senha','$nivel')";
$coon = conectar();
$resultado = mysqli_query($coon, $queryUsuario);



if ($resultado) {

    echo '<script Language="javascript"> alert("Usuario Cadastrado Com sucesso!!"); location.href="../cadastros/cadastroUser.php"; </script>';
} else {

    echo 'Erro a cadastra usuario ';
}

      