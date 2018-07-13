
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EasyGaz - More simple it's easy</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">

        <!-- Animation CSS -->
        <link href="<?php echo base_url(); ?>style/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>style/css/style.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">


        <link href="<?php echo base_url(); ?>style/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>style/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>style/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    </head>

    <body class="top-navigation">

        <div id="wrapper">
            <div id="page-wrapper" class="white-bg">
                <div class="row border-bottom white-bg">
                    <nav class="navbar navbar-fixed-top" role="navigation">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <i class="fa fa-reorder"></i>
                            </button>
                            <a href="#" class="navbar"> &nbsp;&nbsp; <img src="<?php echo base_url(); ?>style/img/logo.png" width="300" height="60" /> &nbsp;&nbsp; </a>
                        </div>
                        <div class="navbar-collapse collapse " id="navbar">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a aria-expanded="false" role="button" href="<?php echo base_url(); ?>welcome"> <i class="fa fa-home"></i> Accueil </a>
                                </li>
                                <li class="">
                                    <a aria-expanded="false" role="button" href="<?php echo base_url(); ?>client/localisation"> <i class="fa fa-map-marker"></i> Votre Gaz </a>
                                </li>
                                <?php
                                if ($is_connect) {
                                    ?>
                                    <li class="">
                                        <a aria-expanded="false" class="" role="button" href="#"> <i class="fa fa-shopping-cart"></i> Commande <span class="label label-primary">0</span> </a>
                                        
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="">
                                    <a aria-expanded="false" role="button" href="#"> <i class="fa fa-question"></i> Aides </a>
                                </li>
                                <li class="">
                                    <a aria-expanded="false" role="button" href="#"> <i class="fa fa-users"></i> A Propos </a>
                                </li>

                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Langue <span class="caret"></span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <li>
                                            <a class="btn btn-white set_en active"><img src="<?php echo base_url(); ?>style/img/flags/32/France.png"> FR</a>
                                        </li>
                                        <li>   
                                            <a class="btn btn-white set_en"><img src="<?php echo base_url(); ?>style/img/flags/16/United-States.png"> EN</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <?php
                                if ($is_connect) {
                                    ?>
                                    <li class="dropdown">
                                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> <?php echo $utilisateur->nom.' '.$utilisateur->prenom; ?> <span class="caret"></span></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a href="<?= base_url(); ?>client/profil">Profil</a></li>
                                            <li><a href="<?= base_url(); ?>client/mescommandes">Mes commandes</a></li>
                                            <li><a href="">Recommander</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>client/deconnexion">
                                            <button class="btn btn-danger"> <i class="fa fa-sign-out"></i> Déconnexion</button>

                                        </a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <a data-toggle="modal" data-target="#myModal4">
                                            <i class="fa fa-sign-in"></i> Se connecter
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </nav>
                </div>
