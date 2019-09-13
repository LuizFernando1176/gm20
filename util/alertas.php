<?php
include_once 'antiInjecao.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $indice = isset($_GET['indice'])? retirarInjecao($_GET['indice']) : '';
    
    switch($indice){
        case '1': echo "<div class='alert alert-success'>Maquina cadastrada com sucesso !</div>";
            break;
        case '2': echo "<div class='alert alert-danger'>Maquina excluida com sucesso !</div>";
            break;
        case '3': echo "<div class='alert alert-warning'>Maquina editada com sucesso !</div>";
            break;
        case '4': echo "<div class='alert alert-danger'>Setor deletado com sucesso !</div>";
            break;
        case '5': echo "<div class='alert alert-warning'>Setor editado com sucesso !</div>";
            break;
        case '6': echo "<div class='alert alert-success'>Setor cadastrado com sucesso !</div>";
            break;
        case '7': echo "<div class='alert alert-danger'>Usuario deletado com sucesso !</div>";
            break;
        case '8': echo "<div class='alert alert-warning'>Usuario editado com sucesso !</div>";
            break;
        case '9': echo "<div class='alert alert-success'>Usuario cadastrado com sucesso !</div>";
            break;
        case '10': echo "<div class='alert alert-danger'>Login e/ou senha inv&aacute;lidos!</div>";
            break;
        case '11': echo "<div class='alert alert-success'>Senha alterada com sucesso !! </div>";
            break;
    }
}