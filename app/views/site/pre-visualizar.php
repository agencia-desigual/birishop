
<!DOCTYPE html>
<html class="no-js" lang="">


<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= SITE_NOME ?> | Confira as promoções da nossa cidade</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL; ?>assets/theme/site/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/bootstrap/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/fontawesome/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/flaticon/flaticon.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/owl.carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/owl.carousel/css/owl.theme.default.min.css">
    <!-- Animated Headlines CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery-animated-headlines/css/jquery.animatedheadline.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/magnific-popup/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/animate.css/css/animate.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/dependencies/meanmenu/css/meanmenu.min.css">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/theme/site/css/app.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/custom/site/css/estilo.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/custom/site/css/responsivo.css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">

</head>

<body class="sticky-header">
<!-- ScrollUp Start Here -->
<a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="fas fa-angle-double-up"></i>
</a>
<!-- ScrollUp End Here -->
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<div id="wrapper" class="wrapper">

    <div style="min-height: calc(100vh - 100px)">


      <div style="padding-top:50px; padding-bottom: 50px">

          <div class="container">
              <h3>Exemplo na home</h3>
              <div class="row">
                  <div class="col-xl-9 col-lg-8">
                      <div class="card-promocao container">
                          <div class="row">
                              <div class="col-4 img-promocao" style="background-image: url('<?= $promocao->imagem ?>');"></div>
                              <div class="col-8  justify-content-start">
                                  <div class="conteudo-promocao">
                                      <h3 class="titulo-promocao mb-2">
                                          <?= $promocao->nome ?>
                                      </h3>
                                      <p class="mb-0 descricao-promocao"><i class="fas fa-tag mr-1"></i><?= $promocao->categoria->nome ?></p>
                                      <p class="mb-0 data-validade-promocao"><i class="far fa-clock mr-1"></i><?= date("d/m/Y",strtotime($promocao->data_validade)); ?></p>
                                      <p class="mb-0 descricao-promocao"><?= $promocao->descricao ?></p>
                                      <p class="mb-0 preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?></strike></p>
                                      <p class="mb-0 preco-atual">POR R$ <?= $promocao->valor ?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4"></div>
              </div>
          </div>

          <div class="container">
              <h3>Exemplo em promoções</h3>
              <section class="product-inner-wrap-layout1 bg-accent">
                  <div class="container">
                      <div class="row">
                          <div class="col-xl-12">
                              <div id="product-view" class="product-box-grid">
                                  <div class="row">

                                      <div class="col-xl-3 col-md-6">
                                          <div class="product-grid-view">
                                              <div class="grid-view-layout2">
                                                  <div class="product-box-layout1 top-rated-grid">
                                                      <div class="promocoes-img" style="background-image: url('<?= $promocao->imagem ?>');"></div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <p class="preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?> </strike></p>
                                                              <p class="preco-atual">POR R$ <?= $promocao->valor ?></p>
                                                          </div>
                                                          <div class="item-tag">
                                                              <?= $promocao->categoria->nome ?>
                                                          </div>
                                                          <h3 class="item-title">
                                                                  <?= $promocao->nome ?>
                                                              <ul class="entry-meta">
                                                                  <li class="produto-informacoes"><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promocao->data_validade)); ?></li>
                                                                  <li class="produto-informacoes"><i class="fas fa-home"></i><?= $promocao->associado->nome_estabelecimento ?></li>
                                                              </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-xl-3 col-md-6">
                                          <div class="product-grid-view">
                                              <div class="grid-view-layout2">
                                                  <div class="product-box-layout1 top-rated-grid">
                                                      <div class="promocoes-img" style="background-image: url('<?= $promocao->imagem ?>');"></div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <p class="preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?> </strike></p>
                                                              <p class="preco-atual">POR R$ <?= $promocao->valor ?></p>
                                                          </div>
                                                          <div class="item-tag">
                                                              <?= $promocao->categoria->nome ?>
                                                          </div>
                                                          <h3 class="item-title">
                                                              <?= $promocao->nome ?>
                                                              <ul class="entry-meta">
                                                                  <li class="produto-informacoes"><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promocao->data_validade)); ?></li>
                                                                  <li class="produto-informacoes"><i class="fas fa-home"></i><?= $promocao->associado->nome_estabelecimento ?></li>
                                                              </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-xl-3 col-md-6">
                                          <div class="product-grid-view">
                                              <div class="grid-view-layout2">
                                                  <div class="product-box-layout1 top-rated-grid">
                                                      <div class="promocoes-img" style="background-image: url('<?= $promocao->imagem ?>');"></div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <p class="preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?> </strike></p>
                                                              <p class="preco-atual">POR R$ <?= $promocao->valor ?></p>
                                                          </div>
                                                          <div class="item-tag">
                                                              <?= $promocao->categoria->nome ?>
                                                          </div>
                                                          <h3 class="item-title">
                                                              <?= $promocao->nome ?>
                                                              <ul class="entry-meta">
                                                                  <li class="produto-informacoes"><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promocao->data_validade)); ?></li>
                                                                  <li class="produto-informacoes"><i class="fas fa-home"></i><?= $promocao->associado->nome_estabelecimento ?></li>
                                                              </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-xl-3 col-md-6">
                                          <div class="product-grid-view">
                                              <div class="grid-view-layout2">
                                                  <div class="product-box-layout1 top-rated-grid">
                                                      <div class="promocoes-img" style="background-image: url('<?= $promocao->imagem ?>');"></div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <p class="preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?> </strike></p>
                                                              <p class="preco-atual">POR R$ <?= $promocao->valor ?></p>
                                                          </div>
                                                          <div class="item-tag">
                                                              <?= $promocao->categoria->nome ?>
                                                          </div>
                                                          <h3 class="item-title">
                                                              <?= $promocao->nome ?>
                                                              <ul class="entry-meta">
                                                                  <li class="produto-informacoes"><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promocao->data_validade)); ?></li>
                                                                  <li class="produto-informacoes"><i class="fas fa-home"></i><?= $promocao->associado->nome_estabelecimento ?></li>
                                                              </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>

      </div>


    </div>

    <!--=====================================-->
    <!--=       Footer Start           	=-->
    <!--=====================================-->
    <footer>
        <div class="footer-bottom-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright-text">
                            © <?= date("Y") ?> Todos os direitos reservados.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="payment-option">
                            <a href="https://desigual.com.br/site/">
                                <h4 style="color: #fff">Desigual</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- Jquery Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery/js/jquery.min.js"></script>
