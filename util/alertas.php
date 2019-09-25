<?php

include_once 'antiInjecao.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $indice = isset($_GET['indice']) ? retirarInjecao($_GET['indice']) : '';

    switch ($indice) {
        case '1': echo "<div class='alert alert-success alert-dismissible fade show'>Maquina cadastrada com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '2': echo "<div class='alert alert-danger alert-dismissible fade show'>Maquina excluida com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '3': echo "<div class='alert alert-warning alert-dismissible fade show'>Maquina editada com sucesso !"
            . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '4': echo "<div class='alert alert-danger alert-dismissible fade show'>Setor deletado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '5': echo "<div class='alert alert-warning alert-dismissible fade show'>Setor editado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '6': echo "<div class='alert alert-success alert-dismissible fade show'>Setor cadastrado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '7': echo "<div class='alert alert-danger alert-dismissible fade show'>Usuario deletado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '8': echo "<div class='alert alert-warning alert-dismissible fade show'>Usuario editado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '9': echo "<div class='alert alert-success alert-dismissible fade show'>Usuario cadastrado com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
            break;
        case '10': echo "<div class='alert alert-danger  fade show'>Login e/ou senha Invalidos !
  </div>";
            break;
        case '11': echo "<div class='alert alert-success alert-dismissible fade show'>Senha alterada com sucesso !<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button> </div>";
            break;
        case '12': echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'>
  <strong>Você nâo tem acesso a esta pagina</strong> Caso precise do acesso comunique ao administrador.<a href='#' class='alert-link'>Contato</a>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            break;
    }
}