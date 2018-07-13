<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Gaz </h2>

    </div>
</div>

<?php
    $libelleProduit = $gaz->getProduit->libelle;
    $idProduit = $gaz->produit;
    $jProduit = $idProduit;
    
    $masseFormatProduit = $gaz->getFormatProduit->masse;
    $uniteFormatProduit = $gaz->getFormatProduit->unite;
    $idFormatProduit = $gaz->formatproduit;
    $jFormatProduit = $idFormatProduit;
    
    $prix_unitaire = $gaz->prix_unitaire;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Modifier un gaz &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/gazs" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                    <p>Formulaire de modification</p>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Produit </label>
                        <div class="col-lg-10"><select name="produit"  class="form-control m-b">
                                <option value="<?php echo set_value('produit', $idProduit); ?>"><?php echo set_value('produit', $libelleProduit); ?></option>
                                
                                <?php
                                foreach ($produits as $row):
                                    if ($row->id != $jProduit) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->libelle ?></option>
                                        <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('produit'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Format du produit </label>
                        <div class="col-lg-10"><select name="formatproduit"  class="form-control m-b">
                                <option value="<?php echo set_value('formatproduit', $idFormatProduit); ?>"><?php echo $masseFormatProduit.' '.$uniteFormatProduit; ?></option>
                                
                                <?php
                                foreach ($formatproduits as $row):
                                    if ($row->id != $jFormatProduit) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->masse.' '.$row->unite ?></option>
                                        <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('formatproduit'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Prix unitaire</label>
                        <div class="col-lg-10"><input name="prix_unitaire" value="<?php echo set_value('prix_unitaire', $prix_unitaire); ?>" type="text" placeholder="Prix unitaire" class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('prix_unitaire'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Modifier</button>
                            <a href="<?php echo base_url(); ?>administration/gazs" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>