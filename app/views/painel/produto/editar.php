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
                            <h4 class="page-title">Alterar Produto</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/produtos">Produtos</a></li>
                                <li class="breadcrumb-item active">Alterar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- FIM BREADCUMP -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <!-- ABAS -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link <?= ($pag == 'produto') ? 'active' : ''; ?>" data-toggle="tab" href="#tab-produto" role="tab" aria-selected="false">
                                            <span class="d-none d-md-block">PRODUTO</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link <?= ($pag == 'galeria') ? 'active' : ''; ?>" data-toggle="tab" href="#tab-galeria" role="tab" aria-selected="true">
                                            <span class="d-none d-md-block">GALERIA</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link <?= ($pag == 'tamanho') ? 'active' : ''; ?>" data-toggle="tab" href="#tab-tamanho" role="tab" aria-selected="true">
                                            <span class="d-none d-md-block">TAMANHO</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link <?= ($pag == 'variacao') ? 'active' : ''; ?>" data-toggle="tab" href="#tab-variacoes" role="tab" aria-selected="false">
                                            <span class="d-none d-md-block">VARIAÇÕES</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- ABAS DAS PAGINAS -->
                                <div class="tab-content">

                                    <!-- PRODUTO -->
                                    <div class="tab-pane p-3 <?= ($pag == 'produto') ? 'active' : ''; ?>" id="tab-produto" role="tabpanel">

                                        <h4 class="mt-0 header-title">Alterar Produto</h4>
                                        <p class="sub-title">Altere o produto, revise todos os dados.</p>

                                        <div class="mb-0">
                                            <form id="formAlterarProduto" data-id="<?= $produto->id_produto; ?>">

                                                <!-- REFERENCIA E NOME -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Referência</label>
                                                            <input type="text" class="form-control" name="referencia" value="<?= $produto->referencia ?>" required/>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Nome</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="nome"
                                                                   onblur="$('#input_url').val($(this).val())"
                                                                   value="<?= $produto->nome ?>" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CATEGORIA E COR -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Categoria</label>
                                                            <select class="form-control">
                                                                <option selected value="0">Selecione</option>
                                                                <?php if(!empty($categorias)) : ?>
                                                                    <?php foreach ($categorias as $cat) : ?>
                                                                        <option <?php if($produto->categoria->id_categoria == $cat->id_categoria) { echo "selected"; }  ?> value="<?= $cat->id_categoria ?>"><?= $cat->nome ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Cor</label>
                                                            <select name="id_cor" required="" class="form-control">
                                                                <option selected disabled>Selecione</option>
                                                                <?php foreach ($cores as $cor): ?>
                                                                    <option value="<?= $cor->id_cor; ?>" <?= ($produto->id_cor == $cor->id_cor) ? "selected" : ""; ?>> <?= $cor->nome; ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- PESO E VALOR -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Peso em Kg</label>
                                                            <input type="text" class="form-control maskPeso" value="<?= $produto->peso; ?>" name="peso" required="" />
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>Valor</label>
                                                            <input type="text" class="form-control maskValor" value="<?= number_format($produto->valor, 2, ',','.'); ?>" name="valor" required="" />
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
                                                                   value="<?= $produto->url; ?>"
                                                                   onkeypress="return urlInput.keyPress(event);"
                                                                   onkeyup="return urlInput.keyUp(this);"
                                                                   class="form-control"
                                                                   required="" />
                                                            <p style="margin-bottom: 0px" class="sub-title">Não use acentos ou espaços</p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Status</label>
                                                            <select name="status" required="" class="form-control">
                                                                <option value="1" <?php if($produto->status == true){echo "selected";} ?>>Ativo</option>
                                                                <option value="0" <?php if($produto->status == false){echo "selected";} ?>>Desativado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- DESCRIÇÃO -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Decrição do produto</label>
                                                            <textarea id="textarea" name="descricao" class="form-control summernote" maxlength="200" rows="3" placeholder="Descrição da categoria aqui."><?= $produto->descricao ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- TAGS SEO -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>TAGS SEO</label>
                                                            <p style="margin-bottom: 0px" class="sub-title">Adicione as tags  para melhor a busca no google separe elas por vírgula.</p>
                                                            <input type="text" class="form-control" name="tags_seo" value="<?= $produto->tags_seo ?>" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DESCRIÇÃO SEO -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Decrição SEO</label>
                                                            <p style="margin-bottom: 0px" class="sub-title">Adicione a descrição  para melhor a busca no google.</p>
                                                            <textarea id="textarea" name="descricao_seo" class="form-control" maxlength="200" rows="3" placeholder="Descrição da categoria aqui."><?= $produto->descricao_seo ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary float-right">Alterar</button>

                                            </form>
                                        </div>

                                    </div>


                                    <!-- GALERIA -->
                                    <div class="tab-pane p-3 <?= ($pag == 'galeria') ? 'active' : ''; ?>" id="tab-galeria" role="tabpanel">
                                        <p class="mb-0">
                                           <form id="formInserirImagemProduto" data-id="<?= $produto->id_produto; ?>">

                                                <!-- IMAGEM -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Imagem</label>
                                                            <input name="arquivo" type="file" class="dropify">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- STATUS -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Essa imagem é a principal?</label>
                                                            <div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" value="1" name="principal">
                                                                    <label class="custom-control-label" for="customCheck1">SIM</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <div style="margin-top: 50px; margin-bottom: 50px" >
                                                <hr>
                                            </div>

                                            <?php if (!empty($produto->galeria)) : ?>
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">IMAGEM</th>
                                                        <th class="text-center" scope="col">PRINCIPAL</th>
                                                        <th class="text-center" scope="col">AÇÕES</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($produto->galeria as $galeria) : ?>
                                                        <tr id="tb_img_<?= $galeria->id_imagem; ?>">
                                                            <td class="text-center">
                                                                <img width="50px"
                                                                     src="<?= BASE_STORAGE; ?>produto/<?= $produto->id_produto ?>/thumb/<?= $galeria->arquivo ?>">
                                                            </td>

                                                            <td class="text-center">
                                                                <?php if ($galeria->principal == 1) : ?>
                                                                    <span class="badge badge-success">SIM</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-warning">NÃO</span>
                                                                <?php endif; ?>
                                                            </td>

                                                            <td class="text-center">
                                                                <?php if ($galeria->principal != true) : ?>
                                                                    <button data-id="<?= $galeria->id_imagem; ?>"
                                                                            data-produto="<?= $produto->id_produto; ?>"
                                                                            class="imagemPrincipal btn btn-primary btn-icon btn-sm mr-2">
                                                                        <i class="fas fa-star"></i>
                                                                    </button>

                                                                    <button data-id="<?= $galeria->id_imagem; ?>"
                                                                            class="deletarImagemProduto btn btn-danger btn-icon btn-sm mr-2">
                                                                        <i class="fas fa-window-close"></i>
                                                                    </button>
                                                                <?php else: ?>
                                                                    -
                                                                <?php endif; ?>


                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </p>
                                    </div>


                                    <!-- TAMANHO -->
                                    <div class="tab-pane p-3 <?= ($pag == 'tamanho') ? 'active' : ''; ?>" id="tab-tamanho" role="tabpanel">
                                        <p class="mb-0">
                                            <form>
                                                <!-- STATUS -->
                                                <?php if(!empty($tamanhos)): ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12 mt-3 mb-3 text-left">
                                                                <button style="margin-right: 20px; float:left !important;"
                                                                        type="button"
                                                                        class="btn btn-primary waves-effect waves-light float-right m-r-5"
                                                                        data-toggle="modal" data-target=".novo-tamanho">
                                                                    Adicionar Tamanho
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>


                                                <?php if (!empty($tamanhosProduto)) : ?>
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center" scope="col">NOME</th>
                                                            <th class="text-center" scope="col">QUANTIDADE</th>
                                                            <th class="text-center" scope="col">AÇÕES</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($tamanhosProduto as $tamProduto) : ?>
                                                            <tr id="tb_tamanho_<?= $tamProduto->id_produto_tamanho; ?>">
                                                                <td class="text-center"><?= $tamProduto->tamanho->nome ?></td>
                                                                <td class="text-center"><?= $tamProduto->quantidade; ?></td>
                                                                <td class="text-center">
                                                                    <button data-id="<?= $tamProduto->id_produto_tamanho; ?>"
                                                                            data-quantidade="<?= $tamProduto->quantidade; ?>"
                                                                            class="abreModalAltera btn btn-primary btn-icon btn-sm">
                                                                        <i class="far fa-edit"></i>
                                                                    </button>

                                                                    <button data-id="<?= $tamProduto->id_produto_tamanho; ?>"
                                                                            class="deletarTamanhoProduto btn btn-danger btn-icon btn-sm ml-2">
                                                                        <i class="fas fa-window-close"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
                                            </form>
                                        </p>
                                    </div>


                                    <!-- VARIACOES -->
                                    <div class="tab-pane p-3 <?= ($pag == 'variacao') ? 'active' : ''; ?>" id="tab-variacoes" role="tabpanel">
                                        <p class="mb-0">
                                        <form>

                                            <!-- STATUS -->
                                            <?php if(!empty($variacoesProduto)): ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3 mb-3 text-left">
                                                            <button style="margin-right: 20px; float:left !important;"
                                                                    type="button"
                                                                    class="btn btn-primary waves-effect waves-light float-right m-r-5"
                                                                    data-toggle="modal" data-target=".nova-variacao">
                                                                Adicionar Variação
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($variacoes)) : ?>
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">IMG</th>
                                                        <th class="text-center" scope="col">NOME</th>
                                                        <th class="text-center" scope="col">AÇÕES</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($variacoes as $variacao) : ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <img width="50px"
                                                                     src="<?= $variacao->imagens['thumb'];; ?>">
                                                            </td>
                                                            <td class="text-center">
                                                                <?= $variacao->nome; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <button data-id="<?= $variacao->id_produto; ?>"
                                                                        data-produto="<?= $produto->id_produto; ?>"
                                                                        class="deletarVariacao btn btn-danger btn-icon btn-sm mr-2">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </form>
                                        </p>
                                    </div>
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


    <!-- ---------------------------------------------------- -->
    <!-- MODAL ADICIONA TAMANHO ----------------------------- -->
    <!-- ---------------------------------------------------- -->
    <div class="modal fade novo-tamanho" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Novo Tamanho</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-style: italic">Adicione um novo tamanho ao produto</p>

                    <form id="formInserirTamanhoProduto" data-id="<?= $produto->id_produto; ?>">
                        <div class="form-group">
                            <label>Tamanho</label>
                            <select class="form-control" name="tamanho" required="">
                                <option selected disabled>Selecione</option>
                                <?php foreach ($tamanhos as $tamanho) : ?>
                                    <option value="<?= $tamanho->id_tamanho; ?>"><?= $tamanho->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" />
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- FIM MODAL ADICIONA TAMANHO -->


    <!-- ---------------------------------------------------- -->
    <!-- MODAL ALTERA TAMANHO ------------------------------- -->
    <!-- ---------------------------------------------------- -->
    <div class="modal fade altera-tamanho" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Altera Tamanho</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <p style="text-align: center; font-style: italic">Alterar quantidade do produto</p>

                    <form id="formAlteraTamanhoProduto" data-id="<?= $produto->id_produto; ?>">
                        <div class="form-group">
                            <label>Quantidade</label>
                            <input type="number" name="quantidade" id="input_quantidade" class="form-control" />
                        </div>

                        <input type="hidden" name="id_produto_tamanho" id="input_idProdutoTamanho" />

                        <button type="submit" class="btn btn-primary float-right">Alterar</button>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- FIM MODAL ADICIONA TAMANHO -->


    <!-- ---------------------------------------------------- -->
    <!-- MODAL ADICIONA VARIAÇÃO ---------------------------- -->
    <!-- ---------------------------------------------------- -->
    <div class="modal fade nova-variacao" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Nova Variação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-style: italic">Selecione o produto a ser vinculado a esse.</p>

                    <form id="formInserirVariacao" data-id="<?= $produto->id_produto; ?>">
                        <div class="form-group">
                            <label>Produto Variação</label>
                            <select id="selectVariacao" name="produto" required="">
                                <option selected disabled>Selecione</option>
                                <?php foreach ($variacoesProduto as $varProduto) : ?>
                                    <option value="<?= $varProduto->id_produto; ?>"><?= $varProduto->referencia; ?> | <?= $varProduto->nome; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Adicionar</button>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- FIM MODAL ADICIONA VARIAÇÃO -->


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
