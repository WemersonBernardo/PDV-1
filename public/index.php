<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 16:54
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Vendas</title>
    <link rel="icon" sizes="192x192" href="img/icons/favicon.png" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            margin: auto;
            opacity: 1;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Sistema de Vendas </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light" onclick="findPage('cadastros')">Cadastro</a>
            <a href="#" class="list-group-item list-group-item-action bg-light" onclick="findPage('vendas')">Vendas</a>
            <a href="#" class="list-group-item list-group-item-action bg-light" onclick="findPage('relatorios')">Relatórios</a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <!-- Dropdown Navigator -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Ocultar Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Acesso Rápido
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick="findPage('cadastros')">Cadastro</a>
                            <a class="dropdown-item" href="#" onclick="findPage('vendas')">Vendas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="findPage('relatorios')">Relatórios</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div id="div_principal">
                <h1 class="mt-4">Sistema de Vendas - PDV</h1>
                <p>- Visão vendedor</p>
                <p>- Visão administrador</p>
            </div>

            <div class="loader" id="load"></div>
        </div>
    </div>

</div>

<div class="card-footer">
    <p class="copyright pull-right">
        &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.google.com">Sistema de Vendas - PDV</a>, suporte a você e a seus clientes
    </p>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>

<script src="bootstrap/js/bootbox.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        $('#load').hide();
    });

    function findPage(acao) {

        $('#load').show();

        setTimeout(function () {
            var url = "";

            if (acao == 'cadastros')
                url = "view/cadastros/produtos.php";
            if (acao == 'vendas')
                url = "view/vendas/pdv.php";
            //if (acao == 'relatorios')
            //url = "/ferramentachamados/view/empresas/listagem_empresas.php";

            $('#load').hide();
            $('#div_principal').load(url);
        }, 1000);
    }
</script>