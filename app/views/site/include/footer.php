<!--=====================================-->
<!--=       Footer Start           	=-->
<!--=====================================-->
<footer>
    <div class="footer-bottom-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright-text">
                        © <?= date("Y") ?> Todos os direitos reservados.
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payment-option">
                        <a href="https://desigual.com.br/site/">
                            <h4 style="color: #fff">Desigual</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- Jquery Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery/js/jquery.min.js"></script>
<!-- Popper Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/popper.js/js/popper.min.js"></script>
<!-- Bootstrap Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/bootstrap/js/bootstrap.min.js"></script>
<!-- Waypoints Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/waypoints/js/jquery.waypoints.min.js"></script>
<!-- Counterup Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery.counterup/js/jquery.counterup.min.js"></script>
<!-- Owl Carousel Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/owl.carousel/js/owl.carousel.min.js"></script>
<!-- ImagesLoaded Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
<!-- Isotope Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
<!-- Animated Headline Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/jquery-animated-headlines/js/jquery.animatedheadline.min.js"></script>
<!-- Magnific Popup Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
<!-- ElevateZoom Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/elevatezoom/js/jquery.elevateZoom-2.2.3.min.js"></script>
<!-- Bootstrap Validate Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/bootstrap-validator/js/validator.min.js"></script>
<!-- Meanmenu Js -->
<script src="<?= BASE_URL; ?>/assets/theme/site/dependencies/meanmenu/js/jquery.meanmenu.min.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
<!-- Site Scripts -->
<script src="<?= BASE_URL; ?>/assets/theme/site/js/app.js"></script>
<!-- Js Autoload -->
<?php $this->view("autoload/js"); ?>

<script>

    function modal(param)
    {

        if (param === "fecha")
        {
            $(".modalBirishop").css("display","none");
        }

    }

    function menu(tipo)
    {
        if(tipo === "abre")
        {
            $(".sidebar-menu-mobile").css("left","0px");
            $(".fundo-menu").fadeIn();
        }
        else
        {
            $(".sidebar-menu-mobile").css("left","-250px");
            $(".fundo-menu").fadeOut();
        }
    }

    if(sessionStorage.visita != '' && sessionStorage.visita != null && sessionStorage.visita != undefined)
    {
        modal('fecha');
    }
    else
    {
        modal('abre');
        sessionStorage.setItem("visita", "visitou");
    }

    console.log(sessionStorage.visita);

</script>
</body>

</html>