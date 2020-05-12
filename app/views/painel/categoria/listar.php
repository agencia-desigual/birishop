<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da listagem de categorias -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Categorias</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Categorias</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <!-- CATEGORIAS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">TODAS AS CATEGORIAS</h4>
                                <p class="sub-title../plugins">Gerencie as categorias, você também pode exportar todas as categorias e personalizar a visualização.
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col">NOME</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">SUB CAT.</th>
                                        <th class="text-center" scope="col">AÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <tr id="tb_<?= $categoria->id_categoria ?>">
                                            <td><?= $categoria->nome ?></td>
                                            <td><?= $categoria->url ?></td>

                                            <?php if (!empty($categoria->filha)) : ?>
                                                <td><?= $categoria->filha ?> </td>
                                            <?php else: ?>
                                                <td>-</td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <button data-id="<?= $categoria->id_categoria; ?>"
                                                        class="deletarCategoria btn btn-danger btn-icon btn-sm mr-2">
                                                    <i class="fas fa-window-close"></i>
                                                </button>

                                                <a href="<?= BASE_URL; ?>painel/categoria/alterar/<?= $categoria->id_categoria; ?>" class="btn btn-primary btn-icon btn-sm">
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
                <!-- FIM CLIENTES -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->


    </div>
    <!-- ============================================================== -->
    <!-- FIM da listagem -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
