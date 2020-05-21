<?php $this->view("painel/include/header"); ?>

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
                                    <h5 class="font-16">Promoções</h5>
                                </div>
                                <h3 class="mt-4"><?= $qtdePromocoes ?></h3>
                                <p class="text-muted mt-2 mb-0">Promoções ativa</p>
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
                                    <h5 class="font-16">Associados</h5>
                                </div>
                                <h3 class="mt-4"><?= $qtdeAssociados ?></h3>
                                <p class="text-muted mt-2 mb-0">Associados ativo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM CARDS -->

                <!-- ASSOCIADOS -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Aguardando aprovação</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOME DO ESTABELECIMENTO</th>
                                            <th scope="col">CNPJ</th>
                                            <th scope="col">NOME</th>
                                            <th scope="col">EMAIL</th>
                                            <th class="text-center" scope="col">AÇÕES</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($associados)): ?>
                                                <?php foreach ($associados as $associado): ?>
                                                    <tr id="associado_<?= $associado->id_usuario; ?>">
                                                        <td><?= $associado->id_usuario; ?></td>
                                                        <td style="text-transform: capitalize;"><?= $associado->nome_estabelecimento; ?></td>
                                                        <td><?= $associado->cnpj; ?></td>
                                                        <td><?= $associado->nome; ?></td>
                                                        <td><?= $associado->email; ?></td>
                                                        <td class="text-center">
                                                            <button style="display: none" data-id="<?= $associado->id_usuario; ?>" data-tipo="0" class="btn btn-icon alteraStatusUsuario">
                                                                <i class="fas fa-window-close reprovar"></i>
                                                            </button>

                                                            <button data-id="<?= $associado->id_usuario; ?>" data-tipo="1" class="btn btn-icon alteraStatusUsuario">
                                                                <i class="fas fa-check-circle aprovar"></i>
                                                            </button>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">Não possui associados aguardando aprovação.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
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

<?php $this->view("painel/include/footer"); ?>