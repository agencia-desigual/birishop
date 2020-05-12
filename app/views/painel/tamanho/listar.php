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
                        <h4 class="page-title">Tamanhos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                            <li class="breadcrumb-item active">Tamanhos</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- FIM BREADCUMP -->

            <!-- CORES -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">TODOS OS TAMANHOS</h4>
                            <p class="sub-title../plugins">Gerencie os tamanhos, depois você pode vincular em algum produto.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th scope="col">TAMANHO</th>
                                    <th class="text-center" scope="col">STATUS</th>
                                    <th class="text-center" scope="col">AÇÕES</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tamanhos as $tamanho) : ?>
                                    <tr id="tb_<?= $tamanho->id_tamanho; ?>">
                                        <td><?= $tamanho->nome ?></td>

                                        <?php if ($tamanho->status == 1) : ?>
                                            <td class="text-center"><span class="badge badge-success">ATIVO</span></td>
                                        <?php else: ?>
                                            <td class="text-center"><span class="badge badge-danger">INATIVO</span></td>
                                        <?php endif; ?>

                                        <td class="text-center">
                                            <button data-id="<?= $tamanho->id_tamanho; ?>"
                                                    class="deletarTamanho btn btn-danger btn-icon btn-sm mr-2">
                                                <i class="fas fa-window-close"></i>
                                            </button>

                                            <a href="<?= BASE_URL; ?>painel/tamanho/alterar/<?= $tamanho->id_tamanho; ?>" class="btn btn-primary btn-icon btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM CORES -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->


</div>
<!-- ============================================================== -->
<!-- FIM da listagem -->
<!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
