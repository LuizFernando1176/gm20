<?php
include_once './util/corpo.php';
include_once './util/conecaoBD.php';
include_once './util/antiInjecao.php';

$coon = conectar();
//query de setores//
$query01 = "SELECT count(id) AS total FROM setor";
$totalQuery01 = mysqli_query($coon, $query01);
$totalQuery001 = mysqli_fetch_assoc($totalQuery01);
//query de maquina//
$query02 = "SELECT count(id) AS total FROM maquina ORDER BY id DESC";
$totalQuery02 = mysqli_query($coon, $query02);
$totalQuery002 = mysqli_fetch_assoc($totalQuery02);
//query de usuario//
$query03 = "SELECT count(id) AS total FROM usuario";
$totalQuery03 = mysqli_query($coon, $query03);
$totalQuery003 = mysqli_fetch_assoc($totalQuery03);
cabeca();
$indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
?>

<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
         
        <h1 class="h3 mb-0 text-gray-800">Controle</h1>
       <div id="divAlerta" class="divAlerta"></div>
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
                    <h6 class="m-0 font-weight-bold text-primary text-center">Maquinas Cadastradas</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $coon = conectar();
                    $query01 = "select m.id , m.nome_maquina , m.nome_usuario , r.rack ,s.setor, m.ponto , m.mac , m.inv ,m.tombo , w.sw , b.barramento from maquina m join rack r on m.id_rack = r.id join setor s on m.id_setor = s.id join switch w on m.id_sw = w.id join barramento b on m.id_barramento = b.id ";
                    $queryRack = mysqli_query($coon, $query01);
                    ?>
                    <style>
                        tr{
                            font-size: 12px;
                            font-weight: bold;
                        }
                    </style>
                    <div   >
                        
                      
                        <table class="table table-striped table-responsive" >
                            <thead>
                                <tr>
                                    <th>Setor</th>
                                    <th>N. do Usuário</th>
                                    <th>N. da Máquina</th>
                                    <th>INV</th>
                                    <th>Tombo</th>
                                    <th>MAC</th>
                                    <th>Ponto</th>
                                    <th>Rack</th>
                                    <th>Switch</th>
                                    <th>Barramento</th>
                                    <?php if ($usuarioLogado['nivel'] == '2') { ?><th>Editar</th>
                                        <th>Excluir</th><?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                    if ($usuarioLogado['nivel'] == '2') {
                                        echo "<td >" . "<button class='btn btn-warning'><a href='./editar/editarMaquina.php?id=" . $queryRacks['id'] . "'>Editar</a></button>" . "</td>";
                                        echo "<td >" . "<button class='btn btn-danger'><a href='./deletes/deletarMaquina.php?id=" . $queryRacks['id'] . "'>Deletar</a></button>" . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                                <a class="btn btn-primary" href="sair.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                rodape();
                