<?php $this->view("painel/include/header"); ?>

    <!-- ============================================================== -->
    <!-- INICIO cadastrar usuario -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- BREADCUMP -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Alterar Categoria</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><?= SITE_NOME ?></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>painel/categorias">Categorias</a></li>
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

                                <h4 class="mt-0 header-title">Alterar Categoria</h4>
                                <p class="sub-title">Edite a categoria e depois vincule ela a um produto.</p>

                                <form id="formAlteraCategoria" data-id="<?= $categoria->id_categoria; ?>">

                                    <!-- NOME -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome da categoria</label>
                                                <input type="text" class="form-control" name="nome" value="<?= $categoria->nome; ?>" required/>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Url Amigável</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="url"
                                                       onkeypress="return urlInput.keyPress(event);"
                                                       onkeyup="return urlInput.keyUp(this);"
                                                       value="<?= $categoria->url; ?>" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- CATEGORIA PAI -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Categoria Pai</label>
                                                <p style="margin-bottom: 0px" class="sub-title">Deseja vincular essa categoria a outra categoria?</p>
                                                <select class="form-control" name="id_categoriaPai">
                                                    <option selected value="0">Selecione</option>
                                                    <?php if(!empty($categoriasLista)) : ?>
                                                        <?php foreach ($categoriasLista as $cat) : ?>
                                                            <?php if($cat->id_categoria != $categoria->id_categoria): ?>
                                                                <option <?php if($categoria->id_categoriaPai == $cat->id_categoria) { echo "selected"; }  ?>
                                                                        value="<?= $cat->id_categoria ?>">
                                                                    <?= $cat->nome ?>
                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DESCRIÇÃO -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Decrição</label>
                                                <textarea id="textarea" name="descricao" class="form-control" maxlength="300" rows="3" placeholder="Descrição da categoria aqui."><?= $categoria->descricao ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- IMAGEM -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Imagem</label>
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
