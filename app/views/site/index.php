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
                        <img class="d-block w-100" src="<?= BASE_URL; ?>assets/theme/site/media/banner/banner2.jpg" alt="<?= SITE_NOME ?>">
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
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="far fa-building"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Property</h3>
                                <div class="item-count">1 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="fas fa-male"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Home Appliances</h3>
                                <div class="item-count">3 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="fas fa-glass-martini"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Electronics</h3>
                                <div class="item-count">6 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Business & Industry</h3>
                                <div class="item-count">0 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Education</h3>
                                <div class="item-count">0 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="far fa-futbol"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Hobby, Sport & Kids</h3>
                                <div class="item-count">4 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Health & Beauty</h3>
                                <div class="item-count">1 Ad</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon">
                                <i class="far fa-file-archive"></i>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Others</h3>
                                <div class="item-count">1 Ad</div>
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
                            <div class="product-box-layout2">
                                <div class="item-img">
                                    <a href="<?= BASE_URL ?>promocao/detalhes/<?= $promo->id_promocao ?>">
                                        <img src="<?= BASE_URL; ?>/assets/theme/site/media/product/product9.jpg" alt="<?= $promo->nome ?>">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title">
                                        <a href="<?= BASE_URL ?>promocao/detalhes/<?= $promo->id_promocao ?>">
                                            <?= $promo->nome ?>
                                        </a>
                                    </h3>
                                    <ul class="entry-meta">
                                        <li><i class="fas fa-tag"></i><a href="#">Categoria</a></li>
                                        <li><i class="far fa-clock"></i>Válido até <?= $promo->data_validade ?></li>
                                    </ul>
                                    <p><?= $promo->descricao ?></p>
                                    <div class="item-price">
                                        <p class="preco-antigo"><strike>DE R$ <?= $promo->valor_antigo ?></strike></p>
                                        <p class="preco-atual">POR R$ <?= $promo->valor ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
    <!--=          Parceiros      		    =-->
    <!--=====================================-->
    <?php if (!empty($parceiros)) : ?>
        <section class="brand-wrap-layout1">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="10" data-margin="30" data-autoplay="true" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false" data-r-extra-large="4" data-r-extra-large-nav="false" data-r-extra-large-dots="false">

                    <?php foreach ($parceiros as $parceiro) : ?>
                        <div class="brand-box-layout1">
                            <img src="<?= BASE_URL; ?>assets/theme/site/media/brand/<?= $parceiro->arquivo ?>" alt="brand">
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
