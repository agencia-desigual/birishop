<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO editar promoção -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Alterar Promoção</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/promocoes">Promoções</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <?php if (!empty($promocao)) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Editar Promoção</h4>
                                    <p class="sub-title">Revise a promoção</p>

                                    <form id="formAlteraPromocao">

                                        <input type="hidden" id="inputId" value="<?= $promocao->id_promocao ?>">

                                        <!-- NOME DO PRODUTO, VALOR ANTIGO, VALOR PROMOÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $promocao->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Antigo</label>
                                                    <input type="tel" class="form-control maskValor" name="valor_antigo" value="<?= number_format($promocao->valor_antigo, 2, ",", "."); ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Promoção</label>
                                                    <input type="tel" class="form-control maskValor" name="valor" value="<?= number_format($promocao->valor, 2, ",", "."); ?>" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LINK E STATUS -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Link</label>
                                                    <input type="text" class="form-control" name="link" value="<?= $promocao->link ?>" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="ativo" <?php if($promocao->status == 'ativo'){ echo "selected";} ?>>Ativo</option>
                                                        <option value="analise" <?php if($promocao->status == 'analise'){ echo "selected";} ?>>Analise</option>
                                                        <option value="reprovado" <?php if($promocao->status == 'reprovado'){ echo "selected";} ?>>Reprovado</option>
                                                        <option value="cancelado" <?php if($promocao->status == 'cancelado'){ echo "selected";} ?>>Cancelado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CATEGORIA E VALIDADE  -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Data validade</label>
                                                    <div>
                                                        <div class="input-group">
                                                            <!-- PADRÃO DA DATA -->
                                                            <input type="text"  name="data_validade" class="form-control" value="<?= $promocao->data_validade ?>" placeholder="dd/mm/yyyy" id="datepicker2">
                                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Categoria</label>
                                                    <select name="id_categoria" class="form-control">
                                                        <option>Selecione</option>
                                                        <?php foreach ($categorias as $categoria) : ?>
                                                            <option <?php if ($promocao->id_categoria == $categoria->id_categoria) { echo "selected"; } ?>  value="<?= $categoria->id_categoria ?>"><?= $categoria->nome ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DESCRIÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Decrição</label>
                                                    <textarea id="textarea" name="descricao" class="form-control" maxlength="500" rows="3" required=""><?= $promocao->descricao ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- IMG ATUAL E NOVA IMG -->
                                        <div class="form-group pt-3 pb-3">
                                            <label>Imagem Atual</label>
                                            <div class="row">
                                                <div class="col-md-6 produto-painel" style="background-image: url('<?= $promocao->imagem ?>')"></div>
                                                <div class="col-md-6">
                                                    <label>Nova Imagem</label>
                                                    <input name="arquivo" type="file" class="dropify">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ESTABELECIMENTO E CNPJ -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome estabelecimento</label>
                                                    <p><?= $promocao->empresa->nome_estabelecimento ?></p>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>CNPJ</label>
                                                    <p><?= $promocao->empresa->cnpj ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right">Alterar</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIM formulario -->
    <!-- ============================================================== -->

<?php $this->view("painel/include/footer"); ?>
<script>

    $(document).ready(function(){

        // Basic
        $('.dropify').dropify();

        $("#datepicker2").datepicker({
            format: 'dd/mm/yyyy',
            dateFormat: 'yyyy-mm-dd'
        })

    });

</script>
