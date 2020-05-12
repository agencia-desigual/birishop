<?php $this->view("site/include/header"); ?>

    <!--=====================================-->
    <!--=        Inner Banner Start         =-->
    <!--=====================================-->
    <section class="inner-page-banner" data-bg-image="<?= BASE_URL; ?>assets/theme/site/media/banner/banner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1>SEJA UM ASSOCIADO</h1>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">HOME</a>
                            </li>
                            <li>CADASTRO</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="myaccount-login-form light-shadow-bg">
            <div class="light-box-content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-10 pt-3 pb-3">
                        <div class="form-box login-form">
                            <h3 class="item-title text-center">Seja um Associado</h3>
                            <hr style="padding-bottom: 20px"
                            <form id="formCadastro">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label>Nome do usuário</label>
                                        <input type="nome" class="form-control" name="nome" id="nome">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nome do estabelecimento</label>
                                        <input type="nome-loja" class="form-control" name="nome-loja" id="nome-loja">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label>CNPJ</label>
                                        <input type="cnpj" class="form-control" name="cnpj" id="cnpj">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="senha" id="senha">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirmar Senha</label>
                                        <input type="password" class="form-control" name="c_senha" id="c_senha">
                                    </div>
                                </div>

                                <div class="form-group d-flex pt-3">
                                    <input type="submit" class="submit-btn" value="Cadastrar">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("site/include/footer"); ?>