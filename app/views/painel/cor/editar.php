<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO alterar cor -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Alterar Cor</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/cores">Cores</a></li>
                                <li class="breadcrumb-item active">Alterar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Alterar Cor</h4>
                                <p class="sub-title">Altere a cor, e depois vincule a um produto.</p>

                                <form id="formCorAlterar" data-id="<?= $cor->id_cor; ?>">

                                    <!-- NOME E COR -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?= $cor->nome ?>" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" <?php if($cor->status == true){echo "selected";} ?>>ATIVO</option>
                                                    <option value="0" <?php if($cor->status == false){echo "selected";} ?>>DESATIVADO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Cor</label>
                                                <div data-color-format="backgorund" data-color="<?= $cor->cor ?>" class="colorpicker-default input-group colorpicker-element">
                                                    <input type="text" readonly="readonly" name="cor" value="<?= $cor->cor ?>" class="form-control">
                                                    <div class="input-group-append add-on">
                                                        <button class="btn btn-light" type="button">
                                                            <i style="background-color: <?= $cor->cor ?>; margin-top: 2px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary float-right">Alterar</button>

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