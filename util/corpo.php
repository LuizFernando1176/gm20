<?php
   include_once 'config.php';
   include_once 'testaSessao.php';
   testaSessao();
   $usuarioLogado = json_decode($_SESSION["gmUsuarioLogado"], true);
   
   //$queryBuscaUser = mysqli_query($coon, "");
   
   function cabeca() {
   
       $indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
       echo '
   <!DOCTYPE html>        
   <html lang="en">
       <head>
           <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <title>Sistema de Gerenciamento  de Maquinas</title>
           <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
           <link href="' . urlbase() . '/js/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
           <link rel="stylesheet" type="text/css" href="' . urlbase() . '/css/jquery-ui.css"/>
           <link rel="stylesheet" type="text/css" href="' . urlbase() . '/css/sb-admin-2.min.css"/>
       </head>
       <body id="page-top" onload="mostrarAlerta(' . $indice . ');">
       <script src="' . urlbase() . '/js/jquery-3.2.1.min.js"></script>
                               <script src="' . urlbase() . '/js/jquery-ui.js"></script>
                               <script type="text/javascript">
                                   $(document).ready(function () {
                                       $("#search").autocomplete({
                                           source: "' . urlbase() . '/util/search.php",
                                           minLength: 0
                                       });
                                   });
                               </script>
                               
       
        <div id="wrapper">
           <!-- Sidebar -->
           <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
               <a style="background-color: white" class="sidebar-brand d-flex align-items-center justify-content-center" href="' . urlbase() . '/index.php">
                   <div class="sidebar-brand-icon mx-3" ><img src="' . urlbase() . '/img/logo.svg" class="img-profile" width="80%" height="80%"></div>
                  
               </a>
               <!-- Divider -->
               
               <hr class="sidebar-divider my-0">
               <!-- Nav Item - Dashboard -->
               <li class="nav-item active">
                   <a class="nav-link" href="' . urlbase() . '/index.php">
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
                           <a class="collapse-item" href="' . urlbase() . '/relatorios/gerarRelatorio.php">Gerar Relatorio</a>
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
                           <a class="collapse-item" href="' . urlbase() . '/cadastros/cadastroMaquinas.php">Maquinas</a>
                           <a class="collapse-item" href="' . urlbase() . '/cadastros/cadastroSetor.php">Setor</a>
                           <a class="collapse-item" href="' . urlbase() . '/cadastros/cadastroUser.php">Usuarios</a>
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
                           <a class="collapse-item" href="' . urlbase() . '/exibir/exibirMaquinas.php">Maquinas</a>
                           <a class="collapse-item" href="' . urlbase() . '/exibir/exibirSetores.php">Setor</a>
                           <a class="collapse-item" href="' . urlbase() . '/exibir/exibirUsuarios.php">Usuarios</a>
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
                       <!-- Topbar Navbar -->
                      <form title="busca completa USE % " class="form-inline" method="post" action="' . urlbase() . '/buscas/buscas.php">
   <div class="form-group mx-sm-3 mb-2">
    	<input class="form-control" id="search" type="text" name="setor" placeholder="Busca por Setor"/>
    
  </div>
  <button type="submit" class="btn btn-success mb-2">Busca</button>
</form>
                       <ul class="navbar-nav ml-auto">
                           <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                           
                          
                           <div class="topbar-divider d-none d-sm-block"></div>
                        
                           
                           <li class="nav-item dropdown no-arrow">
                            
                               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                   <span class="mr-1 d-none d-lg-inline text-gray-800 small"><strong>Bem Vindo,   ' . $_SESSION['loginExibicao'] . '  </strong></span></a></strong>
                               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                               <a class="dropdown-item" href="perfil.php">
                                       <i class="fas fa-user fa-sm fa-fw  text-gray-400"></i>
                                       Perfil
                                   </a>
                                   <a class="dropdown-item" href="#">
                                       <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                       Configurações 
                                   </a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="' . urlbase() . '/sair.php" data-toggle="modal" data-target="#logoutModal">
                                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                       Sair
                                   </a>
                               </div>
                           </li>
                       </ul>
                   </nav>
       
   
   ';
   }
   function rodape() {
       echo '
   
   <script src="' . urlbase() . '/js/jquery-3.2.1.min.js"></script>
   <script src="' . urlbase() . '/js/jquery-ui.js"></script>
   <script src="' . urlbase() . '/js/jquery.mask.js"></script>    
   <script src="' . urlbase() . '/js/bootstrap.js"></script>
   <script src="' . urlbase() . '/js/bootstrap.bundle.js"></script>
   <script src="' . urlbase() . '/js/sb-admin-2.js"></script>
   <script src="' . urlbase() . '/js/script.js"></script>
   </body>
   
   </html>';
   }
   ?>