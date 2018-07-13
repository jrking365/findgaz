<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Packs de livraisons </h2>

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
                <h5> Supprimer un pack de livraison &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/packlivraison/liste" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                             <a href="<?php echo base_url(); ?>administration/packlivraisons/valider_suppression?id=<?php echo $packlivraison->id ?>" class="btn btn-warning btn-sm">Supprimer</a>
                            <a href="<?php echo base_url(); ?>administration/packlivraisons" class="btn btn-danger btn-sm">Annuler</a>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Code</label>
                        <div class="col-lg-10"><input disabled name="code" value="<?php echo set_value('code', $code); ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Libellé</label>
                        <div class="col-lg-10"><input disabled name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Prix</label>
                        <div class="col-lg-10"><input disabled readonly="" name="prix_unitaire" value="<?php echo set_value('prix_packlivraison', $prix_packlivraison).' F CFA'; ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('prix_packlivraison'); ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>