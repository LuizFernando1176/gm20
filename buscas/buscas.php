<?php
include_once '../util/corpo.php';
include_once '../util/conecaoBD.php';
include '../util/antiInjecao.php';
cabeca();
$complementoQuery = "";
$net = mysqli_connect("localhost", "root", "", "bd_pc");
retirarInjecao(isset($_POST['nome_maquina'])) ? $complementoQuery .= " AND m.nome_maquina LIKE '%" . mysqli_escape_string($net, $_POST['nome_maquina']) . "%'" : $complementoQuery .= "";
retirarInjecao(isset($_POST['mac'])) ? $complementoQuery .= " AND m.mac LIKE '%" . mysqli_escape_string($net, $_POST['mac']) . "%'" : $complementoQuery .= "";
retirarInjecao(isset($_POST['setor'])) ? $complementoQuery .= " AND s.setor LIKE '%" . mysqli_escape_string($net, $_POST['setor']) . "%'" : $complementoQuery .= "";
$query = "select m.id , m.nome_maquina , m.nome_usuario , r.rack ,s.setor, m.ponto , m.mac , m.inv ,m.tombo , w.sw , b.barramento from maquina m join rack r on m.id_rack = r.id join setor s on m.id_setor = s.id join switch w on m.id_sw = w.id join barramento b on m.id_barramento = b.id WHERE  TRUE  " . $complementoQuery .= " AND NOT m.excluido;";
$queryRack = mysqli_query($net, $query);
$row = mysqli_num_rows($queryRack);
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <style>
        tr{
            font-size: 15px;
            font-weight: bold;
        }
    </style>
    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Resultado da Consuta</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div   >
                        <table class="table table-striped table-responsive" >
                            <thead>
                                <tr><th>Setor</th><th>N. do Usuário</th><th>N. da Máquina</th><th>INV</th><th>Tombo</th><th>MAC</th><th>Ponto</th><th>Rack</th><th>Switch</th><th>Barramento</th><th>Imprimir</th></tr>
                            </thead>

                            <tbody>

                                <?php
                                echo "<div class='alert alert-info'>A Busca retornou :<strong> $row</strong> resultados</div>";

                                while ($queryRacks = mysqli_fetch_assoc($queryRack)) {
                                    echo "<tr>";
                                    echo "<td >" . utf8_encode($queryRacks['setor']) . "</td>";
                                    echo "<td >" . $queryRacks['nome_usuario'] . "</td>";
                                    echo "<td >" . $queryRacks['nome_maquina'] . "</td>";
                                    echo "<td >" . utf8_encode($queryRacks['inv']) . "</td>";
                                    echo "<td >" . utf8_encode($queryRacks['tombo']) . "</td>";
                                    echo "<td >" . $queryRacks['mac'] . "</td>";
                                    echo "<td >" . $queryRacks['ponto'] . "</td>";
                                    echo "<td >" . $queryRacks['rack'] . "</td>";
                                    echo "<td >" . utf8_encode($queryRacks['sw']) . "</td>";
                                    echo "<td >" . utf8_encode($queryRacks['barramento']) . "</td>";
                                    echo "<td >" . "<button class='btn btn-info'><a href='../view/visualizarMaquina.php?id=" . $queryRacks['id'] . "'>Imprimir</a></button>" . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                            <script src="../js/feather.js" type="text/javascript"></script>
                            <script src="../js/jquery.min.js" type="text/javascript"></script>
                            <script src="../js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
                            <script src="../js/jquery.mask.js" type="text/javascript"></script>
                            <script src="../js/bootstrap.min.js" type="text/javascript"></script>
                        </table>

                    </div>
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



                            