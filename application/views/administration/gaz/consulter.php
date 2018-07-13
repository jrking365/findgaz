<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Gaz </h2>

    </div>
</div>

<?php
    $libelleProduit = $gaz->getProduit->libelle;
    $idProduit = $gaz->produit;
    
    $masseFormatProduit = $gaz->getFormatProduit->masse;
    $uniteFormatProduit = $gaz->getFormatProduit->unite;
    $idFormatProduit = $gaz->formatproduit;
    
    $prix_unitaire = $gaz->prix_unitaire;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Le gaz &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/gazs" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                            <a href="<?php echo base_url(); ?>administration/gazs" class="btn btn-warning btn-sm">Retour</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Produit</label>
                        <div class="col-lg-10">
                            <input disabled readonly name="produit" value="<?php echo $libelleProduit; ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('produit'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Format du produit</label>
                        <div class="col-lg-10"><input disabled readonly name="formatproduit" value="<?php echo $masseFormatProduit.' '.$uniteFormatProduit;  ?>" type="text" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Prix unitaire</label>
                        <div class="col-lg-10"><input disabled readonly name="prix_unitaire" type="text" value="<?php echo $prix_unitaire;  ?>" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>