<?php $this->view("painel/include/header"); ?>

<!-- ============================================================== -->
<!-- INICIO da listagem de cores -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- BREADCUMP -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Banners</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel"><?= SITE_NOME ?></a></li>
                            <li class="breadcrumb-item active">Banners</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- FIM BREADCUMP -->

            <!-- BANNERS -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">TODAS OS BANNERS</h4>
                            <p class="sub-title../plugins">Gerencie seus banners, selecione as melhores imagens.</p>
                            <hr class="mt-3 mb-3">
                            <div class="row">
                                <?php if(!empty($banners)): ?>
                                    <?php foreach ($banners as $banner) : ?>
                                        <div class="col-xl-4" id="tb_<?= $banner->id_banner; ?>">
                                            <div class="card m-b-30">
                                                <img class="card-img-top img-fluid" src="<?= BASE_STORAGE; ?>banner/<?= $banner->arquivo ?>" alt="Banner">
                                                <div class="card-body">
                                                    <h1 class="card-title font-16 mt-0"><span style="font-size: 18px" class="badge badge-success">ORDEM #<?= $banner->ordem ?></span></h1>
                                                    <div class="col-md-12 text-right">
                                                        <button data-id="<?= $banner->id_banner; ?>"
                                                                class="deletarBanner btn btn-danger btn-icon btn-sm mr-2">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>

                                                        <button data-id="<?= $banner->id_banner; ?>" data-ordem="<?= $banner->ordem; ?>" data-link="<?= $banner->link; ?>" class="alterarBanner btn btn-primary btn-icon btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-md-12">
                                        <h6 class="mb-4">Não possui nenhum banner cadastrado. </h6>

                                        <a href="<?= BASE_URL ?>painel/banner/inserir" class="btn btn-primary mb-3">Adicionar um banner</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM BANNERS -->


            <!-- Modal Alterar ----------------------------------------------------- -->
            <!-- ------------------------------------------------------------------- -->
            <div class="modal fade" id="modalAlteraBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Alterar Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formAlteraBanner">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Ordem</label>
                                            <input name="ordem" type="number" class="form-control" value="" id="inputOrdem"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Link</label>
                                            <input name="link" type="text" class="form-control" value="" id="inputLink"  />
                                        </div>
                                    </div>
                                </div>

                                <!-- IMAGEM -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Novo Banner</label>
                                            <input required name="arquivo" type="file" class="dropify">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Alterar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <input type="hidden" id="inputId" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------------------------------- -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->


</div>
<!-- ============================================================== -->
<!-- FIM da listagem -->
<!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
<script>

    $(document).ready(function(){

        // Basic
        $('.dropify').dropify();

    });

</script>
