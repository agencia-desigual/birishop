<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO cadastrar cor -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Inserir uma nova Cor</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/cores">Cores</a></li>
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

                                <h4 class="mt-0 header-title">Cadastrar uma cor</h4>
                                <p class="sub-title">Cadastre uma nova cor, e depois vincule a um produto.</p>

                                <form id="formInserirCor">

                                    <!-- NOME E COR -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" placeholder="Informe o nome da cor" required="" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Cor</label>
                                                <div data-color-format="backgorund" data-color="" class="colorpicker-default input-group colorpicker-element">
                                                    <input type="text" readonly="readonly" name="cor" value="" class="form-control" required="">
                                                    <div class="input-group-append add-on">
                                                        <button class="btn btn-light" type="button">
                                                            <i style="margin-top: 2px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control" required="">
                                                    <option selected disabled>Selecione uma opção</option>
                                                    <option value="1">ATIVO</option>
                                                    <option value="0">DESATIVADO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


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