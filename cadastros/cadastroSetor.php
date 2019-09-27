<?php
include_once '../util/corpo.php';
include_once '../util/conecaoBD.php';
$coon = conectar();
//query de setores//
$query01 = "SELECT count(id) AS total FROM setor";
$totalQuery01 = mysqli_query($coon, $query01);
$totalQuery001 = mysqli_fetch_assoc($totalQuery01);
//query de maquina//
$query02 = "SELECT count(id) AS total FROM maquina";
$totalQuery02 = mysqli_query($coon, $query02);
$totalQuery002 = mysqli_fetch_assoc($totalQuery02);
//query de usuario//
$query03 = "SELECT count(id) AS total FROM usuario";
$totalQuery03 = mysqli_query($coon, $query03);
$totalQuery003 = mysqli_fetch_assoc($totalQuery03);
cabeca();
if ($usuarioLogado['nivel'] == '1') {

    header('Location:../index.php?alerta=12');
} else {
    
}
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Controle</h1>

    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-primary text-center font-weight-bold text-primary  mb-1">Usuarios Ativos</div>
                            <div class="h5 mb-0 text-center font-weight-bold text-gray-800"><strong><?php echo $totalQuery003['total']; ?></strong></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-primary text-center font-weight-bold text-success  mb-1">Total de Maquinas</div>
                            <div class="h5 mb-0 text-center font-weight-bold text-gray-800"><strong><?php echo $totalQuery002['total']; ?></strong></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop  fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-primary text-center font-weight-bold text-info  mb-1">Setores</div>
                            <div class="h5 mb-0 text-center font-weight-bold text-gray-800"><?php echo $totalQuery001['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Cadastro de Setor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form  method="post" action="../inserts/insert_setor.php">

                        <center> <div class="form-row">
                                <div class="form-group col-md-3"></div>
                                <div class="form-group col-md-6">
                                    <label for="setor">Nome do Setor</label>
                                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Nome do Setor">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <button type="reset" class="btn btn-danger">Apagar</button>
                        </center>
                    </form></div>
                <!-- Pie Chart -->

                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">

                        </a>
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
                                        <a class="btn btn-primary" href="../sair.php">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        rodape();


                        