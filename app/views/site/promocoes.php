<?php $this->view("site/include/header"); ?>
    <!-- Plugin OWL -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/plugins/owl.carousel/dist/assets/owl.theme.default.css" />

    <!--=====================================-->
    <!--=        Inner Banner Start         =-->
    <!--=====================================-->
    <section class="inner-page-banner" data-bg-image="<?= BASE_URL; ?>assets/theme/site/img/breadcrump.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <?php if(!empty($nomeCategoria)) : ?>
                            <h1 style="text-transform: uppercase"><?= $nomeCategoria ?></h1>
                        <?php else: ?>
                            <h1>TODAS PROMOÇÕES</h1>
                        <?php endif; ?>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">HOME</a>
                            </li>
                            <?php if(!empty($nomeCategoria)) : ?>
                                <li style="text-transform: uppercase"><?= $nomeCategoria ?></li>
                            <?php else: ?>
                                <li>TODAS PROMOÇÕES</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=====================================-->
    <!--=          Product Start         =-->
    <!--=====================================-->
    <section class="product-inner-wrap-layout1 bg-accent minpage">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filter-heading">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h2 class="item-title">Escolha por categorias</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-md-end justify-content-center">
                                <div class="product-sorting">
                                    <div class="layout-switcher">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row owl-carousel owl-theme mb-2">
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/10">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="fas fa-gem"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Acessórios</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/1">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/2">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/7">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="far fa-kiss-wink-heart"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Beleza</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/9">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/12">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/5">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/11">
                            <div class="tamanho-categoria centraliza-itens">
                                <div>
                                    <div class="item-icon">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">Papelarias</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/6">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/3">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/4">
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
                <div class="item">
                    <div class="category-box-layout1">
                        <a href="<?= BASE_URL; ?>promocoes/8">
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
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <?php if ($qtdePromocoes >= 1) : ?>

                        <div id="product-view" class="product-box-grid">
                            <div class="row">
                                <?php foreach ($promocoes as $promo) : ?>
                                    <div class="col-xl-3 col-md-6 <?= ($promo->data_validade < date("Y-m-d") || $promo->status == "cancelado" ) ? 'opacidade' : '' ?>">
                                        <?php if ($promo->empresa->promocao == 1) : ?>
                                            <img style="width: 75px;height: 45px;position: absolute;right: 7px;" src="<?= BASE_URL ?>assets/theme/site/img/selo.png">
                                        <?php endif; ?>
                                        <div class="product-grid-view">
                                            <div class="grid-view-layout2">
                                                <div class="product-box-layout1 top-rated-grid">
                                                    <a class="nome-produto" href="<?= BASE_URL; ?>promocao/detalhes/<?= $promo->id_promocao ?>">
                                                        <div class="promocoes-img" style="background-image: url('<?= $promo->imagem ?>');">
                                                        </div>
                                                    </a>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <p class="preco-antigo"><strike>DE R$ <?= $promo->valor_antigo ?> </strike></p>
                                                            <p class="preco-atual">POR R$ <?= $promo->valor ?></p>
                                                        </div>
                                                        <div class="item-tag">
                                                            <a class="produto-categoria" href="<?= BASE_URL; ?>promocao/detalhes/<?= $promo->id_promocao ?>"><?= $promo->categoria ?></a>
                                                        </div>
                                                        <h3 class="item-title">
                                                            <a class="nome-produto" href="<?= BASE_URL; ?>promocao/detalhes/<?= $promo->id_promocao ?>">
                                                                <?= $promo->nome ?>
                                                            </a>
                                                            <ul class="entry-meta">
                                                                <li class="produto-informacoes"><i class="far fa-clock"></i>Válida até <?= date("d/m/Y",strtotime($promo->data_validade)); ?></li>
                                                                <li class="produto-informacoes"><i class="fas fa-home"></i><?= $promo->empresa->nome_estabelecimento ?></li>
                                                            </ul>
                                                    </div>
                                                    <?php if($promo->data_validade < date("Y-m-d") || $promo->status == "cancelado") : ?>
                                                        <div class="centraliza-itens">
                                                            <a href="<?= BASE_URL; ?>promocao/detalhes/<?= $promo->id_promocao ?>" class="btn btn-eu-quero-promo" style="background-color: #c108084f !important" >Encerrado</a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="centraliza-itens">
                                                            <a href="<?= BASE_URL; ?>promocao/detalhes/<?= $promo->id_promocao ?>" class="btn btn-eu-quero-promo">Eu quero</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <h3>Ops, não encontramos nenhuma promoção.</h3>

                        <a href="<?= BASE_URL; ?>" class="submit-btn btn-newslleter" style="padding: 10px 20px !important;">
                            Voltar Para a home
                        </a>
                    <?php endif; ?>

                    <?php $this->view("site/include/paginacao", $paginacao); ?>
                </div>
            </div>
        </div>
    </section>

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
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:5,
                }
            }

        });

    });
</script>
