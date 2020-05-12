<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da listagem das promocoes -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Promoções</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Promoções</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->


                <!-- PROMOÇÕES -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">TODAS AS PROMOÇÕES</h4>
                                <p class="sub-title../plugins">Gerencie os clientes, você também pode exportar todos os contatos.
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col">NOME</th>
                                        <th scope="col">EMPRESA</th>
                                        <th scope="col">PREÇO</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">DTA. EXPIRAÇÃO</th>
                                        <th scope="col">DTA. CADASTRO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($promocoes)) : ?>
                                        <?php foreach ($promocoes as $promo) : ?>
                                            <tr id="tb_<?= $promo->id_promocao; ?>">
                                                <td><?= $promo->nome ?></td>
                                                <td><?= $promo->empresa ?></td>
                                                <td><?= $promo->valor ?></td>
                                                <td><?= $promo->status ?></td>
                                                <td><?= $promo->data_expira?></td>
                                                <td><?= $promo->data_cadastro ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                       <td colspan="6">
                                           Nenhuma promoção
                                       </td>
                                    </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM PROMOÇÕES -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->


    </div>
    <!-- ============================================================== -->
    <!-- FIM da listagem -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
