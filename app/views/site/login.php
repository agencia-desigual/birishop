<?php $this->view("site/include/header"); ?>

    <!--=====================================-->
    <!--=        Inner Banner Start         =-->
    <!--=====================================-->
    <section class="inner-page-banner" data-bg-image="<?= BASE_URL; ?>assets/theme/site/media/banner/banner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1>LOGIN</h1>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL ?>">HOME</a>
                            </li>
                            <li>LOGIN</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="myaccount-login-form light-shadow-bg">
            <div class="light-box-content">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-6 pt-3 pb-3">
                        <div class="form-box login-form">
                            <h3 class="item-title text-center header-login-icon">
                                <i class="far fa-user mr-2"></i>Faça o login
                            </h3>
                            <hr style="padding-bottom: 15px">
                            <form id="formLogin">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha">
                                </div>
                                <div class="form-group d-flex">
                                    <input type="submit" class="submit-btn" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("site/include/footer"); ?>