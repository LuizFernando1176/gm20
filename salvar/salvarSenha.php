<?php

include_once '../util/conecaoBD.php';
include_once '../util/antiInjecao.php';
retirarInjecao($id = $_POST['id']);
retirarInjecao($senha = $_POST['senha']);
$coon = conectar();
$query01 = "UPDATE `usuario` SET`senha`= md5(md5('$senha')) WHERE id=$id ";
$queryCadastroSetor = mysqli_query($coon, $query01);
$resultado = $queryCadastroSetor;


if ($resultado > 0) {
    header('Location:../perfil.php?alerta=11');
} else {

    echo 'Erro a editar usuario ';
}

      