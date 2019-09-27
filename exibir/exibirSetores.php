<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
$numreg = 5; // Quantos registros por página vai ser mostrado
$pg = isset($_GET["pag"]) ? $_GET["pag"] : 1;
$inicial = ($pg * $numreg) - $numreg;
// Serve para contar quantos registros você tem na sua tabela para fazer a paginação
$coon = conectar();
$totalProdutos = mysqli_query($coon, "select COUNT(id) total FROM setor");
$totalProduto = mysqli_fetch_assoc($totalProdutos);
$countTotal = $totalProduto['total'];
// Faz o Select pegando o registro inicial até a quantidade de registros para página
$sql = mysqli_query($coon, "SELECT id , setor FROM setor WHERE  NOT Excluido ORDER BY setor ASC LIMIT $inicial, $numreg");
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
                    <h6 class="m-0 font-weight-bold text-primary text-center">Exibir Setores</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped table-responsive" >
                        <div id="divAlerta" class="divAlerta"></div>
                        <thead>
                            <tr><th>Nome do Setor</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rows = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td >" . utf8_encode($rows['setor']) . "</td>";
                                echo "<td >" . "<button class='btn btn-warning'><a href='../editar/editarSetor.php?id=" . $rows['id'] . "'>Editar</a></button>" . "</td>";
                                echo "<td >" . "<button class='btn btn-danger'><a href='../deletes/deletarSetor.php?id=" . $rows['id'] . "'>Deletar</a></button>" . "</td>";
                            } echo "</tr>";
                            ?>
                        </tbody>
                    </table>
                    <script src = "../js/script.js" type = "text/javascript"></script>
                </div></center>
                <?php
                if ($countTotal > $numreg) {
                    echo '<center><div class="pagination pagination-lg" style="width: max-content">';
                    include '../util/paginacaoSetor.php'; // chamada do arquivo. ex: << Anterior 1 2 3 4 5 Próxima >>
                    echo '</div></center>';
                }
                ?><!-- Pie Chart -->

                <!-- Content Row -->
                <div class="row" >
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
                        