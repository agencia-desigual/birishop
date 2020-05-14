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

                                    <form id="formAlteraPromocao" data-id="<?= $promocao->id_promocao; ?>" data-alerta="swal">

                                        <!-- NOME DO PRODUTO, VALOR ANTIGO, VALOR PROMOÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $promocao->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Antigo</label>
                                                    <input type="tel" class="form-control maskValor" name="valor_antigo" value="<?= $promocao->valor_antigo ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Promoção</label>
                                                    <input type="tel" class="form-control maskValor" name="valor" value="<?= $promocao->valor ?>" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LINK E STATUS -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Link</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $promocao->link ?>" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" <?php if($promocao->status == true){ echo "selected";} ?>>Ativo</option>
                                                        <option value="0" <?php if($promocao->status == false){ echo "selected";} ?>>Destivado</option>
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

                                        <!-- IMAGEM -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Imagem</label>
                                                    <input required name="arquivo" type="file" class="dropify">
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

    });

</script>
