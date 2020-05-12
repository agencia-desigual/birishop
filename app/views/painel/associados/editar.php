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
                            <h4 class="page-title">Alterar Usuário</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/usuarios">Usuários</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <?php if (!empty($user)) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Editar Usuário</h4>
                                    <p class="sub-title">Revise todos os dados do usuário, apenas os usuários tem acesso ao painel administrador.</p>

                                    <form id="formAlteraUsuario"
                                          data-id="<?= $user->id_usuario; ?>"
                                          data-refresh="<?= ($user->id_usuario == $usuario->id_usuario) ? 1 : 0; ?>"
                                          data-alerta="swal">

                                        <!-- NOME E EMAIL -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $user->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>E-mail</label>
                                                    <input type="email" class="form-control" name="email" value="<?= $user->email ?>" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CELULAR E SENHA -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Celular</label>
                                                    <input type="text"
                                                           class="form-control maskCel"
                                                           name="celular"
                                                           value="<?= $user->celular ?>" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" <?php if($user->status == true){ echo "selected";} ?>>Ativo</option>
                                                        <option value="0" <?php if($user->status == false){ echo "selected";} ?>>Destivado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!--- SENHA e REPETE SENHA -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Senha</label>
                                                    <input name="senha" type="password" class="form-control" />
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Repete a Senha</label>
                                                    <input name="repete_senha" type="password" class="form-control" />
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary float-right">Alterar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIM formulario -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>