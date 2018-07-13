
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EasyGaz - More simple it's easy</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/steps/jquery.steps.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/style.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/select2/select2.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    </head>
    <body id="page-top" class="landing-page">
        <br>
        <div class="text-center">
            <a class="btn btn-warning" href="<?php echo base_url(); ?>welcome"> <i class="fa fa-mail-reply"></i> Retour à l'Accueil </a>
        </div>

        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Nous proposons un monde où il est important de connaître les positions des produits </h1>
                        <p> Lancez-vous dans une aventure nouvelle ! </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-5 border-left">
                    <div class="full-height-scroll text-center" style="overflow: hidden; width: auto; height: 100%;">

                        <strong> Le saviez-vous ? </strong>
                        <div id="vertical-timeline" class="vertical-container dark-timeline">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="">1</i>
                                </div>
                                <div class="vertical-timeline-content ">
                                    <p>Conference on the sales results for the previous year.
                                    </p>
                                </div>
                            </div>
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon gray-bg">
                                    <i class="">2</i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                    </p>
                                </div>
                            </div>
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon gray-bg">
                                    <i class="fa fa-bolt"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <p>There are many variations of passages of Lorem Ipsum available.
                                    </p>
                                </div>
                            </div>
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-warning"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <p>The generated Lorem Ipsum is therefore.
                                    </p>
                                </div>
                            </div>
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon gray-bg">
                                    <i class="fa fa-coffee"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <p>Conference on the sales results for the previous year.
                                    </p>
                                </div>
                            </div>
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon gray-bg">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">

                    <div class="col-lg-11">
                       <!-- <button class="btn btn-success" id="btnMap"> <i class="fa fa-map-marker"></i> carte </button> -->
                        <div id="contenu" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Inscrivez-vous sur notre plateforme de géolocalisation du gaz
                                </div>
                                <div class="panel-body">
                                    <div class="p-xs">
                                        <div class="pull-left m-r-md">
                                            <i class="fa fa-smile-o text-navy mid-icon" style=""></i>
                                        </div>
                                        <h2>Bienvenue</h2>

                                        <span> Attention les informations avec <span class="label label-warning-light">( * )</span> sont obligatoires.</span>
                                    </div>
                                    <br>
                                    <!-- zone de formulaire  -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ibox">
                                                <div class="ibox-content">
                                                    <p>
                                                        Compléter vos informations
                                                    </p>

                                                    <form id="form" action="#" class="wizard-big">


                                                        <h1>Type d'utilisateur </h1>
                                                        <fieldset>
                                                            <h2> Quel type de compte voulez-vous créer ?</h2>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <div class="i-checks"><i class="fa fa-2x fa-male"></i> &nbsp;  <b>Client</b> : Personne qui  </div>
                                                                        <div class="i-checks"><i class="fa fa-2x fa-shopping-cart"></i> &nbsp; <b> Fournisseur </b> : Personne  </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select class="form-control m-b" name="type" id="type" required>
                                                                            <option selected="selected" disabled="" value=""> -- Sélectionner votre type -- </option>
                                                                            <option value="1"> Client </option>
                                                                            <option value="3"> Fournisseur </option>
                                                                        </select>
                                                                    </div
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <h1>Informations</h1>
                                                        <fieldset>

                                                            <h2> Saisir vos informations </h2>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nom *</label>
                                                                        <input id="nom" name="nom" type="text" class="form-control required">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Prénom </label>
                                                                        <input id="prenom" name="prenom" type="text" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input id="email" name="email" type="email" class="form-control">
                                                                    </div>

                                                                    <div class="form-group" id="data_1">
                                                                        <label>Date de naissance*</label>
                                                                        <div class="input-group date">
                                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="datenaissance" type="date" name="datenaissance" required="" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Téléphone*</label>
                                                                        <input id="contact" name="contact" type="number" required="" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Numéro CNI</label>
                                                                        <input id="numerocni" name="numerocni" type="text" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Civilité</label>
                                                                        <select class="form-control m-b" name="genre" id="genre" required="">
                                                                            <option value="" selected="selected">Choisissez votre civilité...</option>
                                                                            <option value="Masculin">Monsieur - M.</option>
                                                                            <option value="Féminin">Madame - Mme</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Statut matrimonial</label>
                                                                        <select class="form-control m-b" name="statutmatrimonial" id="statutmatrimonial" required="">
                                                                            <option value="" selected="selected">Choisissez votre statut...</option>
                                                                            <option value="Célibataire">Célibataire</option>
                                                                            <option value="Marié">Marié</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <h1>Terminer ! </h1>
                                                        <fieldset>
                                                            <h2>Informations de connexion </h2>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Login*</label>
                                                                    <input id="login" name="login" type="text" required="" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Mot de passe *</label>
                                                                    <input id="motpasse" name="motpasse" type="password" required="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <input id="acceptTerms" name="acceptterms" type="checkbox" class="required"> <label for="acceptTerms">J'accepte les conditions d'utilisation de la plateforme et je certifie que mes informations sont correctes.</label>
                                                            </div>
                                                        </fieldset>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div>


                </div>

            </div>


        </section>




        <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
            <p><strong>&copy; 2016 TS-Tech par TeamShadow </strong></p>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>style/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>style/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>style/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url(); ?>style/js/inspinia.js"></script>
        <script src="<?php echo base_url(); ?>style/js/plugins/pace/pace.min.js"></script>

        <!-- Steps -->
        <script src="<?php echo base_url(); ?>style/js/plugins/staps/jquery.steps.min.js"></script>

        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>style/js/plugins/validate/jquery.validate.min.js"></script>
        <!-- Data picker -->
        <script src="<?php echo base_url(); ?>style/js/plugins/datapicker/bootstrap-datepicker.js"></script>        

        <!-- Input Mask-->
        <script src="<?php echo base_url(); ?>style/js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>style/js/plugins/iCheck/icheck.min.js"></script>

        <script src="<?php echo base_url(); ?>style/js/plugins/sweetalert/sweetalert.min.js"></script>

        <script src="<?php echo base_url(); ?>style/js/plugins/chosen/chosen.jquery.js"></script>

        <!-- Select2 
        <script src="<?php echo base_url(); ?>style/js/plugins/select2/select2.full.min.js"></script>-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



        <script>
            $(document).ready(function () {
                $("#wizard").steps();
                $('.input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
                $("#form").steps({
                    bodyTag: "fieldset",
                    onStepChanging: function (event, currentIndex, newIndex)
                    {
                        // Always allow going backward even if the current step contains invalid fields!
                        if (currentIndex > newIndex)
                        {
                            return true;
                        }

                        // Forbid suppressing "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age").val()) < 18)
                        {
                            return false;
                        }

                        var form = $(this);

                        // Clean up if user went backward before
                        if (currentIndex < newIndex)
                        {
                            // To remove error styles
                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                        }

                        // Disable validation on fields that are disabled or hidden.
                        form.validate().settings.ignore = ":disabled,:hidden";

                        // Start validation; Prevent going forward if false
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex)
                    {
                        // Suppress (skip) "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age").val()) >= 18)
                        {
                            $(this).steps("next");
                        }

                        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3)
                        {
                            $(this).steps("previous");
                        }
                    },
                    onFinishing: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Disable validation on fields that are disabled.
                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                        form.validate().settings.ignore = ":disabled";

                        // Start validation; Prevent form submission if false
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex)
                    {
                        var form = $(this);

                        var type = document.getElementById('type').value;
                        var nom = document.getElementById('nom').value;
                        var prenom = document.getElementById('prenom').value;
                        var email = document.getElementById('email').value;
                        var datenaissance = document.getElementById('datenaissance').value;
                        var contact = document.getElementById('contact').value;
                        var numerocni = document.getElementById('numerocni').value;
                        var genre = document.getElementById('genre').value;
                        var statutmatrimonial = document.getElementById('statutmatrimonial').value;
                        var login = document.getElementById('login').value;
                        var motpasse = document.getElementById('motpasse').value;
                        //var acceptterms = document.getElementById('acceptterms').value;
                        var objet = {
                            "nom": nom,
                            "prenom": prenom,
                            "typeutilisateur": type,
                            "email": email,
                            "datenaissance": datenaissance,
                            "contact": contact,
                            "numerocni": numerocni,
                            "genre": genre,
                            "statutmatrimonial": statutmatrimonial,
                            "login": login,
                            "motpasse": motpasse
                        };
                        // Submit form input
                        //alert("Bonjour " + nom);
                        //form.submit();
                        $.post('enregistrement/creeObjet', {objet: JSON.stringify(objet)}, function (data) {
                            // vérification de la donnée de retour 
                            if (data === '0') {
                                $(function () {
                                    swal({
                                        title: "Attention enregistrement impossible",
                                        text: " Il y'a un problème avec le type selectionner !",
                                        type: "error"
                                    });
                                });
                            } else if (data === '1') {
                                $(function () {
                                    swal({
                                        title: "Cool vous y êtes presque ! ",
                                        text: " Cliquez sur ' ok ' puis renseigné votre localité. " + data
                                    });
                                });
                                $('#contenu').load('enregistrement/cartePosition');
                            } else {
                                $(function () {
                                    swal({
                                        title: "Attention enregistrement impossible",
                                        text: "" + data,
                                        type: "warning"
                                    });
                                });
                            }

                        });


                    }
                }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
            });
        </script>
        <script>
            var $states = $(".js-source-states");
            var statesOptions = $states.html();
            $states.remove();
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                $(".select2_demo_1").select2();
                $(".select2_demo_2").select2();
                $(".select2_demo_3").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".js-states").append(statesOptions);
                $(".js-example-basic-single").select2();
            });
            $('#btnMap').click(function () {
                $('#contenu').load('enregistrement/cartePosition');
            });
        </script>
    </body>

</html>
