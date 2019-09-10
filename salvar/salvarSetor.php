<?php
include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id = $_POST['id']);
retirarInjecao($setor = $_POST['setor']);
$coon = conectar();
$query01 = "UPDATE  `setor`set setor=('$setor') where id=$id";
$queryCadastroUser = mysqli_query($coon, $query01);
$resultado = $queryCadastroUser;

echo $query01;

if ($resultado) {

    echo '<script Language="javascript"> alert("Setor editado Com sucesso!!"); location.href="../exibir/exibirSetores.php"; </script>';
} else {

    echo 'Erro a editar usuario ';
}

      