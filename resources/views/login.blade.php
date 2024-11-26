
<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Administração - Tem Motos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Letícia de Paula Silva Oliveira">

        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="css/icons.min.css" rel="stylesheet" type="text/css">

        <!-- App Css-->
        <link href="css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <link href="css/login.css" id="app-style" rel="stylesheet" type="text/css">

        <!-- App js -->
        <script src="js/plugin.js"></script>

        <!-- page loading -->
        <link rel="stylesheet" href="css/page-loading.css">
        <script src="js/page-loading.js"></script>
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
                                        <img src="images/logo-branca.png" alt="TEM MOTOS" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form class="form-horizontal mt-3">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Usuário</label>
                                            <input type="text" class="form-control" id="username" placeholder="Nome de usuário">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Senha</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Senha" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-blue waves-effect waves-light" type="submit">Entrar</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i>Esqueceu sua senha?</a>
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
        <script src="libs/jquery/jquery.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="libs/metismenu/metisMenu.min.js"></script>
        <script src="libs/simplebar/simplebar.min.js"></script>
        <script src="libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="js/app.js"></script>
    </body>
</html>