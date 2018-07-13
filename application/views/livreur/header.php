<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>FindGaz | Mon Espace </title>

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

    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom white-bg">
                    <nav class="navbar navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <i class="fa fa-reorder"></i>
                            </button>
                            <a href="<?php echo base_url().'livreur/Accueil' ?>" class="navbar-brand">FindGaz</a>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav">
                               
                                <li>
                                    <a href="<?php echo base_url(); ?>livreur/accueil/guideline?id=<?php echo $id;?>"><i class="fa fa-suitcase"> </i>consulter Feuille de route</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-bullseye"> </i>consulter Zone d'action</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo base_url(); ?>livreur/accueil/modifier?id=<?php echo $id;?>"><i class="fa fa-pencil-square-o"> </i>Demande de modificiation de compte</a>
                                </li>
                                       
                                    
                                
                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <a href="<?php echo base_url(); ?>deconnexion">
                                        <i class="fa fa-sign-out"></i> Déconnexion
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            


