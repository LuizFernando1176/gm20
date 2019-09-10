<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($setor = $_POST['setor']);
$coon = conectar();
$query01 = "INSERT INTO `setor`( `setor`) VALUES ('$setor')";
$queryCadastroUser = mysqli_query($coon, $query01);
$resultado = $queryCadastroUser;


if ($resultado) {

    echo '<script Language="javascript"> alert("Setor Cadastrado Com sucesso!!"); location.href="../cadastros/cadastroSetor.php"; </script>';
} else {

    echo 'Erro a cadastra usuario ';
}

      