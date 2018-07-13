<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Gérer les Produits </h2>

    </div>
</div>

<?php
$idSociete = $produit->societe;
$j = $idSociete;
$nomSociete = $produit->getSociete->nom;
$code = $produit->code;
$libelle = $produit->libelle;
$description = $produit->description;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>Modifier un produit &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>administration/produits" class="btn btn-default btn-sm"><span class="fa fa-mail-reply"></span></a> </h5>
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
                        <label class="col-lg-2 control-label">Société </label>
                        <div class="col-lg-10"><select name="societe"  class="form-control m-b">
                                <option value="<?php echo $j = set_value('societe', $idSociete); ?>"><?php echo set_value('societe', $nomSociete); ?></option>
                                
                                <?php
                                foreach ($societes as $row):
                                    if ($row->id != $j) {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                                        <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('societe'); ?></span>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Code</label>
                        <div class="col-lg-10"><input name="code" value="<?php echo set_value('code', $code); ?>" type="text" placeholder="Nom " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('code'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Libellé</label>
                        <div class="col-lg-10"><input name="libelle" value="<?php echo set_value('libelle', $libelle); ?>" type="text" placeholder="Libellé " class="form-control">
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('libelle'); ?></span></div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea name="description" value="<?php echo set_value('description', $description); ?>" class="form-control"></textarea>
                            <span class="alert-danger help-block m-b-none"><?php echo form_error('description'); ?></span></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Modifier</button>
                            <a href="<?php echo base_url(); ?>administration/produits" class="btn btn-danger btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>