<!-- Popper Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/popper.js/js/popper.min.js"></script>
<!-- Bootstrap Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/bootstrap/js/bootstrap.min.js"></script>
<!-- Waypoints Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/waypoints/js/jquery.waypoints.min.js"></script>
<!-- Counterup Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery.counterup/js/jquery.counterup.min.js"></script>
<!-- Owl Carousel Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/owl.carousel/js/owl.carousel.min.js"></script>
<!-- ImagesLoaded Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
<!-- Isotope Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
<!-- Animated Headline Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery-animated-headlines/js/jquery.animatedheadline.min.js"></script>
<!-- Magnific Popup Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
<!-- ElevateZoom Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/elevatezoom/js/jquery.elevateZoom-2.2.3.min.js"></script>
<!-- Bootstrap Validate Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/bootstrap-validator/js/validator.min.js"></script>
<!-- Meanmenu Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/meanmenu/js/jquery.meanmenu.min.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
<!-- Site Scripts -->
<script src="<?= BASE_URL; ?>/assets/theme/site/js/app.js"></script>
<!-- Js Autoload -->
<?php $this->view("autoload/js"); ?>
<script>
    function menu(tipo)
    {
        if(tipo === "abre")
        {
            $(".sidebar-menu-mobile").css("left","0px");
            $(".fundo-menu").fadeIn();
        }
        else
        {
            $(".sidebar-menu-mobile").css("left","-250px");
            $(".fundo-menu").fadeOut();
        }
    }
</script>
</body>

</html>