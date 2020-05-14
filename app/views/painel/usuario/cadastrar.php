<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO cadastrar usuario -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Cadastrar um Usuário</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/usuarios">Usuários</a></li>
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

                                <h4 class="mt-0 header-title">Cadastrar um novo Usuário</h4>
                                <p class="sub-title">Cadastre um novo usuário, apenas os usuários tem acesso ao painel administrador.</p>

                                <form id="formInserirUsuario">

                                    <!-- NOME E EMAIL -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" placeholder="Nome do usuário" required="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" name="email" placeholder="exemplo@site.com.br" required="" />
                                            </div>
                                        </div>
                                    </div>

                                    <!--- SENHA e REPETE SENHA -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Senha</label>
                                                <input name="senha" type="password" placeholder="Senha para acessar o sistema" class="form-control" />
                                            </div>

                                            <div class="col-md-6">
                                                <label>Repete a Senha</label>
                                                <input name="senha_repete" type="password" placeholder="Repete a senha Informada" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- STATUS -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" selected>Ativo</option>
                                                    <option value="0">Destivado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="nivel" value="admin" />


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