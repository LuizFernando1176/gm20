<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
$coon = conectar();
$query01 = "SELECT `id`,`login`, `senha`, `nivel` ,`excluido` FROM `usuario` WHERE 1 ";
$queryRack = mysqli_query($coon, $query01);

$indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
if ($usuarioLogado['nivel'] == '1') {
    header('Location:../index.php?alerta=12');
} else {
    
}
cabeca();
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


    </div>
    <!-- Content Row -->

    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Usuarios Cadastrados</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">



                    <center><table  class="table table-striped table-responsive text-center" >
                            <div id="divAlerta" class="divAlerta"></div>
                            <thead>
                                <tr><th>Nome do Usuario</th>
                                    <th>Senha</th>
                                    <th>Nivel</th>

                                    <?php if ($usuarioLogado['nivel'] == '2') { ?> <th>Editar</th><?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($queryRacks = mysqli_fetch_assoc($queryRack)) {
                                    echo "<tr>";
                                    echo "<td >" . $queryRacks['login'] . "</td>";
                                    echo "<td >" . $queryRacks['senha'] . "</td>";
                                    echo "<td >" . $queryRacks['nivel'] . "</td>";
                                    if ($usuarioLogado['nivel'] == '2') {
                                        echo "<td >" . "<button class='btn btn-danger'><a href='../deletes/deletarUsuarios.php?id=" . $queryRacks['id'] . "'>Deletar</a></button>" . "</td>";
                                    } echo "</tr>";
                                }
                                ?>

                            </tbody>
                        </table></center>

                    <script src="../js/script.js" type="text/javascript"></script>




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
                            