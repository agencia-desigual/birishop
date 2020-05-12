<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da listagem de produtos -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Produtos</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Produtos</li>
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

                                <h4 class="mt-0 header-title">TODOS OS PRODUTOS</h4>
                                <p class="sub-title../plugins">Gerencie os produtos, você também pode exportar todos os produtos e personalizar a visualização.
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col">REFERÊNCIA</th>
                                        <th scope="col">NOME</th>
                                        <th scope="col">CATEGORIA</th>
                                        <th scope="col">VALOR</th>
                                        <th scope="col">STATUS</th>
                                        <th class="text-center" scope="col">AÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($produtos as $produto) : ?>
                                        <tr id="tb_<?= $produto->id_produto; ?>">
                                            <td><?= $produto->referencia ?></td>
                                            <td><?= $produto->nome ?></td>
                                            <td><?= $produto->categoria ?></td>
                                            <td>R$ <?= number_format($produto->valor, 2, ",", "."); ?></td>

                                            <?php if ($produto->status == 1) : ?>
                                                <td><span class="badge badge-success">ATIVO</span></td>
                                            <?php else: ?>
                                                <td><span class="badge badge-danger">INATIVO</span></td>
                                            <?php endif; ?>

                                            <td class="text-center">
                                                <button data-id="<?= $produto->id_produto; ?>"
                                                        class="deletarProduto btn btn-danger btn-icon btn-sm mr-2">
                                                    <i class="fas fa-window-close"></i>
                                                </button>

                                                <a href="<?= BASE_URL; ?>painel/produto/alterar/<?= $produto->id_produto; ?>" class="btn btn-primary btn-icon btn-sm">
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
