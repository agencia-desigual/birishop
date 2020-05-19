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
                                <p class="sub-title../plugins">Gerencie todas as promoções.
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
                                        <th class="text-center" scope="col">AÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($promocoesUsuario)) : ?>
                                        <?php foreach ($promocoesUsuario as $promo) : ?>
                                            <tr id="tb_<?= $promo->id_promocao; ?>">
                                                <td><?= $promo->nome ?></td>
                                                <td><?= $promo->empresa ?></td>
                                                <td>R$<?= number_format($promo->valor, 2, ",", "."); ?></td>
                                                <td>
                                                    <?php if($promo->status == 'ativo') : ?>
                                                        <span class="badge badge-success">ATIVO</span>
                                                    <?php elseif($promo->status == 'analise') : ?>
                                                        <span class="badge badge-primary">ANALISE</span>
                                                    <?php elseif($promo->status == 'reprovado') : ?>
                                                        <span class="badge badge-warning">REPROVADO</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">CANCELADO</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $promo->data_validade?></td>
                                                <td><?= $promo->data_cadastro ?></td>
                                                <td class="text-center">
                                                    <a href="<?= BASE_URL; ?>painel/promocao/alterar/<?= $promo->id_promocao; ?>" class="btn btn-primary btn-icon btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                       <td colspan="7">
                                           Nenhuma promoção cadastrada
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
