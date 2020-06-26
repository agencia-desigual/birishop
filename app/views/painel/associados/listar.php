<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da listagem dos usuarios -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Associados</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Associados</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- FIM BREADCUMP -->


                <!-- USUÁRIOS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">TODOS OS ASSOCIADOS</h4>
                                <p class="sub-title../plugins">Gerencie os associados, você também pode exportar todos os associados e personalizar a visualização.
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col">NOME DA LOJA</th>
                                        <th scope="col">CNPJ ou CPF</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">STATUS</th>
                                        <th class="text-center" scope="col">AÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($associados as $associado) : ?>
                                        <tr id="tb_<?= $associado->id_usuario; ?>">
                                            <td><?= $associado->nome_estabelecimento ?></td>
                                            <td><?= $associado->cnpj ?></td>
                                            <td><?= $associado->email ?></td>
                                            <?php if ($associado->status == 1) : ?>
                                                <td><span class="badge badge-success">ATIVO</span></td>
                                            <?php else: ?>
                                                <td><span class="badge badge-danger">INATIVO</span></td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <button data-id="<?= $associado->id_usuario; ?>"
                                                        class="deletarAssociado btn btn-danger btn-icon btn-sm mr-2">
                                                    <i class="fas fa-window-close"></i>
                                                </button>

                                                <a href="<?= BASE_URL; ?>painel/associado/alterar/<?= $associado->id_usuario; ?>" class="btn btn-primary btn-icon btn-sm">
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
