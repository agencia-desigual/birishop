<?php $this->view("site/include/header"); ?>

    <!--=====================================-->
    <!--=            Banner Start           =-->
    <!--=====================================-->
    <?php if(!empty($banners)) : ?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $cont = 0; ?>
                <?php foreach ($banners as $banner) : ?>
                    <div class="carousel-item <?= ($cont == 0) ? 'active' : ''; ?>">
                        <img class="d-block w-100" src="<?= $banner->url ?>" alt="<?= SITE_NOME ?>">
                    </div>
                <?php $cont++; ?>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php endif; ?>

    <!--=====================================-->
    <!--=            Category Start           =-->
    <!--=====================================-->
    <section id="#produtos" class="section-padding-top-heading">
        <div class="container">
            <div class="heading-layout1">
                <h4 style="letter-spacing: 5px" class="heading-title">CATEGORIAS</h4>
            </div>
            <div class="row">
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-hamburger"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Alimentação</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Bares e Restaurantes</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-heartbeat"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Saúde</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Serviços automotivos</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Eletrônicos</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-paw"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Pet's</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="far fa-building"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Beleza</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-tshirt"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Vestuário</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-shoe-prints"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Calçados</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="far fa-building"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Acessórios</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="far fa-building"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Papelarias</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-stream"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Diversos</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--=====================================-->
    <!--=            Product Start          =-->
    <!--=====================================-->
    <section class="section-padding-top-heading bg-accent">
        <div class="container">
            <?php if (!empty($promocoes)) : ?>
                <div class="row gutters-20">
                    <div class="col-xl-9 col-lg-8">
                        <div class="heading-layout2">
                            <h4 style="letter-spacing: 5px" class="heading-title">PROMOÇÕES</h4>
                        </div>
                        <?php foreach ($promocoes as $promo) : ?>
                            <a href="<?= BASE_URL ?>promocao/detalhes/<?= $promo->id_promocao ?>">
                                <div class="card-promocao container">
                                    <div class="row">
                                        <div class="col-4 img-promocao" style="background-image: url('<?= $promo->imagem ?>');"></div>
                                        <div class="col-8  justify-content-start">
                                            <div class="conteudo-promocao">
                                                <h3 class="titulo-promocao mb-2">
                                                        <?= $promo->nome ?>
                                                </h3>
                                                <p class="mb-0 descricao-promocao"><i class="fas fa-tag mr-1"></i><?= $promo->categoria ?></p>
                                                <p class="mb-0 data-validade-promocao"><i class="far fa-clock mr-1"></i><?= date("d/m/Y",strtotime($promo->data_validade)); ?></p>
                                                <p class="mb-0 descricao-promocao"><?= $promo->descricao ?></p>
                                                <p class="mb-0 preco-antigo"><strike>DE R$ <?= $promo->valor_antigo ?></strike></p>
                                                <p class="mb-0 preco-atual">POR R$ <?= $promo->valor ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-eu-quero float-right">Eu quero</button>
                            </a>
                        <?php endforeach; ?>
                        <br>
                        <a href="<?= BASE_URL ?>promocoes" class="btn-promocoes">Todas Promoções</a>
                    </div>
                    <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-space-sm">
                        <div class="heading-layout2">
                            <h4 style="letter-spacing: 5px" class="heading-title">LOJAS</h4>
                        </div>
                        <div class="widget-bottom-margin widget-banner">
                            <a href="#">
                                <img src="<?= BASE_URL; ?>assets/theme/site/media/figure/widget-banner.png" alt="banner">
                            </a>
                        </div>
                        <div class="widget-bottom-margin widget-banner">
                            <a href="#">
                                <img src="<?= BASE_URL; ?>assets/theme/site/media/figure/widget-banner.png" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <h4 style="letter-spacing: 2px">SEM PROMOÇÕES</h4>
            <?php endif; ?>
        </div>
    </section>

    <!--=====================================-->
    <!--=          Newaletter      		    =-->
    <!--=====================================-->
    <section style="background-color: #0476d9;background-image: url('<?= BASE_URL; ?>assets/theme/site/img/bg.jpg');" class="">
      <div class="brand-wrap-layout1" style="background-color: #000000ad">
          <div class="container">
              <div class="col-md-12">
                  <div class="centraliza-itens">
                      <h2 style="color: #fff;font-weight: 900;font-style: italic;">Fique por dentro das <br>nossas promoções</h2>
                  </div>
                  <form id="formNewslleter">
                      <div class="row mb-2">
                          <div class="col"></div>
                          <div class="col-md-6">
                              <input value="seu melhor email" type="email" class="form-control input-newslleter" name="email">
                          </div>
                          <div class="col"></div>
                      </div>
                      <div class="form-group d-flex pt-3">
                          <div class="col"></div>
                          <div class="col-md-6 centraliza-itens">
                              <button type="submit" class="submit-btn btn-newslleter">Cadastrar</button>
                          </div>
                          <div class="col"></div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </section>

    <!--=====================================-->
    <!--=          Parceiros      		    =-->
    <!--=====================================-->
    <?php if (!empty($parceiros)) : ?>
        <section class="brand-wrap-layout1">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="10" data-margin="30" data-autoplay="true" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false" data-r-extra-large="4" data-r-extra-large-nav="false" data-r-extra-large-dots="false">

                    <?php foreach ($parceiros as $parceiro) : ?>
                        <div class="brand-box-layout1">
                            <img src="<?= $parceiro->url ?>" alt="brand">
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </section>
    <?php endif; ?>


<?php $this->view("site/include/footer"); ?>
<script type="text/javascript">

    $(document).ready(function(){

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:6,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
        });

        $('.carousel').carousel({
            interval: 5000
        })

    });
</script>
