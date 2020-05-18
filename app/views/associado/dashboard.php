<?php $this->view("associado/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da dashboard -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- FIM BREADCUMP -->

                <!-- CARDS -->
                <div class="row">

                    <!-- PROMOCOES -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-boxes bg-primary  text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Promoções ativa</h5>
                                </div>
                                <h3 class="mt-4"><?= $qtdePromocoesAtiva ?></h3>
                                <p class="text-muted mt-2 mb-0">Apenas as promoções ativa</p>
                            </div>
                        </div>
                    </div>

                    <!-- ASSOCIADOS -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="far fa-user bg-danger text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Promoções Inativa</h5>
                                </div>
                                <h3 class="mt-4"><?= $qtdePromocoesInativa ?></h3>
                                <p class="text-muted mt-2 mb-0">Apenas as promoções inativa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM CARDS -->

                <!-- ASSOCIADOS -->
                <div class="row">
                    <div class="col-xl-12">
                        <?php  if (!empty($promocoes)) : ?>
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Suas Promoções</h4>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NOME</th>
                                                <th scope="col">VALOR ANTIGO</th>
                                                <th scope="col">VALOR</th>
                                                <th scope="col">STATUS</th>
                                                <th class="text-center" scope="col">AÇÕES</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($promocoes as $promocao): ?>
                                                <tr id="promocao_<?= $promocao->id_promocao; ?>">
                                                    <td><?= $promocao->id_promocao; ?></td>
                                                    <td style="text-transform: capitalize;"><?= $promocao->nome; ?></td>
                                                    <td><?= $promocao->valor_antigo; ?></td>
                                                    <td><?= $promocao->valor; ?></td>
                                                    <td>
                                                        <?php if($promocao->status == 'ativo') : ?>
                                                            <span class="badge badge-success">ATIVO</span>
                                                        <?php elseif($promocao->status == 'analise') : ?>
                                                            <span class="badge badge-primary">ANALISE</span>
                                                        <?php elseif($promocao->status == 'reprovado') : ?>
                                                            <span class="badge badge-warning">REPROVADO</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-danger">CANCELADO</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button data-id="<?= $promocao->id_promocao; ?>" class="btn btn-icon deletarPromocao">
                                                            <i class="fas fa-window-close reprovar"></i>
                                                        </button>

                                                        <a href="<?= BASE_URL; ?>painel/promocao/alterar/<?= $promocao->id_promocao; ?>" class="btn btn-icon">
                                                            <i class="fas fa-edit editar"></i>
                                                        </a>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- CLIENTES -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->

    </div>
    <!-- ============================================================== -->
    <!-- FIM da dashboard -->
    <!-- ============================================================== -->

<?php $this->view("associado/include/footer"); ?>