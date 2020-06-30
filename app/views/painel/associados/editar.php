<?php if ($usuario->nivel == "associado") : ?>
    <?php $this->view("associado/include/header"); ?>
<?php else: ?>
    <?php $this->view("painel/include/header"); ?>
<?php endif; ?>

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
                            <h4 class="page-title">Alterar Associado</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/associados">Associados</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <?php if (!empty($associado)) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <?php if ($usuario->nivel == "associado") : ?>
                                        <h4 class="mt-0 header-title">Alterar perfil</h4>
                                        <p class="sub-title">Revise todos os dados e altere</p>
                                    <?php else: ?>
                                        <h4 class="mt-0 header-title">Editar Associado</h4>
                                        <p class="sub-title">Revise todos os dados do associado</p>
                                    <?php endif; ?>

                                    <form id="formAlteraUsuario"
                                          data-id="<?= $associado->id_usuario; ?>"
                                          data-refresh="<?= ($associado->id_usuario == $associado->id_usuario) ? 1 : 0; ?>"
                                          data-alerta="swal">

                                        <!-- NOME LOJA E CNPJ -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome da Loja</label>
                                                    <input type="text" class="form-control" name="nome_estabelecimento" value="<?= $associado->nome_estabelecimento ?>" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>CNPJ</label>
                                                    <?php if ($usuario->nivel == "associado") : ?>
                                                        <p><?= $associado->cnpj ?></p>
                                                    <?php else: ?>
                                                        <input type="tel" class="form-control maskCNPJ" name="cnpj" value="<?= $associado->cnpj ?>" required="" />
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- NOME E EMAIL -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $associado->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>E-mail</label>
                                                    <p><?= $associado->email ?></p>
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


                                        <?php if ($usuario->nivel == "admin") : ?>

                                            <!-- STATUS E PROMOÇÃO -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="1" <?php if($associado->status == true){ echo "selected";} ?>>Ativo</option>
                                                            <option value="0" <?php if($associado->status == false){ echo "selected";} ?>>Destivado</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Participa da promoção?</label>
                                                        <select name="promocao" class="form-control">
                                                            <option value="1" <?php if($associado->promocao == true){ echo "selected";} ?>>Sim</option>
                                                            <option value="0" <?php if($associado->promocao == false){ echo "selected";} ?>>Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endif; ?>

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