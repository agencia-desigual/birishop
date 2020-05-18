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

                                        <!-- NOME DO PRODUTO, VALOR ANTIGO, VALOR PROMOÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome do Produto</label>
                                                    <input type="text" class="form-control" name="nome" value="<?= $promocaoUsuario->nome ?>" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Antigo</label>
                                                    <input type="tel" class="form-control maskValor" value="<?= $promocaoUsuario->valor_antigo?>" name="valor_antigo" required="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Valor Promoção</label>
                                                    <input type="tel" class="form-control maskValor" name="valor" value="<?= $promocaoUsuario->valor ?>" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LINK, STATUS  -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Link</label>
                                                    <input type="text" class="form-control" name="link" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option>Selecione</option>
                                                        <option value="1">Ativo</option>
                                                        <option value="0">Destivado</option>
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
                                                            <input type="text"  name="data_validade" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                            <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Categoria</label>
                                                    <select name="id_categoria" class="form-control">
                                                        <option>Selecione</option>
                                                        <?php foreach ($categorias as $categoria) : ?>
                                                            <option value="<?= $categoria->id_categoria ?>"><?= $categoria->nome ?></option>
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

                                        <button type="submit" class="btn btn-primary float-right">Cadastrar</button>

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
