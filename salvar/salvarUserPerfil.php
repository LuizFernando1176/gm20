<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id=$_POST['id']);
retirarInjecao($login = $_POST['login']);
retirarInjecao($nivel = $_POST ['nivel']);
retirarInjecao($loginExibicao=$_POST ['loginExibicao']);
$coon = conectar();
$query01 = "update `usuario` set login='$login',loginExibicao ='$loginExibicao' where id=$id ";
$queryCadastroSetor = mysqli_query($coon, $query01);
$resultado = $queryCadastroSetor;

echo $query01;

if ($resultado > 0) {

    header('Location:../perfil.php?alerta=8');
} else {

    echo 'Erro a editar usuario ';
}

      