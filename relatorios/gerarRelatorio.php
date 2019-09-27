<?php
include_once '../util/corpo.php';
cabeca();
?>

<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


    </div>
    <!-- Content Row -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-8">
            <!-- Card Header - Dropdown -->
            <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary text-center">Cadastro de Setor</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">


                <form method="post" action="../buscas/buscas.php" >
                    
                    <p class="text-success text-center">Escolha um parametro para busca.</p>
                    <div class="row" >
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Nome do Setor <span class="text-danger">*</span></label>
                                <input type="text" name="setor" id="setor" class="form-control"  >
                            </div></div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>N° Do MAC <span class="text-danger">*</span></label>
                                <input type="text" name="mac" id="mac" class="form-control"  >
                            </div></div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Nome da Maquina <span class="text-danger">*</span></label>
                                <input type="text" name="nome_maquina" id="nome_maquina" class="form-control"  >
                            </div>
                        </div>
                    </div>
                    <center> <button type="submit" class="btn btn-outline-success">Enviar</button><br><br></center>
                </form></div>        


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



                    