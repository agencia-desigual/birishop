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

                <?php if (!empty($promocaoUsuario)) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Editar Promoção</h4>
                                    <p class="sub-title">Revise a promoção</p>

                                    <form id="formAlteraPromocao">

                                        <input type="hidden" value="<?= $promocaoUsuario->id_promocao ?>" id="inputId">

                                        <!-- NOME DO PRODUTO, VALOR ANTIGO, VALOR PROMOÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $promocaoUsuario->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Antigo</label>
                                                    <input type="tel" class="form-control maskValor" value="<?= number_format($promocaoUsuario->valor_antigo, 2, ",", "."); ?>" name="valor_antigo" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Promoção</label>
                                                    <input type="tel" class="form-control maskValor" name="valor" value="<?= number_format($promocaoUsuario->valor, 2, ",", "."); ?>" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LINK, STATUS  -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Link / Whatsapp</label>
                                                    <a class="btn-whats" href="#">WHATSAPP</a>
                                                    <a class="btn-link" href="#">LINK SITE</a>
                                                    <input type="text" class="form-control input-link" placeholder="https://meusite.com.br" name="link-site"/>
                                                    <input type="tel" class="form-control maskCel input-whats" placeholder="(18) 99635-xxxx" name="link-whats"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option>Selecione</option>
                                                        <option <?php if($promocaoUsuario->status == 'ativo' || $promocaoUsuario->status == 'analise'){ echo "selected"; } ?> value="analise">Ativo</option>
                                                        <option <?php if($promocaoUsuario->status == 'cancelado'){ echo "selected"; } ?> value="cancelado">Destivado</option>
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
                                                            <input type="text"  name="data_validade" class="form-control" value="<?= date("m/d/Y", strtotime($promocaoUsuario->data_validade)) ?>" placeholder="dd/mm/yyyy" id="datepicker2">
                                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Categoria</label>
                                                    <select name="id_categoria" class="form-control">
                                                        <option>Selecione</option>
                                                        <?php foreach ($categorias as $categoria) : ?>
                                                            <option <?php if ($promocaoUsuario->id_categoria == $categoria->id_categoria) { echo "selected"; } ?>  value="<?= $categoria->id_categoria ?>"><?= $categoria->nome ?></option>
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
                                                    <textarea id="textarea" name="descricao" class="form-control" maxlength="500" rows="3" required=""><?= $promocaoUsuario->descricao ?></textarea>
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
