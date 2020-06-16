<?php $this->view("site/include/header"); ?>

    <!--=====================================-->
    <!--=        Inner Banner Start         =-->
    <!--=====================================-->
    <section class="inner-page-banner" data-bg-image="<?= BASE_URL; ?>assets/theme/site/img/breadcrump2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1>FAÇA SEU CADASTRO</h1>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">HOME</a>
                            </li>
                            <li>FAÇA SEU CADASTRO</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container minpage">
        <div class="myaccount-login-form light-shadow-bg">
            <div class="light-box-content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-10 pt-3 pb-3">
                        <div class="form-box login-form">
                            <h3 class="item-title text-center">Faça seu cadastro</h3>
                            <p style="margin-top: -15px" class="text-center">
                                Apenas cadastros de empresas associadas a ACIB<br>serão permitidos. Caso não seja um associado, <a style="display: inline" class="text-center" href="https://www.acibirigui.com.br/como-associar-se" target="_blank">saiba como associar-se</a>
                            </p>
                            <hr style="padding-bottom: 20px">
                            <form id="formUsuarioCadastro">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label>Nome do usuário</label>
                                        <input type="text" class="form-control" name="nome" id="nome">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nome do estabelecimento</label>
                                        <input type="text" class="form-control" name="nome_estabelecimento" id="nome-estabelecimento">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>CNPJ ou CPF</label>
                                        <input type="text" class="form-control maskNumero" maxlength="14" name="cnpj" id="cnpj">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="senha" id="senha">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirmar Senha</label>
                                        <input type="password" class="form-control" name="senha_repete" id="senha_repete">
                                    </div>
                                </div>

                                <div class="row mb-2 ml-2">
                                    <div class="col-md-12">
                                        <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1" style="font-size: 13px;position: relative;top: -3px;">Eu aceito todos os <a href="<?= BASE_URL ?>termos-e-condicoes" target="_blank">Termos e condições</a></label>
                                    </div>
                                </div>

                                <div class="form-group d-flex pt-3">
                                    <button type="submit" class="submit-btn">Cadastrar</button>
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