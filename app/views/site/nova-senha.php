<?php $this->view("site/include/header"); ?>

    <div class="container minpage" style="min-height: 100vh">
        <div class="myaccount-login-form light-shadow-bg">
            <div class="light-box-content" style="min-height: 100vh">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-6 pt-3 pb-3">
                        <div class="form-box login-form">
                            <h3 class="item-title text-center header-login-icon">
                                <i class="far fa-user mr-2"></i>Altere sua senha
                            </h3>
                            <hr style="padding-bottom: 15px">
                            <form id="formNovaSenha">
                                <input type="hidden" name="token" value="<?= $token ?>"/>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar Senha</label>
                                    <input type="password" class="form-control" name="senha_repete">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="submit" class="submit-btn" value="Alterar Senha">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Recuperar Senha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formRecuperarSenha">
                        <div class="form-group">
                            <label>Email</label>
                            <input style="border: 1px solid #d8c7c7;height: 40px;background-color: #f1f1f1f1;" type="email" class="form-control" name="email" placeholder="Informe seu email" id="email">
                        </div>
                        <div class="modal-footer">
                            <button style="border: 1px solid #1fbe8b;background-color: #1fbe8b !important;color: #fff !important;width: 100%;" type="submit" class="btn btn-primary">Recuperar senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("site/include/footer"); ?>