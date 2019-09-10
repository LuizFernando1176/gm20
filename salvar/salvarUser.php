<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id = $_POST['id']);
retirarInjecao($login = $_POST['login']);
retirarInjecao($senha = $_POST ['senha']);
retirarInjecao($nivel = $_POST ['nivel']);
retirarInjecao($loginExibicao=$_POST ['loginExibicao']);
$coon = conectar();
$query01 = "update `usuario`set login=('$login'),senha=('$senha'),nivel=('$nivel'),loginExibicao('$loginExibicao') where id=$id";
$queryCadastroSetor = mysqli_query($coon, $query01);
$resultado = $queryCadastroSetor;


if ($resultado) {

    echo '<script Language="javascript"> alert("Usuario editado Com sucesso!!"); location.href="../exibir/exibirUsuarios.php" </script>';
} else {

    echo 'Erro a editar usuario ';
}

      