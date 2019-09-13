<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id = $_POST['id']);
retirarInjecao($login = $_POST['login']);
retirarInjecao($senha = $_POST ['senha']);
retirarInjecao($nivel = $_POST ['nivel']);
retirarInjecao($loginExibicao = $_POST ['loginExibicao']);
$coon = conectar();
$query01 = "update `usuario` set login=('$login'),senha= md5(md5('$senha')),nivel=('$nivel'),loginExibicao('$loginExibicao') where id=$id";
$queryCadastroSetor = mysqli_query($coon, $query01);
$resultado = $queryCadastroSetor;


if ($resultado) {

    header('Location:../exibir/exibirUsuarios.php?alerta=8');
} else {

    echo 'Erro a editar usuario ';
}

      