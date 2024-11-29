<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>@yield('title') - Tem Motos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Letícia de Paula Silva Oliveira"> 

        <!-- Bootstrap Css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

        <!-- DataTables -->
        <link href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="{{asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App Css-->
        <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css">

        <!-- App js -->
        <script src="{{asset('js/plugin.js')}}"></script>

        <!-- page loading -->
        <link rel="stylesheet" href="{{asset('css/page-loading.css')}}">
        <script src="{{asset('js/page-loading.js')}}"></script>
    </head>

    <body data-sidebar="dark">

        <!-- Page loading spinner -->
        <div class="page-loading active">
            <div class="page-loading-inner">
                <div class="page-spinner"></div><span>Carregando...</span>
            </div>
        </div>

        <div id="layout-wrapper">

            <!-- header -->
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">

                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/" class="logo">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo-branca.png')}}" alt="" height="15">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('images/logo-branca.png')}}" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <!-- full screen button -->
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- Menu Lateral -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled ps-2 pe-2" id="side-menu">
                            <li class="menu-title text-white text-center">Menu</li>
                            <li>
                                <button class="btn btn-azul">
                                    <a href="{{ route('clientes.index') }}" class="text-white">
                                        <span>Cadastro de Clientes</span>
                                    </a>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-azul waves-effect">
                                    <a href="{{ route('pecas.index') }}" class="text-white">
                                        <span>Cadastro de Peças</span>
                                    </a>
                                </button>  
                            </li>
                            <li>
                                <button class="btn btn-azul waves-effect">
                                    <a href="{{ route('servicos.index') }}" class="text-white">
                                        <span>Cadastro de Serviços</span>
                                    </a>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-azul waves-effect">
                                    <a href="{{ route('pedidos.index') }}" class="text-white">
                                        <span>Cadastrar Pedidos</span>
                                    </a>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-azul waves-effect">
                                    <a href="{{ route('relatorios.index') }}" class="text-white">
                                        <span>Emitir Relatórios</span>
                                    </a>
                                </button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- conteúdo -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">

                            @yield('content')

                        </div>
                    </div>
                </div>

                <!-- footer -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Tem Motos.
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            
        </div>

        <!-- menu de configurações -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Configurações</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Tema</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{asset('images/layouts/layout-1.jpg')}}" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Tema Claro</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{asset('images/layouts/layout-2.jpg')}}" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Tema Escuro</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('js/pages/datatables.init.js')}}"></script>    
        <script src="{{asset('js/app.js')}}"></script>

        <!-- Table Editable plugin -->
        <script src="{{asset('libs/table-edits/build/table-edits.min.js')}}"></script>
        <script src="{{asset('js/pages/table-editable.int.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Buttons examples -->
        <script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Máscaras de entrada -->
        <script src="{{asset('js/mascara-cpf.js')}}"></script>
        <script src="{{asset('js/mascara-wpp.js')}}"></script>

        @yield('scripts')
    </body>
</html>
