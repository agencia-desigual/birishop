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
                            <h4 class="page-title">Alterar Tamanho</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/tamanhos">Tamanhos</a></li>
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

                                <h4 class="mt-0 header-title">Alterar Tamanho</h4>
                                <p class="sub-title">Altere o tamanho, e depois vincule a um produto.</p>

                                <form id="formTamanhoAlterar" data-id="<?= $tamanho->id_tamanho; ?>">

                                    <!-- NOME E STATUS -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?= $tamanho->nome ?>" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" <?php if($tamanho->status == true){echo "selected";} ?>>ATIVO</option>
                                                    <option value="0" <?php if($tamanho->status == false){echo "selected";} ?>>DESATIVADO</option>
                                                </select>
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