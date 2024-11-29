<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Administração - Tem Motos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Letícia de Paula Silva Oliveira">

        <!-- Bootstrap Css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App Css-->
        <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">

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

        <div class="account-pages">
            <div class="container">
                <div class="formulario row justify-content-center d-flex">
                    <div class="conteudo col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-blue">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-white p-4">
                                            <h5 class="text-white">Seja bem vindo!</h5>
                                            <p>Identifique-se</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-center">
                                        <img src="{{asset('images/logo-branca.png')}}" alt="TEM MOTOS" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="name" type="name" name="name" placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" type="email" name="email" placeholder="Email">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Senha</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Senha" aria-label="Password" id="password" name="password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" type="password"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-blue waves-effect waves-light" type="submit">Entrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('libs/jquery/jquery.min.j')}}s"></script>
        <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>