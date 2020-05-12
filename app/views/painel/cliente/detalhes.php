<?php $this->view("painel/include/header"); ?>

    <style>
        h6.campo
        {
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #84898e;
        }

        p.campo
        {
            font-size: 17px;
        }
    </style>

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
                            <h4 class="page-title">Detalhes do Cliente</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/clientes">Clientes</a></li>
                                <li class="breadcrumb-item active">Detalhes</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- FIM BREADCUMP -->

                <!-- CARDS -->
                <div class="row">

                    <!-- CARRINHOS ATIVOS -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-cart-plus bg-primary text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Carrinhos</h5>
                                </div>
                                <h3 class="mt-4"><?= $numCarrinhosAtivos ?></h3>
                                <p class="text-muted mt-2 mb-0">Carrinhos Ativos</p>
                            </div>
                        </div>
                    </div>

                    <!-- NUMERO DE COMPRAS -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Compras</h5>
                                </div>
                                <h3 class="mt-4"><?= $numCompras ?></h3>
                                <p class="text-muted mt-2 mb-0">Compras realizadas</p>
                            </div>
                        </div>
                    </div>

                    <!-- NUMERO DE PRODUTOS COMPRADOS -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-box-open bg-dark text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Produtos Comprados</h5>
                                </div>
                                <h3 class="mt-4"><?= $numProdutosComprados ?></h3>
                                <p class="text-muted mt-2 mb-0">Número de produtos adquiridos</p>
                            </div>
                        </div>
                    </div>

                    <!-- VALOR COMPRADO -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="fas fa-dollar-sign bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Valor Gasto</h5>
                                </div>
                                <h3 class="mt-4">R$<?= number_format($numValorGasto, 2, ",","."); ?></h3>
                                <p class="text-muted mt-2 mb-0">Total gastos em compras</p>
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
                                <h4 class="mt-0 header-title">DETALHES DO CLIENTE</h4>
                                <p class="sub-title">
                                    Informações gerais sobre esse cliente.
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="campo">Nome</h6>
                                        <p class="campo" style="text-transform: capitalize;"><?= $cliente->nome; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <h6 class="campo">E-mail</h6>
                                        <p class="campo"><?= $cliente->email; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <h6 class="campo">Celular</h6>
                                        <p class="campo"><?= $cliente->celular; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <h6 class="campo">Nível</h6>
                                        <p class="campo"><?= ($cliente->nivel == "cliente") ? "Cliente" : "Administrador"; ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <h6 class="campo">Status</h6>
                                        <?php if($cliente->status == true): ?>
                                            <h4><span class="badge badge-success">ATIVO</span></h4>
                                        <?php else: ?>
                                            <h4><span class="badge badge-danger">BANIDO</span></h4>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM CLIENTES -->


                <!-- ENDERECO -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">ENDEREÇO DO CLIENTE</h4>
                                <p class="sub-title">
                                    Informações sobre o endereço desse cliente.
                                </p>

                                <?php if(!empty($endereco)): ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="campo">Cidade/Estado</h6>
                                            <p class="campo"><?= $endereco->cidade; ?> - <?= $endereco->estado; ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <h6 class="campo">CEP</h6>
                                            <p class="campo"><?= preg_replace("/(\d{5})(\d{3})/", "\$1-\$2", $endereco->cep); ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <h6 class="campo">Endereço</h6>
                                            <p class="campo"><?= $endereco->endereco; ?>, Nº <?= $endereco->numero; ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <h6 class="campo">Complemento</h6>
                                            <p class="campo"><?= (!empty($endereco->complemento)) ? $endereco->complemento : "Não Informado"; ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Esse cliente não possui endereço cadastrado.</h5>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM ENDERECO -->


                <!-- COMPRAS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">ÚLTIMOS PEDIDOS</h4>
                                <p class="sub-title">
                                    Últimos pedidos desse cliente.
                                </p>

                                <?php if(!empty($carrinhos)): ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Frete</th>
                                                <th scope="col">Produtos</th>
                                                <th scope="col">Rastreio</th>
                                                <th scope="col"></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($carrinhos as $carrinho): ?>
                                                <tr>
                                                    <td>#<?= $carrinho->id_carrinho; ?></td>
                                                    <td>
                                                        <?php if(empty($carrinho->detalhes->pagamento)): ?>
                                                            <span class="badge badge-dark">CARRINHO ATIVO</span>
                                                        <?php else: ?>
                                                            <?php if($carrinho->detalhes->pagamento->status == "pago"): ?>
                                                                <span class="badge badge-success">PAGO</span>
                                                            <?php elseif($carrinho->detalhes->pagamento->status == "analise"): ?>
                                                                <span class="badge badge-primary">EM ANÁLISE</span>
                                                            <?php elseif($carrinho->detalhes->pagamento->status == "aguardando"): ?>
                                                                <span class="badge badge-warning">AGUARDANDO PAGAMENTO</span>
                                                            <?php elseif($carrinho->detalhes->pagamento->status == "erro"): ?>
                                                                <span class="badge badge-danger">ERRO NO PAGAMENTO</span>
                                                            <?php elseif($carrinho->detalhes->pagamento->status == "cancelado"): ?>
                                                                <span class="badge badge-danger">CANCELADO</span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>R$ <?= $carrinho->detalhes->total; ?></td>

                                                    <td>
                                                        <?php if(!empty($carrinho->detalhes->pagamento->frete)): ?>
                                                            R$ <?= number_format($carrinho->detalhes->pagamento->frete, 2, ",", "."); ?></td>
                                                        <?php else: ?>
                                                            Não Calculado
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><?= count($carrinho->detalhes->itens) ?></td>

                                                    <?php if(!empty($carrinhos->codigoRastreio)): ?>
                                                        <td><?= $carrinhos->codigoRastreio; ?></td>
                                                    <?php else: ?>
                                                        <td>Não Informado</td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <a href="<?= BASE_URL; ?>painel/pedido/<?= $carrinho->id_carrinho; ?>" class="btn btn-primary btn-sm">
                                                            Detalhes
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>


                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Esse cliente não possui pedidos.</h5>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM COMPRAS -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->


    </div>
    <!-- ============================================================== -->
    <!-- FIM da listagem -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
