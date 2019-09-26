<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
include_once '../util/antiInjecao.php';
cabeca();
retirarInjecao($id = $_GET['id']);
$coon = conectar();
$query02 = "SELECT `id`, `login`, `senha`, `nivel` ,`loginExibicao`  FROM `usuario` WHERE NOT Excluido and  id=$id";
$query = mysqli_query($coon, $query02);
$querySetor = mysqli_fetch_assoc($query);
?>
<body id="page-top" onload="mostrarAlerta(<?php echo $indice ?>);">
    <!-- Page Wrapper -->
    <script language=JavaScript>
	hoje = new Date()
	dia = hoje.getDate()
	dias = hoje.getDay()
	mes = hoje.getMonth()
	function y2k(number) {
		return (number < 1000) ? number + 1900 : number;
	}
	wyear = y2k(hoje.getYear())
	ano = hoje.getYear()
	if (dia < 10)
		dia = '0' + dia
	function CriaArray (n) {
		this.length = n }
	NomeDia = new CriaArray(7)
	NomeDia[0] = 'Domingo'
	NomeDia[1] = 'Segunda-feira'
	NomeDia[2] = 'Terça-feira'
	NomeDia[3] = 'Quarta-feira'
	NomeDia[4] = 'Quinta-feira'
	NomeDia[5] = 'Sexta-feira'
	NomeDia[6] = 'Sábado'
	NomeMes = new CriaArray(12)
	NomeMes[0] = 'Janeiro'
	NomeMes[1] = 'Fevereiro'
	NomeMes[2] = 'Março'
	NomeMes[3] = 'Abril'
	NomeMes[4] = 'Maio'
	NomeMes[5] = 'Junho'
	NomeMes[6] = 'Julho'
	NomeMes[7] = 'Agosto'
	NomeMes[8] = 'Setembro'
	NomeMes[9] = 'Outubro'
	NomeMes[10] = 'Novembro'
	NomeMes[11] = 'Dezembro'
</script>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a style="background-color: white" class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php>
                <div class="sidebar-brand-icon mx-3" ><img src="../img/logo.svg" class="img-profile" width="80%" height="80%"></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel Controle</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-alt"></i>
                    <span>Relatorios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Relatorios</h6>
                        <a class="collapse-item" href="../relatorios/gerarRelatorio.php">Gerar Relatorio</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-plus"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastrar</h6>
                        <a class="collapse-item" href="../cadastros/cadastroMaquinas.php">Maquinas</a>
                        <a class="collapse-item" href="../cadastros/cadastroSetor.php">Setor</a>
                        <a class="collapse-item" href="../cadastros/cadastroUser.php">Usuarios</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilitiess">
                    <i class="fas fa-filter"></i>
                    <span>Exibir</span>
                </a>
                <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exibir</h6>
                        <a class="collapse-item" href="../exibir/exibirMaquinas.php">Maquinas</a>
                        <a class="collapse-item" href="../exibir/exibirSetores.php">Setor</a>
                        <a class="collapse-item" href="../exibir/exibirUsuarios.php">Usuarios</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar Por..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <script class="text-success">document.write (NomeDia[dias] + ', ' + dia + ' de ' + NomeMes[mes] + ' de ' + wyear)</script> | &nbsp;
                                <span class="mr-1 d-none d-lg-inline text-gray-800 small"><strong>Bem Vindo, <?php echo $usuarioLogado['nome'] ?></strong></span></a></strong>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw  text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações 
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../sair.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
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
                                    <form  method="post" action="../salvar/salvarUser.php">
                                        <center> <div class="form-row">
                                                <div class="form-group col-md-3"></div>
                                                <div class="form-group col-md-6">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
                                                    <label for="">Nome do Usuario</label>
                                                    <input type="text" class="form-control"  value="<?php echo $querySetor ['login'] ?>" name="login" placeholder="Nome do Usuario">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="login">Nome de Exibição</label>
                                                    <input type="text" class="form-control" id="loginExibicao" value="<?php echo $querySetor ['loginExibicao'] ?>" name="loginExibicao" placeholder="Login de Exibição" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Senha</label>
                                                    <input type="password" readonly=" "class="form-control" value="<?php echo $querySetor ['senha'] ?>" name="senha" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Nivel</label>
                                                    <input type="text" readonly=""class="form-control"  value="<?php echo $querySetor ['nivel'] ?>" name="nivel" placeholder="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-warning">Salvar</button>
                                        </center>
                                    </form>

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





                                            