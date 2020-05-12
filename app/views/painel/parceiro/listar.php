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
                        <h4 class="page-title">Portfólios</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel"><?= SITE_NOME ?></a></li>
                            <li class="breadcrumb-item active">Parceiros</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- FIM BREADCUMP -->

            <!-- PARCEIROS -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">TODAS OS PARCEIROS</h4>
                            <p class="sub-title../plugins">Gerencie seus parceiros.</p>
                            <hr class="mt-3 mb-3">
                            <div class="row">
                                <?php if(!empty($parceiros)): ?>
                                    <?php foreach ($parceiros as $parceiro) : ?>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" id="tb_<?= $parceiro->id_parceiro; ?>">
                                            <div class="card m-b-30">
                                                <img class="card-img-top img-fluid" src="<?= BASE_STORAGE; ?>parceiro/<?= $parceiro->arquivo ?>" alt="Banner">
                                                <div class="card-body">
                                                    <div class="col-md-12 text-right">
                                                        <button data-id="<?= $parceiro->id_parceiro; ?>"
                                                                class="deletarParceiro btn btn-danger btn-icon btn-sm mr-2">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-md-12">
                                        <h6 class="mb-4">Não possui nenhum parceiro cadastrado. </h6>

                                        <a href="<?= BASE_URL ?>painel/parceiro/inserir" class="btn btn-primary mb-3">Adicionar um parceiro</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM PARCEIROS -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->


</div>
<!-- ============================================================== -->
<!-- FIM da listagem -->
<!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
