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
                            <li class="breadcrumb-item active">Pedidos</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- FIM BREADCUMP -->

            <!-- CARDS -->
            <div class="row">

                <!-- ABANDONADO -->
                <div class="col-sm-4 col-xl-4">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="fas fa-times bg-danger  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Pedido Abandonado</h5>
                            </div>
                            <h3 class="mt-4"><?= $pedidosAbandonado ?></h3>
                            <p class="text-muted mt-2 mb-0">Todos os pedidos <b>abandonado</b></p>
                        </div>
                    </div>
                </div>

                <!-- ATIVO -->
                <div class="col-sm-4 col-xl-4">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="fas fa-times bg-warning  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Pedido Ativos</h5>
                            </div>
                            <h3 class="mt-4"><?= $pedidosAtivo; ?></h3>
                            <p class="text-muted mt-2 mb-0">Todos os pedidos <b>ativos</b></p>
                        </div>
                    </div>
                </div>

                <!-- CONCLUIDO -->
                <div class="col-sm-4 col-xl-4">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class=" fas fa-check bg-success  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Pedido Conluídos</h5>
                            </div>
                            <h3 class="mt-4"><?= $pedidosConcluido; ?></h3>
                            <p class="text-muted mt-2 mb-0">Todos os pedidos <b>concluídos</b></p>
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

                            <h4 class="mt-0 header-title">TODOS OS PEDIDOS</h4>
                            <p class="sub-title">
                                Gerencie os pedidos, você também pode exportar todos os pedidos e personalizar a visualização.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th scope="col">PEDIDO</th>
                                    <th scope="col">PRODUTO(S)</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">STATUS</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pedidos as $pedido) : ?>
                                    <tr>
                                        <td>#<?= $pedido->id_carrinho ?></td>
                                        <td><?= substr($pedido->nomeProduto, 0, 35).'...'; ?></td>
                                        <td style="text-transform: capitalize;"><?= $pedido->cliente->nome ?></td>

                                        <td>
                                            <?php if(empty($pedido->detalhes->pagamento)): ?>
                                                <span class="badge badge-dark">CARRINHO ATIVO</span>
                                            <?php else: ?>
                                                <?php if($pedido->detalhes->pagamento->status == "pago"): ?>
                                                    <span class="badge badge-success">PAGO</span>
                                                <?php elseif($pedido->detalhes->pagamento->status == "analise"): ?>
                                                    <span class="badge badge-primary">EM ANÁLISE</span>
                                                <?php elseif($pedido->detalhes->pagamento->status == "aguardando"): ?>
                                                    <span class="badge badge-warning">AGUARDANDO PAGAMENTO</span>
                                                <?php elseif($pedido->detalhes->pagamento->status == "erro"): ?>
                                                    <span class="badge badge-danger">ERRO NO PAGAMENTO</span>
                                                <?php elseif($pedido->detalhes->pagamento->status == "cancelado"): ?>
                                                    <span class="badge badge-danger">CANCELADO</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>


                                        <td class="text-center">
                                            <a href="<?= BASE_URL; ?>painel/pedido/<?= $pedido->id_carrinho; ?>" class="btn btn-primary btn-sm">
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
