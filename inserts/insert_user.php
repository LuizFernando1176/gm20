<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($login = $_POST ['login']);
retirarInjecao($senha = $_POST ['senha']);
retirarInjecao($nivel = $_POST ['nivel']);
retirarInjecao($loginExibicao = $_POST['loginExibicao']);

$queryUsuario = "INSERT INTO `usuario`(`login`, `senha`, `nivel`,loginExibicao) VALUES ('$login',md5(md5('$senha')),'$nivel','$loginExibicao')";
$coon = conectar();
$resultado = mysqli_query($coon, $queryUsuario);



if ($resultado) {

    echo '<script Language="javascript"> alert("Usuario Cadastrado Com sucesso!!"); location.href="../cadastros/cadastroUser.php"; </script>';
} else {

    echo 'Erro a cadastra usuario ';
}

      