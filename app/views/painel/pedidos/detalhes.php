<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO do detalhes do produto -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Detalhes do Pedido</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/pedidos">Pedidos</a></li>
                                <li class="breadcrumb-item active">Detalhes do Pedidos</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- FIM BREADCUMP -->

                <?php if ($pedido != null) : ?>
                    <!-- DETALHES DO PEDIDO -->
                    <div class="row">

                        <!-- DETALHES -->
                        <div class="<?= (!empty($pedido->pagamento)) ? 'col-8 ' : 'col-12'; ?> pedido-imprimir">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invoice-title">
                                                <?php if(!empty($pedido->pagamento)): ?>
                                                    <h5 class="float-right">
                                                        <?php if($pedido->pagamento->status == "pago"): ?>
                                                            <span class="badge badge-success">PAGO</span>
                                                        <?php elseif($pedido->pagamento->status == "analise"): ?>
                                                            <span class="badge badge-primary">EM ANÁLISE</span>
                                                        <?php elseif($pedido->pagamento->status == "aguardando"): ?>
                                                            <span class="badge badge-warning">AGUARDANDO PAGAMENTO</span>
                                                        <?php elseif($pedido->pagamento->status == "erro"): ?>
                                                            <span class="badge badge-danger">ERRO NO PAGAMENTO</span>
                                                        <?php elseif($pedido->pagamento->status == "cancelado"): ?>
                                                            <span class="badge badge-danger">CANCELADO</span>
                                                        <?php endif; ?>
                                                    </h5>
                                                <?php else: ?>
                                                    <h5 class="float-right"> <span class="badge badge-warning">PAGAMENTO NÃO REALIZADO</span> </h5>
                                                <?php endif; ?>

                                                <h3 class="m-t-0">
                                                    <img src="<?= BASE_URL ?>assets/custom/img/logo.png" alt="logo" height="24">
                                                </h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        <strong>ENDEREÇO DE ENTREGA:</strong><br>
                                                        <?php if(!empty($pedido->endereco)) : ?>
                                                            <?= $pedido->endereco->cidade.' / '.$pedido->endereco->estado ?><br>
                                                            <?= $pedido->endereco->endereco ?>, <b>Nº</b> <?= $pedido->endereco->numero ?><br>
                                                            <?= $pedido->endereco->bairro ?><br>
                                                            <?= preg_replace("/(\d{5})(\d{2})/", "\$1-\$2", $pedido->endereco->cep); ?><br>
                                                            <?= $pedido->endereco->complemento ?><br>
                                                        <?php else: ?>
                                                            <h4 class="float-center font-16">
                                                                <strong>Sem informações de endereço</strong>
                                                            </h4>
                                                        <?php endif; ?>
                                                    </address>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <address>
                                                        <strong>INFORMAÇÕES DE FRETE:</strong><br>
                                                        <?php if(!empty($pedido->frete)) : ?>
                                                            <?= $pedido->frete->codigo ?><br>
                                                            R$ <?= $pedido->frete->valor ?><br>
                                                            <?= $pedido->frete->prazo ?><br>
                                                        <?php else: ?>
                                                            <h4 class="float-center font-16">
                                                                <strong>Sem informações de frete</strong>
                                                            </h4>
                                                        <?php endif; ?>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 m-t-30">
                                                    <address>
                                                        <strong>CLIENTE:</strong><br>
                                                        <span style="text-transform: capitalize;"><?= $pedido->cliente->nome ?></span><br>
                                                        <?= $pedido->cliente->email ?><br>
                                                        <?= $pedido->cliente->celular ?><br>
                                                    </address>
                                                </div>
                                                <div class="col-6 m-t-30 text-right">
                                                    <address>
                                                        <h4 class="font-16">
                                                            <strong>PEDIDO #<?= $pedido->id_carrinho ?></strong>
                                                        </h4> <br>

                                                        <strong>DATA DO PEDIDO:</strong><br>
                                                        <?= date("d/m/Y", strtotime($pedido->data)); ?>
                                                        ás <?= date("H:i", strtotime($pedido->data)); ?>

                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="panel panel-default">
                                                <div class="p-2">
                                                    <h3 class="panel-title font-20"><strong>PRODUTOS</strong></h3>
                                                </div>
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <td class="text-left"><strong>REFERÊNCIA</strong></td>
                                                                <td class="text-center"><strong>PREÇO</strong></td>
                                                                <td class="text-center"><strong>QUANTIDADE</strong></td>
                                                                <td class="text-right"><strong>TOTAL</strong></td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($pedido->itens as $produtos) : ?>
                                                                <tr>
                                                                    <td class="text-left"><?= $produtos->produto->referencia ?></td>
                                                                    <td class="text-center">R$ <?= number_format($produtos->produto->valor, 2, ",", "."); ?></td>
                                                                    <td class="text-center"><?= $produtos->quantidade ?></td>
                                                                    <td class="text-right">R$ <?= number_format(($produtos->quantidade * $produtos->produto->valor), 2, ",", "."); ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-center"><strong>SUBTOTAL</strong></td>
                                                                <td class="text-right">R$ <?= $pedido->total; ?></td>
                                                            <tr>

                                                            <?php if (!empty($pedido->frete)) : ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>FRETE</strong></td>
                                                                    <td class="text-right">R$ <?= $pedido->frete->valor; ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td><h3 class="panel-title font-20"><strong>TOTAL</strong></h3></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right" style="font-size: 20px; font-weight: bold">R$ <?= number_format($pedido->frete->valor + $pedido->pagamento->valor, 2, ",", "."); ?></td>
                                                                <tr>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td><h3 class="panel-title font-20"><strong>TOTAL</strong></h3></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right" style="font-size: 20px; font-weight: bold">R$ <?= $pedido->total; ?></td>
                                                                <tr>
                                                            <?php endif; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="d-print-none mo-mt-2">
                                                        <div class="float-right">
                                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- end row -->

                                </div>
                            </div>
                        </div>
                        <!-- FIM DETALHES -->

                        <!-- RASTREIO E STATUS -->
                        <div class="col-md-4">
                            <div class="row">

                                <?php if(!empty($pedido->pagamento)): ?>
                                    <!-- RASTREIO -->
                                    <div id="rastreio" class="col-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="invoice-title">
                                                            <h4 class="font-16"><strong>RASTREIO DO PEDIDO</strong></h4>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <address>
                                                                    <form id="formAlteraCarrinho" data-id="<?= $pedido->id_carrinho; ?>">
                                                                        <?php if(!empty($pedido->codigoRastreio)) : ?>
                                                                            <strong>CÓDIGO DE RASTREIO / <?= $pedido->codigoRastreio ?>: </strong><br>
                                                                        <?php else: ?>
                                                                            <strong>CÓDIGO DE RASTREIO: </strong><br>
                                                                        <?php endif; ?>
                                                                        <input type="text" class="form-control" name="codigoRastreio" maxlength="100" required="" placeholder="Informe o código">
                                                                        <small style="font-style: italic">Ao enviar o código de rastreio o cliente receberá um email com o código</small>
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mt-4 mb-2 float-right">Salvar</button>
                                                                    </form>
                                                                </address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIM RASTREIO -->


                                    <!-- STATUS -->
                                    <div id="status" class="col-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="invoice-title">
                                                            <h4 class="font-16"><strong>STATUS DO PEDIDO</strong></h4>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <address>
                                                                    <form id="formAlteraPagamento" data-id="<?= $pedido->pagamento->id_pagamento; ?>">
                                                                        <select class="form-control" name="status" required="">
                                                                            <option selected disabled>Selecione</option>
                                                                            <option value="aguardando">Aguardando Pagamento</option>
                                                                            <option value="analise">Em análise</option>
                                                                            <option value="pago">Pago</option>
                                                                            <option value="erro">Erro no pagamento</option>
                                                                            <option value="cancelado">Cancelado</option>
                                                                        </select>
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mt-4 mb-2 float-right">ALTERAR</button>
                                                                    </form>
                                                                </address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIM STATUS -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- FIM RASTREIO E STATUS-->

                    </div>
                    <!-- FIM DETALHES DO PEDIDO -->
                <?php endif; ?>

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->


    </div>
    <!-- ============================================================== -->
    <!-- FIM da listagem -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
