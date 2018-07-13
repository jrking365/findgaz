<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Produits </h2>

    </div>
</div>

<?php
$societe = $annonce->getSociete->nom;
$titre = $annonce->titre;
$datedebut = $annonce->datedebut;
$datefin = $annonce->datefin;
$description = $annonce->description;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>L'annonce &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/annonces" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                            <a href="<?php echo base_url(); ?>administration/annonces" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Société</label>
                        <div class="col-lg-10">
                            <input disabled readonly name="societe" value="<?php echo $societe; ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('societe'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Titre</label>
                        <div class="col-lg-10"><input disabled readonly name="titre" value="<?php echo set_value('titre', $titre); ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('titre'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea disabled readonly name="description" class="form-control">
                                <?php echo set_value('description', $description); ?>
                            </textarea>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Date de debut</label>
                        <div class="col-lg-10">
                            <input disabled readonly name="datedebut" type="text" value="<?php echo set_value('datedebut', $datedebut); ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('datedebut'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Date de fin</label>
                        <div class="col-lg-10">
                            <input disabled readonly name="datefin" type="text" value="<?php echo set_value('datefin', $datefin); ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('datefin'); ?></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>