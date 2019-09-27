<?php
include_once 'util/conecaoBD.php';
include_once './util/corpo.php';
include_once './util/antiInjecao.php';
$coon = conectar();
$query01 = "SELECT `id`,`login`, `senha`, `nivel` FROM `usuario` WHERE 1";
$queryRack = mysqli_query($coon, $query01);
cabeca();
$indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Editar Usuario</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="divAlerta" class="divAlerta"></div>
                    <form  method="post" action="salvar/salvarUserPerfil.php">
                        <center> <div class="form-row">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" value="<?php echo $_SESSION ['id'] ?>" name="id" />
                                    <label for="">Nome do Usuario</label>
                                    <input type="text" class="form-control"  value="<?php echo $_SESSION ['login'] ?>" name="login" placeholder="Nome do Usuario">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="login">Nome de Exibição</label>
                                    <input type="text" class="form-control" id="loginExibicao" value="<?php echo $_SESSION ['loginExibicao'] ?>" name="loginExibicao" placeholder="Login de Exibição" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Nivel</label>
                                    <input type="text" readonly=""class="form-control"  value="<?php echo$_SESSION ['nivel'] ?>" name="nivel" placeholder="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning">Salvar</button>
                        </center>
                    </form></div></div></div></div><br><BR><br><BR>

    <!-- Pie Chart -->

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Editar Senha</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form  method="post" action="salvar/salvarSenha.php">
                        <center> <div class="form-row">
                                <input  type="hidden" value="<?php echo $_SESSION ['id'] ?>" name="id" />
                                <div class="form-group col-md-6">
                                    <label for="">Senha</label>
                                    <input type="password" class="form-control" value="" name="senha" placeholder="Digite sua nova senha.">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-warning">Salvar</button>
                        </center>
                    </form></div></div></div></div><br><BR><br><BR>
    <script src="js/script.js" type="text/javascript"></script>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Você deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione o botão sair pra efetivar sua saida do sistema.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href=" sair.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    rodape();





    