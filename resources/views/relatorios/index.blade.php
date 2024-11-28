
<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Relatórios - Tem Motos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Letícia de Paula Silva Oliveira">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App Css-->
        <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App js -->
        <script src="{{asset('js/plugin.js')}}"></script>

        <!-- page loading -->
        <link rel="stylesheet" href="{{asset('css/page-loading.css')}}">
        <script src="{{asset('js/page-loading.js')}}"></script>
    </head>

    <body>

        <!-- Page loading spinner -->
        <div class="page-loading active">
            <div class="page-loading-inner">
                <div class="page-spinner"></div><span>Carregando...</span>
            </div>
        </div>

        <div class="account-pages pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                            <h4 class="text-uppercase">Desculpe, página não encontrada</h4>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="/">Voltar para o início</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">
                        <div>
                            <img src="{{asset('images/error-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
