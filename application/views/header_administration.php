<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EasyGaz | Administration </title>

        <link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/cropper/cropper.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/switchery/switchery.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/select2/select2.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?php echo base_url(); ?>style/css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/plugins/iCheck/custom.css" rel="stylesheet">
        <!-- Gritter -->
        <link href="<?php echo base_url(); ?>style/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/style.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>style/js/jquery-2.1.1.js"></script>

    </head>

    <body class="">

        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="img-circle" src="<?php echo base_url(); ?>style/img/profile.png" />
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $utilisateur; ?></strong>
                                        </span> <span class="text-muted text-xs block"><?php echo $type; ?><b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="<?php echo base_url(); ?>administration/profil">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>deconnexion">Déconnexion</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                EG
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/accueil"><i class="fa fa-th-large"></i> <span class="nav-label">Accueil</span> <span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gérer Commandes</span>  </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/produits"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Produits</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/societes"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Sociétés</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/gazs"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Gaz</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/formatproduits"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Format du produit</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>administration/annonces"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Annonces</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/packlivraisons"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Packs de livraison</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>administration/historiquevisites"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Visites</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>administration/historiquenavigations"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Navigations</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>administration/visiteurs"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Visiteurs</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>administration/admin"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gérer Administrateur</span>  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Nos Fonctionnalités</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?php echo base_url(); ?>administration/fonctionnalite/liste_page">Les pages du système</a></li>
                                <li><a href="form_advanced.html">Fournisseur Entreprise</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url() . 'administration/livreur' ?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gérer Livreur</span>  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Gérer Fournisseur</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?= base_url() . 'administration/personnel' ?>">Fournisseur Personnel</a></li>
                                <li><a href="form_advanced.html">Fournisseur Entreprise</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Gérer Circonscription</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?php echo base_url(); ?>administration/circonscription/lister">Région</a></li>
                                <li><a href="<?php echo base_url(); ?>administration/circonscription/listede">Département</a></li>
                                <li><a href="<?php echo base_url(); ?>administration/circonscription/listecomm">Commune</a></li>
                                <li><a href="<?php echo base_url(); ?>administration/circonscription/liste_quartier">Quartier</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administration/pointlivraisons"><i class="fa fa-yelp"></i> <span class="nav-label">Les Points de Livraisons</span></a>
                        </li>
                        <li>
                            <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Gérer Packs</span></a>
                        </li>
                    </ul>

                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">

                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message"><b>Bienvenue sur l'espace administrateur de EasyGaz.</b></span>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="mailbox.html">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="profile.html">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="grid_options.html">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="notifications.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="<?php echo base_url(); ?>deconnexion">
                                    <button class="btn btn-danger"> <i class="fa fa-sign-out"></i> Déconnexion</button>

                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>


