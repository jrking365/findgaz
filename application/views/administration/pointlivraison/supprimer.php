<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Les Points de Livraisons</h2>

    </div>
</div>

<?php
$id_quartier = $point->quartier;
$libelle_quartier = $point->getQuartier->nom;
$libelle = $point->libelle;
$description = $point->description;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> Supprimer le point &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/pointlivraisons" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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

                <?php
                if (isset($erreur)) {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $erreur . '</a>.
                </div>';
                }
                ?>

                <form class="form-horizontal" method="post" action="">
                    <p></p>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="<?php echo base_url(); ?>administration/pointlivraisons/valid_sup_point?id=<?php echo $point->id; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            <a href="<?php echo base_url(); ?>administration/pointlivraisons" class="btn btn-warning btn-sm">Annuler</a>
                        </div>

                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Quartier</label>
                        <div class="col-lg-10"><input disabled name="quartier" value="<?php echo set_value('quartier', $libelle_quartier); ?>" type="text" placeholder="Libelle " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('quartier'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Libelle</label>
                        <div class="col-lg-10"><input disabled name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" placeholder="Libelle " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Localisation </label>
                        <div class="col-lg-10">
                            <div class="jumbotron">
                                <h1>Carte</h1>
                                <p> Zone où ne carte apparaît pour la selection de la zone géographique. </p>

                            </div>

                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10"><textarea class="form-control" name="description"> <?php echo set_value('description', $description); ?> </textarea>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>