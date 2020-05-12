<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- SEO Basico -->
    <title><?= SITE_NOME ?> | <?= !empty($seo["title"]) ? $seo["title"] : "Area Administrativa"; ?></title>
    <meta content="Desigual" name="author" />

    <!-- Icone -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/custom/img/ico/favicon.ico">

    <!-- Morris Chart CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/theme/painel/plugins/morris/morris.css">

    <!-- Summernote css -->
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

    <!-- Colorpicker -->
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= BASE_URL ?>assets/theme/painel/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Css do Painel -->
    <link href="<?= BASE_URL ?>assets/theme/painel/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>assets/theme/painel/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>assets/theme/painel/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>assets/theme/painel/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>assets/custom/painel/css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>assets/custom/painel/css/responsivo.css" rel="stylesheet" type="text/css">

    <!-- Js Autoload -->
    <?php $this->view("autoload/css"); ?>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="<?= BASE_URL; ?>" class="logo">
                <span class="logo-light">
                    Desigual
                </span>
                <span class="logo-sm">
                    Dg
                </span>
            </a>
        </div>

        <nav class="navbar-custom dark">
            <ul class="navbar-right list-inline float-right mb-0">

                <!-- full screen -->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown notification-list list-inline-item">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= BASE_URL ?>assets/custom/site/img/logo-preta.png" alt="<?= SITE_NOME; ?>" style="height: auto; width: 70px;">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a class="dropdown-item text-danger" href="<?= BASE_URL ?>sair">
                                <i class="mdi mdi-power text-danger"></i> Sair
                            </a>
                        </div>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0 btn-menu-mobile">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">MENU</li>

                    <!-- Início / Dashboard -->
                    <li>
                        <a href="<?= BASE_URL ?>" class="waves-effect">
                            <i class="icon-accelerator"></i> <span> Início </span>
                        </a>
                    </li>

                    <!-- ASSOCIADOS -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span>
                                Associados <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= BASE_URL ?>painel/banners">Listar Todos</a></li>
                            <li><a href="<?= BASE_URL ?>painel/banner/inserir">Adicionar</a></li>
                        </ul>
                    </li>

                    <!-- PROMOÇÕES -->
                    <li>
                        <a href="<?= BASE_URL ?>painel/promocoes" class="waves-effect">
                            <i class="fas fa-percent"></i><span> Promoções </span>
                        </a>
                    </li>

                    <!-- NEWSLETTER -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fas fa-list-ol"></i>
                            <span>
                                Newsletter
                            </span>
                        </a>
                    </li>


                    <!-- BANNERS -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fas fa-images"></i>
                            <span>
                                Banners <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= BASE_URL ?>painel/banners">Listar Todos</a></li>
                            <li><a href="<?= BASE_URL ?>painel/banner/inserir">Adicionar</a></li>
                        </ul>
                    </li>


                    <!-- PARCEIROS -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="far fa-handshake"></i>
                            <span>
                                Parceiros <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= BASE_URL ?>painel/parceiros">Listar Todos</a></li>
                            <li><a href="<?= BASE_URL ?>painel/parceiro/inserir">Adicionar</a></li>
                        </ul>
                    </li>


                    <!-- USUÁRIOS -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fas fa-user-shield"></i>
                            <span>
                                Usuários <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                            </span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= BASE_URL ?>painel/usuarios">Listar Todos</a></li>
                            <li><a href="<?= BASE_URL ?>painel/usuario/inserir">Adicionar</a></li>
                        </ul>
                    </li>


                    <!-- SAIR -->
                    <li>
                        <a href="<?= BASE_URL ?>sair" class="waves-effect"><i class="fas fa-running"></i><span> Sair </span></a>
                    </li>

                </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->