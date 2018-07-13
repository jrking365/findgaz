
<div class="row border-left-right landing-page " > 
    <div class="col-lg-8 col-lg-offset-2 text-center m-t-sm m-b-sm">
        <p><strong>&copy; 2016 TS-Tech par TeamShadow </strong></p>
    </div>
</div>

</div>
</div>



<!-- Mainly scripts -->

<!-- Mainly scripts -->
<script src="<?php echo base_url(); ?>style/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(); ?>style/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(); ?>style/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/wow/wow.min.js"></script>

<script src="<?php echo base_url(); ?>style/js/plugins/ladda/spin.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/ladda/ladda.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/ladda/ladda.jquery.min.js"></script>

<script src="<?php echo base_url(); ?>style/js/plugins/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url(); ?>style/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script>
    $(document).ready(function () {

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#range_09").ionRangeSlider({
            grid: true,
            from: 3,
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ]
        });

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });
        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });
    var cbpAnimatedHeader = (function () {
        var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener('scroll', function (event) {
                if (!didScroll) {
                    didScroll = true;
                    setTimeout(scrollPage, 250);
                }
            }, false);
        }
        function scrollPage() {
            var sy = scrollY();
            if (sy >= changeHeaderOn) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();
    })();
    // Activate WOW.js plugin for animation on scrol
    new WOW().init();</script>

<div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3>Connexion à FindGaz</h3>

                    <p>Saisir votre login et mot de passe </p>
                    <form class="m-t" role="form" action="#">
                        <div class="input-group m-b">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                            <input type="text" class="form-control" id="login" placeholder="login" required="">
                        </div>
                        <div class="input-group m-b">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                            <input type="password" id="motpasse" class="form-control"  placeholder="motpasse" required="">
                        </div>
                        <button id="connex" data-style="zoom-in" class="ladda-button ladda-button-demo btn btn-primary block full-width m-b">Connexion</button>

                        <a href="#"><small>Mot de passe oublié ?</small></a>
                        <p class="text-muted text-center"><small>Vous ne possedez pas encore de compte ?</small></p>
                        <a class="btn btn-sm btn-default btn-outline btn-block" href="<?php echo base_url(); ?>enregistrement">Nouveau compte </a>
                    </form>
                    <p class="m-t"> <small> FindGaz by TS-Tech © 2016</small> </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var l = $('.ladda-button-demo').ladda();
    var login;
    var motpasse;
    l.click(function () {
        // Start loading
        l.ladda('start');
        login = document.getElementById('login').value;
        motpasse = document.getElementById('motpasse').value;
        $.post('<?php echo base_url(); ?>controleCompte/verification', {login: login, motpasse: motpasse}, function (data) {
            $(function () {
                if (data === '0') {
                    swal({
                        title: "Erreur",
                        text: " Veuillez vérifier votre login et mot de passe ! " + data,
                        type: "error"
                    });
                } else {
                    swal({
                        title: "Connexion réussie",
                        text: " Bienvenue ",
                        type: "success"
                    });
                    document.location.href = "" + data;
                }

                l.ladda('stop');
            });

        });
        // Timeout example
        // Do something in backend and then stop ladda
        /*setTimeout(function(){
         l.ladda('stop');
         },5000)*/
    });
</script>


</body>

</html>
