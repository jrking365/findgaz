<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Historiques de Visite </h2>

    </div>
</div>

<?php
    $adressemacVisiteur = $historiquevisite->getVisiteur->adressemac;
    $idVisiteur = $historiquevisite->visiteur;
    
    $libellePage = $historiquevisite->getPage->libelle;
    $idPage = $historiquevisite->page;
    
    $datevisite = $historiquevisite->datevisite;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>L'historique de visite &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/historiquevisites" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>

                </div>
            </div>

            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div>
                            <a href="<?php echo base_url(); ?>administration/historiquevisites" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Visiteur</label>
                        <div class="col-lg-10">
                            <input disabled readonly name="visiteur" value="<?php echo $adressemacVisiteur; ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('visiteur'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Page</label>
                        <div class="col-lg-10"><input disabled readonly name="page" value="<?php echo $libellePage;  ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('page'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Date de visite</label>
                        <div class="col-lg-10"><input disabled readonly name="datevisite" type="text" value="<?php echo $datevisite;  ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('datevisite'); ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>