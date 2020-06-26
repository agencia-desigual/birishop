<?php $this->view("site/include/header"); ?>

    <!--=====================================-->
    <!--=        Inner Banner Start         =-->
    <!--=====================================-->
    <section class="inner-page-banner" data-bg-image="<?= BASE_URL; ?>assets/theme/site/img/breadcrump.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1 style="text-transform: uppercase"><?= $promocao->nome ?></h1>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">HOME</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL ?>promocoes"">PROMOCÕES</a>
                            </li>
                            <li style="text-transform: uppercase"><?= $promocao->nome ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=====================================-->
    <!--=          Product Start         =-->
    <!--=====================================-->
    <section class="single-product-wrap-layout1 section-padding-equal-70 bg-accent minpage">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-6">
                    <div class="single-product-box-layout1">
                        <div class="product-info light-shadow-bg">
                            <div class="product-content light-box-content">
                                <div class="item-img-gallery">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active centraliza-itens" id="gallery1" role="tabpanel">
                                            <a href="#">
                                                <img style="width: 50%" class="zoom_01" src="<?= $promocao->imagem ?>" alt="<?= $promocao->nome ?>" data-zoom-image="<?= $promocao->imagem ?>"">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-entry-meta">
                                    <ul>
                                        <li><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promocao->data_validade)); ?></li>
                                        <li><i class="fas fa-home"></i><?= $promocao->empresa->nome_estabelecimento ?></li>
                                    </ul>
                                </div>
                                <div class="item-details">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#details" role="tab" aria-selected="true">Detalhes</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="details" role="tabpanel">
                                            <p><?= $promocao->descricao ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-action-area">
                                    <ul>
                                        <li style="display: none" class="item-social">
                                                    <span class="share-title">
                                                        <i class="fas fa-share-alt"></i>
                                                        Compartilhar:
                                                    </span>
                                            <a href="#" class="bg-facebook"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#" class="bg-success"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-break-md sidebar-widget-area">
                    <div class="widget-lg widget-price">
                        <div class="item-price" style="background-color: #fff !important;text-align: center;">
                            <p style="display: inline" class="preco-antigo"><strike>DE R$ <?= $promocao->valor_antigo ?> </strike></p>
                            <p style="display: inline" class="preco-atual">POR R$ <?= $promocao->valor ?></p>
                        </div>
                    </div>
                    <div class="widget-lg widget-author-info widget-light-bg">
                        <h3 style="letter-spacing: 3px" class="widget-border-title">LOJA</h3>
                        <div class="author-content">
                            <div class="author-name">
                                <div class="item-img">
                                    <i class="fas fa-home ml-2"></i>
                                    <!-- <img src="--><?//= BASE_URL; ?><!--assets/theme/site/media/figure/author.jpg" alt="author"> -->
                                </div>
                                <h4 class="author-title"><a href="store-detail.html"><?= $promocao->empresa->nome_estabelecimento ?></a></h4>
                            </div>
                            <?php if(date("Y-m-d") <= $promocao->data_validade && $promocao->status != "cancelado" ) : ?>
                                <?php if (!empty($promocao->empresa->telefone)) : ?>
                                    <div class="phone-number classima-phone-reveal not-revealed" data-phone="<?= $promocao->empresa->telefone ?>">
                                        <div class="number"><i class="fas fa-phone"></i><span><?= substr($promocao->empresa->telefone,0,7).'X-XXXX'; ?></span></div>
                                        <div class="item-text">Click para ver o número</div>
                                    </div>
                                <?php endif; ?>
                                <div class="author-mail">
                                    <a href="<?= $promocao->link ?>" data-id="<?= $promocao->id_promocao ?>" target="_blank" class="btn btn-pegar-promocao contarAcesso">
                                        PEGAR PROMOÇÃO
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="author-mail">
                                    <a href="#" class="btn btn-promocao-encerrada">
                                        PROMOÇÃO ENCERRADA
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="widget widget-banner pb-5">
                        <a href="#">
<!--                            <img width="100%" src="--><?//= BASE_URL; ?><!--assets/theme/site/media/figure/widget-banner1.jpg" alt="banner">-->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->view("site/include/footer"); ?>