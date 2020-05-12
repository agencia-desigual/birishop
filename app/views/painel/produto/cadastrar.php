<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO alterar cor -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Cadastrar Produto</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/produtos">Produtos</a></li>
                                <li class="breadcrumb-item active">Adicionar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Adicionar um produto</h4>
                                <p class="sub-title">Adicione o produto, revise todos os dados.</p>

                                <div class="mb-0">
                                    <form id="formInserirProduto">

                                        <!-- REFERENCIA E NOME -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Referência</label>
                                                    <input type="text" class="form-control" name="referencia" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" onblur="$('#input_url').val($(this).val())" class="form-control" name="nome" required="" />
                                                </div>
                                            </div>
                                        </div>


                                        <!-- CATEGORIA E COR -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Categoria</label>
                                                    <select class="form-control" name="id_categoria" required="">
                                                        <option selected disabled>Selecione</option>
                                                        <?php if(!empty($categorias)) : ?>
                                                            <?php foreach ($categorias as $cat) : ?>
                                                                <option value="<?= $cat->id_categoria ?>"><?= $cat->nome ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Cor</label>
                                                    <select name="id_cor" required="" class="form-control">
                                                        <option selected disabled>Selecione</option>
                                                        <?php foreach ($cores as $cor): ?>
                                                            <option value="<?= $cor->id_cor; ?>"><?= $cor->nome; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- STATUS E VALOR -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Peso em Kg</label>
                                                    <input type="text" class="form-control maskPeso" value="001" name="peso" required="" />
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Valor</label>
                                                    <input type="text" class="form-control maskValor" name="valor" required="" />
                                                </div>
                                            </div>
                                        </div>


                                        <!-- URL Amigável e STATUS -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>URL Amigável</label>
                                                    <input type="text"
                                                           id="input_url"
                                                           name="url"
                                                           onkeypress="return urlInput.keyPress(event);"
                                                           onkeyup="return urlInput.keyUp(this);"
                                                           class="form-control"
                                                           required="" />
                                                    <p style="margin-bottom: 0px" class="sub-title">Não use acentos ou espaços</p>
                                                </div>


                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="status" required="" class="form-control">
                                                        <option value="1" selected>Ativo</option>
                                                        <option value="0">Desativado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DESCRIÇÃO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Decrição do produto</label>
                                                    <textarea id="textarea" name="descricao" required="" class="form-control summernote" maxlength="200" rows="3" placeholder="Descrição da categoria aqui."></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- TAGS SEO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>TAGS SEO</label>
                                                    <p style="margin-bottom: 0px" class="sub-title">Adicione as tags  para melhor a busca no google separe elas por vírgula.</p>
                                                    <input type="text" class="form-control" name="tags_seo" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- DESCRIÇÃO SEO -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Decrição SEO</label>
                                                    <p style="margin-bottom: 0px" class="sub-title">Adicione a descrição  para melhor a busca no google.</p>
                                                    <textarea id="textarea" name="descricao_seo" class="form-control" maxlength="200" rows="3" placeholder="Descrição da categoria aqui." required=""></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary float-right">Cadastrar</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- FIM formulario -->
    <!-- ============================================================== -->



<?php $this->view("painel/include/footer"); ?>
<script>
    jQuery(document).ready(function(){

        // Basic
        $('.dropify').dropify();

        $('.summernote').summernote({
            height: 150,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
</script>
