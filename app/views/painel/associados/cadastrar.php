<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO editar usuario -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Cadastrar Associado</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/associados">Associados</a></li>
                                <li class="breadcrumb-item active">Cadastrar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Cadastrar Associado</h4>
                                <p class="sub-title">Cadastre um novo associado</p>

                                <form id="formInserirUsuario">

                                    <!-- NOME LOJA E CNPJ -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome da Loja</label>
                                                <input type="text" class="form-control" name="nome_estabelecimento" value="" required="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>CNPJ</label>
                                                <input type="tel" class="form-control maskCNPJ" name="cnpj" value="" required="" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NOME E EMAIL -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="" required="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" name="email" value="" required="" />
                                            </div>
                                        </div>
                                    </div>

                                    <!--- SENHA E REPETE SENHA -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Senha</label>
                                                <input name="senha" type="password" class="form-control" />
                                            </div>

                                            <div class="col-md-6">
                                                <label>Repete a Senha</label>
                                                <input name="senha_repete" type="password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- STATUS -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option selected disabled>Selecione</option>
                                                    <option value="1">Ativo</option>
                                                    <option value="0">Destivado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="nivel" value="associado" />

                                    <button type="submit" class="btn btn-primary float-right">Cadastrar</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIM formulario -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>