<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO da listagem dos clientes -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Clientes</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item active">Clientes</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- FIM BREADCUMP -->

                <!-- CARDS -->
                <div class="row">

                    <!-- CLIENTES -->
                    <div class="col-sm-6 col-xl-6">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-thumbs-up bg-primary  text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Clientes Ativos</h5>
                                </div>
                                <h3 class="mt-4"><?= $numAtivos ?></h3>
                                <p class="text-muted mt-2 mb-0">Todos os clientes <b>ativos</b></p>
                            </div>
                        </div>
                    </div>

                    <!-- VENDAS NESSE MÊS -->
                    <div class="col-sm-6 col-xl-6">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-times bg-warning  text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Clientes Banidos</h5>
                                </div>
                                <h3 class="mt-4"><?= $numDesativados; ?></h3>
                                <p class="text-muted mt-2 mb-0">Todos os clientes <b>banidos</b></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- FIM CARDS -->

                <!-- CLIENTES -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">TODOS OS CLIENTES</h4>
                                <p class="sub-title">
                                    Gerencie os clientes, você também pode exportar todos os clientes e personalizar a visualização.
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th scope="col">NOME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">CADASTRO</th>
                                        <th class="text-center" scope="col">AÇÃO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($clientes as $cliente) : ?>
                                        <tr>
                                            <td style="text-transform: capitalize;"><?= $cliente->nome ?></td>
                                            <td><?= $cliente->email ?></td>
                                            <td>
                                                <?= preg_replace("/(\d{2})(\d{5})(\d{4})/", "(\$1) \$2-\$3", $cliente->celular); ?>
                                            </td>
                                            <?php if ($cliente->status == 1) : ?>
                                                <td><span class="badge badge-success">ATIVO</span></td>
                                            <?php else: ?>
                                                <td><span class="badge badge-danger">BANIDO</span></td>
                                            <?php endif; ?>

                                            <td>
                                                <?= date("d/m/Y", strtotime($cliente->cadastro)); ?> ás
                                                <?= date("H:i", strtotime($cliente->cadastro)); ?>
                                            </td>
                                            <td class="text-center">
                                                <button data-id="<?= $cliente->id_usuario; ?>"
                                                        class="alteraStatusUsuario btn <?= ($cliente->status == 1) ? "btn-danger" : "btn-success"; ?> btn-sm mr-2">
                                                    <?php if($cliente->status == 1): ?>
                                                        <i class="fas fa-ban"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-check"></i>
                                                    <?php endif; ?>
                                                </button>

                                                <a href="<?= BASE_URL; ?>painel/cliente/<?= $cliente->id_usuario; ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
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
