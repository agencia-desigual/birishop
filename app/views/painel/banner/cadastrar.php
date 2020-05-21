<?php $this->view("painel/include/header"); ?>

<!-- ============================================================== -->
<!-- INICIO cadastrar banner -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- BREADCUMP -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Cadastrar Banner</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/banners">Banners</a></li>
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

                            <h4 class="mt-0 header-title">Cadastrar Banner</h4>
                            <p class="sub-title">Cadastre um novo banner.</p>

                            <form id="formInserirBanner">

                                <!-- ORDEM -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Ordem</label>
                                            <input type="tel" class="form-control" name="ordem" required="" />
                                        </div>

                                        <div class="col-md-6">
                                            <label>Link</label>
                                            <input type="tel" class="form-control" name="link" value="#" required="" />
                                        </div>
                                    </div>
                                </div>

                                <!-- IMAGEM -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Imagem</label>
                                            <input required name="arquivo" type="file" class="dropify">
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
<script>

    $(document).ready(function(){

        // Basic
        $('.dropify').dropify();

    });

</script>
