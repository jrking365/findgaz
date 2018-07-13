<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Packs de Livraisons </h2>

    </div>
</div>

<?php
$code = $packlivraison->code;
$libelle = $packlivraison->libelle;
$prix_packlivraison = $packlivraison->prix_packlivraison;
$description = $packlivraison->description;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Le pack de livraison &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/packlivraisons" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                            <a href="<?php echo base_url(); ?>administration/packlivraisons" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Code</label>
                        <div class="col-lg-10"><input disabled readonly name="code" value="<?php echo set_value('code', $code); ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Libellé</label>
                        <div class="col-lg-10"><input disabled readonly name="libelle" type="text" value="<?php echo set_value('libelle', $libelle); ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Prix unitaire</label>
                        <div class="col-lg-10"><input disabled readonly name="prix_packlivraison" type="text" value="<?php echo $prix_packlivraison.' F CFA';  ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('prix_packlivraison'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea disabled readonly name="description" class="form-control">
                                <?php echo set_value('description', $description); ?>
                            </textarea>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>